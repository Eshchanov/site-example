<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Project */

$this->title = Yii::t('app', 'Proekt qo\'shish');
?>
<div class="project-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
