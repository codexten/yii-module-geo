<?php

namespace codexten\yii\modules\geo\migrations;

use yii\db\Migration;

/**
 * Handles the creation of table `{{%province}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%country}}`
 */
class M190606135538Create_province_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%province}}', [
            'id' => $this->primaryKey(),
            'country_id' => $this->integer()->notNull(),
            'code' => $this->string(50),
            'name' => $this->string(255),
            'abbreviation' => $this->string(255)
,
        ]);

        // creates index for column `country_id`
        $this->createIndex(
            '{{%idx-province-country_id}}',
            '{{%province}}',
            'country_id'
        );

        // add foreign key for table `{{%country}}`
        $this->addForeignKey(
            '{{%fk-province-country_id}}',
            '{{%province}}',
            'country_id',
            '{{%country}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%country}}`
        $this->dropForeignKey(
            '{{%fk-province-country_id}}',
            '{{%province}}'
        );

        // drops index for column `country_id`
        $this->dropIndex(
            '{{%idx-province-country_id}}',
            '{{%province}}'
        );

        $this->dropTable('{{%province}}');
    }
}
