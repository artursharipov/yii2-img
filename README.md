yii2-img
=================

Расширение предназначено для использования в модели в которой нужны основные изображения и дополнительные, которые можно сортировать с помощью jquery-ui. Все изображения хранятся в базе данных. 
  
Установка
------------------
* Установка пакета с помощью Composer
```
composer require artursharipov/img

```

* Выполнить миграцию для создания нужной таблицы в базе данных (консоль):
```
yii migrate --migrationPath=@artursharipov/img/migrations --interactive=0

```

Использование
------------------

В модель (для каждой модели hashKlass уникальный): 

```php

public function behaviors()
{
    return [
        'img' => [
            'class' => \artursharipov\img\behaviors\ImgBehavior::className(),
            'hashClass' => "Klass",
            'folder_image' => 'files/',
        ],
    ];
}

```

В вид (добавление галереи):

```php

$form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]);

    echo \artursharipov\img\widgets\sortable\Sortable::widget(['items'=>$model->imgGallery]);

    echo $form->field($model, 'new_imgs[]')->fileInput(['accept' => 'image/*', 'multiple'=>true]);

ActiveForm::end();

```

В вид (добавление одиночного изображения):

```php

$form = ActiveForm::begin();

    echo \artursharipov\img\widgets\sortable\Sortable::widget(['items'=>$model->imgMain]);

    echo $form->field($model, 'new_img')->fileInput(['accept' => 'image/*']);

ActiveForm::end();

```

Получение картинок
------------------

```php

//get all images for model
$model->imgGallery

//get one images for model
$model->imgMain
```


Мой блог: [artursharipov.ru](http://artursharipov.ru)  