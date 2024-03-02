<?php

use common\models\Lang;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\General */

$this->title = Yii::t('app', 'Create General');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Generals'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="general-create">
    <h1><?= Html::encode($this->title) ?></h1>

    <div class="general-form">

        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'telegram')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'instagram')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'facebook')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'youtube')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'call_centre')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'tel')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'video')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'appstore')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'google_play')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'bot_name')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'bot_link')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'mail')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'hours')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'about_main')->textarea(['class' => 'ckeditor']) ?>

        <?= $form->field($model, 'aim_main')->textarea(['class' => 'ckeditor']) ?>

        <?= $form->field($model, 'about_about')->textarea(['class' => 'ckeditor']) ?>

        <?= $form->field($model, 'aim_about')->textarea(['class' => 'ckeditor']) ?>

        <?= $form->field($model, 'tonn')->textInput() ?>

        <?= $form->field($model, 'partners')->textInput() ?>

        <?= $form->field($model, 'workers')->textInput() ?>

        <?= $form->field($model, 'video_about')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'lang')->dropDownList(ArrayHelper::map(Lang::find()->all(), 'id', 'name')) ?>

        <div class="form-group">
            <?= Html::submitButton(Yii::t('app', 'Saqlash'), ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>
