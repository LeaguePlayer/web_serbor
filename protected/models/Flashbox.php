<?php

/**
* This is the model class for table "{{flashbox}}".
*
* The followings are the available columns in table '{{flashbox}}':
    * @property integer $id
    * @property string $title
    * @property string $msg
    * @property integer $status
    * @property integer $sort
    * @property integer $create_time
    * @property integer $update_time
*/
class Flashbox extends EActiveRecord
{
    public function tableName()
    {
        return '{{flashbox}}';
    }


    public function rules()
    {
        return array(
            array('msg', 'required'),
            array('status, sort, create_time, update_time', 'numerical', 'integerOnly'=>true),
            array('title', 'length', 'max'=>255),
            // The following rule is used by search().
            array('id, title, msg, status, sort, create_time, update_time', 'safe', 'on'=>'search'),
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
            'title' => 'Заголовок',
            'msg' => 'Сообщение',
            'status' => 'Статус',
            'sort' => 'Вес для сортировки',
            'create_time' => 'Дата создания',
            'update_time' => 'Дата последнего редактирования',
        );
    }




    public function search()
    {
        $criteria=new CDbCriteria;
		$criteria->compare('id',$this->id);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('msg',$this->msg,true);
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
        return 'Сообщения';
    }


}
