<?php

namespace artursharipov\img\models;

use Yii;

/**
 * This is the model class for table "image".
 *
 * @property int $id
 * @property string $hash
 * @property string $src
 * @property int|null $isMain
 * @property int|null $sort
 * @property string|null $title
 */
class Img extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'img';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['hash', 'src'], 'required'],
            [['isMain', 'sort'], 'integer'],
            [['hash', 'src', 'title'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'hash' => 'Hash',
            'src' => 'Src',
            'isMain' => 'Is Main',
            'sort' => 'Sort',
            'title' => 'Title',
        ];
    }

    public function afterDelete()
    {
        parent::afterDelete();
        
        File::unlinkFile($this->src);
    }

}
