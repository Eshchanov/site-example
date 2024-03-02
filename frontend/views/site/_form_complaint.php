<?php
    use yii\bootstrap4\Html;
    use yii\bootstrap4\ActiveForm;
    use yii\helpers\Url;

    if (isset($userProfile['name'])) {
        $model->name = $userProfile['name'];
    }
    if (isset($userProfile['phone'])) {
        $model->phone = $userProfile['phone'];
    }
?>
<?php $form = ActiveForm::begin([
    'action' => '/site/complaint',
    'id' => 'login-form',
    'class' => 'calc-form'
]); ?>
    <?= $form->field($model, 'name')->textInput(['class' => '']) ?>
    <?= $form->field($model, 'phone')->textInput(['class' => '', 'readonly' => true]) ?>
    <?= $form->field($model, 'type')->dropDownList($meetingCategory, ['class' => '', 'prompt' => '---']) ?>
    <?= $form->field($model, 'message')->textarea(['class' => '', 'rows' => 2]) ?>
    <?php //= $form->field($model, 'captcha')->widget(\yii\captcha\Captcha::className(), [
    //     'options' => [
    //         'class' => '',
    //         'style' => 'margin-bottom: 0;'
    //     ],
    //     'template' => '<div class="row" style="margin-bottom: 0;"><div class="col-lg-4 text-right">{image}</div><div class="col-lg-8">{input}</div></div>',
    // ])->hint(Yii::t('app', 'Hint: click on the equation to refresh')) ?>
    <div class="ps">
        <span class="requried">*</span> <?= Yii::t('app', 'must') ?>
    </div>
    <div class="text-right">
        <button type="submit" class="submit-btn btn-success" style="float: none; margin-bottom: 0;"><?= Yii::t('app', 'send')?></button>
    </div>
<?php ActiveForm::end(); ?>