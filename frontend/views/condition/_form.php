<?php

use common\models\Lang;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Condition */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="condition-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'condition')->textarea(['class' => 'ckeditor']) ?>

    <?= $form->field($model, 'lang')->dropDownList(ArrayHelper::map(Lang::find()->all(), 'id', 'name')) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Saqlash'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
