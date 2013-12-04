<div class="plot-block">
	<div class="alert-save"></div>
	<div id="plot-form-block">
		<?php $this->renderPartial('/plots/_form', array('model' => $model)); ?>
	</div>
	<div class="pull-right clearfix">
		<?=TbHtml::button('Сохранить', array('color' => TbHtml::BUTTON_COLOR_SUCCESS, 'class' => 'save-plot')); ?>
		<?=TbHtml::button('Удалить', array('color' => TbHtml::BUTTON_COLOR_DANGER, 'class' => 'remove-plot', 'data-id' => $model->id)); ?>
	</div>
</div>