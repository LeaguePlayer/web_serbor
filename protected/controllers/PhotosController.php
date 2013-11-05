<?php

class PhotosController extends FrontController
{
	public $layout='//layouts/pages';

	
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
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel('Photos', $id),
		));
	}

	
	public function actionIndex()
	{
		// $dataProvider=new CActiveDataProvider('Photos');
		// $this->render('index',array(
		// 	'dataProvider'=>$dataProvider,
		// ));
		$gallery = Photos::model()->findByPk(1);
		$this->render('index', array(
			'gallery' => $gallery
		));
	}
}
