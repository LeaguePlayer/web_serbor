<?if($q){?>
<div class="tip_plots">
    <div class="plots_details">
        <div class="plot" data-id="<?=$plot->id?>">
            <?php if($plot->num){?> <p class="plot_number">Очередь № <?=CHtml::encode($plot->num)?></p> <?}?>
            <?/*<p class="plot_status <?=($plot->status == 0 ? '' : 'busy')?>"><?=CHtml::encode(Plots::getStatus($plot->status))?></p>
            <?php if($plot->sq){?> <p class="plot_size">Площадь: <b><?=CHtml::encode($plot->sq)?> кв.м.</b></p> <?}?>
            <?php if($plot->price){?> <p class="plot_price">Стоимость: <b><?=number_format(CHtml::encode($plot->price), 0, ' ', ' ')?> рублей</b></p> <?}?>
            <? if($plot->status == 0):?>
                <a href="/contact/?pid=<?=$plot->id?>#contact_form" class="reserve_button">Забронировать участок</a>
            <? endif; ?>*/?>
        </div>
    </div>
</div>
<?}else{?>
<div class="tip_plots">
    <div class="plots_details">
        <div class="plot" data-id="<?=$plot->id?>">
            <?php if($plot->num){?> <p class="plot_number">№ <?=CHtml::encode($plot->num)?></p> <?}?>
            <p class="plot_status <?=($plot->status == 0 ? '' : 'busy')?>"><?=CHtml::encode(Plots::getStatus($plot->status))?></p>
            <?php if($plot->sq){?> <p class="plot_size">Площадь: <b><?=CHtml::encode($plot->sq)?> кв.м.</b></p> <?}?>
            <?php if($plot->price){?> <p class="plot_price">Стоимость: <b><?=number_format(CHtml::encode($plot->price), 0, ' ', ' ')?> рублей</b></p> <?}?>
            <? if($plot->status == 0):?>
                <a href="/contact/?pid=<?=$plot->id?>#contact_form" class="reserve_button">Забронировать участок</a>
            <? endif; ?>
        </div>
    </div>
</div>
<?}?>