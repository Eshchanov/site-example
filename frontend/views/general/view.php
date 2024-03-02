<?php

use common\models\General;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $langs common\models\Lang */

$this->title = 'Saytdagi statik ma\'lumotlarni o\'zgartirish';
\yii\web\YiiAsset::register($this);
?>
<div class="general-view">

    <h1>Saytdagi statik ma'lumotlar <?php //= Html::a(Yii::t('app', 'Qo\'shish'), ['create'], ['class' => 'btn btn-success float-right mr-2']) ?></h1>

    <?php foreach ($langs as $lang): $model = General::findOne(['lang' => $lang->id]); if ($model): ?>
    <h3 class="mb-4"><?= $lang->name ?> <?= Html::a(Yii::t('app', 'O\'zgartirish'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary float-right']) ?></h3>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'telegram',
            'instagram',
            'facebook',
            'youtube',
            'call_centre',
            'tel',
            'video',
            'appstore',
            'google_play',
            'bot_name',
            'bot_link',
            'mail',
            'address',
            'hours',
            'about_main:ntext',
            'aim_main:ntext',
            'about_about:ntext',
            'aim_about:ntext',
            'tonn',
            'partners',
            'workers',
            'video_about',
        ],
    ]) ?>
    <?php endif; endforeach; ?>

</div>
