<?php

class MapsController extends AdminController
{

	public function actionAreas($map){

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

	//for AJAX request
	public function actionRemovePlot($id, $aid){
		if($id && $aid){
			$plot = Plots::model()->findByPk($id, 'area_id=:area_id', array(':area_id' => $aid));
			$plot->delete();
		}

		Yii::app()->end();
	}

	//for AJAX request
	public function actionAreaForm($id){
		if(isset($id)){
			$area = Areas::model()->findByPk($id);

			$this->renderPartial('/areas/_form', array(
				'model' => $area
			));
		}

		Yii::app()->end();
	}

	//Create area, return ID new Area
	public function actionCreateArea(){
		if(isset($_POST['Areas'])){
			$model = new Areas;
			$model->attributes = $_POST['Areas'];

			if($model->save()){
				echo $model->id;
				Yii::app()->end();
			}
		}

		echo 0;
		Yii::app()->end();
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
