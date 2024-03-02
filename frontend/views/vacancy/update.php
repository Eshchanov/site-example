<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Vacancy */

$this->title = Yii::t('app', 'Bo\'sh ish o\'rin o\'zgartirish: {name}', [
    'name' => $model->name,
]);
?>
<div class="vacancy-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
