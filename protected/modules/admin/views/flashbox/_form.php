<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'flashbox-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>


	<?php echo $form->textFieldControlGroup($model,'title',array('class'=>'span8','maxlength'=>255)); ?>

	<?php echo $form->textAreaControlGroup($model,'msg',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo CHtml::activeHiddenField($model, 'status'); ?>
	<div class="form-actions">
		<?php echo TbHtml::submitButton('Сохранить', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)); ?>        <?php echo TbHtml::linkButton('Отмена', array('url'=>'/admin/flashbox/list')); ?>
	</div>

<?php $this->endWidget(); ?>
