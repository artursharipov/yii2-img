<?php

namespace artursharipov\img\widgets\sortable;

use yii\web\AssetBundle;

class SortableAsset extends AssetBundle
{
    public $sourcePath = '@vendor/artursharipov/img/src/widgets/sortable/assets';

    public $css = [
        'sortable.css',
    ];

    public $js = [
        'jquery-ui-sortable.min.js',
        'sortable.js',
    ];

    public $depends = [
        '\yii\web\JqueryAsset',
    ];
}
?>