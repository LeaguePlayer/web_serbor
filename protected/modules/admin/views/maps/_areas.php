<?php 
$cs = Yii::app()->clientScript;

$cs->registerCssFile($this->getAssetsUrl().'/css/map/map.css') ;
$cs->registerCssFile($this->getAssetsUrl().'/js/fancybox/jquery.fancybox.css') ;

$cs->registerScriptFile($this->getAssetsUrl().'/js/map/raphael.js', CClientScript::POS_END);
//$cs->registerScriptFile($this->getAssetsUrl().'/js/map/scale.raphael.js', CClientScript::POS_END);
$cs->registerScriptFile($this->getAssetsUrl().'/js/fancybox/jquery.fancybox.pack.js', CClientScript::POS_END);
$cs->registerScriptFile($this->getAssetsUrl().'/js/map/raphael-pan-zoom/src/raphael.pan-zoom.min.js', CClientScript::POS_END);
$cs->registerScriptFile($this->getAssetsUrl().'/js/map/map.js', CClientScript::POS_END);
?>


<h1>Управление участками</h1>

<div class="row-fluid">
	<div class="span12">
		<div class="row-fluid">
			<?php echo TbHtml::button('Добавить группу', array('size'=>TbHtml::BUTTON_SIZE_SMALL, 'color' => TbHtml::BUTTON_COLOR_PRIMARY, 'class' => 'add-group')); ?>
			<?php echo TbHtml::button('Сохранить', array('size'=>TbHtml::BUTTON_SIZE_SMALL, 'color' => TbHtml::BUTTON_COLOR_SUCCESS)); ?>
			<?php echo TbHtml::button('Отмена', array('size'=>TbHtml::BUTTON_SIZE_SMALL, 'class' => 'cancel-group')); ?>
			<br><br>
		</div>
		<div id="mapContainer">
			<div id="map" data-map-id="<?=$model->id?>"><img src="/media/images/maps/<?=$model->img_map?>" alt=""></div>
			<div id="mapControls"><a id="up" href="javascript:;"></a><a id="down" href="javascript:;"></a></div>
		</div>
	</div>
</div>
<?php
$cs->registerScript('init', 'var regions = [];', CClientScript::POS_END);
if(!empty($all_areas)){
	foreach ($all_areas as $key => $a) {
		//$this->renderPartial('/areas/_form', array('model' => $a, 'index' => $key));
		$cs->registerScript('#area'.$key, "regions.push({id: {$a->id}, coords: '{$a->coords}'});", CClientScript::POS_END);
	}
}
?>