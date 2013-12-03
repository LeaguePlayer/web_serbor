<?php

/**
* This is the model class for table "{{plots}}".
*
* The followings are the available columns in table '{{plots}}':
    * @property integer $id
    * @property integer $image_map_id
    * @property integer $num
    * @property integer $sq
    * @property integer $price
    * @property integer $status
*/
class Plots extends EActiveRecord
{
    public function tableName()
    {
        return '{{plots}}';
    }


    public function rules()
    {
        return array(
            array('image_map_id, num, sq, price, status', 'numerical', 'integerOnly'=>true),
            // The following rule is used by search().
            array('coords', 'safe'),
            array('id, image_map_id, num, sq, price, status', 'safe', 'on'=>'search'),
        );
    }


    public function relations()
    {
        return array(
        );
    }

    public function behaviors()
    {
        return array(
        );
    }

    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'image_map_id' => 'Карта',
            'num' => '№',
            'sq' => 'Площадь',
            'price' => 'Стоимость',
            'status' => 'Статус',
            'coords' => 'Координаты',
        );
    }

    public function search()
    {
        $criteria=new CDbCriteria;
		$criteria->compare('id',$this->id);
		$criteria->compare('image_map_id',$this->image_map_id);
		$criteria->compare('num',$this->num);
		$criteria->compare('sq',$this->sq);
        $criteria->compare('price',$this->price);
		$criteria->compare('coords',$this->coords);
		$criteria->compare('status',$this->status);
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
        return 'Участки';
    }

    //reserve plot or not
    public function isReserve(){
        if($this->status == 0) return 'false';
        return 'true';
    }

    public static function getStatus($i){
        $statuses = Plots::getStatuses();
        
        return isset($statuses[$i]) ? $statuses[$i] : $statuses[0];
    }

    public static function getStatuses(){
        return array(
            0 => 'Свободен',
            1 => 'Занят'
        );
    }
}
