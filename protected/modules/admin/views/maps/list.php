<?php
$this->menu=array(
	array('label'=>'Добавить','url'=>array('create')),
);
?>

<h1>Управление <?php echo $model->translition(); ?></h1>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'maps-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'type'=>TbHtml::GRID_TYPE_HOVER,
    'afterAjaxUpdate'=>"function() {sortGrid('maps')}",
    'rowHtmlOptionsExpression'=>'array(
        "id"=>"items[]_".$data->id,
        //"class"=>"status_".$data->status,
    )',
	'columns'=>array(
		'name',
		array(
			'header'=>'Фото',
			'type'=>'raw',
			'value'=>'TbHtml::imageCircle($data->imgBehaviorMap->getImageUrl("icon"))'
		),
		array(
		    'class'=>'CLinkColumn',
		    'header'=>'Управление участками',
		    'label'=>'Редактировать',
		    'urlExpression'=>'Yii::app()->createUrl("admin/maps/areas", array("map" => $data->id))',
		),
		// array(
		// 	'class'=>'CButtonColumn',
		// 	'template' => '{to_edit}',
		// 	'header'=>'Действия',
		// 	'buttons' => array(
		// 		'to_hide' => array( 
		// 			'label' => 'Скрыть',
		// 			'visible' => '!$data->company->c_status && !$data->hasWinner()',
		// 			'click' => 'js:function(e){
		// 				e.preventDefault();
		// 				if(confirm("Вы уверены?")){
		// 					var com_id = $(this).closest("tr").data("company");
		// 					$.ajax({
		// 						url: "/companies/changeCompany",
		// 						data: {id: com_id, hide: 1},
		// 						type: "GET",
		// 						success: function(){
		// 							jQuery("#reports-grid").yiiGridView("update");
		// 						}
		// 					});
		// 				}
		// 			}'
		// 		)
		// 	)
		// ),
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>

<?php Yii::app()->clientScript->registerScript('sortGrid', 'sortGrid("maps");', CClientScript::POS_END) ;?>