<?php

class UploadFile extends CApplicationComponent {

        public function folderName($min, $max, $id) {
                if ($id > $min && $id < $max) {
                        return $max;
                } else {
                        $xy = $this->folderName($min + 1000, $max + 1000, $id);
                        return $xy;
                }
        }

        public function fileExists($path, $name, $file, $sufix) {

                if (file_exists($path . $name)) {
                        $name = basename($path . $file->name, '.' . $file->extensionName) . '_' . $sufix . '.' . $file->extensionName;
                        return $this->fileExists($path, $name, $file, $sufix + 1);
                } else {
                        return $name;
                }
        }

        public function uploadImage($uploadfile, $id, $foldername = false) {
                if ($foldername) {
                        $folder = $this->folderName(0, 1000, $id) . '/';
                } else {
                        $folder = "";
                }

                if (isset($uploadfile)) {
                        if (Yii::app()->basePath . '/../uploads/products') {
                                chmod(Yii::app()->basePath . '/../uploads/products', 0777);
                                if ($foldername) {
                                        if (!is_dir(Yii::app()->basePath . '/../uploads/products/' . $folder))
                                                mkdir(Yii::app()->basePath . '/../uploads/products/' . $folder);
                                        chmod(Yii::app()->basePath . '/../uploads/products/' . $folder . '/', 0777);

                                        if (!is_dir(Yii::app()->basePath . '/../uploads/products/' . $folder . '/' . $id))
                                                mkdir(Yii::app()->basePath . '/../uploads/products/' . $folder . '/' . $id);
                                        chmod(Yii::app()->basePath . '/../uploads/products/' . $folder . '/' . $id . '/', 0777);
                                }
                                if ($uploadfile->saveAs(Yii::app()->basePath . '/../uploads/products/' . $folder . '/' . $id . '/main.' . $uploadfile->extensionName)) {
                                        chmod(Yii::app()->basePath . '/../uploads/products/' . $folder . '/' . $id . '/', 0777);
                                }
                        }
                }
        }

        public function uploadAdImage1($uploadfile, $id, $foldername = false, $dimensions = array()) {

                if ($foldername) {
                        $folder = $this->folderName(0, 1000, $id) . '/';
                } else {
                        $folder = "";
                }

                if (isset($uploadfile)) {

                        if (Yii::app()->basePath . '/../uploads/ads') {
                                chmod(Yii::app()->basePath . '/../uploads/ads', 0777);
                                if ($foldername) {
                                        if (!is_dir(Yii::app()->basePath . '/../uploads/ads/' . $folder))
                                                mkdir(Yii::app()->basePath . '/../uploads/ads/' . $folder);
                                        chmod(Yii::app()->basePath . '/../uploads/ads/' . $folder . '/', 0777);

                                        if (!is_dir(Yii::app()->basePath . '/../uploads/ads/' . $folder . '/' . $id))
                                                mkdir(Yii::app()->basePath . '/../uploads/ads/' . $folder . '/' . $id);
                                        chmod(Yii::app()->basePath . '/../uploads/ads/' . $folder . '/' . $id . '/', 0777);
                                }
                                if ($uploadfile->saveAs(Yii::app()->basePath . '/../uploads/ads/' . $folder . '/' . $id . '/' . $id . '.' . $uploadfile->extensionName)) {
                                        chmod(Yii::app()->basePath . '/../uploads/ads/' . $folder . '/' . $id . '/' . $id . '.' . $uploadfile->extensionName, 0777);
                                        //$this->WaterMark(Yii::app()->basePath . '/../uploads/products/' . $folder . '/' . $id . '/' . $id . '.' . $uploadfile->extensionName, '/../images/watermark.png');

                                        $file = Yii::app()->basePath . '/../uploads/ads/' . $folder . '/' . $id . '/' . $id . '.' . $uploadfile->extensionName;
                                        $path = Yii::app()->basePath . '/../uploads/ads/' . $folder . '/' . $id;
                                        if (!empty($dimensions)) {
                                                foreach ($dimensions as $dimension) {
                                                        $this->Resize($file, $dimension['width'], $dimension['height'], $dimension['name'], $path, $uploadfile->extensionName);
                                                }
                                        }
                                }
                        }
                }
        }

        public function uploadMultipleImage($uploadfile, $id, $foldername = false) {
                if ($foldername) {
                        $folder = $this->folderName(0, 1000, $id) . '/';
                } else {
                        $folder = "";
                }
                foreach ($uploadfile as $upload) {
                        if (isset($upload)) {
                                if (Yii::app()->basePath . '/../uploads/products') {
                                        chmod(Yii::app()->basePath . '/../uploads/products', 0777);
                                        if ($foldername) {
                                                if (!is_dir(Yii::app()->basePath . '/../uploads/products/' . $folder))
                                                        mkdir(Yii::app()->basePath . '/../uploads/products/' . $folder);
                                                chmod(Yii::app()->basePath . '/../uploads/products/' . $folder . '/', 0777);

                                                if (!is_dir(Yii::app()->basePath . '/../uploads/products/' . $folder . '/' . $id))
                                                        mkdir(Yii::app()->basePath . '/../uploads/products/' . $folder . '/' . $id);
                                                chmod(Yii::app()->basePath . '/../uploads/products/' . $folder . '/' . $id . '/', 0777);

                                                if (!is_dir(Yii::app()->basePath . '/../uploads/products/' . $folder . '/' . $id . '/gallery/'))
                                                        mkdir(Yii::app()->basePath . '/../uploads/products/' . $folder . '/' . $id . '/gallery/');
                                                chmod(Yii::app()->basePath . '/../uploads/products/' . $folder . '/' . $id . '/gallery/', 0777);
                                        }
                                        $path = Yii::app()->basePath . '/../uploads/products/' . $folder . '/' . $id . '/' . '/gallery/';

                                        $picname = $this->fileExists($path, $upload->name, $upload, 1);

                                        if ($upload->saveAs(Yii::app()->basePath . '/../uploads/products/' . $folder . '/' . $id . '/gallery/' . $picname)) {
                                                //chmod(Yii::app()->basePath . '/../uploads/products/' . $folder . '/gallery/' . '/', 0777);
                                        }
                                }
                        }
                }
        }

        public function Resize($file, $width, $height, $name, $path, $extension) {
//                var_dump($file);
////                exit;
                $resize = new EasyImage($file);
                $resize->resize($width, $height, EasyImage::RESIZE_NONE);
                $resize->save($path . '/' . $name . '.' . $extension);
        }

}

?>
