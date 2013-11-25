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
            <p class="plot_status <?=($pl->status == 0 ? '' : 'busy')?>"><?=CHtml::encode(Plots::getStatus($pl->status))?></p>
            <p class="plot_size">Площадь: <b><?=CHtml::encode($pl->sq)?> кв.м.</b></p>
            <p class="plot_price">Стоимость: <b><?=number_format(CHtml::encode($pl->price), 3, ' ', ' ')?> рублей</b></p>
            <? if($pl->status == 0):?>
                <a href="/contact/?pid=<?=$pl->id?>" class="reserve_button">Забронировать участок</a>
            <? endif; ?>
        </div>
    <? endforeach; ?>
    </div>
</div>