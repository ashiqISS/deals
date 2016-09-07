<?php

/**
 * This is the model class for table "buyer_details".
 *
 * The followings are the available columns in table 'buyer_details':
 * @property integer $id
 * @property integer $user_id
 * @property string $first_name
 * @property string $last_name
 * @property string $username
 * @property string $password
 * @property string $pan_card
 * @property string $dob
 * @property string $gender
 * @property string $phone_no_2
 * @property integer $newsletter
 * @property string $wallet_amt
 * @property integer $CB
 * @property integer $UB
 * @property string $DOC
 * @property string $DOU
 * @property integer $status
 * @property integer $terms
 * @property integer $shipping_same
 *
 * The followings are the available model relations:
 * @property Users $user
 */
class BuyerDetails extends CActiveRecord {

        public $verifyCode;

        /**
         * @return string the associated database table name
         */
        public function tableName() {
                return 'buyer_details';
        }

        /**
         * @return array validation rules for model attributes.
         */
        public function rules() {
                // NOTE: you should only define rules for those attributes that
                // will receive user inputs.
                return array(
                    array('first_name, last_name, email, password,confirm, phone_number', 'required', 'on' => 'create'),
                    array('newsletter, CB, UB, status, terms', 'numerical', 'integerOnly' => true),
                    array('email', 'email', 'on' => 'create'),
                    array('email', 'unique', 'on' => 'create'),
                    array('email', 'unique'),
                    array('phone_number', 'unique', 'on' => 'create'),
                    array('confirm', 'compare', 'compareAttribute' => 'password'),
//                    array('password', 'legth', 'min' => 5, 'on' => 'create'),
//                    array('password', 'legth', 'max' => 15, 'on' => 'create'),
//                    array('first_name,last_name,phone_no_2,email,address', 'required', 'on' => 'settings'),
                    array('email', 'unique', 'on' => 'settings'),
                    array('email', 'email', 'on' => 'settings'),
                    array('verifyCode', 'captcha', 'allowEmpty' => !CCaptcha::checkRequirements(), 'on' => 'create'),
                    // The following rule is used by search().
                    // @todo Please remove those attributes that should not be searched.
                    array('first_name, last_name, email, password, dob, gender, phone_number, address, activation_link, email_verification, verification_code, newsletter, wallet_amt, user_status, CB, UB, DOC, DOU, status, terms', 'safe', 'on' => 'search'),
                );
        }

        /**
         * @return array relational rules.
         */
        public function relations() {
                // NOTE: you may need to adjust the relation name and the related
                // class name for the relations automatically generated below.
                return array(
//                    'user' => array(self::BELONGS_TO, 'Users', 'user_id'),
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
                    'password' => 'Password',
                    'dob' => 'Dob',
                    'gender' => 'Gender',
                    'phone_number' => 'Phone Number',
                    'address' => 'Address',
                    'activation_link' => 'Activation Link',
                    'email_verification' => 'Email Verification',
                    'verification_code' => 'Verification Code',
                    'newsletter' => 'Newsletter',
                    'shipping_same' => 'Shipping Same as Billing Address',
                    'wallet_amt' => 'Wallet Amt',
                    'user_status' => 'User Status',
                    'CB' => 'Cb',
                    'UB' => 'Ub',
                    'DOC' => 'Doc',
                    'DOU' => 'Dou',
                    'status' => 'Status',
                    'terms' => 'Terms',
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
                $criteria->compare('password', $this->password, true);
                $criteria->compare('dob', $this->dob, true);
                $criteria->compare('gender', $this->gender, true);
                $criteria->compare('phone_number', $this->phone_number, true);
                $criteria->compare('address', $this->address, true);
                $criteria->compare('activation_link', $this->activation_link, true);
                $criteria->compare('email_verification', $this->email_verification, true);
                $criteria->compare('verification_code', $this->verification_code, true);
                $criteria->compare('newsletter', $this->newsletter);
                $criteria->compare('shipping_same', $this->shipping_same);
                $criteria->compare('wallet_amt', $this->wallet_amt, true);
                $criteria->compare('user_status', $this->user_status);
                $criteria->compare('CB', $this->CB);
                $criteria->compare('UB', $this->UB);
                $criteria->compare('DOC', $this->DOC, true);
                $criteria->compare('DOU', $this->DOU, true);
                $criteria->compare('status', $this->status);
                $criteria->compare('terms', $this->terms);

                return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
        }

        /**
         * Returns the static model of the specified AR class.
         * Please note that you should have this exact method in all your CActiveRecord descendants!
         * @param string $className active record class name.
         * @return BuyerDetails the static model class
         */
        public static function model($className = __CLASS__) {
                return parent::model($className);
        }

}

?>
