<?php

/**
* This is the model class for table "{{images_map}}".
*
* The followings are the available columns in table '{{images_map}}':
    * @property integer $id
    * @property string $name
    * @property string $img_map
*/
class Maps extends EActiveRecord
{
    public function tableName()
    {
        return '{{images_map}}';
    }


    public function rules()
    {
        return array(
            array('name, img_map', 'length', 'max'=>255),
            // The following rule is used by search().
            array('id, name, img_map', 'safe', 'on'=>'search'),
        );
    }


    public function relations()
    {
        return array(
            'plots'=>array(self::HAS_MANY, 'Plots', 'image_map_id'),
        );
    }


    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'name' => 'Название',
            'img_map' => 'Изображение',
        );
    }


    public function behaviors()
    {
        return array(
        	'imgBehaviorMap' => array(
				'class' => 'application.behaviors.UploadableImageBehavior',
				'attributeName' => 'img_map',
				'versions' => array(
					'icon' => array(
						'centeredpreview' => array(90, 90),
					),
					'small' => array(
						'resize' => array(200, 180),
					)
				),
			),
        );
    }


    public function search()
    {
        $criteria=new CDbCriteria;
		$criteria->compare('id',$this->id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('img_map',$this->img_map,true);
        $criteria->order = 'name';

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }

    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    public function translition()
    {
        return 'Карта';
    }


}
