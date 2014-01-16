<?php

/**
* This is the model class for table "{{news_table}}".
*
* The followings are the available columns in table '{{news_table}}':
    * @property integer $id
    * @property string $title
    * @property string $dt_date
    * @property string $wswg_news_body
    * @property integer $news_type
    * @property integer $status
    * @property integer $sort
    * @property integer $create_time
    * @property integer $update_time
*/
class News extends EActiveRecord
{
    public function tableName()
    {
        return '{{news_table}}';
    }


    public function rules()
    {
        return array(
            array('title', 'required'),
            array('news_type, status, sort, create_time, update_time', 'numerical', 'integerOnly'=>true),
            array('title', 'length', 'max'=>255),
            array('dt_date, wswg_news_body', 'safe'),
            // The following rule is used by search().
            array('id, title, dt_date, wswg_news_body, news_type, status, sort, create_time, update_time', 'safe', 'on'=>'search'),
        );
    }

    public function scopes()
    {
        return array(
            'published'=>array(
                'condition'=>'status=1',
            ),
            'news'=>array(
                'condition'=>'news_type=1',
            ),
            'smi'=>array(
                'condition'=>'news_type=2',
            ),
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
            'dt_date' => 'Дата',
            'wswg_news_body' => 'Контент',
            'news_type' => 'Тип материала',
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
		$criteria->compare('dt_date',$this->dt_date,true);
		$criteria->compare('wswg_news_body',$this->wswg_news_body,true);
		$criteria->compare('news_type',$this->news_type);
		$criteria->compare('status',$this->status);
		$criteria->compare('sort',$this->sort);
		$criteria->compare('create_time',$this->create_time);
		$criteria->compare('update_time',$this->update_time);
        $criteria->order = 'dt_date DESC';

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
        return 'Новости';
    }

	public function beforeSave()
	{
		if (!empty($this->dt_date))
			$this->dt_date = Yii::app()->date->toMysql($this->dt_date);
		return parent::beforeSave();
	}

	public function afterFind()
	{
		parent::afterFind();
		if ( in_array($this->scenario, array('insert', 'update')) ) { 
            $this->dt_date = ($this->dt_date !== '0000-00-00' ) ? date('d.m.Y', strtotime($this->dt_date)) : '';
		}
	}

    public static function getTypes($i = false){
       
        $types = array(
            1 => 'Новость',
            2 => 'СМИ'
        );

        if($i){
            if(isset($types[$i])) return $types[$i];
            else $types[1];
        }
        return $types;
    }
}
