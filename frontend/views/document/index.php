<?php

use common\models\Document;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var frontend\models\DocumentSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */
$typeList = [
    'umumiy-shartlar'=>'BTSning umumiy shartlari',
    'xizmatlarining-tarif-karta'=>'BTS xizmatlarining tarif kartasi',
    'ommaviy-oferta-shartnoma'=>'BTS Ommaviy Oferta Shartnomasi',
    'express-shartnoma'=>'BTS Express shartnomasi',
    'etiroz-dalolatnoma'=>'BTS E\'tiroz dalolatnomasi',
];
$this->title = 'документ';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="document-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            'lang',
            'c_order',
            'date',
            [
                    'attribute'=>'type',
                'value'=> function($model) use($typeList){
                    return $typeList[$model->type];
                },
            ],
            //'created',
            //'active',
            //'slug',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Document $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
