<?php

namespace artursharipov\img\controllers;
use yii\helpers\Json;
use artursharipov\img\models\Img;
use Yii;
use yii\web\Controller;

class ImageController extends Controller
{

    //sorting images in admin panel
    public function actionSort()
    {
        $data = Yii::$app->request->post('data');

        if(!empty($data) && is_array($data)){
            foreach($data as $sort=>$id){

                $img = Img::findOne($id);

                $img->sort = $sort;

                $img->save();

            }
        }     
    }

    //deleting image in admin panel
    public function actionRemove()
    {

        $id = Yii::$app->request->post('id');

        if(!empty($id)){
            
            $img = Img::findOne($id);
            
            $img->delete();
            
        }
    }
}
