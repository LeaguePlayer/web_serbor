<?php

class SiteController extends FrontController
{
	public $layout = '//layouts/home';
	
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		$this->title = 'Поселок "Серебряный Бор" - '.$this->title;

		//get flash box
		$box = Flashbox::model()->find();
		if($box){
			//get cookie
			$is_cookie = isset(Yii::app()->request->cookies['show']);

			if(!$is_cookie){ //cookie не установлены
				$cookie = new CHttpCookie('show', true);
				$cookie->expire = time()+60*60*24*5; //5 days
				Yii::app()->request->cookies['show'] = $cookie;

				$cs = Yii::app()->clientScript;

				$cs->registerScript('flash-box', "
					//сюда нужно вставить вызов всплывающего окна (js code)
					
					var msg = '<div style=\"width: 500px\">$box->msg</div>';
					$.fancybox.open(msg, {minHeight: 0 });

				", CClientScript::POS_READY);
			}
		}

		//meta tags
		if(Settings::getOption('meta_keys'))  Yii::app()->clientScript->registerMetaTag(CHtml::encode(Settings::getOption('meta_keys')), 'keywords');
		if(Settings::getOption('meta_description'))  Yii::app()->clientScript->registerMetaTag(CHtml::encode(Settings::getOption('meta_description')), 'description');

		$this->render('index', array('box' => $box));
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		$this->layout = '//layouts/error_layouts';

		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}
}