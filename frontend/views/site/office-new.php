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

$days = [];

if ($current->id == 2) {
    // ru
    $days = [
        "1" => "Пн",
        "2" => "Вт",
        "3" => "Ср",
        "4" => "Чт",
        "5" => "Пт",
        "6" => "Сб",
        "7" => "Вс"
    ];
} elseif ($current->id == 3) {
    // uz
    $days = [
        "1" => "Du",
        "2" => "Se",
        "3" => "Ch",
        "4" => "Pa",
        "5" => "Ju",
        "6" => "Sh",
        "7" => "Ya"
    ];
} elseif ($current->id == 4) {
    // en
    $days = [
        "1" => "Mon",
        "2" => "Tue",
        "3" => "Wed",
        "4" => "Thu",
        "5" => "Fri",
        "6" => "Sat",
        "7" => "Sun"
    ];
}
?>
<style type="text/css">
    .btn-scnd {
        font-size: 16px;
        line-height: 20px;
         text-align: left!important;
        color: #1b3b8d;
        padding: 12px 0;
        padding-left: 10px;
        display: block;
        width: 100%;
        font-weight: 450;
        border: 1px solid #1b3b8d;
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
        border-radius: 100px;
        margin-bottom: 9px;
    }
    .tooltip-item {
        font-style: normal;
        display: flex;
        /*margin-bottom: 15px;*/
        font-size: 16px;
        font-weight: 450;
        line-height: 20px;
    }
    .office-adres .office-adres-body .item-adres .item{
        margin-bottom: 6px!important;
    }
    .title-bts {
        width: 75px;
        min-width: 75px;
        margin-right: 15px;
        font-weight: bold;
    }
    .description-bts p {
        margin-bottom: 0;
    }
    .description-bts a {
        font-weight: 500;
    }
    .description-bts .btn.btn-success, .description-bts .btn.btn-secondry {
        float: none;
        padding: 5px 10px;
        font-size: 13px;
    }
    .ymaps-2-1-79-balloon__close+.ymaps-2-1-79-balloon__content {
        margin-right: 0;
        padding: 0;
    }
    .map .map-tooltip {
        max-width: 400px;
        min-width: 400px;
    }
    @media (max-width: 768px) {
        .tooltip-item {
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            flex-direction: column;
            -webkit-box-align: center;
            align-items: center;
        }
        .title-bts {
            margin-right: 0;
            min-width: auto;
            width: auto;
        }
        .description-bts {
            text-align: center;
        }
        .description-bts .btn.btn-success, .description-bts .btn.btn-secondry {
            font-size: 12px;
            padding: 5px;
        }
        .map .map-tooltip {
            max-width: 250px !important;
            min-width: 250px !important;
        }
    }
