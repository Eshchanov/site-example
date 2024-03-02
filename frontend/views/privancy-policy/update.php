<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\PrivancyPolicy */

$this->title = Yii::t('app', 'Shartlarni o\'zgartirish');
?>
<div class="privancy-policy-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
