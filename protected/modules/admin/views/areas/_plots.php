<div class="span12">
	<table class="table">
		<thead>
			<? $plot_model = new Plots; ?>
			<tr>
				<td><?=CHtml::activeLabelEx($plot_model, 'num')?></td>
				<td><?=CHtml::activeLabelEx($plot_model, 'sq')?></td>
				<td><?=CHtml::activeLabelEx($plot_model, 'price')?></td>
				<td><?=CHtml::activeLabelEx($plot_model, 'status')?></td>
				<td></td>
			</tr>
		</thead>
		<tbody class="plots">
			<?if($area->plots):?>
				<?foreach($area->plots as $k => $plot):?>
				<tr class="plot-tr">
					<td>
						<?=CHtml::textField("Plots[$k][num]", $plot->num);?>
						<?=CHtml::hiddenField("Plots[$k][id]", $plot->id);?>
					</td>
					<td><?=CHtml::textField("Plots[$k][sq]", $plot->sq);?></td>
					<td><?=CHtml::textField("Plots[$k][price]", $plot->price);?></td>
					<td><?=CHtml::textField("Plots[$k][status]", $plot->status);?></td>
					<td><?=TbHtml::button(TbHtml::icon(TbHtml::ICON_MINUS, array('class' => 'icon-white')), array(
						'color' => TbHtml::BUTTON_COLOR_DANGER, 
						'class'=>'remove-plot', 
						'title' => 'Удалить', 
						'data-id' => $plot->id,
						'data-area-id' => $area->id)); 
					?></td>
				</tr>
				<?endforeach;?>
			<?endif;?>
		</tbody>
		<tfoot style="display: none;">
			<tr class="plot-clone">
				<td><?=CHtml::textField("Plots[][num]");?></td>
				<td><?=CHtml::textField("Plots[][sq]");?></td>
				<td><?=CHtml::textField("Plots[][price]");?></td>
				<td><?=CHtml::textField("Plots[][status]", 0);?></td>
				<td><?=TbHtml::button(TbHtml::icon(TbHtml::ICON_MINUS, array('class' => 'icon-white')), array(
					'color' => TbHtml::BUTTON_COLOR_DANGER, 
					'class'=>'remove-plot', 
					'title' => 'Удалить'));
				?></td>
			</tr>
		</tfoot>
	</table>
</div>