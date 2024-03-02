<?php
    use yii\helpers\ArrayHelper;
    use yii\helpers\Html;
    use yii\helpers\Url;
    use common\widgets\Alert;
    use yii\bootstrap4\ActiveForm;

    $this->title = Yii::t('app', 'contract');
    $this->params['breadcrumbs'][] = $this->title;
    $servicesMap = ArrayHelper::map($services, 'id', 'name');
?>
<style type="text/css">
    .custom-control.custom-checkbox .custom-control-label:after {
        content: "";
        color: none;
    }
    .custom-control-input:checked ~ .custom-control-label::before,
    .was-validated .custom-control-input:valid:checked ~ .custom-control-label::before,
    .custom-control-input.is-valid:checked ~ .custom-control-label::before {
        border-color: #c2c5cc;
        background-color: #FFFFFF;
    }
    .form-group .custom-checkbox label:before {
        content: "";
        background-color: transparent;
        border: 1px solid #c2c5cc;
        border-radius: 4px;
        -webkit-box-shadow: 0 1px 2px rgb(0 0 0 / 5%), inset 0px -15px 10px -12px rgb(0 0 0 / 5%);
        box-shadow: 0 1px 2px rgb(0 0 0 / 5%), inset 0px -15px 10px -12px rgb(0 0 0 / 5%);
        padding: 10px;
        display: inline-block;
        position: relative;
        vertical-align: middle;
        cursor: pointer;
        /*margin-right: 12px;*/
        margin-left: 22px;
        margin-top: -7px;
        margin-right: 0;
    }

    .form-group .custom-checkbox input:checked + label:after {
        content: "";
        display: block;
        position: absolute;
        top: 3px;
        left: 9px;
        width: 6px;
        height: 14px;
        border: 2px solid #ee6800;
        border-radius: 4px;
        border-width: 0 2px 2px 0;
        -webkit-transform: rotate(45deg);
        -ms-transform: rotate(45deg);
        transform: rotate(45deg);
    }

    .custom-control-label::after {
        position: absolute;
        top: 0.16rem;
        left: -1.5rem;
        display: block;
        width: 1rem;
        height: 1rem;
        content: "";
        background-repeat: no-repeat;
        background-position: center center;
        background-size: 50% 50%;
    }
    .custom-control-label::after {
        position: absolute;
        top: 0.25rem;
        left: -1.5rem;
        display: block;
        width: 1rem;
        height: 1rem;
        content: "";
        background: 50% / 50% 50% no-repeat;
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
                        <?= Html::a(Yii::t('app', 'clients'), ['site/calculate'])?>
                    </li>
                    <li>
                        <?= Html::a(Yii::t('app', 'contract'), ['site/contract'])?>
                    </li>
                </ul>
            </div>
            <div class="col-md-3 col-lg-3">
                <?= $this->render('_clients-left') ?>
            </div>
            <div class="col-md-9 col-lg-9">
                <div class="primary">
                    <div class="primary_title">
                        <h2><?= Yii::t('app', 'contract') ?></h2>
                        <p class="subtitle"><?= Yii::t('app', 'fill_contract') ?></p>
                    </div>
                    <?= Alert::widget() ?>
                    <?php $form = ActiveForm::begin(); ?>
                        <div class="row">
                            <div class="col-md-4 col-lg-4">
                                <?= $form->field($model, 'name')->textInput(['class' => '']) ?>
                            </div>
                            <div class="col-md-4 col-lg-4">
                                <?= $form->field($model, 'surname')->textInput(['class' => '']) ?>
                            </div>
                            <div class="col-md-4 col-lg-4">
                                <?= $form->field($model, 'patronymic')->textInput(['class' => '']) ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 col-lg-4">
                                <?= $form->field($model, 'phone')->textInput(['class' => '']) ?>
                            </div>
                            <div class="col-md-4 col-lg-4">
                                <?= $form->field($model, 'companyname')->textInput(['class' => '']) ?>
                            </div>
                            <div class="col-md-4 col-lg-4">
                                <?= $form->field($model, 'position')->textInput(['class' => '']) ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 col-lg-4">
                                <?= $form->field($model, 'city')->textInput(['class' => '']) ?>
                            </div>
                            <div class="col-md-8 col-lg-8">
                                <?= $form->field($model, 'address')->textInput(['class' => '']) ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-lg-12">
                                <?= $form->field($model, 'services')->checkboxList($servicesMap, ['class' => '']) ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 col-lg-4">
                                <?= $form->field($model, 'weight')->textInput(['class' => '']) ?>
                            </div>
                            <div class="col-md-4 col-lg-4">
                                <?= $form->field($model, 'volume')->textInput(['class' => '']) ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8 col-lg-8">
                                <?= $form->field($model, 'shortInfo')->textarea(['rows' => 6, 'class' => '']) ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 col-lg-4">
                                <?= $form->field($model, 'captcha')->widget(\yii\captcha\Captcha::className(), [
                                    'options' => [
                                        'class' => '',
                                        'style' => 'margin-bottom: 0;'
                                    ],
                                    'template' => '<div class="row"><div class="col-lg-4" style="padding-right: 0; padding-top: 10px; margin-right: -20px;">{image}</div><div class="col-lg-8" style="padding: 0;">{input}</div></div>',
                                ])->label(false)->hint(Yii::t('app', 'Hint: click on the equation to refresh')) ?>
                            </div>
                            <div class="col-md-4 col-lg-4">
                                <div style="text-align: right;">
                                    <button type="submit" class="submit-btn" style="margin-bottom: 0;"><?= Yii::t('app', 'send')?></button>
                                </div>
                            </div>
                        </div>
                    <?php ActiveForm::end(); ?>
                    <div class="ps" style="margin-top: 30px;">
                        <span class="requried">*</span> <?= Yii::t('app', 'must')?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
    $this->registerJs("
        $('#contract-phone').mask('+998 00 000-00-00');
    ");
?>