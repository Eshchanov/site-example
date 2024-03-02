<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Office */

$this->title = Yii::t('app', 'Ofis o\'zgartirish: {name}', [
    'name' => $model->address,
]);
?>
<div class="office-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
