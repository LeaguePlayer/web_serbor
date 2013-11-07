<div class="row-fluid">
	<div class="span8">
	<?php echo CHtml::activeTextField($model,'[]name',array('size'=>60,'maxlength'=>255)); ?>
	<?php echo CHtml::activeHiddenField($model,'[]coords'); ?>
	<?php echo CHtml::activeHiddenField($model,'[]image_map_id'); ?>
	</div>
	<div class="span4">
		<?php echo TbHtml::button(TbHtml::icon(TbHtml::ICON_PLUS), array('title' => 'Добавить участок')); ?>
		<?php echo TbHtml::button(TbHtml::icon(TbHtml::ICON_REMOVE, array('class' => 'icon-white')), array('color' => TbHtml::BUTTON_COLOR_DANGER, 'title' => 'Удалить область')); ?>
	</div>
</div>
<?php
/* @var $this AreasController */
/* @var $model Areas */
/* @var $form CActiveForm */
/*
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'areas-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>

	

<?php $this->endWidget(); ?>

</div><!-- form -->
*/?>