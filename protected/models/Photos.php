<?php

/**
* This is the model class for table "{{gallery_table}}".
*
* The followings are the available columns in table '{{gallery_table}}':
    * @property integer $id
    * @property integer $gllr_gallery
    * @property integer $status
    * @property integer $sort
    * @property integer $create_time
    * @property integer $update_time
*/
class Photos extends EActiveRecord
{
    public function tableName()
    {
        return '{{gallery_table}}';
    }


    public function rules()
    {
        return array(
            array('gllr_gallery, status, sort, create_time, update_time', 'numerical', 'integerOnly'=>true),
            // The following rule is used by search().
            array('id, gllr_gallery, status, sort, create_time, update_time', 'safe', 'on'=>'search'),
        );
    }


    public function relations()
    {
        return array(
        );
    }


    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'gllr_gallery' => 'Галерея',
            'status' => 'Статус',
            'sort' => 'Вес для сортировки',
            'create_time' => 'Дата создания',
            'update_time' => 'Дата последнего редактирования',
        );
    }


    public function behaviors()
    {
        return CMap::mergeArray(parent::behaviors(), array(
        			'galleryBehaviorGallery' => array(
				'class' => 'appext.imagesgallery.GalleryBehavior',
				'idAttribute' => 'gllr_gallery',
				'versions' => array(
					'small' => array(
						'adaptiveResize' => array(135, 90),
					),
					'medium' => array(
						'resize' => array(600, 400),
					)
				),
				'name' => false,
				'description' => false,
			),
        ));
    }


    public function search()
    {
        $criteria=new CDbCriteria;
		$criteria->compare('id',$this->id);
		$criteria->compare('gllr_gallery',$this->gllr_gallery);
		$criteria->compare('status',$this->status);
		$criteria->compare('sort',$this->sort);
		$criteria->compare('create_time',$this->create_time);
		$criteria->compare('update_time',$this->update_time);
        $criteria->order = 'sort';

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
        return 'Галерея';
    }


}
