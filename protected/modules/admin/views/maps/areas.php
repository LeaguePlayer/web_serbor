<?php 
$cs = Yii::app()->clientScript;
$cs->registerScriptFile($this->getAssetsUrl().'/js/map/raphael.js', CClientScript::POS_END) ;
$cs->registerScriptFile($this->getAssetsUrl().'/js/map/raphael-pan-zoom/src/raphael.pan-zoom.min.js', CClientScript::POS_END) ;
$cs->registerScriptFile($this->getAssetsUrl().'/js/map/map.js', CClientScript::POS_END) ;
?>

<h1>Управление участками</h1>


<div class="row">
	<div class="span9">
		<div id="mapContainer">
			<div id="map"><img src="/media/images/maps/<?=$model->img_map?>" alt=""></div>
			<div id="mapControls"><a id="up" href="javascript:;"></a><a id="down" href="javascript:;"></a></div>
		</div>
	</div>
	<div class="span3">
		<fieldset>
	        <legend>Области</legend>
	        
	    </fieldset>
	</div>
</div>