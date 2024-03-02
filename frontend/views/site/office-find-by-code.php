<?php
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
<script src="https://api-maps.yandex.ru/2.1/?apikey=f1502606-2637-4b6e-b5da-63fa10a7c1cc&lang=<?= $current->local ?>" type="text/javascript"></script>
<?php if ($model): ?>
    <?php $lng = ''; $lat = ''; ?>
    <?php
        $latLong = $model['lat_long'];
        $latLong = str_replace(' ', '', $latLong);
        $latLong = explode(',', $latLong);
        if (count($latLong) == 2) {
            $lng = $latLong[0];
            $lat = $latLong[1];
        }
        $address = $model['address'] . " <br> " . $model['address_ru'] . " <br> " . $model['address_en'];
        $destination = $model['destination_uz'] . " <br> " . $model['destination_ru'] . " <br> " . $model['destination_en'];
    ?>
    <script type="text/javascript">
        ymaps.ready(init);
        function init() {
            var map = new ymaps.Map("map", {
                center: [<?= $lng ?>, <?= $lat ?>],
                zoom: 10,
                controls: ['zoomControl', 'typeSelector',  'fullscreenControl']
            });
            map.geoObjects.add(new ymaps.Placemark([<?= $lng ?>, <?= $lat ?>], {
                balloonContent: `<div class="map-tooltip active">` +
                    `<div class="tooltip-text">` +
                    `<div class="tooltip-phone">` +
                    `<div class="phone"><?= Yii::t('app', 'phone') ?>:</div>` +
                    `<div class="phone-numb"><a href="tel:<?= $model['phone'] ?>"><?= $model['phone'] ?></a></div>` +
                    `</div>` +
                    `<div class="tooltip-adres">` +
                    `<div class="adres"><?= Yii::t('app', 'address') ?>:</div>` +
                    `<div class="adress-link"><?= str_replace('`', "'", $address) ?><p><a href="https://www.google.com/maps/search/?api=1&query=<?= $lng ?>,<?= $lat ?>" target="_blank"><?= Yii::t('app', 'map') ?></a></p></div>` +
                    `</div>` +
                    `</div>` +
                    `</div>`
            }, {
                preset: 'islands#icon',
                iconColor: '#EE6800'
            }));
        }
    </script>
<?php endif ?>
<?php if ($model): ?>
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
                            <h2><?= $model['name'] ?></h2>
                        </div>
                        <div class="row ofifices-block">
                            <div id="map" style="width: 100%; height: 500px; margin-bottom: 25px;" class="map"></div>
                            <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 mb-4 office-adres">
                                <div class="office-adres-body">
                                    <div class="row">
                                        <div class="col-xl-8">
                                            <div class="item-adres">
                                                <div class="icon _iconmap"></div>
                                                <div class="item">
                                                    <span><?= Yii::t('app','address') ?></span>
                                                    <p><?= $address ?></p>
                                                </div>
                                            </div>
                                            <div class="item-adres">
                                                <div class="icon _iconnavigation"></div>
                                                <div class="item">
                                                    <span><?= Yii::t('app','destination') ?></span>
                                                    <p><?= $destination ?></p>
                                                </div>
                                            </div>
                                            <?php if ($model['video_link']): ?>
                                                <div class="item-adres">
                                                    <div class="icon fas fa-video"></div>
                                                    <div class="item">
                                                        <a data-fancybox href="<?= $model['video_link'] ?>">
                                                            <?= Yii::t('app', 'Video') ?>
                                                        </a>
                                                    </div>
                                                </div>
                                            <?php endif ?>
                                            <div class="item-adres">
                                                <div class="icon _iconmap"></div>
                                                <div class="item">
                                                    <a href="https://www.google.com/maps/search/?api=1&query=<?= $lng ?>,<?= $lat ?>" target="_blank"><?= Yii::t('app', 'map') ?></a>
                                                </div>
                                            </div>
                                            <div class="item-adres">
                                                <div class="icon _iconphone-1"></div>
                                                <div class="item">
                                                    <span><?= Yii::t('app','phone') ?></span>
                                                    <p><a href="tel:<?= $model['phone'] ?>"><?= $model['phone'] ?></a></b></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-4">
                                            <div style="color: #1b3b8d; font-size: 16px;"><i class="fas fa-clock" style="color: #c2c5cc"></i> <?= Yii::t('app', 'hours') ?></div>
                                            <?php if (isset($model['working_hours']) and $model['working_hours'] and is_array($model['working_hours'])): ?>
                                                <?php foreach ($model['working_hours'] as $key => $day): ?>
                                                        <?php if ($day): ?>
                                                            <div style="font-size: 12px;">
                                                                <?= isset($days[$key]) ? $days[$key] : '' ?>:
                                                                <?= $day ?>
                                                            </div>
                                                        <?php else: ?>
                                                            <div style="font-size: 12px; color: red;">
                                                                <?= isset($days[$key]) ? $days[$key] : '' ?>:
                                                                <?= Yii::t('app', 'Non-working day') ?>
                                                            </div>
                                                        <?php endif ?>
                                                <?php endforeach ?>
                                            <?php endif ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif ?>