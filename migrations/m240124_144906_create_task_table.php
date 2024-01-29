<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%task}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%section}}`
 */
class m240124_144906_create_task_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%task}}', [
            'id' => $this->primaryKey(),
            'section_id' => $this->integer()->defaultValue(1),
            'title' => $this->string(),
            'desc' => $this->text(),
        ]);

        // creates index for column `section_id`
        $this->createIndex(
            '{{%idx-task-section_id}}',
            '{{%task}}',
            'section_id'
        );

        // add foreign key for table `{{%section}}`
        $this->addForeignKey(
            '{{%fk-task-section_id}}',
            '{{%task}}',
            'section_id',
            '{{%section}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%section}}`
        $this->dropForeignKey(
            '{{%fk-task-section_id}}',
            '{{%task}}'
        );

        // drops index for column `section_id`
        $this->dropIndex(
            '{{%idx-task-section_id}}',
            '{{%task}}'
        );

        $this->dropTable('{{%task}}');
    }
}
