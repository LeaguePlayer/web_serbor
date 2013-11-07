<?php

/**
* This is the model class for table "{{areas}}".
*
* The followings are the available columns in table '{{areas}}':
    * @property integer $id
    * @property integer $image_map_id
*/
class Areas extends EActiveRecord
{
    public function tableName()
    {
        return '{{areas}}';
    }


    public function rules()
    {
        return array(
            array('image_map_id', 'numerical', 'integerOnly'=>true),
            // The following rule is used by search().
            array('id, image_map_id', 'safe', 'on'=>'search'),
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
            'image_map_id' => 'Карта',
        );
    }




    public function search()
    {
        $criteria=new CDbCriteria;
		$criteria->compare('id',$this->id);
		$criteria->compare('image_map_id',$this->image_map_id);
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
        return 'Области';
    }


}
