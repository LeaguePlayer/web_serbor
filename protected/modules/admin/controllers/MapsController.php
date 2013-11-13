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


	//save area
	public function actionAreaSave(){
		if(isset($_POST['Areas'])){
			$area = Areas::model()->findByPk($_POST['Areas']['id']);
			$area->attributes = $_POST['Areas'];

			$area->save(false);

			if(isset($_POST['Plots'])){
				foreach ($_POST['Plots'] as $p) {
					if(isset($p['id'])){
						$plot = Plots::model()->findByPk($p['id']);
						$plot->attributes = $p;
						$plot->save(false);
					}else{
						$plot = new Plots;
						$plot->attributes = $p;
						$plot->area_id = $area->id;
						$plot->save(false);
					}
				}
			}

			$this->renderPartial('/areas/_plots', array('area' => $area));
		}

		Yii::app()->end();
	}

	//remove area and all her plots
	public function actionRemoveArea($id){
		$area = Areas::model()->findByPk($id);

		foreach ($area->plots as $p) {
			$p->delete();
		}

		$area->delete();

		Yii::app()->end();
	}

}
