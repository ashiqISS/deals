<?php

class BargainController extends Controller {

    public function actionIndex() {
        $this->render('index');
    }

    public function actionAdmin() {
        $model = new Products('bargains');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Products']))
            $model->attributes = $_GET['Products'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

}
