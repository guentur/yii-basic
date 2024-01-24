<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%section}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%project}}`
 */
class m240124_143726_create_section_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%section}}', [
            'id' => $this->primaryKey(),
            'project_id' => $this->integer()->defaultValue(1),
            'title' => $this->string(),
            'desc' => $this->text(),
        ]);

        $this->insert('{{%section}}', [
            'title' => 'Default Section',
        ]);

        // creates index for column `project_id`
        $this->createIndex(
            '{{%idx-section-project_id}}',
            '{{%section}}',
            'project_id'
        );

        // add foreign key for table `{{%project}}`
        $this->addForeignKey(
            '{{%fk-section-project_id}}',
            '{{%section}}',
            'project_id',
            '{{%project}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->delete('{{%project}}');

        // drops foreign key for table `{{%project}}`
        $this->dropForeignKey(
            '{{%fk-section-section_id}}',
            '{{%section}}'
        );

        // drops index for column `section_id`
        $this->dropIndex(
            '{{%idx-section-section_id}}',
            '{{%section}}'
        );

        // drops foreign key for table `{{%project}}`
        $this->dropForeignKey(
            '{{%fk-section-project_id}}',
            '{{%section}}'
        );

        // drops index for column `project_id`
        $this->dropIndex(
            '{{%idx-section-project_id}}',
            '{{%section}}'
        );

        $this->dropTable('{{%section}}');
    }
}
