<?php
    use yii\helpers\ArrayHelper;
    use yii\helpers\Html;
    use yii\helpers\Url;
    use common\widgets\Alert;
    use yii\bootstrap4\ActiveForm;

    $this->title = Yii::t('app', 'calculate');
    $this->params['breadcrumbs'][] = $this->title;

    $senderDelivery = [
        0 => Yii::t('app', 'senderDeliveryNot'),
        1 => Yii::t('app', 'senderDeliveryYes'),
        2 => Yii::t('app', 'senderDeliveryTwo'),
    ];

    $receiverDelivery = [
        0 => Yii::t('app', 'receiverDeliveryNot'),
        1 => Yii::t('app', 'receiverDeliveryYes'),
        2 => Yii::t('app', 'receiverDeliveryTwo'),
    ];

    $lang = Yii::$app->language;
    $regions = ArrayHelper::map($region, 'id', 'nameUz');
    if ($lang == 'uz-UZ') {
        $regions = ArrayHelper::map($region, 'id', 'nameUz');
    } elseif ($lang == 'ru-RU') {
        $regions = ArrayHelper::map($region, 'id', 'nameRu');
    } elseif ($lang == 'en-UZ') {
        $regions = ArrayHelper::map($region, 'id', 'nameEn');
    }
?>
<style type="text/css">
    .chexbox-block .custom-control.custom-checkbox {
        padding-left: 0;
    }
    .page-wrap .primary .chexbox-block label {
        margin-bottom: 10px;
    }
    .page-wrap .primary .chexbox-block label:before {
        margin-left: 22px;
        margin-top: -7px;
        margin-right: 0;
        background-color: #FFFFFF;
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
                        <?= Html::a(Yii::t('app', 'calculate'), ['site/calculate'])?>
                    </li>
                </ul>
            </div>
            <div class="col-md-3 col-lg-3">
                <?= $this->render('_clients-left') ?>
            </div>
            <div class="col-md-9 col-lg-9">
                <div class="primary">
                    <div class="primary_title">
                        <h2><?= Yii::t('app', 'calculate') ?></h2>
                    </div>
                    <?php if ($branchId): ?>
                        <div class="alert alert-danger">
                            <div>Filial: <?= $branchName ?></div>
                            <div>Manzil: <?= $branchAddress ?></div>
                        </div>
                    <?php endif ?>
                    <?= Alert::widget() ?>
                    <?php $form = ActiveForm::begin(); ?>
                        <div>
                            <div class="row">
                                <div class="col-md-6 col-lg-6">
                                    <div style="padding: 20px; border: 1px solid #AAA; background: #EEEEEE;">
                                        <input type="text" value="<?= Yii::t('app', 'Sender') ?>" readonly style="text-align: center; background: #DDDDDD; margin-bottom: 15px;">
                                        <?= $form->field($model, 'senderRegionId')->dropDownList($regions, ['class' => '', 'prompt' => '---']) ?>
                                        <?= $form->field($model, 'senderCityId')->dropDownList($senderCities, ['class' => '', 'prompt' => '---']) ?>
                                        <?= $form->field($model, 'senderDelivery')->dropDownList($senderDelivery, ['class' => '']) ?>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-6">
                                    <div style="padding: 20px; border: 1px solid #AAA; background: #EEEEEE;">
                                        <input type="text" value="<?= Yii::t('app', 'Receiver') ?>" readonly style="text-align: center; background: #DDDDDD; margin-bottom: 15px;">
                                        <?= $form->field($model, 'receiverRegionId')->dropDownList($regions, ['class' => '', 'prompt' => '---']) ?>
                                        <?= $form->field($model, 'receiverCityId')->dropDownList($receiverCities, ['class' => '', 'prompt' => '---']) ?>
                                        <?= $form->field($model, 'receiverDelivery')->dropDownList($receiverDelivery, ['class' => '']) ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-lg-12">
                                    <div style="padding: 20px; border: 1px solid #AAA; background: #EEEEEE;">
                                        <?= $form->field($model, 'bringBackWaybill', ['options' => ['class' => 'chexbox-block']])->checkbox(['class' => '']) ?>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-6" style="margin-top: 30px;">
                                    <div style="padding: 20px; border: 1px solid #AAA; background: #EEEEEE;">
                                        <?= $form->field($model, 'isBox', ['options' => ['class' => 'chexbox-block']])->checkbox(['class' => '']) ?>
                                        <div class="container-lenght" style="margin-top: 15px; display: none;">
                                            <div class="row">
                                                <div class="col-md-4 col-lg-4">
                                                    <?= $form->field($model, 'x')->textInput(['class' => '']) ?>
                                                </div>
                                                <div class="col-md-4 col-lg-4">
                                                    <?= $form->field($model, 'y')->textInput(['class' => '']) ?>
                                                </div>
                                                <div class="col-md-4 col-lg-4">
                                                    <?= $form->field($model, 'z')->textInput(['class' => '']) ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-6" style="margin-top: 30px;">
                                    <div style="padding: 20px; border: 1px solid #AAA; background: #EEEEEE;">
                                        <?= $form->field($model, 'weight')->textInput(['class' => '']) ?>
                                    </div>
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
                                <div class="col-md-8 col-lg-8">
                                    <div style="text-align: right;">
                                        <button type="submit" class="submit-btn" style="margin-bottom: 0;"><?= Yii::t('app', 'calculate_btn')?></button>
                                    </div>
                                </div>
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
<?php if ($branchId): ?>
    <?php
        $swalShowText = Yii::t('app', 'Dear user, your mail will be delivered to {address}.', [
            'address' => $branchAddress,
        ]);
        $this->registerJs("
            let swalShowText = \"" . $swalShowText . "\";
            notDeliveryMessage(swalShowText);
            function notDeliveryMessage(allText) {
                swal({
                    title: '<div class=\"alert-confirm-logo\"><img src=\"/img/logo_new.png\"></div>',
                    text: allText,
                    // type: \"warning\",
                    // showCancelButton: true,
                    confirmButtonText: \"OK\",
                    cancelButtonText: \"Manzilgacha etkazish\",
                    closeOnConfirm: true,
                    closeOnCancel: true,
                    html: true
                },
                function(isConfirm){
                    if (!isConfirm){
                        $('#waybill-receiverdelivery').trigger('click');
                        swal.close();
                    }
                });
            }
        ");
    ?>
<?php endif ?>