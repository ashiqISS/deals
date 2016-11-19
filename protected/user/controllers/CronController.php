<?php
Yii::import('application.components.Controller');
class CronController extends Controller {

      
public function actionindex() {

$model = new MastersSize;

$model->size = 'AAA';
$model->cb = 2;
$model->doc = date('Y-m-d H:i:s');
$model->save(false);

}

        

}
?>