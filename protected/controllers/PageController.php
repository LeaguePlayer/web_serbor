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

		//if contact page
		if(strpos($alias, 'contact') !== false){

			$fb = new Feedback;

			$this->performAjaxValidation($fb);

			if(isset($_POST['Feedback'])){
				$fb->attributes = $_POST['Feedback'];
				if($fb->save()){
					//send email
					SiteHelper::sendMail('Обратная связь с сайта "Серебряный бор"', $this->renderPartial('/feedback/_mail', array('model' => $fb), true), Settings::getOption('email'));
					Yii::app()->user->setFlash('success', "Спасибо! Ваша заявка отправлена");
					$this->redirect('/contact');
				}
			}

			$this->render('view',array(
				'fb' => $fb,
				'model'=>$page,
			));
		}else
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

	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='contact-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
