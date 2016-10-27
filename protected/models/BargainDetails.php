<?php

/**
 * This is the model class for table "bargain_details".
 *
 * The followings are the available columns in table 'bargain_details':
 * @property integer $id
 * @property integer $product_id
 * @property integer $user_id
 * @property double $bidd_amount
 * @property integer $status
 * @property string $doc
 * @property string $dou
 * @property integer $ub
 */
class BargainDetails extends CActiveRecord {

        /**
         * @return string the associated database table name
         */
        public function tableName() {
                return 'bargain_details';
        }

        /**
         * @return array validation rules for model attributes.
         */
        public function rules() {
                // NOTE: you should only define rules for those attributes that
                // will receive user inputs.
                return array(
                    array('product_id, user_id, bidd_amount', 'required'),
                    array('product_id, user_id, status, ub', 'numerical', 'integerOnly' => true),
                    array('bidd_amount', 'numerical'),
                    // The following rule is used by search().
                    // @todo Please remove those attributes that should not be searched.
                    array('id, product_id, user_id, bidd_amount, status, doc, dou, ub', 'safe', 'on' => 'search'),
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
                    'product_id' => 'Product',
                    'user_id' => 'User',
                    'bidd_amount' => 'Bidd Amount',
                    'status' => 'Status',
                    'doc' => 'Doc',
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
				$criteria->order = "id desc";
                $criteria->compare('id', $this->id);
                $criteria->compare('product_id', $this->product_id);
                $criteria->compare('user_id', $this->user_id);
                $criteria->compare('bidd_amount', $this->bidd_amount);
                $criteria->compare('status', $this->status);
                $criteria->compare('doc', $this->doc, true);
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
         * @return BargainDetails the static model class
         */
        public static function model($className = __CLASS__) {
                return parent::model($className);
        }

}
