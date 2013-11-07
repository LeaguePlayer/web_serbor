<?php

class MapsController extends AdminController
{
	public function actionAreas($map){

		$area = new Areas;
		$plot = new Plots;

		$model = $this->loadModel('Maps', $map);

		$area->image_map_id = $model->id;

		$this->render('areas', array(
			'model' => $model,
			'area' => $area,
			'plot' => $plot
		));
	}

	public function getFormArea(){
		if(isset($_POST['Areas'])){

		}
	}
}
