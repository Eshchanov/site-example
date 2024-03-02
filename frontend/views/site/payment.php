<?php
    use yii\helpers\ArrayHelper;
    use yii\helpers\Html;
    use yii\helpers\Url;
    use common\widgets\Alert;
    use yii\bootstrap4\ActiveForm;
    $this->title = Yii::t('app', 'Payment');
?>
<section class="page-wrap">
    <div class="container-xl">
        <div class="row">
            <div class="breadcrumbs">
                <ul>
                    <li>
                        <?= Html::a(Yii::t('app', 'home'), ['site/index'])?>
                    </li>
                    <li>
                        <?= Html::a(Yii::t('app', 'cabinet'), ['site/profile'])?>
                    </li>
                    <li>
                        <?= Html::a(Yii::t('app', 'Payment'), ['site/payment'])?>
                    </li>
                </ul>
            </div>
            <?= $this->render('_profile_left') ?>
            <div class="col-md-9 col-lg-9">
                <div class="primary">
                    <div class="primary_title">
                        <h2><?= Yii::t('app', 'Payment') ?></h2>
                    </div>
                    <?= Alert::widget() ?>
                    <?php $form = ActiveForm::begin([
                        'method' => 'GET',
                        'action' => 'https://pay.bts.uz/site/click',
                    ]); ?>
                        <div class="row">
                            <div class="col-md-2 col-lg-2"></div>
                            <div class="col-md-4 col-lg-4">
                                <?= $form->field($model, 'id')->textInput(['class' => '', 'name' => 'id']) ?>
                            </div>
                            <div class="col-md-4 col-lg-4">
                                <?= $form->field($model, 'amount')->textInput(['class' => '', 'name' => 'amount']) ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2 col-lg-2"></div>
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
                                <button class="btn btn-success" style="float: none; width: 100%;"><?= Yii::t('app', 'Submit') ?></button>
                            </div>
                        </div>
                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>

</section>

<?php
    $this->registerJs("
        $('#calculate-senderregionid').change(function(){
            var valId = $(this).val();
            $.get('" . Url::to(['site/get-cities']) . "', {
                regionId: valId
            }, function(data) {
                $('#calculate-sendercityid').html(data);
            });
        });

        $('#calculate-receiverregionid').change(function(){
            var valId = $(this).val();
            $.get('" . Url::to(['site/get-cities']) . "', {
                regionId: valId
            }, function(data) {
                $('#calculate-receivercityid').html(data);
            });
        });

        $('#calculate-isbox').change(function(){
            var isChecked = $(this).is(':checked');
            if (isChecked) {
                $('.container-lenght').show(0);
            } else {
                $('.container-lenght').hide(0);
                $('#calculate-x').val('');
                $('#calculate-y').val('');
                $('#calculate-z').val('');
            }
        });
    ");
?>