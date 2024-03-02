<?php
    use yii\helpers\Html;
    use yii\helpers\Url;

    $name = isset($userProfile['name']) ? ucfirst($userProfile['name']) : '';
    $img = isset($userProfile['photo']) ? $userProfile['photo'] : null;

    $this->title = Yii::t('app', 'about_bts');
    $this->params['breadcrumbs'][] = $this->title;

    $beginNum = (1 * $dataHistory['page'] - 1) * (1 * $dataHistory['limit']) + 1;
    if ($beginNum < 0) {
        $beginNum = 0;
    }
    $endNum = (1 * $dataHistory['page']) * (1 * $dataHistory['limit']);
    $all = (1 * $dataHistory['itemsCount']);
    if ($endNum >= $all) {
        $endNum = $all;
    }
    $summary = Yii::t('yii', 'Showing <b>{begin, number}-{end, number}</b> of <b>{totalCount, number}</b> {totalCount, plural, one{item} other{items}}.', [
        'begin' => $beginNum,
        'end' => $endNum,
        'totalCount' => $all,
    ]);
    $results = $dataHistory['results'];
?>
<style type="text/css">
    .userpage .stats-block .stats-item {
        min-width: 35px;
        max-width: 135px;
    }
    .userpage .stats-block .stats-info {
        -webkit-column-gap: 60px;
        -moz-column-gap: 60px;
        column-gap: 60px;
    }
    .submit-btn {
        margin-bottom: 0 !important;
    }
    .history-item:hover {
        /*background: #e9e9e9;*/
        cursor: pointer;
    }
    .submit-btn[disabled="disabled"] {
        opacity: 0.3;
        cursor: no-drop !important;
    }
    .close-container {
        font-size: 24px;
        padding: 1.5px;
        padding-top: 3px;
        padding-left: 3.5px;
        background: #FFFFFF;
        color: #FF0000;
        border-radius: 50%;
        cursor: pointer;
        left: 10px;
        bottom: 10px;
        width: 30px;
        display: none;
        margin-top: 8px;
    }
    /*.close-container:hover {
        background: #FF0000;
        color: #FFFFFF;
    }*/
    .history-item-selected .close-container {
        display: block;
    }
    .history-item {
        height: 100%;
    }
    .history-row {
        min-height: 45px;
    }
    @media screen and (max-width: 768px) {
        .min-order-1 {
            order: 1;
        }
        .min-order-2 {
            order: 2;
        }
        .min-order-3 {
            order: 3;
        }
        .history-row {
            padding: 10px 0;
        }
        .min-order-1 .history-item {
            font-size: 14px;
            text-align: right;
        }
        .min-order-1 .history-item img {
            margin-left: 10px;
        }
        .min-order-1 .close-container {
            margin-top: 5px;
        }
        .history-item {
            font-size: 9px;
        }
        .history-item .col-1,
        .history-item .col-2,
        .history-item .col-3,
        .history-item .col-4,
        .history-item .col-5,
        .history-item .col-6 {
            padding-left: 5px;
            padding-right: 5px;
        }
        .history-item img {
            width: 25px;
        }
        .history-avatar-min {
            width: 35px !important;
        }
        .leftProfileBadge {
            padding: 2px 3px;
        }
        .min-items-title-row {
            display: none;
        }
        .history-pagination .submit-btn {
            padding: 7px 20px;
            font-size: 14px;
            border-radius: 3px;
        }
    }
