<?php

/**
 * This is the model class for table "product_category".
 *
 * The followings are the available columns in table 'product_category':
 * @property integer $id
 * @property string $parent
 * @property string $category_name
 * @property string $description
 * @property string $image
 * @property integer $sort_order
 * @property string $meta_title
 * @property string $meta_description
 * @property string $meta_keywords
 * @property integer $header_visibility
 * @property string $search_tag
 * @property integer $status
 * @property string $canonical_name
 * @property integer $CB
 * @property integer $UB
 * @property string $DOC
 * @property string $DOU
 */
class ProductCategory extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'product_category';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('canonical_name', 'required'),
            array('sort_order, header_visibility, status, CB, UB', 'numerical', 'integerOnly' => true),
            array('parent, category_name, image, meta_title, meta_keywords, search_tag, canonical_name', 'length', 'max' => 225),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
//            array('id, parent, category_name, description, image, sort_order, meta_title, meta_description, meta_keywords, header_visibility, search_tag, status, canonical_name, CB, UB, DOC, DOU', 'safe', 'on' => 'search'),
//            array('category_name, description, image', 'required', 'on' => 'create'),
//            array('image', 'file', 'types' => 'jpg, gif, png', 'safe' => false, 'allowEmpty' => true, 'on' => 'update'),
//            array('image', 'file', 'types' => 'jpg, gif, png', 'safe' => false, 'allowEmpty' => false, 'on' => 'create'),
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
            'parent' => 'Parent',
            'category_name' => 'Category Name',
            'description' => 'Description',
            'image' => 'Image',
            'sort_order' => 'Sort Order',
            'meta_title' => 'Meta Title',
            'meta_description' => 'Meta Description',
            'meta_keywords' => 'Meta Keywords',
            'header_visibility' => 'Header Visibility',
            'search_tag' => 'Search Tag',
            'status' => 'Status',
            'canonical_name' => 'Canonical Name',
            'CB' => 'Cb',
            'UB' => 'Ub',
            'DOC' => 'Doc',
            'DOU' => 'Dou',
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
        $criteria->compare('parent', $this->parent, true);
        $criteria->compare('category_name', $this->category_name, true);
        $criteria->compare('description', $this->description, true);
        $criteria->compare('image', $this->image, true);
        $criteria->compare('sort_order', $this->sort_order);
        $criteria->compare('meta_title', $this->meta_title, true);
        $criteria->compare('meta_description', $this->meta_description, true);
        $criteria->compare('meta_keywords', $this->meta_keywords, true);
        $criteria->compare('header_visibility', $this->header_visibility);
        $criteria->compare('search_tag', $this->search_tag, true);
        $criteria->compare('status', $this->status);
        $criteria->compare('canonical_name', $this->canonical_name, true);
        $criteria->compare('CB', $this->CB);
        $criteria->compare('UB', $this->UB);
        $criteria->compare('DOC', $this->DOC, true);
        $criteria->compare('DOU', $this->DOU, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return ProductCategory the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }
    
     public function loadCategory() {
        $returnhtml = '<ul class="dropdown-menu multi-level loadcat" role="menu" aria-labelledby="dropdownMenu">';
        $mainCat = new CDbCriteria();
        $mainCat->select = array('id', 'parent', 'category_name', 'canonical_name');
        $mainCat->addCondition('t.id = t.parent');
        $categories = ProductCategory::model()->findAll($mainCat);
        foreach ($categories as $category) {
            $can_name = $category->canonical_name;
           
            $returnhtml .= "<li><a tabindex='-1' href='" . Yii::app()->request->baseUrl . "/index.php/products/list?category=" . $can_name . "'>" . $category->category_name . "</a>";
            $childCat = new CDbCriteria();
            $childCat->select = array('id', 'parent', 'category_name', 'canonical_name');
            $childCat->addCondition('parent=' . $category->id);
            $childCat->addCondition('id !=' . $category->id);
            $childs = ProductCategory::model()->findAll($childCat);
            if (count($childs) > 0) {
                $returnhtml .= '<ul>';
                for ($j = 0; $j < count($childs); $j++) {
                    $returnhtml .="<li><a tabindex='-1' href='" . Yii::app()->request->baseUrl . "/index.php/products/list?category=" . $childs[$j]["canonical_name"] . "'>" . $childs[$j]["category_name"] . "</a>";
                    $returnhtml .=$this->listCategory($childs[$j]["id"]);
                }
                $returnhtml .= '</li></ul></li>';
            }
        }
        $returnhtml .= '</ul>';
        return $returnhtml;
    }

    public function listCategory($parent) {
        $html = '';
        $subCat = new CDbCriteria();
        $subCat->select = array('id', 'parent', 'category_name', 'canonical_name');
        $subCat->addCondition('parent=' . $parent);
        $subCat->addCondition('id !=' . $parent);
        $subcats = ProductCategory::model()->findAll($subCat);
        if (count($subcats) > 0) {
            $html = "<ul>";
            foreach ($subcats as $subcategory) {
                $html .="<li><a tabindex='-1' href='" . Yii::app()->request->baseUrl . "/index.php/products/list?category=" . $subcategory->canonical_name . "'>" . $subcategory->category_name . '</a>';
                $html .=$this->listCategory($subcategory->id);
            }
            $html .= "</li></ul>";
        }
        return $html;
    }

}
