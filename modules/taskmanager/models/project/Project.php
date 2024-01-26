<?php

namespace app\modules\taskmanager\models\project;

use app\modules\taskmanager\models\section\Section;
use app\modules\taskmanager\models\SectionQuery;
use Yii;

/**
 * This is the model class for table "yii_project".
 *
 * @property int $id
 * @property string $title
 * @property string|null $desc
 *
 * @property \app\modules\taskmanager\models\section\Section[] $sections
 */
class Project extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'yii_project';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['desc'], 'string'],
            [['title'], 'string', 'max' => 255],
            [['title'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'Title'),
            'desc' => Yii::t('app', 'Desc'),
        ];
    }

    /**
     * Gets query for [[Sections]].
     *
     * @return \yii\db\ActiveQuery|SectionQuery
     */
    public function getSections()
    {
        return $this->hasMany(Section::class, ['project_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return ProjectQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ProjectQuery(get_called_class());
    }
}
