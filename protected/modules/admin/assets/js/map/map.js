
//Points class

var Point = {
	setCoord: function(x, y){
		this.x = x;
		this.y = y;
	},
	formatPoint: function(s){
		return [s, this.x, this.y].join(' ');
	}
}

//Map class

var MapControl = {
	//attr
	debug: true,		//debug mode
	regions: [],		//storage all regions
	stackPoints: [],	//temp stack points
	trash: [],			//temp for other elements
	tempC: false,		//temp path
	move: false,		//move callback
	cc: false,			//move callback

	//methods
	init: function(map_id, options){
		var map = $('#' + map_id),
			self = this;
		var def = {
			afterAddRegion: function(r){
				console.log('add region', r);
			}
		};

		self.options = $.extend(def, options);

		self.mapOffset = map.offset();

		var mW = map.width(),
			mH = map.height(),
			imageMap = map.find('img');

		self.move = function(e){
			if(self.stackPoints.length > 0){
				var coords = self.getCoord(e);
				
				if(self.tempC){
					self.tempC.remove();
					self.stackPoints.pop();
					self.tempC = false;
				}

				self.tempC = self.R.circle(coords.x, coords.y, 2).attr({fill: "white"});
				self.tempC.click(self.cc);
				self.addPoint(self.tempC);
				// self.drawRegion();
			}
		};

		self.cc = function(e) { // click on circle
			var c = self.getCoord(e);
			var els = self.R.getElementsByPoint(c.x, c.y);

			for (var i = els.items.length - 1; i >= 0; i--) {
				if(els.items[i].type == 'image') {
					els.items[i].events[0].f(e);
				}
			};
		};

		imageMap.hide();

		if(map.length && imageMap.length && Raphael){
			self.R = Raphael(map_id, mW, mH);
			self.panZoom = self.R.panzoom({ initialZoom: 1, initialPosition: { x: 120, y: 70} });

			self.panZoom.enable();
    		self.R.safari();

    		$("#mapContainer #up").click(function (e) {
		    	self.panZoom.zoomIn(1);
		    	e.preventDefault();
		    });

		    $("#mapContainer #down").click(function (e) {
		    	self.panZoom.zoomOut(1);
		    	e.preventDefault();
		    });

			self.imageMap = self.R.image(imageMap.attr('src'), 0, 0, mW, mH);

			//click on map (set point)
			self.imageMap.mouseup(function(e){
				if(!self.panZoom.isDragging()){
					if(self.tempC){
						//self.addPoint(self.tempC);
						self.tempC = false;
					}else{
						var coords = self.getCoord(e);
						var c = self.R.circle(coords.x, coords.y, 2).attr({fill: "white"});
						self.addPoint(c);
					}					
				}
			});

			//mouse move on the map
			self.imageMap.mousemove(self.move);		

			//remove on press Esc
			$(document).keyup(function(e) {
				switch (e.keyCode){
					case 27:
						if(self.stackPoints.length > 0){
							if(self.tempC){
								self.tempC.remove();
								self.stackPoints.pop();
								self.tempC = false;
							}
							self.stackPoints.pop().remove();
							// self.stackPoints.pop().remove();
						}else if(self.regions.length > 0){
							self.regions.pop().remove();
						}
						self.drawRegion();
						// self.removeRegions();
						// self.allClear();
						break;
				}
			});
		}
	},
	getCoord: function(e){ //return mouse coords
		var self = this,
			cz = self.panZoom.getCurrentZoom(),
			am = (1 - cz * 0.1),
			pos = $('image').position(),
			curW = Math.round(self.R.width / am),
			curH = Math.round(self.R.height / am);
		
		var left = (Math.abs(pos.left) + e.x - self.mapOffset.left) / curW;
		var top = (Math.abs(pos.top) + e.y - self.mapOffset.top) / curH;

		left = left * self.R.width;
		top = top * self.R.height;

		return {x: parseFloat(left.toFixed(2)), y: parseFloat(top.toFixed(2))};
	},
	addPoint: function(point){
		var self = this;

		self.stackPoints.push(point);
		//if add 1st point, then bind callbacks
		if(self.stackPoints.length == 1){
			point.click(function(e){
				self.stackPoints.push(this);
				self.drawRegion(true);
			});
			point.mouseover(function(e){
				this.attr({fill: "red"});
				if(self.stackPoints.length > 1){
					if(self.tempC){
						self.tempC.remove();
						self.stackPoints.pop();
						self.tempC = false;
					}
					self.stackPoints.push(this);
					self.tempC = false;
					self.drawRegion();
				}
			});
			point.mouseover(function(e){
				this.attr({fill: "white"});
				if(self.stackPoints.length > 1){
					self.stackPoints.pop();
					self.drawRegion();
				}
			});
		}

		self.drawRegion();
	},
	formatPoint: function(s, i){	//format to M x y OR L x y ...
		var c = this.stackPoints[i];

		c = c.attr(['cx', 'cy']);
		return [s, c.cx, c.cy].join(' ');
	},
	drawRegion: function(end){
		var self = this,
			end = end || false;

		if(self.stackPoints.length >= 0){
			var path = [];
			for (var i =0; i < self.stackPoints.length; i++) {
				if (i == 0) // 1st point
					path.push(self.formatPoint('M', i));
				else if(end && i == self.stackPoints.length-1) // last point
					path.push(self.formatPoint('L', i), 'Z');
				else //between 1st and last points
					path.push(self.formatPoint('L', i)); 
			};

			path = path.join(' ');
			this.clearTrash();

			//end point set and add region
			if(end){
				var r = self.R.path(path);
				self.regions.push(r);				
				self.allClear();
				self.drawAllRegions();
				//triggered add
				self.options.afterAddRegion(r);
				return;
			}
			if(path.length > 0){
				self.trash.push(self.R.path(path));
				self.trash.push(self.R.path(path).attr({'fill': 'blue', 'fill-opacity': 0.6}).mousemove(self.move).mouseup(self.cc));
				self.stackPoints[0].toFront();
			}
		}
	},
	drawAllRegions: function(){
		for (var i = this.regions.length - 1; i >= 0; i--) {
			this.regions[i].attr({
				'fill': 'white',
				'stroke': 'red',
				'fill-opacity': 0.6,
				'stroke-linejoin': 'round',
				'stroke-width': 3
				//'stroke-width':"5"
			});
		};
	},
	clearTrash: function(){
		for (var i = this.trash.length - 1; i >= 0; i--) {
			this.trash[i].remove();
		};
		this.trash = [];
	},
	clearStack: function(){
		for (var i = this.stackPoints.length - 1; i >= 0; i--) {
			this.stackPoints[i].remove();
		};
		this.stackPoints = [];
	},
	allClear: function(){
		this.clearTrash();
		this.clearStack();
	},
	removeRegions: function(){
		for (var i = this.regions.length - 1; i >= 0; i--) {
			this.regions[i].remove();
		};
	},
	dump: function(){
		for (var i = this.regions.length - 1; i >= 0; i--) {
			console.log(this.regions[i].attr('path'));
		};
	}

};

jQuery(document).ready(function(){
	MapControl.init('map', {
		afterAddRegion: function(r){
			var coord = r.attr('path') + ''; //get path (str)
			var area_row = $('.area-clone .row-fluid').clone();
			$('#all-data').append(area_row);
			console.log(r);
		}
	});
});