</style>
<script src="https://api-maps.yandex.ru/2.1/?apikey=f1502606-2637-4b6e-b5da-63fa10a7c1cc&lang=<?= $current->local ?>" type="text/javascript"></script>
<?php if ($flag): ?>
    <?php $lng = null; $lat = null; ?>
    <?php if (!is_null($id) and !empty($regionBranches)): ?>
        <?php
            $model = $regionBranches[0];
            $latLong = $model['lat_long'];
            $latLong = str_replace(' ', '', $latLong);
            $latLong = explode(',', $latLong);
            if (count($latLong) == 2) {
                $lng = $latLong[0];
                $lat = $latLong[1];
            }
        ?>
    <?php endif ?>
    <script type="text/javascript">
        ymaps.ready(init);
        function init(){
            var map = new ymaps.Map("map", {
                <?php if ($lng and $lat):?>
                center: [<?= $lng ?>, <?= $lat ?>],
                <?php else:?>
                center: [41.309852, 69.277093],
                <?php endif; ?>
                zoom: 10,
                controls: ['zoomControl', 'typeSelector',  'fullscreenControl']
            });
            map.geoObjects<?php 
                foreach ($allBranches as $office):
                    $lng = '';
                    $lat = '';
                    $address = '';
                    $latLong = $office['lat_long'];
                    $latLong = str_replace(' ', '', $latLong);
                    $latLong = explode(',', $latLong);
                    if (count($latLong) == 2) {
                        $lng = $latLong[0];
                        $lat = $latLong[1];
                    }
                    if ($current->id == 2) {
                        // ru
                        $address = $office['address_ru'];
                    } elseif ($current->id == 3) {
                        // uz
                        $address = $office['address'];
                    } elseif ($current->id == 4) {
                        // en
                        $address = $office['address_en'];
                    }
                    $videoText = '<span class="btn btn-secondry">' . Yii::t('app', 'Video') . '</span>';
                    if ($office['video_link']) {
                        $videoText = '<a data-fancybox href="'. $office['video_link'] . '" class="btn btn-success">' . Yii::t('app', 'Video') . '</a>';
                    }
                ?>.add(new ymaps.Placemark([<?= $lng ?>, <?= $lat ?>], {
                balloonContent: `<div class="map-tooltip active">` +
                    `<div class="tooltip-bts">` +
                    `<div class="tooltip-item" style="margin-bottom: 15px;">` +
                        `<div class="title-bts"></div>` +
                        `<div class="description-bts"><b><?= str_replace('`', "'", htmlspecialchars($office['name'], ENT_QUOTES)) ?> #<?= $office['code'] ?></b></div>` +
                    `</div>` +
                    `<div class="tooltip-item">` +
                        `<div class="title-bts"><?= Yii::t('app', 'phone') ?>:</div>` +
                        `<div class="description-bts"><a href="tel:<?= $office['phone'] ?>"><b><?= $office['phone'] ?></b></a></div>` +
                    `</div>` +
                    `<div class="tooltip-item" style="margin-bottom: 15px;">` +
                        `<div class="title-bts"><?= Yii::t('app', 'address') ?>:</div>` +
                        `<div class="description-bts"><?= str_replace('`', "'", $address) ?></div>` +
                    `</div>` +
                    `<div class="tooltip-item">` +
                        `<div class="title-bts"></div>` +
                        `<div class="description-bts" style="display: flex; width: 100%; justify-content: space-between;">
                            <a href="https://www.google.com/maps/search/?api=1&query=<?= $lng ?>,<?= $lat ?>" target="_blank"  class="btn btn-success">
                                <?= Yii::t('app', 'map') ?>
                            </a>
                            <?= $videoText ?>
                        </div>` +
                    `</div>` +
                    // `<div class="work-time">` +
                    // `<div class="time"><?= Yii::t('app', 'hours') ?>:</div>` +
                    // `<div class="work"><?= $general->hours ?></div>` +
                    // `</div>` +
                    `</div>`
            }, {
                preset: 'islands#icon',
                iconColor: '#EE6800'
            }))<?php endforeach; ?>;
        }

    </script>
