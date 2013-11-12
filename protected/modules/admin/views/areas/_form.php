<?
	$index = isset($index) ? $index : '';
?>
<div class="row-fluid area-row" data-deleteUrl="<?=$this->createUrl('maps/deleteArea', array('id' => $model->id))?>">
	<div class="span8">
	<?php echo CHtml::activeTextField($model,"[$index]name",array('size'=>60,'maxlength'=>255)); ?>

	<?php echo CHtml::activeHiddenField($model,"[$index]coords",array('class'=> 'coords')); ?>
	<?php echo CHtml::activeHiddenField($model,"[$index]image_map_id"); ?>
	<?php if(isset($model->id)){ echo CHtml::activeHiddenField($model,"[$index]id",array('class'=> 'id')); }?>
	<?php //echo CHtml::activeHiddenField($model,"[$index]id",array('class'=> 'id')); ?>
	<?php //echo CHtml::activeHiddenField($model,"[$index]new",array('class'=> 'new')); ?>
	</div>
	<div class="span4">
		<?php echo TbHtml::button(TbHtml::icon(TbHtml::ICON_PLUS), array('title' => 'Добавить участок', 'class' => 'add-plot')); ?>
		<?php echo TbHtml::button(TbHtml::icon(TbHtml::ICON_REMOVE, array('class' => 'icon-white')), array('color' => TbHtml::BUTTON_COLOR_DANGER, 'title' => 'Удалить область', 'class' => 'remove-area')); ?>
	</div>
</div>