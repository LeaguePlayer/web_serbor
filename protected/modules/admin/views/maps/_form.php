<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'maps-form',
	'enableAjaxValidation'=>false,
		'htmlOptions' => array('enctype'=>'multipart/form-data'),
)); ?>

	<?php echo $form->errorSummary($model); ?>


	<?php echo $form->textFieldControlGroup($model,'name',array('class'=>'span8','maxlength'=>255)); ?>

	<div class='control-group'>
		<?php echo CHtml::activeLabelEx($model, 'img_map'); ?>
		<?php echo $form->fileField($model,'img_map', array('class'=>'span3')); ?>
		<div class='img_preview'>
			<?php if ( !empty($model->img_map) ) echo TbHtml::imageRounded( $model->imgBehaviorMap->getImageUrl('small') ) ; ?>
			<span class='deletePhoto btn btn-danger btn-mini' data-modelname='Maps' data-attributename='Map' <?php if(empty($model->img_map)) echo "style='display:none;'"; ?>><i class='icon-remove icon-white'></i></span>
		</div>
		<?php echo $form->error($model, 'img_map'); ?>
	</div>

	<div class="form-actions">
		<?php echo TbHtml::submitButton('Сохранить', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)); ?>        <?php echo TbHtml::linkButton('Отмена', array('url'=>'/admin/maps/list')); ?>
	</div>

<?php $this->endWidget(); ?>
