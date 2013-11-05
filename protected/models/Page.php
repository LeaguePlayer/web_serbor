<?php

/**
* This is the model class for table "{{page_table}}".
*
* The followings are the available columns in table '{{page_table}}':
    * @property integer $id
    * @property string $title
    * @property string $alias
    * @property string $wswg_body
    * @property integer $status
    * @property integer $sort
    * @property integer $create_time
    * @property integer $update_time
*/
class Page extends EActiveRecord
{
    public function tableName()
    {
        return '{{page_table}}';
    }


    public function rules()
    {
        return array(
            array('status, sort, create_time, update_time', 'numerical', 'integerOnly'=>true),
            array('title, alias', 'length', 'max'=>255),
            array('alias', 'unique'),
            array('wswg_body', 'safe'),
            // The following rule is used by search().
            array('id, title, alias, wswg_body, status, sort, create_time, update_time', 'safe', 'on'=>'search'),
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
            'alias' => 'Url',
            'wswg_body' => 'Контент',
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
		$criteria->compare('alias',$this->alias,true);
		$criteria->compare('wswg_body',$this->wswg_body,true);
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
        return 'Страницы';
    }


}
