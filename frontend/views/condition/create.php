<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Condition */

$this->title = Yii::t('app', 'Yetkazib berish shartlari qo\'shish');
?>
<div class="condition-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
