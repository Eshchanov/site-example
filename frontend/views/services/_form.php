<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Services */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="services-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'image')->fileInput() ?>

    <?= $form->field($model, 'image_home')->fileInput() ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'text')->textarea(['class' => 'ckeditor']) ?>

    <?= $form->field($model, 'info')->textarea(['class' => 'ckeditor']) ?>

    <?= $form->field($model, 'lang')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\Lang::find()->all(), 'id', 'name')) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Saqlash'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
