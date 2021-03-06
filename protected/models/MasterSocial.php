<?php

/**
 * This is the model class for table "master_social".
 *
 * The followings are the available columns in table 'master_social':
 * @property integer $id
 * @property string $site
 * @property integer $point
 * @property integer $cb
 * @property integer $ub
 * @property string $doc
 * @property string $dou
 * @property integer $status
 */
class MasterSocial extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'master_social';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('site, point, cb, ub, doc, dou', 'required'),
			array('point, cb, ub, status', 'numerical', 'integerOnly'=>true),
			array('site', 'length', 'max'=>200),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, site, point, cb, ub, doc, dou, status', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'site' => 'Site',
			'point' => 'Point',
			'cb' => 'Cb',
			'ub' => 'Ub',
			'doc' => 'Doc',
			'dou' => 'Dou',
			'status' => 'Status',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;
		$criteria->order = "id desc";

		$criteria->compare('id',$this->id);
		$criteria->compare('site',$this->site,true);
		$criteria->compare('point',$this->point);
		$criteria->compare('cb',$this->cb);
		$criteria->compare('ub',$this->ub);
		$criteria->compare('doc',$this->doc,true);
		$criteria->compare('dou',$this->dou,true);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return MasterSocial the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
