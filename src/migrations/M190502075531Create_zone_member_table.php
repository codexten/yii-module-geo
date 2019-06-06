<?php

namespace codexten\yii\modules\geo\migrations;

use yii\db\Migration;

/**
 * Handles the creation of table `{{%zone_member}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%zone}}`
 */
class M190502075531Create_zone_member_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%zone_member}}', [
            'id' => $this->primaryKey(),
            'zone_id' => $this->integer()->notNull(),
            'code' => $this->string(50)
            ,
        ]);

        // creates index for column `zone_id`
        $this->createIndex(
            '{{%idx-zone_member-zone_id}}',
            '{{%zone_member}}',
            'zone_id'
        );

        // add foreign key for table `{{%zone}}`
        $this->addForeignKey(
            '{{%fk-zone_member-zone_id}}',
            '{{%zone_member}}',
            'zone_id',
            '{{%zone}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%zone}}`
        $this->dropForeignKey(
            '{{%fk-zone_member-zone_id}}',
            '{{%zone_member}}'
        );

        // drops index for column `zone_id`
        $this->dropIndex(
            '{{%idx-zone_member-zone_id}}',
            '{{%zone_member}}'
        );

        $this->dropTable('{{%zone_member}}');
    }
}
