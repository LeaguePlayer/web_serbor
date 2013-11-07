<?php 
$cs = Yii::app()->clientScript;

$cs->registerCssFile($this->getAssetsUrl().'/css/map/map.css') ;

$cs->registerScriptFile($this->getAssetsUrl().'/js/map/raphael.js', CClientScript::POS_END);
$cs->registerScriptFile($this->getAssetsUrl().'/js/map/raphael-pan-zoom/src/raphael.pan-zoom.min.js', CClientScript::POS_END);
$cs->registerScriptFile($this->getAssetsUrl().'/js/map/map.js', CClientScript::POS_END);
?>

<h1>Управление участками</h1>


<div class="row-fluid">
	<div class="span8">
		<div id="mapContainer">
			<div id="map"><img src="/media/images/maps/<?=$model->img_map?>" alt=""></div>
			<div id="mapControls"><a id="up" href="javascript:;"></a><a id="down" href="javascript:;"></a></div>
		</div>
	</div>
	<div class="span4">
		<fieldset>
	        <legend>Области</legend>
			<div class="area-clone">
				<? $this->renderPartial('/areas/_form', array('model' => $area));?>
			</div>
			<form id="all-data" action="">
				<?// $this->renderPartial('/areas/_form', array('model' => $area));?>
			</form>
	    </fieldset>
	</div>
</div>