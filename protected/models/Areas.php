<?php

/**
* This is the model class for table "{{areas}}".
*
* The followings are the available columns in table '{{areas}}':
    * @property integer $id
    * @property string $name
    * @property integer $image_map_id
    * @property string $coords
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
            array('name', 'length', 'max'=>255),
            array('coords', 'safe'),
            // The following rule is used by search().
            array('id, name, image_map_id, coords', 'safe', 'on'=>'search'),
        );
    }


    public function relations()
    {
        return array(
            'plots'=>array(self::HAS_MANY, 'Plots', 'area_id'),
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
            'name' => 'Название области',
            'image_map_id' => 'Карта',
            'coords' => 'Координаты',
        );
    }

    public function search()
    {
        $criteria=new CDbCriteria;
		$criteria->compare('id',$this->id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('image_map_id',$this->image_map_id);
		$criteria->compare('coords',$this->coords,true);
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

    //exists plots or not
    public function isEmpty(){
        return empty($this->plots);
    }

    //reserve all plots or not
    public function isReserve(){
        foreach ($this->plots as $pl) {
            if($pl->status == 0) return false;
        }
        return true;
    }

    //countPlots
    public function getCountPlots(){
        return count($this->plots);
    }

    //count freePLots
    public function getFreePlots(){
        $free = 0;
        foreach ($this->plots as $pl) {
            if($pl->status == 0) $free++;
        }
        return $free;
    }

    //get square
    public function getSquare(){
        $max = -1;
        $min = 9999999;

        foreach ($this->plots as $pl) {
            if($min > $pl->sq) $min = $pl->sq;
            if($max < $pl->sq) $max = $pl->sq;
        }

        return ($min == $max) ? $min.' кв.м.' : $min.' - '.$max.' кв.м.';
    }
}
