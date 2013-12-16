<?php
	$cs = Yii::app()->clientScript;

	$cs->registerCssFile($this->getAssetsUrl().'/css/map.css');

	$cs->registerScriptFile($this->getAssetsUrl().'/js/raphael.js', CClientScript::POS_END);
	$cs->registerScriptFile($this->getAssetsUrl().'/js/scale.raphael.js', CClientScript::POS_END);
	$cs->registerScriptFile($this->getAssetsUrl().'/js/jquery.mousewheel-3.0.6.pack.js', CClientScript::POS_END);
	$cs->registerScriptFile($this->getAssetsUrl().'/js/jquery.panzoom.min.js', CClientScript::POS_END);
	$cs->registerScriptFile($this->getAssetsUrl().'/js/initmap.js', CClientScript::POS_END);
?>

<div class="row tabs">
	<?/*<div class="grid_12">
		<div class="row">
			<ul class="tabs clearfix">
			<?foreach ($maps as $i => $m):?>
				<li><a href="#" data-tabid="<?=$i?>"<?=($default == ($i+1) ? ' class="active"' : '')?>><?=$m->name?></a></li>
			<?endforeach;?>
			</ul>
		</div>
	</div>*/?>
	<div class="grid_12 maps">
		<div class="maps-box">
			<a href="#" class="back-to-map">Вернуться на карту</a>
			<?$cs->registerScript('init', 'var plots = [];', CClientScript::POS_END);?>
			<?foreach ($maps as $i => $m):?>
				<div id="tab-<?=$i?>" class="tab <?=($i == 0 ? ' main-map active' : '')?>" <?=($default == ($i+1) ? '' : 'style="display:none;"')?>><img data-mapid="<?=$m->id?>" id="img-<?=$m->id?>" src="/media/images/maps/<?=$m->img_map?>" alt=""></div>
				<?
				//crate array plots for always maps
				$cs->registerScript('map'.$m->id, "plots[$m->id] = [];", CClientScript::POS_END);
				foreach ($m->plots as $p) {
					if($i == 0)
						$cs->registerScript('plot'.$p->id, "plots[$m->id].push({id: $p->id, coords: '$p->coords', reserve: {$p->isReserve()}, q: {$p->num}})", CClientScript::POS_END);
					else
						$cs->registerScript('plot'.$p->id, "plots[$m->id].push({id: $p->id, coords: '$p->coords', reserve: {$p->isReserve()}})", CClientScript::POS_END);
				}
				?>
			<?endforeach;?>
		</div>
	</div>
</div>
<?/*
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
					var_dump($a->square);
				}
			}
				
		}
	?>
	</div>
<? endif; ?>
<!-- <a href="#" data-area-id="<?=$a->id?>">Перейти к бронированию</a> -->*/?>