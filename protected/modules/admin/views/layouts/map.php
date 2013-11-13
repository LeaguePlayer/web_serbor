<!DOCTYPE html>
<html lang="en">
	<head>
	  <meta charset="utf-8">
	  <title><?php echo CHtml::encode(Yii::app()->name).' | Admin';?></title>
	  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	</head>
	<body>
	  
		<?php
			$menuItems = array(
                array('label'=>'Главная', 'url'=>'/admin/start/index'),
				array('label'=>'Настройки', 'url'=>'/admin/start/settings'),
				array('label'=>'Разделы', 'url'=>'#', 'items' => array(
					array('label'=>'Страницы', 'url'=>'#', 'items' => array(
						array('label'=>'Создать', 'url'=>"/admin/page/create"),
						array('label'=>'Список', 'url'=>"/admin/page/list"),
					)),
					array('label'=>'Новости', 'url'=>'#', 'items' => array(
						array('label'=>'Создать', 'url'=>"/admin/news/create"),
						array('label'=>'Список', 'url'=>"/admin/news/list"),
					)),
					array('label'=>'Галлерея', 'url'=>'/admin/photos/update/id/1'),
					array('label'=>'Карта', 'url'=>'/admin/maps'),
				)),
			);
		?>
		<?php $this->widget('bootstrap.widgets.TbNavbar', array(
			'color'=>'inverse', // null or 'inverse'
			'brandLabel'=> CHtml::encode(Yii::app()->name),
			'brandUrl'=>'/',
			'fluid' => true,
			'collapse'=>true, // requires bootstrap-responsive.css
			'items'=>array(
				array(
					'class'=>'bootstrap.widgets.TbNav',
					'items'=>$menuItems,
				),
				array(
					'class'=>'bootstrap.widgets.TbNav',
					'htmlOptions'=>array('class'=>'pull-right'),
					'items'=>array(
						array('label'=>'Выйти', 'url'=>'/admin/user/logout'),
					),
				),
			),
		)); ?>

		<div class="container-fluid">
			<div class="row-fluid">
				<div class="span12"><?php echo $content;?></div>
			</div>
		</div>

	</body>
</html>