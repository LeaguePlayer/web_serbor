var InitMap = {

	paper: null,

	init: function(areas){
		var mapId = 'map';
		var imgMap = $('#'+mapId+' img');
		var mapCont = $('#mapContainer');

		// after load image
		imgMap[0].onload = function(){
			//imgMap.hide();
			var oW = this.naturalWidth,
				oH = this.naturalHeight;

			var cW = this.width,	//current width
				cH = this.height;	//current height

			self.paper =  new ScaleRaphael(mapId, oW, oH);;
			self.paper.image(imgMap.attr('src'), 0, 0, oW, oH);

			self.paper.changeSize(cW, cH, false, true);
			imgMap.hide();

			//resize window
			$(window).resize(function(){
				var row = mapCont.parent();

				console.log(row.width(), row.height());
				self.paper.changeSize(row.width()-22, row.height()-22, false, true);
			});

			//draw areas
			if(areas.length){
				for(i in areas){
					var color = areas[i].reserve ? 'red' : 'green';

					var a = self.paper.path(areas[i].coords).attr({
						'fill': color,
						'stroke': 'white',
						'fill-opacity': 0.6,
						'stroke-linejoin': 'round',
						'stroke-width': 1,
						'cursor' : 'pointer'
						//'stroke-width':"5"
					});

					a.data('area-id', areas[i].id);

					if(!areas[i].reserve) {
						a.click(function(e){
							var box = $('.area-' + this.data('area-id')).remove();
							$('body').append(box);
							box.css({left: e.pageX - 20, top: e.pageY - 30}).show(200);

							box.hover(function(){}, function(){
								$(this).hide(200);
							});
						});
						/*a.hover(function(e){
							console.log(this.data('area-id'));

							var box = $('.area-' + this.data('area-id')).remove();
							$('body').append(box);
							box.css({left: e.x - 100, top: e.y - 100}).show();

							// $('.area-' + this.data('area-id')).show();
						}, function(){
							//$('.area-' + this.data('area-id')).hide();
						});*/
					}
				}
			}
		};
	}
};

jQuery(document).ready(function(){
	InitMap.init(regions);
});