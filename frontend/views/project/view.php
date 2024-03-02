<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $model common\models\Project */
/* @var $searchModel common\models\ProjectImageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = $model->name;
\yii\web\YiiAsset::register($this);
?>
<style>
    .project-view a {
        display: inline-block;
    }
    .project-view img {
        height: 200px;
        width: auto;
    }
</style>
<div class="project-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'O\'zgartirish'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'O\'chirish'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'O\'chirishga ishonchingiz komilmi?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'name',
            'direction',
            'duration',
            'weight',
        ],
    ]) ?>

    <h1>Proekt rasmlari <?= Html::a(Yii::t('app', 'Qo\'shish'), ['project-image/create', 'id' => $model->id], ['class' => 'btn btn-success float-right']) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],


            [
                'attribute' => 'image',
                'value' => function ($data) {
                    return "<img src='/img/projects/".$data->image."'>";
                },
                'format' => "html",
            ],

            ['class' => 'yii\grid\ActionColumn', 'controller' => 'project-image'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
