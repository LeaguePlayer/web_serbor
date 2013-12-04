<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
			'id'=>'plot-form',
			'enableAjaxValidation'=>false,
		)); ?>
	<?php echo $form->hiddenField($model,'id'); ?>
	<?php echo $form->textFieldControlGroup($model,'num',array('class'=>'span8')); ?>
	<?php echo $form->textFieldControlGroup($model,'sq',array('class'=>'span8')); ?>
	<?php echo $form->textFieldControlGroup($model,'price',array('class'=>'span8')); ?>
	<?php echo $form->dropDownListControlGroup($model, 'status', Plots::getStatuses(), array('class'=>'span8', 'displaySize'=>1)); ?>
<?php $this->endWidget(); ?>