<?php endif ?>
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
                                <?php if (is_null($id)): ?>
                                    <?php $display = 'display: none;' ?>
                                <?php endif ?>
                                <?php $regionName = null; ?>
                                <?php if ($region): ?>
                                    <?php
                                        if ($current->id == 2) {
                                            // ru
                                            $regionName = $region->nameRu;
                                        } elseif ($current->id == 3) {
                                            // uz
                                            $regionName = $region->nameUz;
                                        } elseif ($current->id == 4) {
                                            // en
                                            $regionName = $region->nameEn;
                                        }
                                    ?>
                                <?php endif ?>
                                <h3 class="region-name" style="cursor: pointer;">
                                    <?= ($regionName) ? $regionName : Yii::t('app', 'all_regions') ?>
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
                                    <?= ($flag) ? "" : "<h3 class='text-center'>".Yii::t('app', 'offices_not_found')."</h3>"?>
                                    <?php foreach ($dataResult as $office): if ($region){if ($region->id != $office['regionId']){continue;}}  ?>
                                        <?php
                                            $lng = '';
                                            $lat = '';
                                            $address = '';
                                            $latLong = $office['lat_long'];
                                            $latLong = str_replace(' ', '', $latLong);
                                            $latLong = explode(',', $latLong);
                                            if (count($latLong) == 2) {
                                                $lng = $latLong[0];
                                                $lat = $latLong[1];
                                            }
                                            if ($current->id == 2) {
                                                // ru
                                                $address = $office['address_ru'];
                                                $destination = $office['destination_ru'];
                                            } elseif ($current->id == 3) {
                                                // uz
                                                $address = $office['address'];
                                                $destination = $office['destination_uz'];
                                            } elseif ($current->id == 4) {
                                                // en
                                                $address = $office['address_en'];
                                                $destination = $office['destination_en'];
                                            }
                                        ?>
                                    <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 mb-4">
                                        <div class="office-adres-body">
                                            <div class="row">
                                                <div class="col-xl-12">
                                                    <div class="item-adres">
                                                        <div style="color: blue" class="icon fas fa-building"></div>
                                                        <div class="item">
                                                            <?= $office['name'] ?>
                                                        </div>
                                                    </div>
                                                    <div class="item-adres">
                                                        <div style="color: blue" class="icon _iconmap"></div>
                                                        <div class="item">
                                                            <span><?= Yii::t('app','address') ?>:</span> <span style="color: black"><?= $address ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="item-adres">
                                                        <div style="color: blue" class="icon _iconnavigation"></div>
                                                        <div class="item">
                                                            <span><?= Yii::t('app','destination') ?>:</span> <span style="color: black"><?= $destination ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="item-adres">
                                                        <div style="color: blue" class="icon _iconmap"></div>
                                                        <div class="item">
                                                            <a href="https://www.google.com/maps/search/?api=1&query=<?= $lng ?>,<?= $lat ?>" target="_blank"><?= Yii::t('app', 'map') ?></a>
                                                        </div>
                                                        &nbsp;&nbsp;
                                                        <div style="color: blue" class="icon _iconphone-1"></div>
                                                        <div class="item">
                                                            <span><?= Yii::t('app','phone') ?>: </span><span><a href="tel:<?= $office['phone'] ?>"><?= $office['phone'] ?></a></b></span>
                                                        </div>
                                                    </div>
                                                    <?php if ($office['video_link']): ?>
                                                        <div class="item-adres">
                                                            <div style="color: blue" class="icon fas fa-video"></div>
                                                            <div class="item">
                                                                <a data-fancybox href="<?= $office['video_link'] ?>">
                                                                    <?= Yii::t('app', 'Video') ?>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    <?php endif ?>
                                                </div>
                                                <div class="col-xl-12">
                                                    <div style="color: #1b3b8d; font-size: 16px;"><i class="fas fa-clock" style="color: blue"></i> <?= Yii::t('app', 'hours') ?></div>
                                                    <?php if (isset($office['working_hours']) and is_array($office['working_hours'])): ?>
                                                        <div class="row">
                                                            <?php foreach ($office['working_hours'] as $key => $day): ?>
                                                                        <div class="col-md-6">
                                                                            <span style="font-weight: bolder;font-size: 14px;padding: 0px;margin-bottom: 0px"><?= $key ?>:</span>
                                                                            <span style="padding: 0px;text-align: center;font-size: 14px"><?=$day?></span>
                                                                        </div>
                                                            <?php endforeach ?>
                                                        </div>
                                                    <?php endif ?>
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
                                        <?php
                                            $regName = $item->nameUz;
                                            if ($current->id == 2) {
                                                // ru
                                                $regName = $item->nameRu;
                                            } elseif ($current->id == 3) {
                                                // uz
                                                $regName = $item->nameUz;
                                            } elseif ($current->id == 4) {
                                                // en
                                                $regName = $item->nameEn;
                                            }
                                        ?>
                                        <li class="col-sm-6 col-md-6 col-lg-12">
                                            <?php
                                            if ($item->id==11){
                                              echo  Html::a('<img style="width: 30px; height: 20px" src="/images/flags/karakalpakstan.png">'.' '.$regName, ['site/office', 'id' => $item->id], ['class' => 'btn-scnd']);
                                            }elseif (in_array($item->id,[1000])){
                                                echo  Html::a('<img style="width: 30px; height: 25px" src="/images/flags/russian.png">'.' '.$regName, ['site/office', 'id' => $item->id], ['class' => 'btn-scnd']);
                                            }elseif(in_array($item->id,[1001,1004])){
                                                echo  Html::a('<img style="width: 30px; height: 25px" src="/images/flags/turkey.png">'.' '.$regName, ['site/office', 'id' => $item->id], ['class' => 'btn-scnd']);
                                            }elseif ($item->id == 1002){
                                                echo  Html::a('<img style="width: 32px; height: 28px" src="/images/flags/janubiy_koreya.png">'.' '.$regName, ['site/office', 'id' => $item->id], ['class' => 'btn-scnd']);
                                            }else{
                                                echo  Html::a('<img style="width: 30px; height: 25px" src="/images/flags/uzbekistan.png">'.' '.$regName, ['site/office', 'id' => $item->id], ['class' => 'btn-scnd']);
                                            }
                                            ?>
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