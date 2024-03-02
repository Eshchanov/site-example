<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Document $model */

$this->title = 'Создать документ';
$this->params['breadcrumbs'][] = ['url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="document-create">

<!--    <h1>--><?php //= Html::encode($this->title) ?><!--</h1>-->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
