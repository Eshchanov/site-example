<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Condition */

$this->title = Yii::t('app', 'Yetkazib berish shartlari o\'zgartirish: {name}', [
    'name' => $model->name,
]);
?>
<div class="condition-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
