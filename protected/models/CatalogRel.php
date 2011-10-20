<?php

/**
 * This is the model class for table "t_ac_catalog_rel".
 *
 * The followings are the available columns in table 't_ac_catalog_rel':
 * @property integer $id
 * @property integer $pid
 * @property integer $sid
 */
class CatalogRel extends CActiveRecord
{
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function tableName()
	{
		return 't_ac_catalog_rel';
	}

	public function rules()
	{
		return array(
		array('pid, sid', 'required'),
		array('pid, sid', 'numerical', 'integerOnly'=>true),
		array('id, pid, sid', 'safe', 'on'=>'search'),
		);
	}

	public function relations()
	{
		return array(
			'parent' => array(self::BELONGS_TO,'Catalog','catid'),
			'son' => array(self::BELONGS_TO,'Catalog','catid'),
		);
	}

	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'pid' => 'Pid',
			'sid' => 'Sid',
		);
	}

	public function search()
	{
		$criteria=new CDbCriteria;
		$criteria->compare('id',$this->id);
		$criteria->compare('pid',$this->pid);
		$criteria->compare('sid',$this->sid);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}