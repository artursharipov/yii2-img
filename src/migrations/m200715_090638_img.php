<?php

use yii\db\Migration;

/**
 * Class m200715_090638_img
 */
class m200715_090638_img extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%img}}', [
            'id' => $this->primaryKey(),
            'hash' => $this->string()->notNull(),
            'src' => $this->string()->notNull(),
            'isMain' => $this->smallInteger()->Null(),
            'sort' => $this->smallInteger()->Null(),
            'title' => $this->string()->Null(),
            'hash' => $this->string()->Null(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%img}}');
    }

}
