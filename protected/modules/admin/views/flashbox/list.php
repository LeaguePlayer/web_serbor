<?php
$this->menu=array(
	array('label'=>'Добавить','url'=>array('create')),
);
?>

<h1>Управление <?php echo $model->translition(); ?></h1>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'flashbox-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'type'=>TbHtml::GRID_TYPE_HOVER,
    'afterAjaxUpdate'=>"function() {sortGrid('flashbox')}",
    'rowHtmlOptionsExpression'=>'array(
        "id"=>"items[]_".$data->id,
        "class"=>"status_".$data->status,
    )',
	'columns'=>array(
		'title',
		'msg',
		// array(
		// 	'name'=>'status',
		// 	'type'=>'raw',
		// 	'value'=>'Flashbox::getStatusAliases($data->status)',
		// 	'filter'=>Flashbox::getStatusAliases()
		// ),
		// 'sort',
		// array(
		// 	'name'=>'create_time',
		// 	'type'=>'raw',
		// 	'value'=>'SiteHelper::russianDate($data->create_time).\' в \'.date(\'H:i\', $data->create_time)'
		// ),
		// array(
		// 	'name'=>'update_time',
		// 	'type'=>'raw',
		// 	'value'=>'SiteHelper::russianDate($data->update_time).\' в \'.date(\'H:i\', $data->update_time)'
		// ),
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>

<?php Yii::app()->clientScript->registerScript('sortGrid', 'sortGrid("flashbox");', CClientScript::POS_END) ;?>