<?php
    use yii\helpers\Url;
    use common\widgets\Alert;
    use yii\bootstrap4\Html;
    use yii\bootstrap4\ActiveForm;

    $this->title = Yii::t('app', 'signup');
    $this->params['breadcrumbs'][] = $this->title;
?>
<style type="text/css">
    .sign-up {
        height: auto;
        padding: 30px 0;
    }
    .sign-up .submit-btn {
        margin-bottom: 40px;
    }
    .sign-up .sign-up-body .req {
        margin-bottom: 0;
    }
    .alert-dismissible .close {
        padding: 7px 14px;
    }
</style>
<section class="sign-up">
    <div class="container">
        <div class="row justify-content-center">
            <div class="sign-up-body">
                <h2 class="title"><?= Yii::t('app', 'signup')?></h2>
                <?= Alert::widget() ?>
                <p class="subtitle"><?= Yii::t('app', 'signup_info')?></p>
                <?php $form = ActiveForm::begin(['id' => 'form-signup', 'class' => 'calc-form']); ?>

                    <?= $form->field($model, 'name')->textInput(['class' => '']) ?>
                    <?= $form->field($model, 'phone')->textInput(['class' => 'phone-mask']) ?>
                    <?= $form->field($model, 'username')->textInput(['class' => '']) ?>
                    <?= $form->field($model, 'password')->passwordInput(['class' => '']) ?>
                    <?= $form->field($model, 'repassword')->passwordInput(['class' => '']) ?>
                    <?= $form->field($model, 'captcha')->widget(\yii\captcha\Captcha::className(), [
                        'options' => [
                            'class' => '',
                            'style' => 'margin-bottom: 0;'
                        ],
                        'template' => '<div class="row"><div class="col-lg-4" style="padding-right: 0; padding-top: 10px; margin-right: -20px;">{image}</div><div class="col-lg-8" style="padding: 0;">{input}</div></div>',
                    ])->label(false)->hint(Yii::t('app', 'Hint: click on the equation to refresh')) ?>

                    <p class="req"><span class="requried">*</span> <?= Yii::t('app', 'star') ?></p>
                    <div class="policy">
                        <div class="chexbox-block">
                            <input name="" type="checkbox" id="agreement">
                            <label for="agreement"><?= Html::a(Yii::t('app', 'agreement'), ['site/privancy']) ?></label>
                        </div>
                    </div>
                    <button type="submit" class="submit-btn btn-disable" disabled><?= Yii::t('app', 'signup') ?></button>
                <?php ActiveForm::end(); ?>
                <p class="req">
                    <a href="<?= Url::to(['/site/login']) ?>">
                        <?= Yii::t('app', 'I have an account')?>
                    </a>
                </p>
            </div>
        </div>
    </div>
</section>

<?php
$this->registerJs("
    $('#agreement').click(function(){
        var isChecked = $(this).prop('checked');
        if (isChecked) {
            $('.submit-btn').removeClass('btn-disable').removeAttr('disabled');
        } else {
            $('.submit-btn').addClass('btn-disable').attr('disabled', '');
        }
    });
")
?>