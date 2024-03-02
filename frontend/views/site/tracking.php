<?php
    use yii\helpers\Url;
    // $iconClass = [
    //     0 => 'dot-danger',
    //     1 => 'dot-warning',
    //     2 => 'dot-success',
    //     3 => 'dot-primary',
    //     4 => 'dot-info',
    //     5 => 'dot-dark',
    // ];

    $iconClass = [
        0 => 'dot-dark',
        1 => 'dot-dark',
        2 => 'dot-dark',
        3 => 'dot-dark',
        4 => 'dot-dark',
        5 => 'dot-dark',
    ];
?>
<style type="text/css">
    @media screen and (max-width: 768px) {
        .history-right-btn-min {
            text-align: center !important;
        }
        .history-right-btn-min .submit-btn {
            padding: 7px 14px;
            border-radius: 3px;
            font-size: 13px;
            margin-top: 10px !important;
        }
    }
</style>
<div class="vertical-time-simple vertical-without-time vertical-timeline vertical-timeline--animate vertical-timeline--one-column">
    <?php $inc = 0; ?>
    <?php $waybillId = isset($dataTracking['history']) ? (isset($dataTracking['history']['id']) ? $dataTracking['history']['id'] : null) : null ?>
    <?php $waybillBarcode = isset($dataTracking['history']) ? (isset($dataTracking['history']['barcode']) ? $dataTracking['history']['barcode'] : null) : null ?>
    <?php $trackings = isset($dataTracking['tracking']) ? $dataTracking['tracking'] : []; ?>
    <div class="row">
        <?php foreach ($trackings as $key => $tracking): ?>
            <div class="col-md-3 col-lg-3"></div>
            <div class="col-md-2 col-lg-2">
                <div class="vertical-timeline-element-content bounce-in" style="margin-left: 0;">
                    <?= $tracking['date'] ?>
                </div>
            </div>
            <div class="col-md-7 col-lg-7">
                <div class="vertical-timeline-item vertical-timeline-element <?= $iconClass[$inc]; ?>">
                    <div>
                        <span class="vertical-timeline-element-icon bounce-in"></span>
                        <div class="vertical-timeline-element-content bounce-in">
                            <?php if($tracking['message']): ?>
                                <h4 class="timeline-title"><?= $tracking['message'] ?></h4>
                            <?php elseif ($tracking['statusInfo']): ?>
                                <?php if ($tracking['statusId'] == 6): ?>
                                    <?php $style = "color: green; font-weight: bold; font-size: 20px;" ?>
                                <?php elseif($key === 0): ?>
                                    <?php $style = "font-weight: bold;" ?>
                                <?php else: ?>
                                    <?php $style = "" ?>
                                <?php endif ?>
                                <h4 class="timeline-title" style="<?= $style ?>"><?= $tracking['statusInfo'] ?></h4>
                            <?php endif ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php $inc++; ?>
            <?php if ($inc > 5) { $inc=0; } ?>
        <?php endforeach ?>
    </div>
</div>
<div class="vertical-time-simple vertical-without-time vertical-timeline vertical-timeline--animate vertical-timeline--one-column">
    <div style="text-align: center;">
        <?php if ($dataTracking['waybill_image']): ?>
            <img src="<?= $dataTracking['waybill_image'] ?>" style="max-width: 100%;">
            <br>
        <?php endif ?>
        <?php if ($dataTracking['photo_report']): ?>
            <img src="<?= $dataTracking['photo_report'] ?>" style="max-width: 100%;">
        <?php endif ?>
    </div>
    <div style="text-align: right;" class="history-right-btn-min">
        <a href="<?= Url::to(['/site/complaint', 'id' => barcodeToStr($waybillId, true), 'barcode' => barcodeToStr($waybillBarcode, true)]) ?>" class="submit-btn" target="_blank" style="margin: 0; margin-top: 20px;">
            <i class="far fa-file-alt"></i> <?= Yii::t('app', 'complaint') ?>
        </a>
        <?php if ($dataTracking['waybill_image']): ?>
            <?php $file = base64_encode($dataTracking['waybill_image']); ?>
            <a href="<?= Url::to(['/site/download', 'file' => $file, 'flagWaybill' => 'yes']) ?>" class="submit-btn" target="_blank" style="margin: 0; margin-top: 20px;">
                <i class="fas fa-download"></i> <?= Yii::t('app', 'Photo waybill') ?>
            </a>
        <?php endif ?>
        <?php if ($dataTracking['photo_report']): ?>
            <?php $file = base64_encode($dataTracking['photo_report']); ?>
            <a href="<?= Url::to(['/site/download', 'file' => $file, 'flagReport' => 'yes']) ?>" class="submit-btn" target="_blank" style="margin: 0; margin-top: 20px;">
                <i class="fas fa-download"></i> <?= Yii::t('app', 'Photo report') ?>
            </a>
        <?php endif ?>
    </div>
</div>