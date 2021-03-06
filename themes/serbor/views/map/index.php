<?php
	$cs = Yii::app()->clientScript;

	$cs->registerCssFile($this->getAssetsUrl().'/css/map.css');

	$cs->registerScriptFile($this->getAssetsUrl().'/js/raphael.js', CClientScript::POS_END);
	$cs->registerScriptFile($this->getAssetsUrl().'/js/scale.raphael.js', CClientScript::POS_END);
	$cs->registerScriptFile($this->getAssetsUrl().'/js/jquery.mousewheel-3.0.6.pack.js', CClientScript::POS_END);
	$cs->registerScriptFile($this->getAssetsUrl().'/js/jquery.panzoom.min.js', CClientScript::POS_END);
	$cs->registerScriptFile($this->getAssetsUrl().'/js/initmap.js', CClientScript::POS_END);
?>

<?php if($map): ?>
	<div class="row">
		<div id="mapContainer">
			<div id="map">
				<img src="/media/images/maps/<?=$map->img_map?>" alt="">
			</div>
			<div id="mapControls">
				<a id="up" href="javascript:;"></a>
				<a id="down" href="javascript:;"></a>
			</div>
		</div>
	</div>
	<div class="areas">
	<?php
		$cs->registerScript('init', 'var regions = [];', CClientScript::POS_END);

		foreach ($map->areas as $a) {
			if(!$a->isEmpty()){
				if($a->isReserve())
					$cs->registerScript('area'.$a->id, "regions.push({id: $a->id, coords: '$a->coords', reserve: true});");
				else{
					$cs->registerScript('area'.$a->id, "regions.push({id: $a->id, coords: '$a->coords', reserve: false});");?>
                    <div class="tip_area area-<?=$a->id?>" data-area-id="<?=$a->id?>">
                        <p class="tip_count">Участков: <?=$a->countplots?></p>
                        <hr>
                        <p class="tip_free">Свободно: <?=$a->freeplots?></p>
                        <p class="tip_size">Площадь: <?=$a->square?></p>
                        <p class="note">Кликните по участку для перехода к бронированию</p>
                    </div>
					<?/*var_dump($a->id);
					var_dump($a->countplots);
					var_dump($a->freeplots);
					var_dump($a->square);*/
				}
			}
				
		}
	?>
	</div>
<? endif; ?>
<!-- <a href="#" data-area-id="<?=$a->id?>">Перейти к бронированию</a> -->