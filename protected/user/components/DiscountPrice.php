<?php

class DiscountPrice extends CApplicationComponent {

        public function Discount($model) {

                //discount rate value not equal to null//

                if ($model->is_discount_available == 1) {
                        $value = $this->DiscountType($model);
                        return Yii::app()->Currency->convert($value);
                } else {
                        return Yii::app()->Currency->convert($model->price);
                }
        }

        public function DiscountCart($model, $qty) {

                //discount rate value not equal to null//

                if ($model->is_discount_available == 1) {
                        $value = $this->DiscountType($model);
                        $newvalue = $value * $qty;
                        return Yii::app()->Currency->convert($newvalue);
                } else {
                        $newvalue = $model->price * $qty;
                        return Yii::app()->Currency->convert($model->price);
                }
        }

        public function DiscountAmount($model) {

                //discount rate value not equal to null//
                if ($model->is_discount_available == 1) {
                        $value = $this->DiscountType($model);
                        return $value;
                } else {
                        return $model->price;
                }
        }

        public function DiscountType($data) {
                date_default_timezone_set('Asia/Kolkata');
                $date = date('Y-m-d');
                if ($data->discount_type == 1) {     // type of discount wether its flat on percetange
                        if ($data->product_type == 4) {  // the value 4 is baragain products
                                if (($date > $data->special_price_to)) {
                                        $criteria = new CDbCriteria;
                                        $criteria->select = '*,MAX(bidd_amount) ';
                                        $bargained_rate = BargainDetails::model()->find($criteria);
                                        if (!empty($bargained_rate)) {
                                                Products::model()->updateAll(array("bidded_amount" => $bargained_rate->bidd_amount), 'id = ' . $data->id);
                                                $discountRate = $bargained_rate->bidd_amount;
                                        } else {
                                                $discountRate = $data->bargain_price;
                                        }
                                } else {
                                        $discountRate = $data->bargain_price;
                                }
                        } else {
                                $discountRate = $data->price - $data->discount;
                        }
                } else {
                        $discountRate = $data->price - ( $data->price * ($data->discount / 100));
                }
                return $discountRate;
        }

        public function checks($model) {
                if ($data->stock_availability == 1) {
                        $new_from = $model->new_from;
                        $new_to = $model->new_to;
                        $today = date('Y-m-d');
                        if (strtotime($new_from) <= strtotime($today) && strtotime($new_to) >= strtotime($today)) {
                                echo '<span class="label label-danger">New </span> &nbsp';
                        }
                        $sale_from = $model->sale_from;
                        $sale_to = $model->sale_to;

                        if (strtotime($sale_from) <= strtotime($today) && strtotime($sale_to) >= strtotime($today)) {
                                echo '<span class = "label label-warning">Sale</span>';
                        }
                } else {
                        echo '';
                }
        }

}

?>