<?php

class Utilities {

    public static function Categories() {
        $parentFilter = "SELECT `id`,`parent`,`category_name` FROM `product_category` WHERE `parent` = `id`";
        $parents = Yii::app()->db->createCommand($parentFilter)->queryAll();

        $returnhtml = array();
        $cat = array();
        for ($i = 0; $i < count($parents); $i++) {

            ///parents
            $returnhtml[$parents[$i]["id"]] = $parents[$i]["category_name"];
            $cat[$parents[$i]["category_name"]][] = $parents[$i]["category_name"];

            $childs = ProductCategory::model()->findAllByAttributes(['parent' => $parents[$i]["id"]]);
//            echo count($childs).'<br>';
            if (count($childs) > 0) {
                for ($j = 0; $j < count($childs); $j++) {

                    if ($parents[$i]["id"] != $childs[$j]["id"]) {


                        $category = $parents[$i]["category_name"] . ' -> ' . $childs[$j]["category_name"];
                        $returnhtml[$childs[$j]["id"]] = $parents[$i]["category_name"] . "->" . $childs[$j]["category_name"];
                        $cat[$parents[$i]["category_name"]][$j] = $childs[$j]["category_name"];

                        $returnhtml = self::CategoryTrees($childs[$j]["id"], $category, $returnhtml, $cat[$parents[$i]["category_name"]][$j]);
                    }
                }
            }
        }

        return $cat;
    }

    public static function CategoryTrees($id, $category, $html) {
        foreach (ProductCategory::model()->findAllByAttributes(['parent' => $id]) as $child) {
            $category1 = $category . ' -> ' . $child->category_name;
            $html[$child->id] = $category . ' -> ' . $child->category_name;
            $html = self::CategoryTrees($child->id, $category1, $html);
        }
        return $html;
    }

    public static function getPriceList() {
        return array('0 AND 1000' => '0 - 1000', '1001 AND 100000' => '10001 - 100000', '10001 AND 100000' => '10001 - 100000', '100001 AND 1000000' => '100001 - 1000000');
    }

}
