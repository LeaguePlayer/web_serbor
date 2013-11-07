<?php

/**
* This is the model class for table "{{plots}}".
*
* The followings are the available columns in table '{{plots}}':
    * @property integer $id
    * @property integer $area_id
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
            array('area_id, num, sq, price, status', 'numerical', 'integerOnly'=>true),
            // The following rule is used by search().
            array('id, area_id, num, sq, price, status', 'safe', 'on'=>'search'),
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
            'area_id' => 'Область',
            'num' => '№',
            'sq' => 'Площадь',
            'price' => 'Стоимость',
            'status' => 'Статус',
        );
    }




    public function search()
    {
        $criteria=new CDbCriteria;
		$criteria->compare('id',$this->id);
		$criteria->compare('area_id',$this->area_id);
		$criteria->compare('num',$this->num);
		$criteria->compare('sq',$this->sq);
		$criteria->compare('price',$this->price);
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


}
