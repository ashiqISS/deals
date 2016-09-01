<?php

/**
 * This is the model class for table "merchant".
 *
 * The followings are the available columns in table 'merchant':
 * @property integer $id
 * @property string $first_name
 * @property string $email
 * @property string $phone_number
 * @property string $password
 * @property string $verification_code
 * @property string $email_verification
 * @property string $product_categories
 * @property integer $merchant_type
 * @property integer $product_count
 * @property string $shop_name
 * @property string $shop_logo
 * @property string $shop_banner
 * @property string $address
 * @property integer $pincode
 * @property string $city
 * @property string $locality
 * @property string $district
 * @property integer $state
 * @property integer $country
 * @property string $vat_tin
 * @property string $status
 * @property string $last_login
 * @property integer $bad_attempts
 * @property integer $CB
 * @property integer $UB
 * @property string $DOC
 * @property string $DOU
 * @property integer $is_payment_done
 * @property integer $field1
 * @property integer $field2
 * @property integer $field3
 */
class Merchant extends CActiveRecord {

        /**
         * @return string the associated database table name
         */
        public function tableName() {
                return 'merchant';
        }

        /**
         * @return array validation rules for model attributes.
         */
        public function rules() {
                // NOTE: you should only define rules for those attributes that
                // will receive user inputs.
                return array(
//            array('first_name,last_name, email, phone_number, password, email_verification, product_categories, merchant_type, product_count, shop_name, address, pincode, city, locality, district, state, country, status, CB, DOC, is_payment_done', 'required'),
                    array('first_name, last_name, email, phone_number, password, confirm,  merchant_type,  address', 'required'),
//                    array('merchant_type, product_count, pincode, district, state, country, bad_attempts, CB, UB, is_payment_done, merchant_point, merchant_badge, merchant_rating', 'numerical', 'integerOnly' => true),
//                    array('first_name, email, phone_number, password, confirm, email_verification, city, locality, vat_tin, status', 'length', 'max' => 100),
//                    array('last_name', 'length', 'max' => 200),
//                    array('verification_code', 'length', 'max' => 50),
//                    array('product_categories, shop_name, shop_logo, shop_banner', 'length', 'max' => 250),
                    // email and phone number is unique
                    array('email, phone_number', 'unique', 'on' => 'create'),
                    // check for email format
                    array('email', 'email', 'on' => 'create'),
                    // password validation
                    array('password, confirm', 'length', 'min' => 6, 'max' => 40),
                    array('password, confirm', 'compare', 'compareAttribute' => 'confirm', 'message' => 'Password and Confirm Password should match.'),
                    // The following rule is used by search().
                    // @todo Please remove those attributes that should not be searched.
                    array('first_name, last_name, email, phone_number, password, confirm, verification_code, email_verification, product_categories, merchant_type, product_count, shop_name, shop_logo, shop_banner, address, pincode, city, locality, district, state, country, vat_tin, status, last_login, bad_attempts, CB, UB, DOC, DOU, is_payment_done, merchant_point, merchant_badge, merchant_rating', 'safe', 'on' => 'search'),
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
                    'first_name' => 'First Name',
                    'last_name' => 'Last Name',
                    'email' => 'Email',
                    'phone_number' => 'Phone Number',
                    'password' => 'Password',
                    'confirm' => 'Confirm',
                    'verification_code' => 'Verification Code',
                    'email_verification' => 'Email Verification',
                    'product_categories' => 'Product Categories',
                    'merchant_type' => 'Merchant Type',
                    'product_count' => 'Product Count',
                    'shop_name' => 'Shop Name',
                    'shop_logo' => 'Shop Logo',
                    'shop_banner' => 'Shop Banner',
                    'address' => 'Address',
                    'pincode' => 'Pincode',
                    'city' => 'City',
                    'locality' => 'Locality',
                    'district' => 'District',
                    'state' => 'State',
                    'country' => 'Country',
                    'vat_tin' => 'Vat Tin',
                    'status' => 'Status',
                    'last_login' => 'Last Login',
                    'bad_attempts' => 'Bad Attempts',
                    'CB' => 'Cb',
                    'UB' => 'Ub',
                    'DOC' => 'Doc',
                    'DOU' => 'Dou',
                    'is_payment_done' => 'Is Payment Done',
                    'merchant_point' => 'Merchant Point',
                    'merchant_badge' => 'Merchant Badge',
                    'merchant_rating' => 'Merchant Rating',
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
                $criteria->compare('first_name', $this->first_name, true);
                $criteria->compare('last_name', $this->last_name, true);
                $criteria->compare('email', $this->email, true);
                $criteria->compare('phone_number', $this->phone_number, true);
                $criteria->compare('password', $this->password, true);
                $criteria->compare('confirm', $this->confirm, true);
                $criteria->compare('verification_code', $this->verification_code, true);
                $criteria->compare('email_verification', $this->email_verification, true);
                $criteria->compare('product_categories', $this->product_categories, true);
                $criteria->compare('merchant_type', $this->merchant_type);
                $criteria->compare('product_count', $this->product_count);
                $criteria->compare('shop_name', $this->shop_name, true);
                $criteria->compare('shop_logo', $this->shop_logo, true);
                $criteria->compare('shop_banner', $this->shop_banner, true);
                $criteria->compare('address', $this->address, true);
                $criteria->compare('pincode', $this->pincode);
                $criteria->compare('city', $this->city, true);
                $criteria->compare('locality', $this->locality, true);
                $criteria->compare('district', $this->district);
                $criteria->compare('state', $this->state);
                $criteria->compare('country', $this->country);
                $criteria->compare('vat_tin', $this->vat_tin, true);
                $criteria->compare('status', $this->status, true);
                $criteria->compare('last_login', $this->last_login, true);
                $criteria->compare('bad_attempts', $this->bad_attempts);
                $criteria->compare('CB', $this->CB);
                $criteria->compare('UB', $this->UB);
                $criteria->compare('DOC', $this->DOC, true);
                $criteria->compare('DOU', $this->DOU, true);
                $criteria->compare('is_payment_done', $this->is_payment_done);
                $criteria->compare('merchant_point', $this->merchant_point);
                $criteria->compare('merchant_badge', $this->merchant_badge);
                $criteria->compare('merchant_rating', $this->merchant_rating);

                return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
        }

        /**
         * Returns the static model of the specified AR class.
         * Please note that you should have this exact method in all your CActiveRecord descendants!
         * @param string $className active record class name.
         * @return Merchant the static model class
         */
        public static function model($className = __CLASS__) {
                return parent::model($className);
        }

}
