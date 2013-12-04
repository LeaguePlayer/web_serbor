//Map class

var MapControl = {
	//attr
	R: null,			//Raphael obj
	debug: true,		//debug mode
	regions: [],		//storage all regions
	stackPoints: [],	//temp stack points
	trash: [],			//temp for other elements
	tempC: false,		//temp path
	cursorPoint: false, //follow to mouse cursore
	move: false,		//move callback
	cc: false,			//move callback
	scroll: {},			//top, left pos scroll

	//methods
	init: function(map_id, options){
		var map = $('#' + map_id),
			self = this;

		var def = {
			afterAddRegion: function(r, context){
				console.log('add region', r);
			}
		};

		self.options = $.extend(def, options);

		self.mapOffset = map.offset();
		self.map = map;

		var imageMap = map.find('img'),
			mapContainer = map.parent(),
			mW = imageMap[0].naturalWidth,
			mH = imageMap[0].naturalHeight;
		// var imageMap = map.find('img'),
		// 	mW = imageMap.width(),
		// 	mH = imageMap.height();


		self.cc = function(e) { // click on circle
			var c = self.getCoord(e);
			self.addPoint(self.R.circle(c.x, c.y, 1).attr({fill: "white"}));
			/*var els = self.R.getElementsByPoint(c.x, c.y);

			for (var i = els.items.length - 1; i >= 0; i--) {
				if(els.items[i].type == 'image') {
					els.items[i].events[0].f(e);
				}
			};*/
		};

		self.move = function(e){
			var coords = self.getCoord(e);
			//self.drawRegion();
			//if(!self.cursorPoint) self.cursorPoint = self.R.circle(coords.x, coords.y, 2).attr({fill: "white"});

			//self.cursorPoint.attr({cx: coords.x, cy: coords.y});
			// self.cursorPoint.mousemove(function(e){
			// 	var coords = self.getCoord(e);
			// 	self.cursorPoint.attr({cx: coords.x, cy: coords.y});
			// });
			/*self.cursorPoint.click(function(){
				self.addPoint(this);
			});*/
		};


		if(map.length && imageMap.length && Raphael){
			imageMap.hide();
			//console.log(imageMap.width());
			//self.R = new ScaleRaphael(map_id, mW, mH);
			// self.R.changeSize(mapContainer.width(), mapContainer.height());
			self.R = Raphael(map_id, mW, mH);
			self.panZoom = self.R.panzoom({ initialZoom: 0, initialPosition: { x: 0, y: 0} });

			self.panZoom.enable();
    		self.R.safari();

    		//Zoom controls-----
    		$("#mapContainer #up").click(function (e) {
		    	self.panZoom.zoomIn(1);
		    	e.preventDefault();
		    });

		    $("#mapContainer #down").click(function (e) {
		    	self.panZoom.zoomOut(1);
		    	e.preventDefault();
		    });
		    //------Zoom controls

		    //Add image on svg
			self.imageMap = self.R.image(imageMap.attr('src'), 0, 0, mW, mH);

			//click on map (set point)
			self.imageMap.mouseup(function(e){
				if(!self.panZoom.isDragging()){
					var c = self.getCoord(e);
					self.addPoint(self.R.circle(c.x, c.y, 1).attr({fill: "white"}));
					// var coords = self.getCoord(e);
					// var c = self.R.circle(coords.x, coords.y, 1).attr({fill: "white"});
					// self.addPoint(c);
					// console.log(self.getCoord(e));
					// if(self.tempC){
					// 	//self.addPoint(self.tempC);
					// 	self.tempC = false;
					// }else{
						
					// }					
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
		var left = (Math.abs(pos.left) + e.clientX - self.mapOffset.left + self.map.scrollLeft() + $('body').scrollLeft()) / curW;
		var top = (Math.abs(pos.top) + e.clientY - self.mapOffset.top + self.map.scrollTop() + $('body').scrollTop()) / curH;

		left = left * self.R.width;
		top = top * self.R.height;

		return {x: parseFloat(left.toFixed(2)), y: parseFloat(top.toFixed(2))};
	},
	addPoint: function(point){
		var self = this;

		point.mousemove(self.move);
		self.stackPoints.push(point);
		//if add 1st point, then bind callbacks
		if(self.stackPoints.length == 1){
			point.click(function(e){
				self.stackPoints.push(this);
				self.drawRegion(true);
			});
			point.mouseover(function(e){
				this.attr({fill: "red"});
				/*if(self.stackPoints.length > 1){
					if(self.tempC){
						self.tempC.remove();
						self.stackPoints.pop();
						self.tempC = false;
					}
					self.stackPoints.push(this);
					self.tempC = false;
					self.drawRegion();
				}*/
			});
			point.mouseout(function(e){
				this.attr({fill: "white"});
				/*if(self.stackPoints.length > 1){
					self.stackPoints.pop();
					self.drawRegion();
				}*/
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
				self.options.afterAddRegion(r, self.R);
				return;
			}
			if(path.length > 0){
				self.trash.push(self.R.path(path).attr({'fill': 'blue', 'fill-opacity': 0.6}).mousemove(self.move).mouseup(self.cc));
				//self.trash.push(self.R.path(path).attr({'fill': 'blue', 'fill-opacity': 0.6}).mousemove(self.move).mouseup(self.cc));
				self.stackPoints[0].toFront();
			}
		}
	},
	drawAllRegions: function(){
		for (var i = this.regions.length - 1; i >= 0; i--) {
			this.regions[i].attr({
				'fill': 'green',
				'stroke': 'white',
				'fill-opacity': 0.6,
				'stroke-linejoin': 'round',
				'stroke-width': 1,
				'cursor' : 'pointer'
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

//callbacks for areas
var onArea = function(){
	this.attr({'fill-opacity': 1, 'fill': 'white'});
}
var outArea = function(){
	this.attr({'fill-opacity': 0.6, 'fill': 'green'});
}

//load area form
var clickOnPlot = function(){
	var id = this.data('plot-id');
	var pOnMap = this;

	$.ajax({
		url: '/admin/maps/plotForm',
		type: 'GET',
		data: {id: id},
		success: function(r){

			//foolproof
			$.fancybox.open(r, {
				beforeClose: function(){
					var form = $('#plot-form');
					$.ajax({
						url: '/admin/maps/plotSave',
						type: 'POST',
						data: form.serialize()
					});
				}
			});

			//save plot
			$('.plot-block').on('click', '.save-plot', function(){
				var button = $(this);
				var form = $('#plot-form');

				button.attr("disabled", "disabled");
				$.ajax({
					url: '/admin/maps/plotSave',
					type: 'POST',
					data: form.serialize(),
					success: function(r){
						var alert = jQuery('<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">×</button><strong>Изменения сохранены</strong></div>').hide();
						button.removeAttr("disabled");
						$('.alert-save').html(alert);
						alert.slideDown();
					},
					error: function(){
						button.removeAttr("disabled");
					}
				});
			});

			//remove plot
			$('.plot-block').on('click', '.remove-plot', function(){
				if(confirm('Вы уверены, что хотите удалить участок?')){
					var button = $(this).attr("disabled", "disabled");
					$.ajax({
						url: '/admin/maps/removePlot',
						type: 'GET',
						data: {id: $(this).data('id')},
						success: function(){
							$.fancybox.close();
							pOnMap.remove();
						}
					});
				}
			});
		}
	});
};

// for front-end
// render regions on the map
function renderPlots(regions){
	if(regions.length > 0){

		for (r_id in regions) {
			var p = MapControl.R.path(regions[r_id].coords).attr({
				'fill': 'green',
				'stroke': 'white',
				'fill-opacity': 0.6,
				'stroke-linejoin': 'round',
				'stroke-width': 1,
				'cursor' : 'pointer'
				//'stroke-width':"5"
			}).data('plot-id', regions[r_id].id);

			p.click(clickOnPlot);
			p.hover(onArea, outArea);
		}
	}
}

jQuery(document).ready(function(){

	MapControl.init('map', {
		afterAddRegion: function(r, context){
			var coords = r.attr('path') + ''; //get path (str)
			r.hover(onArea, outArea);

			$.ajax({
				url: '/admin/maps/createPlot',
				type: 'POST',
				data: {Plots:{coords: coords, image_map_id: $('#map').data('map-id')}},
				success: function(id){
					id = parseInt(id);
					if(id > 0){
						r.data('plot-id', id);
						r.click(clickOnPlot);
					}
				}
			});
		}
	});

	//render all Plots
	renderPlots(window.regions);

});