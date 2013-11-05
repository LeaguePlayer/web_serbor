<?php
$this->breadcrumbs=array(
	'News'=>array('index'),
	$model->title,
);

<h1>View News #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'title',
		'dt_date',
		'wswg_news_body',
		'news_type',
		'status',
		'sort',
		'create_time',
		'update_time',
	),
)); ?>
