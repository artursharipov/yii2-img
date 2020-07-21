<?php

namespace artursharipov\img\behaviors;

use yii\base\Behavior;
use yii\db\ActiveRecord;
use yii\web\UploadedFile;
use artursharipov\img\models\File;
use artursharipov\img\models\Img;

class ImgBehavior extends Behavior
{
    public $hashClass;
    public $new_img;
    public $new_imgs;
    public $folder_image;
  
    public function events()
    {
        return [
            ActiveRecord::EVENT_AFTER_UPDATE => 'afterSave',
            ActiveRecord::EVENT_AFTER_INSERT => 'afterSave',
            ActiveRecord::EVENT_AFTER_DELETE => 'afterDeleteModel',
        ];
    }

    //events methods
    public function afterSave()
    {
        if($file = UploadedFile::getInstance($this->owner, 'new_img')){
           File::uploadImage($file, $this->folder_image, $this->owner->hash, true);
        }
    
        if($files = UploadedFile::getInstances($this->owner, 'new_imgs')){
            File::uploadImages($files, $this->folder_image, $this->owner->hash);
        }
    }

    public function afterDeleteModel()
    {
        File::deleteRowsDataBase($this->owner->hash);
    }

    //getter methods
    public function getImgGallery()
    {
        return $this->owner->hasMany(Img::className(), ['hash' => 'hash'])->where(['isMain' => null])->orderBy('sort');
    }

    public function getImgMain()
    {
        return $this->owner->hasOne(Img::className(), ['hash' => 'hash'])->where(['isMain' => 1]);
    }

    public function getHash(){
        return MD5($this->owner->id. $this->hashClass);
    }

}

?>