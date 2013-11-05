<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'photos-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>


	<div class='control-group'>
		<?php echo CHtml::activeLabelEx($model, 'gllr_gallery'); ?>
		<?php echo $form->hiddenField($model, 'gllr_gallery'); ?>
		<?php if ($model->galleryBehaviorGallery->getGallery() === null) {
			echo '<p class="help-block">Прежде чем загружать изображения, нужно сохранить текущее состояние</p>';
		} else {
			$this->widget('appext.imagesgallery.GalleryManager', array(
				'gallery' => $model->galleryBehaviorGallery->getGallery(),
				'controllerRoute' => '/admin/gallery',
			));
		} ?>
	</div>

	<div class="form-actions">
		<?php echo TbHtml::submitButton('Сохранить', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)); ?>        <?php echo TbHtml::linkButton('Отмена', array('url'=>'/admin/photos/list')); ?>
	</div>

<?php $this->endWidget(); ?>
