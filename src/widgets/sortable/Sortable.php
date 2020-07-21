<?php

namespace artursharipov\img\widgets\sortable;
use Yii;
use yii\base\Widget;
use yii\web\View;

class Sortable extends Widget
{
    public $items;
    public $height = 100;
    public $template;
    
    public function init()
    {
        parent::init();

        SortableAsset::register($this->getView());

        $this->template = is_array($this->items) ? 'sortable-items' : 'sortable-item';
    }
    
    public function run()
    {
        if(!empty($this->items)){
            return $this->render($this->template, [
                'height'=>$this->height,
                'items'=>$this->items,
            ]);
        }

    }
    
}

?>