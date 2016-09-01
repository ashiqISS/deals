<?php

class DefaultController extends Controller {

    public function actionIndex() {
        $this->render('index');
    }

    public function actionCrop() {
        Yii::import('admin.extensions.jcrop.EJCropper');
        $jcropper = new EJCropper();
        $jcropper->thumbPath = 'uploads/my/images/thumbs';

// some settings ...
        $jcropper->jpeg_quality = 95;
        $jcropper->png_compression = 8;

// get the image cropping coordinates (or implement your own method)
        $coords = $jcropper->getCoordsFromPost('imageId');

// returns the path of the cropped image, source must be an absolute path.
        $imgUrl = $_GET['imgUrl'];
        $thumbnail = $jcropper->crop($imgUrl, $coords);
//        $thumbnail = $jcropper->crop('/my/images/imageToCrop.jpg', $coords);
    }
    
    public function actionTest()
    {
        $this->render('test');
    }

}

