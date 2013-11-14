<div class="tip_plots">
    <ul class="plots_list">
    <?php foreach ($area->plots as $pl):?>
        <li><a <?=($pl->status == 0 ? 'class="free"' : '')?> href="#">Участок №<?=CHtml::encode($pl->num)?></a></li>
    <? endforeach; ?>
    </ul>
    <div class="plots_details">
    <?php foreach ($area->plots as $pl):?>
        <div class="plot" data-id="<?=$pl->id?>">
            <p class="plot_number">№ <?=CHtml::encode($pl->num)?></p>
            <p class="plot_status busy"><?=CHtml::encode(Plots::getStatus($pl->status))?></p>
            <p class="plot_size">Площадь: <b><?=CHtml::encode($pl->sq)?> кв.м.</b></p>
            <p class="plot_price">Стоимость: <b><?=CHtml::encode($pl->price)?> рублей</b></p>
        </div>
    <? endforeach; ?>
        <a href="/contact/" class="reserve_button">Забронировать участок</a>
    </div>
</div>