<?php

/**
 * This is the model class for table "t_ac_prod".
 *
 * The followings are the available columns in table 't_ac_prod':
 * @property integer $id
 * @property integer $catid
 * @property string $title
 * @property string $content
 * @property string $image_url
 * @property string $description
 * @property string $create_date
 * @property integer $show_image
 */
class Prod extends CActiveRecord
{
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function tableName()
	{
		return 't_ac_prod';
	}

	public function rules()
	{
		return array(
			array('catid, title , content', 'required'),
			array('catid,show_image', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>32),
			array('image_url', 'length', 'max'=>256),
			array('description', 'length', 'max'=>1024),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, catid, title, content, image_url, description, create_date,show_image', 'safe', 'on'=>'search'),
		);
	}

	public function relations()
	{
		return array(
			'catalog' => array(self::BELONGS_TO,'Catalog','catid'),
		);
	}

	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'catid' => '产品分类',
			'title' => '标题',
			'content' => '内容',
			'image_url' => '图片URL',
			'description' => '备注',
			'create_date' => '创建时间',
			'show_image' => '标题图片'
		);
	}

	public function search()
	{
		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('catid',$this->catid);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('image_url',$this->image_url,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('create_date',$this->create_date,true);
		$criteria->compare('show_image',$this->show_image,true);
		$criteria->order = 'id desc';

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function getCatalogOptions($key=null)
	{
		$cat = array();
		
		$p = new Prod();
		
		
//		$cat = array(
//			'1'=>'产品介绍',
//			'2'=>'节能环保',
//			'3'=>'施工安装',
//			'4'=>'保养维修',
//			'5'=>'工程案例',
//			'6'=>'行业新闻',
//			'7'=>'未分类',
//		);
//		
//		if(!empty($key)){
//			if(array_key_exists($key,$cat)){
//				return $cat[$key]; 
//			} else {
//				return $cat['7'];
//			}
//		}
		
		return $cat;
	}
}