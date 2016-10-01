<?php

class CategoryMobileMenu {

    public static function loadCategory() {
        $returnhtml = '';
        $mainCat = new CDbCriteria();
        $mainCat->select = array('id', 'parent', 'category_name', 'canonical_name');
        $mainCat->addCondition('t.id = t.parent');
        $categories = ProductCategory::model()->findAll($mainCat);
        foreach ($categories as $category) {
            $can_name = $category->canonical_name;

//            $returnhtml .= "<li><a href='" . Yii::app()->request->baseUrl . "/index.php/products/list?category=" . $can_name . "'>" . $category->category_name . "</a>";
            $childCat = new CDbCriteria();
            $childCat->select = array('id', 'parent', 'category_name', 'canonical_name');
            $childCat->addCondition('parent=' . $category->id);
            $childCat->addCondition('id !=' . $category->id);
            $childs = ProductCategory::model()->findAll($childCat);
            if (count($childs) > 0) {
                $returnhtml .= '<ul>';
                for ($j = 0; $j < count($childs); $j++) {
                    $returnhtml .="<li><a href='" . Yii::app()->request->baseUrl . "/index.php/products/list?category=" . $childs[$j]["canonical_name"] . "'>" . $childs[$j]["category_name"] . "</a>";
                    $returnhtml .=CategoryMobileMenu::listCategory($childs[$j]["id"]);
                }
                $returnhtml .= '</li></ul>';
            }
        }
//        $returnhtml .= '</ul>';
        return $returnhtml;
    }

    public static function listCategory($parent) {
        $html = '';
        $subCat = new CDbCriteria();
        $subCat->select = array('id', 'parent', 'category_name', 'canonical_name');
        $subCat->addCondition('parent=' . $parent);
        $subCat->addCondition('id !=' . $parent);
        $subcats = ProductCategory::model()->findAll($subCat);
        if (count($subcats) > 0) {
            $html = "<ul>";
            foreach ($subcats as $subcategory) {
                $html .="<li><a href='" . Yii::app()->request->baseUrl . "/index.php/products/list?category=" . $subcategory->canonical_name . "'>" . $subcategory->category_name . '</a>';
                $html .=CategoryMobileMenu::listCategory($subcategory->id);
            }
            $html .= "</li></ul>";
        }
        return $html;
    }

    public static function load() {
//   echo $this->loadCategory(); 
        $i = 1;
        $mainCat = new CDbCriteria();
        $mainCat->select = array('id', 'parent', 'category_name', 'canonical_name');
        $mainCat->addCondition('t.id = t.parent');
        $categories = ProductCategory::model()->findAll($mainCat);
        foreach ($categories as $category) {
            ?>
            <div class="panel panel-default">
                <div class="panel-heading c<?= $i ?>">
                    <div class="cir"></div>
                    <h4 class="panel-title">
                        <a class="accordion-toggle plus collapsed" data-toggle="collapse" data-parent="#accordion" href="#panel<?= $i ?>" aria-expanded="false"><i class="glyphicon glyphicon-plus"></i><a href=<?= Yii::app()->request->baseUrl . "/index.php/products/list?category=" . $category->canonical_name  ?>> <?= $category->category_name ?></a>
                    </h4>

                </div>
                <div id="panel<?= $i ?>" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                    <div class="panel-body">
                        <?php
                        $returnhtml = "";
                        $childCat = new CDbCriteria();
                        $childCat->select = array('id', 'parent', 'category_name', 'canonical_name');
                        $childCat->addCondition('parent=' . $category->id);
                        $childCat->addCondition('id !=' . $category->id);
//                        var_dump($childCat);
                        $childs = ProductCategory::model()->findAll($childCat);
                        if (count($childs) > 0) {
                            $returnhtml .= '<ul>';
                            for ($j = 0; $j < count($childs); $j++) {
                                $returnhtml .="<li><a href='" . Yii::app()->request->baseUrl . "/index.php/products/list?category=" . $childs[$j]["canonical_name"] . "'>" . $childs[$j]["category_name"] . "</a>";
                                $returnhtml .=CategoryMobileMenu::listCategory($childs[$j]["id"]);
                            }
                            $returnhtml .= '</li></ul>';
                        }
                        echo $returnhtml;
                        ?>

                    </div>
                </div>
            </div>
            <?php
            $i++;
        }
    }

}
