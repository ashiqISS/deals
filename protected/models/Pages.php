<?php

/**
 * This is the model class for table "pages".
 *
 * The followings are the available columns in table 'pages':
 * @property integer $id
 * @property integer $menu_id
 * @property string $name
 * @property string $canonical_name
 * @property string $image
 * @property string $small_description
 * @property string $large_description
 * @property integer $status
 * @property integer $cb
 * @property string $doc
 * @property integer $ub
 * @property string $dou
 */
class Pages extends CActiveRecord {

        /**
         * @return string the associated database table name
         */
        public function tableName() {
                return 'pages';
        }

        /**
         * @return array validation rules for model attributes.
         */
        public function rules() {
                // NOTE: you should only define rules for those attributes that
                // will receive user inputs.
                return array(
                    array('name, large_description, status', 'required'),
                    array('menu_id, status, cb, ub', 'numerical', 'integerOnly' => true),
                    array('name, canonical_name, image', 'length', 'max' => 250),
                    // The following rule is used by search().
                    // @todo Please remove those attributes that should not be searched.
                    array('id, menu_id, name, canonical_name, image, small_description, large_description, status, cb, doc, ub, dou', 'safe', 'on' => 'search'),
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
                    'menu_id' => 'Menu',
                    'name' => 'Name',
                    'canonical_name' => 'Canonical Name',
                    'image' => 'Image',
                    'small_description' => 'Small Description',
                    'large_description' => 'Large Description',
                    'status' => 'Status',
                    'cb' => 'Cb',
                    'doc' => 'Doc',
                    'ub' => 'Ub',
                    'dou' => 'Dou',
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
                $criteria->compare('menu_id', $this->menu_id);
                $criteria->compare('name', $this->name, true);
                $criteria->compare('canonical_name', $this->canonical_name, true);
                $criteria->compare('image', $this->image, true);
                $criteria->compare('small_description', $this->small_description, true);
                $criteria->compare('large_description', $this->large_description, true);
                $criteria->compare('status', $this->status);
                $criteria->compare('cb', $this->cb);
                $criteria->compare('doc', $this->doc, true);
                $criteria->compare('ub', $this->ub);
                $criteria->compare('dou', $this->dou, true);

                return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
        }

        /**
         * Returns the static model of the specified AR class.
         * Please note that you should have this exact method in all your CActiveRecord descendants!
         * @param string $className active record class name.
         * @return Pages the static model class
         */
        public static function model($className = __CLASS__) {
                return parent::model($className);
        }

}
