<?php
    use common\widgets\Alert;
    use yii\helpers\Html;
    use yii\helpers\Url;

    $this->title = Yii::t('app', 'payments');
    $this->params['breadcrumbs'][] = $this->title;
?>
<style type="text/css">
    .submit-btn[disabled="disabled"] {
        opacity: 0.3;
        cursor: no-drop !important;
    }
</style>
<div class="site-profile">
    <section class="page-wrap userpage">
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
                            <?= Html::a(Yii::t('app', 'payments'), ['site/payments'])?>
                        </li>
                    </ul>
                </div>
                <?= $this->render('_profile_left', [
                    // 'name' => $name,
                    // 'img' => $img,
                ]) ?>
                <div class="col-md-8 col-lg-9">
                    <div class="primary">
                        <?= Alert::widget() ?>
                        <div class="row">
                            <div class="col-md-8 col-lg-9">
                                <div class="primary_title">
                                    <h2><?= Yii::t('app', 'payments') ?></h2>
                                </div>
                            </div>
                            <div class="col-md-4 col-lg-3">
                                <?= Html::a(Yii::t('app', 'Payment'), ['site/payment'], ['class' => 'btn btn-success']) ?>
                                <!-- <button class="btn btn-success" style="float: none; width: 100%;"><?= Yii::t('app', 'Submit') ?></button> -->
                            </div>
                        </div>
                        <?php if (!empty($payments)): ?>
                            <table class="table table-bordered table-striped">
                                <thead style="text-align: center;">
                                    <tr style="background-color: #EEEEEE;">
                                        <td>
                                            #
                                        </td>
                                        <td>
                                            <?= Yii::t('app', 'Date') ?>
                                        </td>
                                        <td>
                                            <?= Yii::t('app', 'payment_type') ?>
                                        </td>
                                        <td>
                                            <?= Yii::t('app', 'PaymentAmount') ?>
                                        </td>
                                        <td>
                                            <?= Yii::t('app', 'online_receipt') ?>
                                        </td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $inc = 1; ?>
                                    <?php foreach ($payments['payments'] as $key => $payment): ?>
                                        <tr style="text-align: center;">
                                            <td><?= $inc++ ?></td>
                                            <td><?= date('d.m.Y', strtotime($payment['date'])) ?></td>
                                            <td>
                                                <?php
                                                    $paymentType = $payment['type'];
                                                    if ($paymentType == 'Наличная') {
                                                        $paymentType = 'Naqd pul';
                                                    } elseif ($paymentType == 'Терминал') {
                                                        $paymentType = 'Plastik karta orqali';
                                                    }
                                                ?>
                                                <?= $paymentType ?>
                                            </td>
                                            <td style="text-align: right;">
                                                <?= number_format($payment['amount'], 0, ',', ' ') ?>
                                            </td>
                                            <td>
                                                <?php if ($payment['soliqCancel'] > 0): ?>
                                                    <img src="https://prog.bts.uz/images/qr-code-cancel.png" width="40">
                                                <?php elseif ($payment['soliqSuccess'] > 0): ?>
                                                    <img src="https://prog.bts.uz/images/qr-code.png"
                                                        width   = "40"
                                                        data-id = "<?= $payment['soliqSuccess'] ?>"
                                                        style   = "cursor: pointer;"
                                                        class   = 'popup-show-receipt'
                                                    >
                                                <?php endif ?>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        <?php endif ?>
                        <?php if (!empty($payments)): ?>
                            <center style="margin-top: 30px;">
                                <?php if ((1 * $payments['page']) > 2): ?>
                                    <?= Html::a('&#10094;&#10094;', ['/site/profile'], ['class' => 'submit-btn']) ?>
                                <?php else: ?>
                                    <?= Html::a('&#10094;&#10094;', 'javascript:void(0);', ['class' => 'submit-btn', 'disabled' => 'disabled']) ?>
                                <?php endif ?>
                                <?php if ($payments['prevPage']): ?>
                                    <?= Html::a('&#10094;', ['/site/profile', 'serverPaginationUrl' => $payments['prevPage']], ['class' => 'submit-btn']) ?>
                                <?php else: ?>
                                    <?= Html::a('&#10094;', 'javascript:void(0);', ['class' => 'submit-btn', 'disabled' => 'disabled']) ?>
                                <?php endif ?>
                                <?php if ($payments['nextPage']): ?>
                                    <?= Html::a('&#10095;', ['/site/profile', 'serverPaginationUrl' => $payments['nextPage']], ['class' => 'submit-btn']) ?>
                                <?php else: ?>
                                    <?= Html::a('&#10095;', 'javascript:void(0);', ['class' => 'submit-btn', 'disabled' => 'disabled']) ?>
                                <?php endif ?>
                                <?php //= Html::a('&#10095;&#10095;', $dataHistory['prevPage'], ['class' => 'submit-btn']) ?>
                            </center>
                        <?php endif ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<div class="modal fade" id="receipt" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="margin: 90px auto;">
        <div class="modal-content">
            <div class="modal-header" style="display: none;">
                <?= Yii::t('app', 'Call back') ?>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body" style="font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, 'Noto Sans', sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji'; font-size: 1rem; line-height: 20px; padding: 20px 50px;">
                <div style="text-align: center;"><img src="/img/loading.gif" style="height: 200px;"></div>
            </div>
        </div>
    </div>
</div>
<?php ob_start(); ?>
    $('.popup-show-receipt').click(function(){
        $('#receipt').modal('show').find('.modal-body').html('<div style="text-align: center;"><img src="/img/loading.gif" style="height: 200px;"></div>');
        var urlLink = '<?= Url::to(['/site/get-receipt']) ?>';
        urlLink = urlLink + '?id=' + $(this).attr('data-id');
        $('#receipt').modal('show').find('.modal-body').load(urlLink);
    });
<?php $script = ob_get_clean();
$this->registerJs($script);