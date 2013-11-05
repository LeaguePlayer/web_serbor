<?php
/* @var $this PhotosController */
/* @var $dataProvider CActiveDataProvider */

/*$this->breadcrumbs=array(
	'Photoses',
);

$this->menu=array(
	array('label'=>'Create Photos', 'url'=>array('create')),
	array('label'=>'Manage Photos', 'url'=>array('admin')),
);*/
?>
<div class="mod_article gallery intro row">
    <h1 class="ce_headline grid_3">Фотогалерея</h1>
    <h2 class="ce_headline grid_9">Земля для счастливой жизни!</h2>
</div>

<div class="mod_article gallery photos row">
    <section class="mod_galerie grid_12 block">
        <div id="gallery-1">
            <?foreach ($gallery->galleryPhotos as $img) :?>
            <a href="<?=$img->getPreview('medium')?>">
                <img alt="" src="<?=$img->getPreview('small')?>" />
            </a>
            <?endforeach;?>
        </div>
    </section>
    <script type="text/javascript">
        // Galleria.loadTheme('files/galleria/themes/classic/galleria.classic.min.js');
        // Galleria.run('#gallery-1');
        // Galleria.configure({height: 480,transition: 'slide',initialTransition: 'fade',clicknext: true,showCounter: false,showInfo: false,fullscreenTransition: 'slide',touchTransition: 'slide',responsive: true});
    </script>
    <?
    $cs = Yii::app()->clientScript;

    $cs->registerScriptFile($this->getAssetsUrl().'/js/galleria/galleria-1.2.9.min.js', CClientScript::POS_HEAD);
    $cs->registerScriptFile($this->getAssetsUrl().'/js/galleria/themes/classic/galleria.classic.min.js', CClientScript::POS_HEAD);
    $cs->registerCssFile($this->getAssetsUrl().'/js/galleria/themes/classic/galleria.classic.css');
    $cs->registerScript('galleria', "
        Galleria.run('#gallery-1');
		Galleria.configure({height: 480,transition: 'slide',initialTransition: 'fade',clicknext: true,showCounter: false,showInfo: false,fullscreenTransition: 'slide',touchTransition: 'slide',responsive: true});
    ", CClientScript::POS_READY);
    ?>

    <script>
        
    </script>
</div>