</style>
<div class="site-about">
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
                            <?= Html::a(Yii::t('app', 'outmail'), ['site/outmail'])?>
                        </li>
                    </ul>
                </div>
                <?= $this->render('_profile_left', [
                    'name' => $name,
                    'img' => $img,
                ]) ?>
                <div class="col-md-8 col-lg-9">
                    <div class="primary">
                        <div class="primary_title">
                            <h2><?= Yii::t('app', 'outmail') ?></h2>
                        </div>
                        <?php if (!empty($results)): ?>
                            <!-- <p class="text-right"><?= $summary ?></p> -->
                            <div class="row min-items-title-row" style="border-bottom: 1px solid #dddddd; margin-bottom: 0; font-weight: bold;">
                                <div class="col-md-7 col-lg-7">
                                    <div class="row">
                                        <div class="col-md-1 text-center">
                                            <?= Yii::t('app', 'Status') ?>
                                        </div>
                                        <div class="col-md-3 text-center">
                                            <?= Yii::t('app', 'Date') ?>
                                        </div>
                                        <div class="col-md-4 text-center">
                                            <?= Yii::t('app', 'Barcode') ?>
                                        </div>
                                        <div class="col-md-4 text-center">
                                            <?= Yii::t('app', 'from') ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-5 col-lg-5">
                                    <div class="row">
                                        <div class="col-md-10 col-lg-10">
                                            <div style="display: flex; flex-wrap: wrap; column-gap: 25px; min-height: 45px; align-items: center; justify-content: flex-end;">
                                                <div>
                                                    <?= Yii::t('app', 'Receiver') ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-lg-2"></div>
                                    </div>
                                </div>
                            </div>
                        <?php endif ?>
                        <?php $results = $dataHistory['results']; ?>
                        <?php foreach ($results as $key => $result): ?>
                            <div class="row history-row" style="border-bottom: 1px solid #dddddd; margin-bottom: 0;">
                                <div class="col-md-7 col-lg-7 min-order-2">
                                    <div class="history-item" data-id="<?= $result['id'] ?>">
                                        <div class="row" style="padding-top: 9px;">
                                            <div class="col-md-1 col-1 text-center">
                                                <?php if ($result['stateIcon']): ?>
                                                    <img src="<?= $result['stateIcon'] ?>" style="max-width: 30px;">
                                                <?php endif ?>
                                            </div>
                                            <div class="col-md-3 col-3 text-center">
                                                <?= date('d.m.Y', strtotime($result['date'])) ?>
                                            </div>
                                            <div class="col-md-4 col-4 text-center">
                                                <a href="<?= Url::to(['/site/view', 'term' => barcodeToStr($result['id'])]) ?>" target="_blank">
                                                    <b><?= divideString($result['barcode'], 3) ?></b>
                                                </a>
                                                <?php if ($result['statusId'] < 4): ?>
                                                    <span class="badge badge-danger leftProfileBadge">new</span>
                                                <?php else: ?>
                                                    <span class="badge badge-danger leftProfileBadge" style="visibility: hidden;">new</span>
                                                <?php endif ?>
                                            </div>
                                            <div class="col-md-4 col-4 text-center">
                                                <div class="in" style="display: inline-block;"><?= $result['regionName']; ?></div>
                                                <!-- <div class="icon _iconright-arrow" style="display: inline-block;"></div> -->
                                                <!-- <div class="out" style="display: inline-block;"><?= $result['senderRegionName'] ?></div> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-5 col-lg-5 min-order-1">
                                    <div class="row">
                                        <div class="col-md-10 col-lg-10 col-10">
                                            <div class="history-item" data-id="<?= $result['id'] ?>">
                                                <div class="row">
                                                    <div class="col-10">
                                                        <div style="line-height: 14px; height: 100%; display: flex; align-items: center; justify-content: flex-end;">
                                                            <?= $result['name'] ?>
                                                        </div>
                                                    </div>
                                                    <div class="col-2">
                                                        <?php if ($result['avatar']): ?>
                                                            <img style="border-radius: 50%; vertical-align: middle;" src="<?= $result['avatar'] ?>" class="history-avatar-min">
                                                        <?php endif ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-lg-2 col-2">
                                           <div class="close-container">
                                                <i class="far fa-times-circle"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-12 history-item-tracking min-order-3" style="display: none;">
                                    <div style="text-align: center;"><img src="/img/loading.gif" style="height: 200px;"></div>
                                </div>
                            </div>
                        <?php endforeach ?>
                        <?php if (!empty($results)): ?>
                            <center style="margin-top: 30px;" class="history-pagination">
                                <?php if ((1 * $dataHistory['page']) > 2): ?>
                                    <?= Html::a('&#10094;&#10094;', ['/site/outmail'], ['class' => 'submit-btn']) ?>
                                <?php else: ?>
                                    <?= Html::a('&#10094;&#10094;', 'javascript:void(0);', ['class' => 'submit-btn', 'disabled' => 'disabled']) ?>
                                <?php endif ?>
                                <?php if ($dataHistory['prevPage']): ?>
                                    <?= Html::a('&#10094;', ['/site/outmail', 'serverPaginationUrl' => $dataHistory['prevPage']], ['class' => 'submit-btn']) ?>
                                <?php else: ?>
                                    <?= Html::a('&#10094;', 'javascript:void(0);', ['class' => 'submit-btn', 'disabled' => 'disabled']) ?>
                                <?php endif ?>
                                <?php if ($dataHistory['nextPage']): ?>
                                    <?= Html::a('&#10095;', ['/site/outmail', 'serverPaginationUrl' => $dataHistory['nextPage']], ['class' => 'submit-btn']) ?>
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

<?php ob_start(); ?>

    $('.history-item').click(function(){
        $('.history-row').removeClass('history-item-selected');
        $(this).closest('.history-row').addClass('history-item-selected');
        $('.history-item-tracking').hide();
        $('.history-item-tracking').html('<div style="text-align: center;"><img src="/img/loading.gif" style="height: 200px;"></div>');
        var id = $(this).attr('data-id');
        var url = '<?= Url::to(['/site/tracking']) ?>' + '?id='+id;
        var className = $(this).closest('.history-row').find('.history-item-tracking');
        className.show();
        $.ajax({
            type: 'GET',
            url: url,
            success: function(data) {
                className.html(data);
            }
        });
    });

    $('.close-container').click(function(){
        $(this).closest('.history-row').removeClass('history-item-selected').find('.history-item-tracking').html('');
    });

<?php $script = ob_get_clean(); $this->registerJs($script); ?>