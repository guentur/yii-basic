<?php

namespace app\modules\taskmanager\models\section;

use app\modules\taskmanager\models\project\Project;
use app\modules\taskmanager\models\project\ProjectQuery;
use app\modules\taskmanager\models\task\Task;
use app\modules\taskmanager\models\task\TaskQuery;
use Yii;

/**
 * This is the model class for table "{{%section}}".
 *
 * @property int $id
 * @property int|null $project_id
 * @property string|null $title
 * @property string|null $desc
 *
 * @property Project $project
 * @property Task[] $tasks
 */
class Section extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%section}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['project_id'], 'integer'],
            [['desc'], 'string'],
            [['title'], 'string', 'max' => 255],
            [['project_id'], 'exist', 'skipOnError' => true, 'targetClass' => Project::class, 'targetAttribute' => ['project_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'project_id' => Yii::t('app', 'Project ID'),
            'title' => Yii::t('app', 'Title'),
            'desc' => Yii::t('app', 'Desc'),
        ];
    }

    /**
     * Gets query for [[Project]].
     *
     * @return \yii\db\ActiveQuery|\app\modules\taskmanager\models\project\ProjectQuery
     */
    public function getProject()
    {
        return $this->hasOne(Project::class, ['id' => 'project_id']);
    }

    /**
     * Gets query for [[Tasks]].
     *
     * @return \yii\db\ActiveQuery|TaskQuery
     */
    public function getTasks()
    {
        return $this->hasMany(Task::class, ['section_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return SectionQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SectionQuery(get_called_class());
    }
}
