<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\OfficeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Ofislar');
?>
<div class="office-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Ofis qo\'shish'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'address',
            'destination',
            'tel',
            [
                'attribute' => 'region',
                'value' => function ($data) {
                    return \common\models\Region::findOne($data->region)->name;
                },
                'filter' => \yii\helpers\ArrayHelper::map(\common\models\Region::find()->where(['lang' => \common\models\Lang::getCurrent()])->all(), 'id', 'name')
            ],
            [
                'attribute' => 'lang',
                'value' => function ($data) {
                    return \common\models\Lang::findOne($data->lang)->name;
                },
                'filter' => \yii\helpers\ArrayHelper::map(\common\models\Lang::find()->all(), 'id', 'name')
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
