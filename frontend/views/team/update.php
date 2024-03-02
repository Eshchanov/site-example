<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Team */

$this->title = Yii::t('app', 'Mutaxassis o\'zgartirish: {name}', [
    'name' => $model->name,
]);
?>
<div class="team-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
