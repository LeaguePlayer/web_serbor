<?php

class PageController extends FrontController
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

	
	public function actionView($alias)
	{
		$alias = str_replace('.htm', '', $alias);
		$page = Page::model()->find('alias=:alias AND status=1', array(':alias'=> $alias));
		
		if($page === null) 
			throw new CHttpException(404, 'Unable to find the requested object.');

		$this->render('view',array(
			'model'=>$page,
		));
	}

	
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Page');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}
}
