<?php

/**
 * This is the model class for table "address_book".
 *
 * The followings are the available columns in table 'address_book':
 * @property integer $id
 * @property integer $user_type
 * @property integer $user_id
 * @property string $name
 * @property string $email
 * @property string $phone
 * @property string $address_line_1
 * @property string $address_line_2
 * @property string $country
 * @property string $state
 * @property string $city
 * @property string $pincode
 * @property string $map
 * @property string $doc
 * @property integer $cb
 * @property string $dou
 * @property integer $ub
 * @property integer $status
 */
class AddressBook extends CActiveRecord {

        /**
         * @return string the associated database table name
         */
        public function tableName() {
                return 'address_book';
        }

        /**
         * @return array validation rules for model attributes.
         */
        public function rules() {
                // NOTE: you should only define rules for those attributes that
                // will receive user inputs.
                return array(
                    array('address_line_1, country, state, city, pincode', 'required'),
                    array('user_type,phone,pincode user_id, cb, ub, status', 'numerical', 'integerOnly' => true),
                    array('name, email, phone, country, state, city, pincode', 'length', 'max' => 200),
                    array('email', 'email'),
                    array('phone', 'unique'),
                    // The following rule is used by search().
                    // @todo Please remove those attributes that should not be searched.
                    array('id, user_type, user_id, name, email,default_address, phone, address_line_1, address_line_2, country, state, city, pincode, map, doc, cb, dou, ub, status', 'safe', 'on' => 'search'),
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
                    'user_type' => 'User Type',
                    'user_id' => 'User',
                    'name' => 'Name',
                    'email' => 'Email',
                    'phone' => 'Phone',
                    'address_line_1' => 'Address Line 1',
                    'address_line_2' => 'Address Line 2',
                    'country' => 'Country',
                    'state' => 'State',
                    'city' => 'City',
                    'pincode' => 'Pincode',
                    'map' => 'Map',
                    'doc' => 'Doc',
                    'cb' => 'Cb',
                    'dou' => 'Dou',
                    'ub' => 'Ub',
                    'status' => 'Status',
                    'default_billing_address' => 'Default Billing Address',
                    'default_shipping_address' => 'Default Shipping Address',
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
                $criteria->compare('user_type', $this->user_type);
                $criteria->compare('user_id', $this->user_id);
                $criteria->compare('name', $this->name, true);
                $criteria->compare('email', $this->email, true);
                $criteria->compare('phone', $this->phone, true);
                $criteria->compare('address_line_1', $this->address_line_1, true);
                $criteria->compare('address_line_2', $this->address_line_2, true);
                $criteria->compare('country', $this->country, true);
                $criteria->compare('state', $this->state, true);
                $criteria->compare('city', $this->city, true);
                $criteria->compare('pincode', $this->pincode, true);
                $criteria->compare('map', $this->map, true);
                $criteria->compare('doc', $this->doc, true);
                $criteria->compare('cb', $this->cb);
                $criteria->compare('dou', $this->dou, true);
                $criteria->compare('ub', $this->ub);
                $criteria->compare('status', $this->status);

                return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
        }

        /**
         * Returns the static model of the specified AR class.
         * Please note that you should have this exact method in all your CActiveRecord descendants!
         * @param string $className active record class name.
         * @return AddressBook the static model class
         */
        public static function model($className = __CLASS__) {
                return parent::model($className);
        }

}
