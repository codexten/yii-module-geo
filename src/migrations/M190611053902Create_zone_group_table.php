<?php

namespace codexten\yii\modules\geo\migrations;

use yii\db\Migration;

/**
 * Handles the creation of table `{{%zone_group}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%zone}}`
 */
class M190611053902Create_zone_group_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%zone_group}}', [
            'id' => $this->primaryKey(),
            'zone_code' => $this->string(50)->notNull(),
            'type' => $this->string(50),
            'group_code' => $this->string(50)
            ,
        ]);

        // creates index for column `zone_code`
        $this->createIndex(
            '{{%idx-zone_group-zone_code}}',
            '{{%zone_group}}',
            'zone_code'
        );

        $this->createIndex(
            '{{%idx-zone_code}}',
            '{{%zone}}',
            'code'
        );

        // add foreign key for table `{{%zone}}`
        $this->addForeignKey(
            '{{%fk-zone_group-zone_code}}',
            '{{%zone_group}}',
            'zone_code',
            '{{%zone}}',
            'code',
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
            '{{%fk-zone_group-zone_code}}',
            '{{%zone_group}}'
        );

        $this->dropForeignKey(
            '{{%idx-zone_code}}',
            '{{%zone}}'
        );

        // drops index for column `zone_code`
        $this->dropIndex(
            '{{%idx-zone_group-zone_code}}',
            '{{%zone_group}}'
        );

        $this->dropTable('{{%zone_group}}');
    }
}
