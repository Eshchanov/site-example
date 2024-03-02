<?php
    use yii\helpers\ArrayHelper;
    use yii\helpers\Html;
    use yii\helpers\Url;
    use common\widgets\Alert;
    use yii\bootstrap4\ActiveForm;
    use yii\widgets\Pjax;
?>
<style type="text/css">
    .btn-sm {
        margin-bottom: 0;
        padding: 7px 10px;
        font-size: 14px;
    }
</style>
<?php Pjax::begin(['id' => 'id-call-back']) ?>
<?php $form = ActiveForm::begin([
    'id' => 'call-back-form',
    'action' => Url::to(['/site/call-back']),
    'enableAjaxValidation' => true,
]); ?>
    <?= $form->field($model, 'name')->textInput(['class' => '']) ?>
    <?= $form->field($model, 'phone')->textInput(['class' => '']) ?>
    <?php //= $form->field($model, 'captcha')->widget(\yii\captcha\Captcha::className(), [
        // 'options' => [
        //     'class' => '',
        //     'style' => 'margin-bottom: 0;'
        // ],
        // 'template' => '<div class="row"><div class="col-lg-4" style="padding-right: 0; padding-top: 10px; margin-right: -20px;">{image}</div><div class="col-lg-8" style="padding: 0;">{input}</div></div>',
    // ])->label(false)->hint(Yii::t('app', 'Hint: click on the equation to refresh')) ?>
    <button type="submit" class="submit-btn btn-success btn-sm"><?= Yii::t('app', 'send')?></button>
    <div style="clear: both;"></div>
<?php ActiveForm::end(); ?>
<?php Pjax::end() ?>
<?php
    $this->registerJs("
        $('#callback-phone').mask('+998 00 000-00-00');
    ");
?>