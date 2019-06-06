<?php

namespace codexten\yii\modules\geo\migrations;

use yii\db\Migration;

/**
 * Handles the creation of table `{{%zone}}`.
 */
class M190502075526Create_zone_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%zone}}', [
            'id' => $this->primaryKey(),
            'code' => $this->string(50),
            'name' => $this->string(255),
            'type' => $this->string(50),
            'scope' => $this->string(255)
            ,
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%zone}}');
    }
}
