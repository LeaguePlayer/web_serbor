<?php

class MapController extends FrontController
{
	public $layout='//layouts/pages';

	public function actionIndex()
	{
		$this->title = 'План поселка "Серебряный Бор" - '.$this->title;
		$maps = Maps::model()->findAll(array('order' => 'name'));

		$default = 1;

		$this->render('index', array(
			'maps' => $maps,
			'default' => $default
		));
	}

	public function actionPlotDetail($id){
		if($id){
			$plot = Plots::model()->findByPk($id);
			$this->renderPartial('_plot_detail', array('plot' => $plot));
		}

		Yii::app()->end();
	}

	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index', 'plotDetail'),
				'users'=>array('*'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}