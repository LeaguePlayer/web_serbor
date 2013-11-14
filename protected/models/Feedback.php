<?php

/**
* This is the model class for table "{{feedback}}".
*
* The followings are the available columns in table '{{feedback}}':
    * @property integer $id
    * @property string $fio
    * @property string $email
    * @property string $phone
    * @property string $msg
    * @property integer $status
    * @property integer $sort
    * @property integer $create_time
    * @property integer $update_time
*/
class Feedback extends EActiveRecord
{
    public function tableName()
    {
        return '{{feedback}}';
    }


    public function rules()
    {
        return array(
            array('email, phone', 'required'),
            array('status, sort, create_time, update_time', 'numerical', 'integerOnly'=>true),
            array('fio, email, phone', 'length', 'max'=>255),
            array('email', 'email'),
            array('msg', 'safe'),
            // The following rule is used by search().
            array('id, fio, email, phone, msg, status, sort, create_time, update_time', 'safe', 'on'=>'search'),
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
            'fio' => 'ФИО',
            'email' => 'E-mail',
            'phone' => 'Телефон',
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
		$criteria->compare('fio',$this->fio,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('phone',$this->phone,true);
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
        return 'Обратная связь';
    }


}
