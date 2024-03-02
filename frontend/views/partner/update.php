<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Partner */

$this->title = Yii::t('app', 'Hamkor o\'zgartirish: {name}', [
    'name' => $model->id,
]);
?>
<div class="partner-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
