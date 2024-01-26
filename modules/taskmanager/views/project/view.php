<?php

use app\modules\taskmanager\models\project\Project;
use app\modules\taskmanager\models\section\Section;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;
use yii\widgets\Pjax;

/** @var yii\web\View $this */

/** @var Project $model */
/** @var Section[] $sections */
/** @var app\modules\taskmanager\models\section\SectionSearch $sectionSearchModel */
/** @var yii\data\ArrayDataProvider $sectionsDataProvider */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Projects'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="project-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            'desc:ntext',
        ],
    ]) ?>


    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $sectionsDataProvider,
        'columns' => [
            'id',
            'title',
            'project_id:ntext',
            'desc:ntext',
            [
                'class' => ActionColumn::className(),
                'controller' => 'section',
                'urlCreator' => function ($action, Section $model, $key, $index, $column) {
                    $params = ['id' => (string) $model->id];
                    $params[0] = $column->controller ? $column->controller . '/' . $action : $action;

                    return Url::toRoute($params);
                }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
