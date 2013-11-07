<?php

class MapsController extends AdminController
{
	public function actionAreas($map){

		$model = $this->loadModel('Maps', $map);

		$this->render('areas', array('model' => $model));
	}
}
