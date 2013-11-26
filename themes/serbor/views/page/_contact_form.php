<div class="mod_article contact-form row">
    <div class="grid_12">
        <div class="row">
            <!-- indexer::stop -->
            <div class="ce_form offset_3 grid_9 tableless block">
                <?php $form = $this->beginWidget('CActiveForm', array(
                    'id'=>'contact-form',
                    'enableAjaxValidation'=>true,
                    'enableClientValidation'=>true,
                    'focus'=>array($model,'fio'),
                )); ?>
                <div class="formbody" id="contact_form">
                    <div class="success-alert">
                        <?php if(Yii::app()->user->hasFlash('success')) echo Yii::app()->user->getFlash('success'); ?>
                    </div>

                    <?php echo $form->labelEx($model,'fio'); ?>
                    <?php echo $form->textField($model,'fio'); ?>
                    <?php echo $form->error($model,'fio'); ?>
                    <br>
                    <?php echo $form->labelEx($model,'email'); ?>
                    <?php echo $form->textField($model,'email'); ?>
                    <?php echo $form->error($model,'email'); ?>
                    <br>
                    <?php echo $form->labelEx($model,'phone'); ?>
                    <?php $this->widget('CMaskedTextField', array(
                        'model' => $model,
                        'attribute' => 'phone',
                        'mask' => '(999) 999-99-99',
                    )); ?>
                    <?php echo $form->error($model,'phone'); ?>
                    <br>
                    <?php echo $form->labelEx($model,'msg'); ?>
                    <?php echo $form->textarea($model,'msg'); ?>
                    <?php echo $form->error($model,'msg'); ?>
                    <br>

                    <div class="submit_container"><?php echo CHtml::submitButton('Отправить сообщение');?></div>
                </div>

                <?php $this->endWidget(); ?>
            </div>
            <!-- indexer::continue --> </div>
    </div>
</div>
<?/*

                <form action="contact/" id="f1" method="post" enctype="application/x-www-form-urlencoded">
                    <div class="formbody">
                        <input type="hidden" name="FORM_SUBMIT" value="auto_form_1">
                        <input type="hidden" name="REQUEST_TOKEN" value="6a4b37dbf1245da80f66213e0df05e1c">
                        <input type="hidden" name="MAX_FILE_SIZE" value="5048000">
                        <label for="ctrl_1">Пожалуйста, укажите имя</label>
                        <input type="text" name="Имя" id="ctrl_1" class="text" value="" maxlength="100">
                        <br>
                        <label for="ctrl_2" class="mandatory">
                            <span class="invisible">Обязательное поле</span>
                            адрес электронной почты
                            <span class="mandatory">*</span>
                        </label>
                        <input type="text" name="e-mail" id="ctrl_2" class="text mandatory" value="" required maxlength="100">
                        <br>
                        <label for="ctrl_3" class="mandatory">
                            <span class="invisible">Обязательное поле</span>
                            номер телефона
                            <span class="mandatory">*</span>
                        </label>
                        <input type="text" name="Телефон" id="ctrl_3" class="text mandatory" value="" required>
                        <br>
                        <label for="ctrl_4">вопросы и предложения</label>
                        <textarea name="Комментарии" id="ctrl_4" class="textarea" rows="4" cols="20"></textarea>
                        <br>
                        <div class="submit_container">
                            <input type="submit" id="ctrl_5" class="submit" value="Отправить сообщение"></div>
                    </div>
                </form>
*/?>