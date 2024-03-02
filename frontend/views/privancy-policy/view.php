<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\PrivancyPolicy */
/* @var $langs common\models\Lang */

$this->title = Yii::t('app', 'privancies');
\yii\web\YiiAsset::register($this);
?>
<div class="privancy-policy-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php foreach ($langs as $lang): $model = \common\models\PrivancyPolicy::findOne(['lang' => $lang->id]); if ($model): ?>
    <h3 class="mb-4">
        <?= $lang->name ?>
        <?= Html::a(Yii::t('app', 'Shartlarni o\'zgartirish'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary float-right']) ?>
    </h3>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'text:ntext',
        ],
    ]) ?>
    <?php endif; endforeach; ?>

</div>
