<?php
$this->breadcrumbs=array(
	'Pages'=>array('index'),
	$model->title,
);
?>

<?php echo $model->wswg_body;?>
<?php if(strpos($model->alias, 'contact') !== false) $this->renderPartial('/page/_contact_form', array('model' => $fb));?>