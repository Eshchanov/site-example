<?php
    use common\models\General;
    use common\models\Lang;
    use common\widgets\Alert;
    use yii\bootstrap4\Html;
    use yii\bootstrap4\ActiveForm;
    use yii\helpers\Url;

$this->title = Yii::t('app', 'contact');
$this->params['breadcrumbs'][] = $this->title;

$general = General::find()->where(['lang' => Lang::getCurrent()])->one();
?>
<style type="text/css">
    .page-wrap .sidebar ul li.active a {
        color: #ee6800;
    }
    @media screen and (max-width: 768px) {
        .page-wrap .sidebar ul {
            padding: 12px 15px;
        }
    }
</style>
<section class="page-wrap">
    <div class="container-xl">
        <div class="row">
            <div class="breadcrumbs">
                <ul>
                    <li>
                        <?= Html::a(Yii::t('app', 'home'), ['site/index'])?>
                    </li>
                    <li>
                        <?= Html::a(Yii::t('app', 'about'), ['site/about'])?>
                    </li>
                    <li>
                        <?= Html::a(Yii::t('app', 'contact'), ['site/contact'])?>
                    </li>
                </ul>
            </div>
            <div class="col-md-3 col-lg-3">
                <div class="sidebar">
                    <ul>
                        <li class="active">
                            <?= Html::a(Yii::t('app', 'contact'), ['site/contact'])?>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-9 col-lg-9">
                <div class="primary">
                    <div class="primary_title">
                        <h2><?= Yii::t('app', 'contact') ?></h2>
                    </div>
                    <div class="row">
                        <div class="col-md-3 col-lg-3">
                            <div class="contact-body">
                                <div class="contact-icon">
                                    <div class="icon _iconmap"></div>
                                    <span><?= Yii::t('app', 'address') ?>:</span>
                                </div>
                                <span><?= $general->address ?></span>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3">
                            <div class="contact-body">
                                <div class="contact-icon">
                                    <div class="icon _iconphone-1"></div>
                                    <span><?= Yii::t('app', 'phone') ?>:</span>
                                </div>
                                <span> <a href="tel:<?= $general->call_centre ?>"><?= $general->call_centre ?></a> , <a href="tel:<?= $general->tel ?>"><?= $general->tel ?></a></span>
                            </div>
                        </div>
                        <div class="col-md-2 col-lg-2">
                            <div class="contact-body">
                                <div class="contact-icon">
                                    <div class="icon _iconmail"></div>
                                    <span><?= Yii::t('app', 'mail') ?>:</span>
                                </div>
                                <span> <a href="mailto:info@bts.uz"><?= $general->mail ?></a></span>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3">
                            <div class="contact-body">
                                <div class="contact-icon">
                                    <div class="icon _icontime"></div>
                                    <span><?= Yii::t('app', 'hours') ?>:</span>
                                </div>
                                <span><?= $general->hours ?></span>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="primary_title">
                        <h2><?= Yii::t('app', 'leave_feedback') ?></h2>
                    </div>
                    <?= Alert::widget() ?>
                    <p><?= Yii::t('app', 'leave_feedback_and_we_contact') ?></p>
                    <div class="row">
                        <div class="col-md-12 col-lg-12">

                            <?php $form = ActiveForm::begin(['id' => 'login-form', 'class' => 'calc-form']); ?>
                                <div class="row">
                                    <div class="col-md-8 col-lg-8">
                                        <div class="row">
                                            <div class="col-md-4 col-lg-4">
                                                <?= $form->field($model, 'type')->dropDownList($meetingCategory, ['class' => '', 'prompt' => '---']) ?>
                                            </div>
                                            <div class="col-md-4 col-lg-4">
                                                <?= $form->field($model, 'name')->textInput(['class' => '']) ?>
                                            </div>
                                            <div class="col-md-4 col-lg-4">
                                                <?= $form->field($model, 'phone')->textInput(['class' => '']) ?>
                                            </div>
                                        </div>
                                        <?= $form->field($model, 'message')->textarea(['class' => '', 'rows' => 6]) ?>
                                        <div class="row">
                                            <div class="col-md-6 col-lg-6">
                                                <?php //= $form->field($model, 'captcha')->widget(\yii\captcha\Captcha::className(), [
                                                //     'options' => [
                                                //         'class' => '',
                                                //         'style' => 'margin-bottom: 0;'
                                                //     ],
                                                //     'template' => '<div class="row"><div class="col-lg-4" style="padding-right: 0; padding-top: 10px; margin-right: -20px;">{image}</div><div class="col-lg-8" style="padding: 0;">{input}</div></div>',
                                                // ])->label(false)->hint(Yii::t('app', 'Hint: click on the equation to refresh')) ?>
                                            </div>
                                            <div class="col-md-6 col-lg-6 text-right">
                                                <button type="submit" class="submit-btn btn-success" style="float: none;"><?= Yii::t('app', 'send')?></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php ActiveForm::end(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
    $this->registerJs("
        $('#meeting-phone').mask('+998 00 000-00-00');
    ");
?>