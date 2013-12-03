<div class="tip_plots">
    <div class="plots_details">
        <div class="plot" data-id="<?=$plot->id?>">
            <p class="plot_number">№ <?=CHtml::encode($plot->num)?></p>
            <p class="plot_status <?=($plot->status == 0 ? '' : 'busy')?>"><?=CHtml::encode(Plots::getStatus($plot->status))?></p>
            <p class="plot_size">Площадь: <b><?=CHtml::encode($plot->sq)?> кв.м.</b></p>
            <p class="plot_price">Стоимость: <b><?=number_format(CHtml::encode($plot->price), 0, ' ', ' ')?> рублей</b></p>
            <? if($plot->status == 0):?>
                <a href="/contact/?pid=<?=$plot->id?>#contact_form" class="reserve_button">Забронировать участок</a>
            <? endif; ?>
        </div>
    </div>
</div>