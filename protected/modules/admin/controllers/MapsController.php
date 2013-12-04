<?php

class MapsController extends AdminController
{

	public function actionAreas($map){

		$this->layout = '/layouts/map_layout';

		//$plot = new Plots;

		$model = $this->loadModel('Maps', $map);

		//$plot->image_map_id = $model->id;
		//$area->new = true;

		$this->render('areas', array(
			'model' => $model
		));
	}

	//for AJAX request
	/*public function actionRemovePlot($id, $aid){
		if($id && $aid){
			$plot = Plots::model()->findByPk($id, 'area_id=:area_id', array(':area_id' => $aid));
			$plot->delete();
		}

		Yii::app()->end();
	}*/

	//for AJAX request
	public function actionPlotForm($id){
		if(isset($id)){
			$plot = Plots::model()->findByPk($id);

			$this->renderPartial('/plots/_plot', array(
				'model' => $plot
			));
		}

		Yii::app()->end();
	}

	//Create area, return ID new Area
	public function actionCreatePlot(){
		if(isset($_POST['Plots'])){
			$model = new Plots;
			$model->attributes = $_POST['Plots'];

			if($model->save()){
				echo $model->id;
				Yii::app()->end();
			}
		}

		echo 0;
		Yii::app()->end();
	}


	//save plot
	public function actionPlotSave(){

		if(isset($_POST['Plots'])){
			$plot = Plots::model()->findByPk($_POST['Plots']['id']);
			$plot->attributes = $_POST['Plots'];

			$plot->save(false);
			$this->renderPartial('/plots/_form', array('model' => $plot));
		}

		Yii::app()->end();
	}

	//remove plot
	public function actionRemovePlot(){
		if(isset($_POST['id'])){
			$plot = Plots::model()->findByPk($_POST['id']);
			$plot->delete();
		}
		Yii::app()->end();
	}

}
