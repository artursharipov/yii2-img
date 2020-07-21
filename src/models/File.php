<?php

namespace artursharipov\img\models;

use Yii;
/*
    *url - the model property = 'files/page/'
    *hash - the model getter = MD5($this->id."page") 
    *isMain - main image = 1/null 
*/
class File
{    
    //image
	public static function uploadImage($file, $url, $hash, $isMain = null)
	{
        $path = Yii::getAlias('@www');

        $src = self::createSrc($file, $url);

        $file->saveAs($path . $src);

        if($isMain == 1){
            self::deleteRowsDataBase($hash, false);
        }

        self::createRowDataBase($src, $hash, $isMain);
    }

    //images
    public static function uploadImages($files, $url, $hash)
	{
        if(!empty($files) && is_array($files)){
            foreach ($files as $file) {

                self::uploadImage($file, $url, $hash);

            }
        }
    }

    //src file
    private static function createSrc($file, $url)
    {
        return '/' . $url . md5(uniqid($file->baseName)).rand(1, 999) . '.' . $file->extension;
    }

    //delete file
    public static function unlinkFile($src)
    {
        $file = Yii::getAlias('@www') . $src;

        if(file_exists($file)){
            @unlink($file);
        }
    }

    //delete rows
    public static function deleteRowsDataBase($hash, $all = true)
    {
        $query = Img::find()->where(['hash' => $hash]);
        
        if(!$all){
            $query->andWhere(['isMain' => 1]);
        }

        if($images = $query->all()){
            
            foreach($images as $image){
                
                $image->delete();
            }
        }
    }

    //create row
    private static function createRowDataBase($filename, $hash, $isMain)
    {
        $img = new Img;
        $img->hash = $hash;
        $img->src = $filename;
        $img->isMain = $isMain;
        $img->save();
    }
    
}
