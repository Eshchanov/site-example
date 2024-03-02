<?php

/* @var $this yii\web\View */
/* @var $regions \common\models\Region */
/* @var $region \common\models\Region */
/* @var $offices \common\models\Office */
/* @var $has \common\models\Office */

use common\models\General;
use common\models\Lang;
use common\models\Office;
use yii\helpers\Html;

$current = Lang::getCurrent();
$general = General::find()->where(['lang' => Lang::getCurrent()])->one();

$this->title = Yii::t('app', 'offices');
$this->params['breadcrumbs'][] = $this->title;
?>
<script src="https://api-maps.yandex.ru/2.1/?apikey=f1502606-2637-4b6e-b5da-63fa10a7c1cc&lang=<?= $current->local ?>" type="text/javascript"></script>
<script type="text/javascript">
    ymaps.ready(init);
    function init(){
        var map = new ymaps.Map("map", {
            <?php if ($region && $loc = Office::findOne(['region' => $region->id])):?>
            center: [<?= $loc->lng ?>, <?= $loc->lat ?>],
            <?php else:?>
            center: [41.309852, 69.277093],
            <?php endif; ?>
            zoom: 10,
            controls: ['zoomControl', 'typeSelector',  'fullscreenControl']
        });
        map.geoObjects<?php foreach ($offices as $office): ?>.add(new ymaps.Placemark([<?= $office->lng ?>, <?= $office->lat ?>], {
            balloonContent: `<div class="map-tooltip active">` +
                `<div class="tooltip-text">` +
                `<div class="tooltip-phone">` +
                `<div class="phone"><?= Yii::t('app', 'phone') ?>:</div>` +
                `<div class="phone-numb"><a href="tel:<?= $office->tel ?>"><?= $office->tel ?></a></div>` +
                `</div>` +
                `<div class="tooltip-adres">` +
                `<div class="adres"><?= Yii::t('app', 'address') ?>:</div>` +
                `<div class="adress-link"><?= $office->address ?><p><a href="<?= $office->address_link ?>" target="_blank"><?= Yii::t('app', 'map') ?></a></p></div>` +
                `</div>` +
                `<div class="work-time">` +
                `<div class="time"><?= Yii::t('app', 'hours') ?>:</div>` +
                `<div class="work"><?= $general->hours ?></div>` +
                `</div>` +
                `</div>` +
                `</div>`
        }, {
            preset: 'islands#icon',
            iconColor: '#EE6800'
        }))<?php endforeach; ?>;
    }

</script>
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
                        <?= Html::a(Yii::t('app', 'offices'), ['site/office'])?>
                    </li>
                </ul>
            </div>
            <div class="col-md-3 col-lg-3">
                <?= $this->render('_clients-left') ?>
            </div>
            <div class="col-md-9 col-lg-9">
                <div class="primary">
                    <div class="primary_title">
                        <h2><?= Yii::t('app', 'offices') ?></h2>
                    </div>
                    <div class="row ofifices-block">
                        <div class="col-md-12 col-lg-9 office-left">
                            <div id="map" style="width: 100%; height: 500px" class="map"></div>
                            <div class="row">
                                <?php $display = ''; ?>
                                <?php if (!$region): ?>
                                    <?php $display = 'display: none;' ?>
                                <?php endif ?>
                                <h3 class="region-name" style="cursor: pointer;">
                                    <?= ($region) ? $region->name : Yii::t('app', 'all_regions') ?>
                                    <span style="vertical-align: middle; float: right; padding-top: 1px;">
                                        <?php if ($display == ''): ?>
                                            <i class="far fa-angle-down fa-rotate-180"></i>
                                        <?php else: ?>
                                            <i class="far fa-angle-down"></i>
                                        <?php endif ?>
                                        <!-- fa-rotate-180 -->
                                    </span>
                                </h3>
                                <div class="office-adres" style="width: 100%; <?= $display ?>">
                                    <?= ($has) ? "" : "<h3 class='text-center'>".Yii::t('app', 'offices_not_found')."</h3>"?>
                                    <?php foreach ($offices as $office): if ($region){if ($region->id != $office->region){continue;}}  ?>
                                    <div class="col-sm-6 col-md-6 col-lg-6 col-xl-4 mb-4">
                                        <div class="office-adres-body">
                                            <div class="item-adres">
                                                <div class="icon _iconmap"></div>
                                                <div class="item">
                                                    <span><?= Yii::t('app','address') ?></span>
                                                    <p><?= $office->address ?></p>
                                                </div>
                                            </div>
                                            <div class="item-adres">
                                                <div class="icon _iconnavigation"></div>
                                                <div class="item">
                                                    <span><?= Yii::t('app','destination') ?></span>
                                                    <p><?= $office->destination ?></p>
                                                </div>
                                            </div>
                                            <?php if ($office->video_link): ?>
                                                <div class="item-adres">
                                                    <div class="icon fas fa-video"></div>
                                                    <div class="item">
                                                        <a data-fancybox href="<?= $office->video_link ?>">
                                                            <?= Yii::t('app', 'Video') ?>
                                                        </a>
                                                    </div>
                                                </div>
                                            <?php endif ?>
                                            <div class="item-adres">
                                                <div class="icon _iconphone-1"></div>
                                                <div class="item">
                                                    <span><?= Yii::t('app','phone') ?></span>
                                                    <p><a href="tel:<?= $office->tel ?>"><?= $office->tel ?></a></b></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-3 office-right">
                            <div class="region-btn-scnd-block">
                                <ul class="row">
                                    <?php foreach ($regions as $item): ?>
                                    <li class="col-sm-6 col-md-6 col-lg-12">
                                        <?= Html::a($item->name, ['site/office', 'id' => $item->id], ['class' => 'btn-scnd'])?>
                                    </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

</section>

<?php
    $this->registerJs("
        $('.region-name').click(function(){
            $(this).find('i').toggleClass('fa-rotate-180');
            $('.office-adres').slideToggle('slow');
        });
    ");
?>