<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Handles the creation of table `{{%project}}`.
 * yii migrate/create create_task_table --fields="section_id:integer:defaultValue(1):foreignKey,title:string,desc:text"
 * yii migrate/create create_section_table --fields="section_id:integer:notNull:foreignKey(project),project_id:integer:defaultValue(1):foreignKey,title:string,desc:text"

 */
class m240124_135657_create_project_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%project}}', [
            'id' => $this->primaryKey(),
            'title' => Schema::TYPE_STRING . ' NOT NULL UNIQUE',
            'desc' => Schema::TYPE_TEXT,
        ]);

        $this->insert('{{%project}}', [
            'title' => 'Bulk project',
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->delete('{{%project}}');
        $this->dropTable('{{%project}}');
    }
}
