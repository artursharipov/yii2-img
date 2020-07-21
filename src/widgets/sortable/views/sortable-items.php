<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<ul class="sortable">

    <?php foreach($items as $item): ?>
        
            <li class="sorting" data-id="<?=$item->id?>" data-sort="<?=$item->sort?>">
                <img src="<?=$item->src?>" height="<?=$height?>">
                <div class="panel">
                    <span class="glyphicon glyphicon-trash" data-id="<?=$item->id?>" title="Удалить"></span>
                </div>
            </li>
        
    <?php endforeach ?>

</ul>