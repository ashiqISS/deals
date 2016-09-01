<?php

/**
 * This is the model class for table "deal_submission".
 *
 * The followings are the available columns in table 'deal_submission':
 * @property integer $id
 * @property integer $user_id
 * @property string $full_name
 * @property string $email
 * @property string $product_name
 * @property string $product_url
 * @property string $message
 * @property string $doc
 * @property integer $cb
 * @property string $dou
 * @property integer $ub
 */
class DealSubmission extends CActiveRecord {

        /**
         * @return string the associated database table name
         */
        public function tableName() {
                return 'deal_submission';
        }

        /**
         * @return array validation rules for model attributes.
         */
        public function rules() {
                // NOTE: you should only define rules for those attributes that
                // will receive user inputs.
                return array(
                    array('full_name, email, product_name, product_url', 'required'),
                    array('user_id,  cb, ub', 'numerical', 'integerOnly' => true),
                    array('full_name', 'length', 'max' => 250),
                    array('email', 'length', 'max' => 200),
                    array('product_name', 'length', 'max' => 300),
                    array('dou', 'safe'),
                    array('email', 'email'),
                    // The following rule is used by search().
                    // @todo Please remove those attributes that should not be searched.
                    array('id, user_id,  full_name, email, product_name, product_url, message, doc, cb, dou, ub', 'safe', 'on' => 'search'),
                );
        }

        /**
         * @return array relational rules.
         */
        public function relations() {
                // NOTE: you may need to adjust the relation name and the related
                // class name for the relations automatically generated below.
                return array(
                );
        }

        /**
         * @return array customized attribute labels (name=>label)
         */
        public function attributeLabels() {
                return array(
                    'id' => 'ID',
                    'user_id' => 'User',
                    'full_name' => 'Full Name',
                    'email' => 'Email',
                    'product_name' => 'Product Name',
                    'product_url' => 'Product Url',
                    'message' => 'Message',
                    'doc' => 'Doc',
                    'cb' => 'Cb',
                    'dou' => 'Dou',
                    'ub' => 'Ub',
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
        public function search() {
                // @todo Please modify the following code to remove attributes that should not be searched.

                $criteria = new CDbCriteria;

                $criteria->compare('id', $this->id);
                $criteria->compare('user_id', $this->user_id);
                $criteria->compare('full_name', $this->full_name, true);
                $criteria->compare('email', $this->email, true);
                $criteria->compare('product_name', $this->product_name, true);
                $criteria->compare('product_url', $this->product_url, true);
                $criteria->compare('message', $this->message, true);
                $criteria->compare('doc', $this->doc, true);
                $criteria->compare('cb', $this->cb);
                $criteria->compare('dou', $this->dou, true);
                $criteria->compare('ub', $this->ub);

                return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
        }

        /**
         * Returns the static model of the specified AR class.
         * Please note that you should have this exact method in all your CActiveRecord descendants!
         * @param string $className active record class name.
         * @return DealSubmission the static model class
         */
        public static function model($className = __CLASS__) {
                return parent::model($className);
        }

}
