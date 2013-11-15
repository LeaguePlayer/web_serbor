<?php

class NewsController extends FrontController
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
				'actions'=>array('index','view', 'download'),
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
			'model'=>$this->loadModel('News', $id),
		));
	}

	
	public function actionIndex()
	{
		$this->title = 'Новости - '.$this->title;

		$news  = News::model()->published()->news()->findAll();
		$smi  = News::model()->published()->smi()->findAll();

		$dataProvider=new CActiveDataProvider('News');
		$this->render('index',array(
			'news'=>$news,
			'smi'=>$smi,
		));
	}

	public function actionDownload($file){
		$pathToFile = Yii::getPathOfAlias('webroot').DIRECTORY_SEPARATOR.$file;
		if(file_exists($pathToFile)){
			header('Content-Description: File Transfer');
		    header('Content-Type: application/octet-stream');
		    header('Content-Disposition: attachment; filename='.basename($pathToFile));
		    header('Content-Transfer-Encoding: binary');
		    header('Expires: 0');
		    header('Cache-Control: must-revalidate');
		    header('Pragma: public');
		    header('Content-Length: ' . filesize($pathToFile));
		    ob_clean();
		    flush();
		    readfile($pathToFile);
		    Yii::app()->end();
		}
	}
}
