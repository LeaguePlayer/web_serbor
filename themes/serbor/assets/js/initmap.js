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

			//self.paper =  new ScaleRaphael(mapId, oW, oH);;

			self.paper = Raphael(mapId, oW, oH);
			
    		// self.R.safari();

			self.paper.image(imgMap.attr('src'), 0, 0, oW, oH);
			//self.paper.changeSize(cW, cH, false, true);

			self.panZoom = self.paper.panzoom({ initialZoom: 0, initialPosition: { x: 0, y: 0} });
			self.panZoom.enable();

			//self.paper.changeSize(cW, cH, false, true);

			imgMap.hide();

			$("#mapContainer #up").click(function (e) {
		    	self.panZoom.zoomIn(1);
		    	e.preventDefault();
		    });

		    $("#mapContainer #down").click(function (e) {
		    	self.panZoom.zoomOut(1);
		    	e.preventDefault();
		    });

			//resize window
			$(window).resize(function(){
				var row = mapCont.parent();

				console.log(row.width(), row.height());
				self.paper.changeSize(row.width()-22, row.height()-22, false, true);
			});

			$('body').append("<div class='trash'></div>");
			$('body').append("<div class='storage'></div>");

			//draw areas
			if(areas.length){
				for(i in areas){
					var color = areas[i].reserve ? 'red' : 'green';
					var a = self.paper.path(areas[i].coords).attr({
						'fill': color,
						'stroke': 'white',
						'fill-opacity': 0.3,
						'stroke-linejoin': 'round',
						'stroke-width': 1,
						'cursor' : 'pointer'
						//'stroke-width':"5"
					});

					var box;
					var timer;
					var tx;
					var ty;

					a.data('area-id', areas[i].id);

					if(!areas[i].reserve) {
						
						a.mouseover(function(e){
							box = $('.area-' + this.data('area-id')).remove();
							$('.storage').append(box);
							timer = setTimeout(function(){
								box.css({left: tx - 120, top: ty - box.outerHeight()-40}).fadeIn(200);
							}, 400);
						});

						a.mouseout(function(){
							$('.storage .tip_area:visible').stop(true, true).fadeOut();
							clearTimeout(timer);
						});
						
						a.mousemove(function(pos){
							tx = pos.pageX;
							ty = pos.pageY;
						});

						a.click(function(e){

							id = box.data('area-id');

							//handle click on link

								var mapWidth = $('#mapContainer').width();
								var mapHeight = $('#mapContainer').height();
								var scrWidth = $(window).width();
								var scrHeight = $(window).height();
								var mapTop = $('#mapContainer').offset().top;

								var plotsWidth;
								var plotsHeight;
								var leftPos;
								var topPos;

								$('.tip_count').append("<img src='/themes/serbor/assets/images/ajax-loader.gif' style='float: right'>");
								$('.trash').html('');
								$.ajax({
									url: '/map/areaDetail',
									data: {id: id},
									type: 'GET',
									success: function(result){

										leftPos = scrWidth/2 - 150;
										topPos = scrHeight/2 - 100;
										var b = $(result).css({'left': leftPos, 'top': topPos});
										
										$('.trash').append(b);
										$('.plots_details .plot:eq(0)').show();

										plotsWidth = $('.tip_plots').width();
										plotsHeight = $('.tip_plots').height();
										leftPos = scrWidth/2 - plotsWidth/2;
										topPos = mapHeight/2 - plotsHeight/2 + mapTop;

										b.css({'left': leftPos, 'top': topPos});

										$('.tip_plots').fadeIn(200);
										$('.tip_count').find('img').remove();

										$('.tip_area').fadeOut();

										b.find('.plots_list li').on('click', function () {	

											var index = $(this).index();
									        var link = $('.tip_plots .plots_list li').eq(index);
									        var href = link.find('a');

									        if (!href.is('.current')) {
									            $('.tip_plots .plots_list li a').removeClass('current');
									            href.addClass('current');
									            $('.tip_plots .plots_details .plot:visible').hide();
									            $('.tip_plots .plots_details .plot').eq(index).show();

									        }
									        return false;
					    				});

					    				$('#map').click(function(){
					    					$('.tip_plots').fadeOut(300);
					    				});

									},
									error: function(){
										$('.tip_count').find('img').remove();
									}
								});
								return false;
						});

						$('#map').mousewheel(function(){
							$('.tip_plots').fadeOut(200);
							$('.tip_area').fadeOut(200);
						});
					}
				}
			}
		};
	}
};

jQuery(document).ready(function(){
	InitMap.init(regions);
});