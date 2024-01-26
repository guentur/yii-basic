<?php

use app\modules\taskmanager\models\section\Section;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Pjax;

/** @var yii\data\ArrayDataProvider $sectionsDataProvider */
?>

<div class="related-info">

    <h2><?= Html::encode('Sections') ?></h2>

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
