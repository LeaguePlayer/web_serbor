<?php

class MapsController extends AdminController
{

	public function actionAreas($map){

		//change layout
		$this->layout = '/layouts/map_layout';

		$all_areas = Areas::model()->findAll();

		$area = new Areas;
		$plot = new Plots;

		$model = $this->loadModel('Maps', $map);

		$area->image_map_id = $model->id;
		//$area->new = true;

		$this->render('areas', array(
			'all_areas' => $all_areas,
			'model' => $model,
			'area' => $area,
			'plot' => $plot
		));
	}

	public function actionSave(){
		if(isset($_POST['Areas'])){
			foreach ($_POST['Areas'] as $d) {
				$area = new Areas;
				$area->attributes = $d;

				if(isset($d['id'])){
					$area = Areas::model()->findByPk($d['id']);
					$area->attributes = $d;
				}
				//var_dump($area->isNewRecord);
				$area->save();
			}
		}

		Yii::app()->end();
	}

	public function actionDeleteArea($id){
		if(isset($id)){
			Areas::model()->findByPk($id)->delete();
			echo 'ok';
		}

		Yii::app()->end();
	}

}
