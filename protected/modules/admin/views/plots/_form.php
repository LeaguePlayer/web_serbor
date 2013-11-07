<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'plots-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>


	<?php echo $form->textFieldControlGroup($model,'area_id',array('class'=>'span8')); ?>

	<?php echo $form->textFieldControlGroup($model,'num',array('class'=>'span8')); ?>

	<?php echo $form->textFieldControlGroup($model,'sq',array('class'=>'span8')); ?>

	<?php echo $form->textFieldControlGroup($model,'price',array('class'=>'span8')); ?>

	<?php echo $form->dropDownListControlGroup($model, 'status', Plots::getStatusAliases(), array('class'=>'span8', 'displaySize'=>1)); ?>
	<div class="form-actions">
		<?php echo TbHtml::submitButton('Сохранить', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)); ?>        <?php echo TbHtml::linkButton('Отмена', array('url'=>'/admin/plots/list')); ?>
	</div>

<?php $this->endWidget(); ?>
