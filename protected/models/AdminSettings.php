<?php

/**
 * This is the model class for table "admin_settings".
 *
 * The followings are the available columns in table 'admin_settings':
 * @property integer $id
 * @property string $email
 * @property string $additional_email
 * @property string $fb
 * @property string $twitter
 * @property string $google_plus
 * @property integer $field_1
 * @property integer $field_2
 * @property integer $field_3
 * @property integer $status
 */
class AdminSettings extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'admin_settings';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('email, additional_email, fb, twitter, google_plus, field_1, field_2, field_3', 'required'),
			array('field_1, field_2, field_3, status', 'numerical', 'integerOnly'=>true),
			array('email, additional_email, fb, twitter, google_plus', 'length', 'max'=>200),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, email, additional_email, fb, twitter, google_plus, field_1, field_2, field_3, status', 'safe', 'on'=>'search'),
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
			'email' => 'Email',
			'additional_email' => 'Additional Email',
			'fb' => 'Fb',
			'twitter' => 'Twitter',
			'google_plus' => 'Google Plus',
			'field_1' => 'Field 1',
			'field_2' => 'Field 2',
			'field_3' => 'Field 3',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('additional_email',$this->additional_email,true);
		$criteria->compare('fb',$this->fb,true);
		$criteria->compare('twitter',$this->twitter,true);
		$criteria->compare('google_plus',$this->google_plus,true);
		$criteria->compare('field_1',$this->field_1);
		$criteria->compare('field_2',$this->field_2);
		$criteria->compare('field_3',$this->field_3);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return AdminSettings the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
