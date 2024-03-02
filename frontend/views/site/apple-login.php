<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model \common\models\LoginForm */

use common\widgets\Alert;
use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;
use yii\helpers\Url;
use frontend\widgets\Wlang;

$this->title = Yii::t('app', 'login');
$this->params['breadcrumbs'][] = $this->title;
?>
<style type="text/css">
    .sign-in {
        height: auto;
        padding: 30px 0;
    }
    .alert-dismissible .close {
        padding: 7px 14px;
    }
    .lang-selector {
    }
    .dropdown-toggle {
        padding: 7px 15px;
        border: 1px solid #777777;
        border-radius: 3px;
    }
</style>
<section class="sign-in login">
    <div class="container">
        <div class="row justify-content-center">
            <div class="sign-in-body">
                <div style="display: flex; align-items: end; justify-content: flex-end; margin-bottom: 20px;">
                    <?= WLang::widget();?>
                </div>
                <h2 class="title"><?= Yii::t('app', 'delete_account_title')?></h2>
                <?= Alert::widget() ?>
                <p class="subtitle"><?= Yii::t('app', 'delete_account_description')?></p>
                <?php $form = ActiveForm::begin(['id' => 'login-form', 'class' => 'calc-form']); ?>
                    <?= $form->field($model, 'phone')->textInput(['class' => '']) ?>
                    <?php //= $form->field($model, 'password')->passwordInput(['class' => '']) ?>
                    <?= $form->field($model, 'captcha')->widget(\yii\captcha\Captcha::className(), [
                        'options' => [
                            'class' => '',
                            'style' => 'margin-bottom: 0;'
                        ],
                        'template' => '<div class="row"><div class="col-lg-4" style="padding-right: 0; padding-top: 10px; margin-right: -20px;">{image}</div><div class="col-lg-8" style="padding: 0;">{input}</div></div>',
                    ])->label(false) ?>
                    <button type="submit" class="submit-btn btn-success" style="float: none;"><?= Yii::t('app', 'login')?></button>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</section>
<?php
    $this->registerJs("
        $('#login-phone').mask('+998 00 000-00-00');
        $('.submit-btn').click(function(){
            $(this).css('display', 'none');
        });
    ");
?>