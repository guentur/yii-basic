<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "table_name".
 *
 * @property int|null $column_name
 * @property int|null $column_name2
 */
class TableName extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     * pjax
     * project
     *      sprint
     *          task
     */
    public static function tableName()
    {
        return '{{%table_name}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['column_name', 'column_name2'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'column_name' => Yii::t('app', 'Column Name'),
            'column_name2' => Yii::t('app', 'Column Name2'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return TableNameQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TableNameQuery(get_called_class());
    }
}
