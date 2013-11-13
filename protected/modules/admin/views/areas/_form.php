<div class="container area-block">
	<div class="row">
		<div class="span12 alert-save"></div>
	</div>
	<div class="row">
		<div class="span12">
			<?php $form = $this->beginWidget('CActiveForm', array(
			    'id'=>'area-form',
			    'enableAjaxValidation'=>true,
			    'enableClientValidation'=>true,
			    'focus'=>array($model,'name'),
			)); ?>

			<div class="row">
				<div class="span6">
					<?php echo $form->labelEx($model,'name'); ?>
					<?php echo $form->textField($model,'name'); ?>
					<?php echo $form->hiddenField($model,'id'); ?>
				</div>
				<div class="span6">
					<div class="pull-right">
			            <?=TbHtml::button('Добавить участок', array('class' => 'add-plot')); ?>
			            <?=TbHtml::button('Удалить', array('color' => TbHtml::BUTTON_COLOR_DANGER, 'class' => 'remove-area', 'data-id' => $model->id)); ?>
			            <?=TbHtml::button('Сохранить', array('color' => TbHtml::BUTTON_COLOR_SUCCESS, 'class' => 'save-area')); ?>
			        </div>
				</div>
			</div>
			<div class="row">
				<div class="span12">
					<h4>Участки</h4>
					<div class="row plots-block">
						<? $this->renderPartial('/areas/_plots', array('area' => $model));?>
					</div>
				</div>
			</div>			

			<?php $this->endWidget(); ?>
		</div>
	</div>
</div>
