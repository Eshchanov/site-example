<?php

use kartik\date\DatePicker;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Document $model */
/** @var yii\widgets\ActiveForm $form */

$typeList = [
        'umumiy-shartlar'=>'BTSning umumiy shartlari',
        'xizmatlarining-tarif-karta'=>'BTS xizmatlarining tarif kartasi',
        'ommaviy-oferta-shartnoma'=>'BTS Ommaviy Oferta Shartnomasi',
        'express-shartnoma'=>'BTS Express shartnomasi',
        'etiroz-dalolatnoma'=>'BTS E\'tiroz dalolatnomasi',
];
$slugList = [
    1=>'umumiy-shartlar',
    2=>'xizmatlarining-tarif-karta',
    3=>'ommaviy-oferta-shartnoma',
    4=>'express-shartnoma',
    5=>'etiroz-dalolatnoma',
]
?>
<style>
    input[type=text], input[type=number], input[type=password], select {
        border: 1px solid #c2c5cc;
        width: 180px;
        padding: 5px;
    }
</style>
<div class="document-form" >
    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
    <div class="row">
        <div class="col-md-3">
            <?= $form->field($model, 'type')->dropDownList($typeList) ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'active')->dropDownList([1=>'Актив',0=>'Неактив']) ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'lang')->dropDownList(['uz'=>'Uz','ru'=>'Ru','en'=>'En']) ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'c_order')->textInput() ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'date')->widget(DatePicker::classname(), [
                'pluginOptions' => [
                    'autoclose' => true,
                    'format' => 'dd.mm.yyyy',
                    'placeholder'=>'Kiritilgan vaqtdan boshlab ishlaydi'
                ],
                'options' => [
                    'class' => '',
                ],
                'addInputCss' => '',
            ]); ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'file')->fileInput(['maxlength' => true]) ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Добавит', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
