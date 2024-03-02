<?php

/* @var $this yii\web\View */
/* @var $services \common\models\Services */
/* @var $general \common\models\General */
/* @var $offices \common\models\Office */
/* @var $sliders \common\models\Slider */

use yii\helpers\Html;
use yii\helpers\Url;
use common\widgets\Alert;
$current = \common\models\Lang::getCurrent();
$lang = $current->url;

$this->title = 'KOMPLEKS LOGISTIKA VA POCHTA XIZMATLARI';

if ($lang == 'uz') {
    $this->title = 'Yuklarni yetkazib berish Toshkent shahri va O\'zbekiston bo\'ylab: yuklarni tashish, pochta xizmatlari, BTS yetkazib berish xizmatidan xalqaro logistika';
    $this->registerMetaTag([
        'name' => 'description',
        'content' => 'Yuklarni yetkazib berish Toshkent shahri va O\'zbekiston bo\'ylab. Yuklaringizni O\'zbekiston bo\'ylab yetkazib berish kerakmi? BTS yetkazib berish xizmati Toshkent, O\'zbekiston va butun dunyo bo\'ylab keng miqyosdagi logistika xizmatlarini taklif etadi. Dunyoning 89 dan ortiq mamlakatlariga yuk yetkazib berish xizmatlarini bts.uz veb-saytida hamyonbop narxlarda buyurtma qiling!'
    ]);
    $this->registerMetaTag([
        'name' => 'keywords',
        'content' => 'BTS, yetkazib berish xizmati Toshkentda, yetkazib berish xizmati O\'zbekistonda, yuk tashish xizmati Toshkentda, pochta xizmatlari O\'zbekistonda, xalqaro logistika, yuk yetkazib berish O\'zbekistonda, logistika xizmatlari, yetkazib berish xizmatlari O\'zbekistonda, yuk yetkazib berish xizmatlari Toshkentda, yuk tashuvchilar O\'zbekistonda, transport logistikasi, transport xizmatlari O\'zbekistonda, O\'zbekiston bo\'ylab yuk tashish, logistika kompaniyalari O\'zbekistonda, O\'zbekiston bo\'ylab yuklarni yetkazib berish, transport logistikasi Toshkentda, eltib berish xizmatlari, tovarlarni yetkazib berish Toshkentda'
    ]);
} elseif ($lang == 'ru') {
    $this->title = 'Доставка грузов по Ташкенту и Узбекистану: перевозка грузов, почтовые услуги, международная логистика от службы доставки BTS';
    $this->registerMetaTag([
        'name' => 'description',
        'content' => 'Доставка грузов по Ташкенту и Узбекистану. Необходима грузовая доставка или доставка посылок по Узбекистану? Служба доставки BTS предлагает максимально широкий спектр логистических услуг по Ташкенту, Узбекистану и всему миру. Заказывайте услуги доставки грузов в более чем 89 стран мира по выгодным ценам на сайте bts.uz!'
    ]);
    $this->registerMetaTag([
        'name' => 'keywords',
        'content' => 'BTS, Служба доставки в Ташкенте, Служба доставки в Узбекистане, перевозка грузов в Ташкенте, почтовые услуги в Узбекистане, международная логистика, доставка грузов в Узбекистане, логистические услуги, услуги доставки в Узбекистане, услуги доставки грузов в Ташкенте, перевозчики грузов в Узбекистане, транспортная логистика, транспортные услуги в Узбекистане, грузоперевозки по узбекистану, логистические компании в узбекистане, доставка грузов по узбекистану, транспортная логистика в ташкенте, службы доставки, доставка товаров в ташкенте'
    ]);
} elseif ($lang == 'en') {
    $this->title = 'Express mail | BTS International Express Mail';
}
?>
<style type="text/css">
    .app-link a {
        background-color: #EE6800;
        color: white !important;
        border: 1px solid #EE6800;
    }
    .mobile-app_right .app-link a:hover {
        background-color: #1B3B8D;
    }
    .tooltip-item {
        font-style: normal;
        display: flex;
        /*margin-bottom: 15px;*/
        font-size: 16px;
        font-weight: 450;
        line-height: 20px;
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
    .services .services-body .services-title a {
        color: #ee6800;
    }
    .mobile-app-min {
        display: none;
    }
    .seo-container {
        height: 180px;
        overflow: hidden;
        /*position: relative;*/
    }
    .site-index-text-min .show-all-text {
        /*position: absolute;*/
        /*right: left;*/
        /*bottom: 5px;*/
        margin-top: 15px;
        font-size: 18px;
        padding: 5px 20px;
        background-color: #FFFFFF;
        color: #ee6800;
        cursor: pointer;
        border: 1px solid #ee6800;
        border-radius: 20px;
        display: inline-block;
        transition: all 3s;
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
        .slider .side-menu ul li a {
            padding: 12px 0;
        }
        .services .services-body .services-title {
            padding: 20px 20px;
        }
        .services .services-body .services-title h3 {
            flex: 0 1 100%;
            font-size: 16px;
            line-height: 20px;
        }
        .mobile-app-min {
            display: block;
        }
        .mobile-app-min .app-link a .appstore span {
            font-size: 12px;
        }
        .mobile-app-min .app-link a .appstore p {
            font-size: 16px;
        }
        .mobile-app-min .app-link a .icon {
            font-size: 30px;
        }
        .mobile-app-min .app-link a {
            width: 175px;
            padding: 10px 15px;
        }
        .mobile-app-max p, .mobile-app-max .app-link {
            display: none;
        }
        .site-index-text-min {
            padding: 15px 0 !important;
        }
        .site-index-text-min h1, .site-index-text-min h2, .tg-bot_body h3, .mobile-app_right h3, .advantage_text h4, .advantage .title {
            font-size: 22px !important;
            text-align: center;
            line-height: 28px;
            margin-bottom: 15px !important;
        }
        .mobile-app_right ul li {
            margin-bottom: 5px;
        }
        .mobile-app_right ul li span, .site-index-min-p {
            font-size: 16px !important;
            line-height: 20px !important;
        }
        .site-index-text-min p, .tg-bot_body p, .advantage_text p {
            font-size: 16px !important;
            line-height: 20px !important;
            text-indent: 20px;
            margin-bottom: 15px;
        }
        .tg-bot_body {
            padding: 15px 0;
        }
        .tg-bot_body .btn-tg {
            margin: 0 auto;
            padding: 7px 15px;
            justify-content: center;
            font-size: 16px;
            width: 150px;
            line-height: 24px;
        }
    }
</style>
<script src="https://api-maps.yandex.ru/2.1/?apikey=f1502606-2637-4b6e-b5da-63fa10a7c1cc&lang=<?= $current->local ?>" type="text/javascript"></script>
<script type="text/javascript">
    ymaps.ready(init);
    function init(){
        var map = new ymaps.Map("map", {
            center: [41.309852, 69.277093],
            zoom: 6,
            controls: ['zoomControl', 'typeSelector',  'fullscreenControl']
        });
        map.geoObjects<?php 
            foreach ($branches as $office):
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
<div class="site-index">
    <?= Alert::widget() ?>
    <section class="slider">
        <div class="container-xl">
            <div class="row">
                <div class="col-md-9">
                    <div class="swiper-container main-slide">
                        <!-- Additional required wrapper -->
                        <div class="swiper-wrapper">
                            <!-- Slides -->
                            <?php foreach ($sliders as $slider): ?>
                                <div class="swiper-slide">
                                    <picture style="width: 100%">
                                        <source srcset="/img/slider/<?= $slider->image ?>" type="image/webp" style="width: 100%">
                                        <?php if ($slider->url == '#'): ?>
                                            <img src="/img/slider/<?= $slider->image ?>" alt="" style="width: 100%">
                                        <?php else: ?>
                                            <a target="_blank" href="<?=$slider->url?>"><img src="/img/slider/<?= $slider->image ?>" alt="" style="width: 100%"></a>
                                        <?php endif; ?>
                                    </picture>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <!-- If we need pagination -->
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="side-menu">
                        <ul>
                            <li>
                                <?= Html::a( '<div style="font-size: 40px;padding-right: 10px"> <i class="fal fa-calculator"></i></div><span>'.Yii::t('app', 'calculate').'</span>', ['site/calculate'], ['class' => 'link'])?>
                            </li>
                            <li>
                                <?= Html::a( '<div class="icon _iconwork"></div><span>'.Yii::t('app', 'courer').'</span>', 
                                [
                                    // 'site/service', 'id' => 3,
                                    'site/new',
                                ], ['class' => 'link'])?>
                            </li>
                            <li>
                                <a href="<?= $general->bot_link ?>" class="link" target="_blank">
                                    <div class="icon _icontg-big"></div>
                                    <span>Telegram Bot</span>
                                </a>
                            </li>
                            <li>
                                <?= Html::a( '<div class="icon _iconmap-line"></div><span>'.Yii::t('app', 'observe').'</span>', ['site/search-form'], ['class' => 'link'])?>
                            </li>
                            <li>
                                <?= Html::a( '<div class="icon _iconGroup-2"></div><span>'.Yii::t('app', 'offices').'</span>', ['site/office'], ['class' => 'link'])?>
                            </li>
                            <li>
                                <?= Html::a( '<div class="icon _iconGroup-3"></div><span>'.Yii::t('app', 'contract').'</span>', ['site/contract'], ['class' => 'link'])?>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="services">
        <div class="container-xl">
            <div class="row"><h2 class="title"><?= Yii::t('app', 'services')?></h2></div>
            <div class="row">
                <?php $i = 0; foreach ($services as $service): $i++; if ($i > 3): ?>
                <div class="col-md-3">
                    <div class="services-body">
                        <div class="services-image">
                            <picture><source srcset="/img/services/<?= $service->image_home ?>" type="image/webp"><img src="/img/services/<?= $service->image_home ?>" alt=""></picture>
                        </div>
                        <div class="services-title">
                            <?= $service->info ?>
                            <?= Html::a( '<span>'.Yii::t('app', 'more').'</span><div class="icon _iconright-arrow"></div>', ['site/service', 'id' => $service->id], ['class' => 'link'])?>
                        </div>
                        <!-- <div class="services-btn"> -->
                            <!-- <?php //= Html::a(Yii::t('app', 'use_service'), ['site/service', 'id' => $service->id], ['class' => 'btn-link'])?> -->
                        <!-- </div> -->
                    </div>
                </div>
                <?php else: ?>
                    <div class="col-md-4">
                        <div class="services-body">
                            <div class="services-image">
                                <picture><source srcset="/img/services/<?= $service->image_home ?>" type="image/webp"><img src="/img/services/<?= $service->image_home ?>" alt=""></picture>
                            </div>
                            <div class="services-title">
                                <?= $service->info ?>
                                <?= Html::a( '<span>'.Yii::t('app', 'more').'</span><div class="icon _iconright-arrow"></div>', ['site/service', 'id' => $service->id], ['class' => 'link'])?>
                            </div>
                            <!-- <div class="services-btn"> -->
                                <!-- <?php //= Html::a(Yii::t('app', 'use_service'), ['site/service', 'id' => $service->id], ['class' => 'btn-link'])?> -->
                            <!-- </div> -->
                        </div>
                    </div>
                <?php endif; endforeach; ?>
            </div>
        </div>
    </section>
    <section class="map-block">
        <div class="container-xl">
            <div class="row">
                <h2 class="title"><?= Yii::t('app', 'offices')?></h2>
                <div class="col-12">
                    <div id="map" style="width: 100%; height: 500px" class="map"></div>
                </div>
            </div>
        </div>
    </section>
    <section class="about-us">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 about-l">
                    <div class="aboutus_left">
                        <div class="ply-button">
                            <a data-fancybox href="<?= $general->video ?>" class="link">
                                <div class="pulse">
                                    <span></span>
                                </div>
                            </a>
                        </div>

                        <div class="left-text">
                            <h3><?= Yii::t('app', 'about')?></h3>
                            <?= $general->about_main ?>
                        </div>
                    </div>

                </div>
                <div class="col-lg-6 about-r">
                    <div class="aboutus_right">
                        <div class="right-text">
                            <h3><?= Yii::t('app', 'aim')?></h3>
                            <?= $general->aim_main ?>
                        </div>
                        <div class="img-right">
                            <picture><source srcset="/img/about_right_img.webp" type="image/webp"><img src="/img/about_right_img.png" alt=""></picture>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="advantage">
        <div class="container-xl">
            <div class="row">
                <h2 class="title">
                    <?= Yii::t('app', 'why_me')?>
                </h2>
                <div class="col-md-4 col-lg-4 advantage_wrap">
                    <div class="advantage_body">
                        <div class="advantage_icon">
                            <svg width="98" height="100" viewBox="0 0 98 100" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path d="M87.7111 62.39L87.4933 62.5063L64.0547 78.5978C60.359 80.3971 56.1854 80.9785 52.1388 80.2533L35.2036 77.1348C33.3409 76.6739 31.3725 76.9403 29.7002 77.8811C29.6811 77.8917 29.6621 77.9044 29.641 77.9149L22.5434 82.4035L23.9621 87.0591L31.751 82.135C31.77 82.1223 31.7891 82.1117 31.8102 82.1012C33.4826 81.1624 35.4509 80.896 37.3136 81.3548L54.2488 84.4733C58.2976 85.1985 62.469 84.6171 66.1647 82.8179L94.3667 63.4556C92.6457 61.6352 89.9162 61.1976 87.7111 62.39Z" fill="#E3E5E8" />
                                <path d="M77.8142 58.3787L77.7867 58.3935L76.6048 59.0299C73.7167 56.5858 69.6066 56.2137 66.3274 58.1018L59.9656 61.5628H51.498C49.665 61.5607 47.8552 61.1463 46.2039 60.3492L45.039 59.7868C38.2776 56.497 30.2413 57.2814 24.2432 61.8186C24.2157 61.8398 24.1882 61.8609 24.1628 61.8842L21.353 64.3853C20.2895 65.3283 19.0337 66.0302 17.6721 66.4361L16.0758 61.1949C15.913 60.6621 15.4225 60.2985 14.8643 60.2985H1.26546C0.901806 60.2985 0.557183 60.4528 0.318272 60.7255C0.0772471 60.9962 -0.0348084 61.3577 0.00959092 61.7171L4.54255 98.8878C4.62078 99.5242 5.15992 99.9999 5.80053 99.9999H26.1989C26.6006 99.9999 26.9769 99.8096 27.2158 99.4883C27.4547 99.1669 27.5266 98.7504 27.4103 98.3656L24.7295 89.5724L33.0765 84.2974C34.1929 83.68 35.5037 83.5109 36.7405 83.8238C36.7659 83.8301 36.7934 83.8365 36.8188 83.8407L53.7962 86.9677C58.4095 87.7922 63.1666 87.122 67.3719 85.05C67.4268 85.0247 67.4776 84.993 67.5262 84.9591L96.8911 64.7976C97.4429 64.4191 97.6057 63.6749 97.259 63.102C95.039 59.4063 90.3031 58.1102 86.5122 60.1632L86.0111 60.4317C83.9857 57.977 80.4823 57.0256 77.8142 58.3787ZM78.9728 60.6325C80.5162 59.8587 82.4592 60.493 83.7002 61.677L72.5645 67.6836L71.9112 68.0282C71.5581 67.0281 71.0422 66.0915 70.3847 65.2564L78.9728 60.6325ZM67.5537 60.3175L67.5833 60.3006C69.6151 59.1251 72.1247 59.1504 74.1332 60.3619L68.4734 63.4106C67.393 62.622 66.1625 62.0681 64.8559 61.7827L67.5537 60.3175ZM6.91897 97.4692L2.69469 62.8313H13.9256L24.4863 97.4692H6.91897ZM94.3667 63.4572L66.1646 82.8195C62.4689 84.6187 58.2954 85.2001 54.2487 84.475L37.3135 81.3564C35.4508 80.8955 33.4825 81.1619 31.8101 82.1028C31.7911 82.1133 31.772 82.126 31.7509 82.1366L23.962 87.0607L18.4121 68.8612C20.1225 68.3453 21.7018 67.4637 23.0359 66.2755L25.8077 63.806C31.0447 59.8693 38.045 59.1948 43.9375 62.0618L45.1024 62.6241C47.0962 63.5861 49.2844 64.0872 51.498 64.0893H62.7924C66.2154 64.0936 69.1542 66.5271 69.7969 69.8908L61.6105 69.5208C58.6358 69.3876 55.6525 69.5251 52.7032 69.9331C52.2507 69.9902 51.8659 70.2862 51.6925 70.7069C51.5192 71.1277 51.5868 71.6097 51.868 71.9691C52.1492 72.3286 52.6017 72.5083 53.052 72.4406C55.8513 72.0537 58.678 71.9226 61.4985 72.0495L71.1331 72.485C71.1521 72.485 71.1712 72.4871 71.1902 72.4871C71.89 72.4871 72.4566 71.9205 72.4566 71.2207C72.4566 71.0156 72.4482 70.8126 72.4355 70.6118L73.7569 69.9162L87.7131 62.3895C89.9162 61.197 92.6457 61.6347 94.3667 63.4572Z" fill="#1B3B8D" />
                                <path d="M10.9426 92.2324C10.9426 94.4334 12.727 96.2178 14.928 96.2178C17.1289 96.2178 18.9133 94.4334 18.9133 92.2324C18.9133 90.0315 17.1289 88.2471 14.928 88.2471C12.7291 88.2492 10.9468 90.0315 10.9426 92.2324ZM14.9301 90.78C15.7335 90.78 16.3826 91.4311 16.3826 92.2324C16.3826 93.0359 15.7314 93.6871 14.9301 93.6871C14.1267 93.6871 13.4755 93.0359 13.4755 92.2324C13.4755 91.4311 14.1267 90.78 14.9301 90.78Z" fill="#1B3B8D" />
                                <path d="M37.2373 45.7022C40.5101 48.0935 44.1424 49.9498 47.9967 51.2056C48.225 51.2733 48.4682 51.2733 48.6965 51.2078C52.665 49.9625 56.4157 48.1083 59.8154 45.7128C67.1878 40.5012 71.0822 33.5791 71.0822 25.7014V13.4599C71.0822 12.9524 70.782 12.4958 70.3148 12.297L70.1773 12.2378C62.8282 9.07491 55.8786 5.05148 49.4788 0.252125C49.0285 -0.0840416 48.409 -0.0840416 47.9608 0.252125C41.5588 5.05148 34.6092 9.07702 27.2601 12.2399L27.1206 12.2991C26.6554 12.4979 26.3531 12.9567 26.3531 13.462V25.7035C26.351 33.5749 30.1165 40.4906 37.2373 45.7022ZM28.8838 14.2929C35.8989 11.2209 42.5504 7.37927 48.7177 2.84209C54.8871 7.37927 61.5385 11.2209 68.5515 14.2929V25.7035C68.5515 31.1541 66.5408 35.9682 62.5639 40.072V39.8331C62.5639 39.1333 61.9973 38.5666 61.2975 38.5666C60.5977 38.5666 60.031 39.1333 60.031 39.8331V41.1228C60.031 41.4737 60.1748 41.8078 60.4306 42.0467C59.7942 42.5795 59.1198 43.0996 58.4094 43.607C55.3205 45.7699 51.9356 47.474 48.3561 48.6643C44.8972 47.4676 41.6328 45.7678 38.6707 43.6155C38.0322 43.144 37.4254 42.6641 36.8482 42.1693C37.195 41.9346 37.4022 41.5414 37.4022 41.1228V39.8331C37.4022 39.1333 36.8356 38.5666 36.1357 38.5666C35.4359 38.5666 34.8693 39.1333 34.8693 39.8331V40.3024C30.8903 36.15 28.8796 31.2555 28.8796 25.7014V14.2929H28.8838Z" fill="#EE6800" />
                                <path d="M48.7178 38.5667C48.018 38.5667 47.4514 39.1333 47.4514 39.8331V41.1228C47.4514 41.8226 48.018 42.3892 48.7178 42.3892C49.4177 42.3892 49.9843 41.8226 49.9843 41.1228V39.8331C49.9843 39.1333 49.4177 38.5667 48.7178 38.5667Z" fill="#EE6800" />
                                <path d="M52.9124 38.5667C52.2125 38.5667 51.6459 39.1333 51.6459 39.8331V41.1228C51.6459 41.8226 52.2125 42.3892 52.9124 42.3892C53.6122 42.3892 54.1788 41.8226 54.1788 41.1228V39.8331C54.1767 39.1333 53.6101 38.5667 52.9124 38.5667Z" fill="#EE6800" />
                                <path d="M55.8386 39.8331V41.1228C55.8386 41.8226 56.4052 42.3892 57.105 42.3892C57.8049 42.3892 58.3715 41.8226 58.3715 41.1228V39.8331C58.3715 39.1333 57.8049 38.5667 57.105 38.5667C56.4052 38.5667 55.8386 39.1333 55.8386 39.8331Z" fill="#EE6800" />
                                <path d="M44.5252 38.5667C43.8253 38.5667 43.2587 39.1333 43.2587 39.8331V41.1228C43.2587 41.8226 43.8253 42.3892 44.5252 42.3892C45.225 42.3892 45.7916 41.8226 45.7916 41.1228V39.8331C45.7916 39.1333 45.225 38.5667 44.5252 38.5667Z" fill="#EE6800" />
                                <path d="M40.3303 42.3892C41.0302 42.3892 41.5968 41.8226 41.5968 41.1228V39.8331C41.5968 39.1333 41.0302 38.5667 40.3303 38.5667C39.6305 38.5667 39.0639 39.1333 39.0639 39.8331V41.1228C39.066 41.8226 39.6326 42.3892 40.3303 42.3892Z" fill="#EE6800" />
                                <path d="M46.0134 30.7224C46.5082 31.2172 47.3095 31.2172 47.8042 30.7224L56.202 22.3246C56.6904 21.8299 56.6862 21.0328 56.1957 20.5402C55.703 20.0497 54.9081 20.0455 54.4112 20.5338L46.9078 28.0373L43.0239 24.1556C42.5291 23.6608 41.7278 23.6608 41.2331 24.1556C40.7384 24.6503 40.7384 25.4516 41.2331 25.9463L46.0134 30.7224Z" fill="#EE6800" />
                            </svg>
                        </div>
                        <div class="advantage_text">
                            <h4><?= Yii::t('app', 'guarantee')?></h4>
                            <p><?= Yii::t('app', 'guarantee_info')?></p>
                        </div>
                    </div>
                    <div class="advantage_body">
                        <div class="advantage_icon">
                            <svg width="90" height="79" viewBox="0 0 90 79" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M16.9999 77.4674H11.6599V24.9618L17.7633 20.7969L16.9999 77.4674Z" fill="#E3E5E8" />
                                <path d="M66.1149 62.7094H56.4788V50.5391C56.4715 49.8231 55.8976 49.2419 55.1835 49.2273H26.0329C25.326 49.2455 24.7649 49.8322 24.7776 50.5391V62.7094H22.3891C21.6822 62.7276 21.121 63.3143 21.1338 64.0212V77.4669H23.6845V65.2601H25.6886V69.4869C25.6813 70.1847 26.2406 70.755 26.9384 70.7623C27.1935 70.7641 27.4449 70.6894 27.6562 70.5473L29.6785 69.1972L31.7027 70.5473C31.9122 70.6876 32.1582 70.7623 32.4096 70.7623C32.6228 70.7623 32.8323 70.7112 33.0217 70.611C33.439 70.3906 33.7013 69.9588 33.705 69.4869V65.2601H35.7091V77.4669H38.2597V65.2601H40.2638V69.4869C40.2565 70.1847 40.8159 70.755 41.5137 70.7623C41.7687 70.7641 42.0202 70.6894 42.2315 70.5473L44.2538 69.1972L46.278 70.5473C46.4875 70.6876 46.7334 70.7623 46.9849 70.7623C47.198 70.7623 47.4075 70.7112 47.597 70.611C48.0142 70.3906 48.2766 69.9588 48.2802 69.4869V65.2601H50.2843V77.4669H52.835V65.2601H54.8391V69.4869C54.8318 70.1847 55.3912 70.755 56.0889 70.7623C56.344 70.7641 56.5954 70.6894 56.8068 70.5473L58.8291 69.1972L60.8532 70.5473C61.0628 70.6876 61.3087 70.7623 61.5601 70.7623C61.7733 70.7623 61.9828 70.7112 62.1723 70.611C62.5895 70.3906 62.8519 69.9588 62.8555 69.4869V65.2601H64.8596V77.4669H67.4103V64.0212C67.4048 63.3052 66.8309 62.724 66.1149 62.7094ZM46.4583 51.778H49.3734V53.6217L48.6136 53.1225C48.1873 52.8365 47.6298 52.8365 47.2035 53.1225L46.4583 53.6217V51.778ZM31.8831 51.778H34.7981V53.6217L34.0384 53.1225C33.612 52.8365 33.0545 52.8365 32.6282 53.1225L31.8831 53.6217V51.778ZM31.1543 67.102L30.3946 66.6028C29.9682 66.3168 29.4107 66.3168 28.9844 66.6028L28.2392 67.102V65.2601H31.1543V67.102ZM27.3283 62.7094V51.778H29.3324V56.0048C29.3251 56.7026 29.8844 57.2728 30.5822 57.2801C30.8373 57.282 31.0887 57.2073 31.3 57.0651L33.3224 55.7151L35.3465 57.0651C35.556 57.2054 35.802 57.2801 36.0534 57.2801C36.2666 57.2801 36.4761 57.2291 36.6656 57.1289C37.0828 56.9085 37.3451 56.4767 37.3488 56.0048V51.778H39.3529V62.7094H27.3283ZM45.7296 67.102L44.9698 66.6028C44.5435 66.3168 43.986 66.3168 43.5597 66.6028L42.8145 67.102V65.2601H45.7296V67.102ZM41.9036 62.7094V51.778H43.9077V56.0048C43.9004 56.7026 44.4597 57.2728 45.1575 57.2801C45.4126 57.282 45.664 57.2073 45.8753 57.0651L47.8976 55.7151L49.9218 57.0651C50.1313 57.2054 50.3773 57.2801 50.6287 57.2801C50.8418 57.2801 51.0514 57.2291 51.2408 57.1289C51.6581 56.9085 51.9204 56.4767 51.9241 56.0048V51.778H53.9282V62.7094H41.9036ZM60.3048 67.102L59.5451 66.6028C59.1188 66.3168 58.5613 66.3168 58.1349 66.6028L57.3898 67.102V65.2601H60.3048V67.102Z" fill="#EE6800" />
                                <path d="M89.47 31.4783L45.8025 0.237987C45.3598 -0.0790248 44.764 -0.0790248 44.3194 0.236165L0.535319 31.4783C-0.0385829 31.8864 -0.171582 32.6844 0.236525 33.2564C0.477017 33.5917 0.863262 33.7921 1.27684 33.7921C1.54648 33.7921 1.81066 33.7101 2.03293 33.5552L9.10922 28.5158V77.4742C9.09465 78.161 9.6394 78.7276 10.3263 78.7422C10.3354 78.7422 10.3445 78.7422 10.3536 78.7422H79.6499C80.3368 78.7422 80.8925 78.1865 80.8943 77.5015C80.8943 77.4924 80.8943 77.4833 80.8943 77.4742V28.5031L87.9706 33.5552C88.5427 33.9688 89.3443 33.8413 89.7579 33.2674C90.1714 32.6935 90.0421 31.8937 89.47 31.4783ZM71.6007 30.4616H18.401V28.6397H71.6007V30.4616ZM18.401 33.0123H71.6007V35.0164H18.401V33.0123ZM18.401 37.5671H71.6007V39.389H18.401V37.5671ZM18.401 41.9397H71.6007V76.1915H18.401V41.9397ZM78.3418 76.1915H74.1514V27.3389C74.1714 26.6684 73.6449 26.1091 72.9744 26.0891C72.958 26.0891 72.9398 26.0891 72.9234 26.0891H17.0783C16.4078 26.0818 15.8594 26.6174 15.8503 27.2879C15.8503 27.3043 15.8503 27.3225 15.8503 27.3389V76.1915H11.6599V26.6957L45.0591 2.8415L78.3418 26.6775V76.1915Z" fill="#1B3B8D" />
                            </svg>
                        </div>
                        <div class="advantage_text">
                            <h4><?= Yii::t('app', 'saving')?></h4>
                            <p><?= Yii::t('app', 'saving_info')?></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4 advantage_wrap">
                    <div class="advantage_body">
                        <div class="advantage_icon">
                            <svg width="101" height="100" viewBox="0 0 101 100" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path d="M45.2007 2.96433C43.862 4.1058 42.9775 5.6875 42.7026 7.4246L41.7464 13.4347C38.7065 14.118 35.7662 15.1798 32.9912 16.5961L35.3558 18.3113C38.9694 16.0224 42.9516 14.373 47.125 13.4347L48.0812 7.4246C48.4896 4.8349 50.2446 2.65556 52.6869 1.70335C50.151 0.711294 47.2724 1.19537 45.2007 2.96433Z" fill="#E3E5E8" />
                                <path d="M12.7993 42.7061L18.8094 41.7499C19.7477 37.5765 21.3971 33.5943 23.686 29.9807L20.1102 25.0543C17.7138 21.7514 18.4468 17.1318 21.7497 14.7353C22.2597 14.3668 22.8135 14.062 23.3991 13.8329C19.5983 12.3488 15.3133 14.2273 13.8292 18.0282C12.9148 20.3709 13.2535 23.0184 14.7316 25.0543L18.3074 29.9807C16.0185 33.5943 14.3691 37.5765 13.4308 41.7499L7.42069 42.7061C3.39271 43.3455 0.643639 47.1285 1.2811 51.1565C1.78112 54.3159 4.25926 56.7941 7.42069 57.2961L13.4308 58.2523C14.3691 62.4257 16.0185 66.4078 18.3074 70.0215L14.7316 74.9479C12.3351 78.2507 13.0702 82.8704 16.3731 85.2668C18.409 86.7449 21.0585 87.0836 23.4011 86.1692C19.6003 84.6851 17.7237 80.4022 19.2058 76.6033C19.4349 76.0156 19.7397 75.4598 20.1102 74.9499L23.686 70.0234C21.3971 66.4098 19.7477 62.4277 18.8094 58.2542L12.7993 57.298C8.77132 56.6586 6.02225 52.8736 6.66171 48.8457C7.16371 45.6842 9.63986 43.2081 12.7993 42.7061Z" fill="#E3E5E8" />
                                <path d="M48.0812 92.5774L47.125 86.5673C42.9516 85.629 38.9694 83.9796 35.3558 81.6907L32.9912 83.4059C35.7662 84.8222 38.7065 85.884 41.7464 86.5673L42.7026 92.5774C43.3401 96.6054 47.123 99.3545 51.151 98.715C51.6769 98.6313 52.1909 98.4919 52.6869 98.2987C50.2446 97.3444 48.4936 95.1671 48.0812 92.5774Z" fill="#E3E5E8" />
                                <path d="M49.9974 18.9243C32.8616 18.9243 18.921 32.8649 18.921 50.0007C18.921 67.1366 32.8616 81.0772 49.9974 81.0772C67.1333 81.0772 81.0739 67.1366 81.0739 50.0007C81.0739 32.8649 67.1333 18.9243 49.9974 18.9243ZM49.9974 78.6867C34.1803 78.6867 21.3115 65.8178 21.3115 50.0007C21.3115 34.1836 34.1803 21.3148 49.9974 21.3148C65.8145 21.3148 78.6834 34.1836 78.6834 50.0007C78.6834 65.8178 65.8145 78.6867 49.9974 78.6867Z" fill="#1B3B8D" />
                                <path d="M92.7635 41.5247L87.5442 40.696C86.6179 36.9389 85.1278 33.3452 83.1278 30.0344L86.2334 25.7554C89.0184 21.9207 88.1678 16.552 84.331 13.7671C81.323 11.5838 77.2512 11.5838 74.2451 13.7671L69.9661 16.8727C66.6553 14.8707 63.0616 13.3806 59.3045 12.4543L58.4758 7.23705C57.7328 2.55567 53.3343 -0.635642 48.6529 0.107404C44.9835 0.691082 42.1069 3.56764 41.5232 7.23705L40.6945 12.4543C36.9375 13.3806 33.3438 14.8707 30.0329 16.8727L25.7539 13.7671C21.9192 10.9822 16.5505 11.8348 13.7676 15.6695C11.5843 18.6756 11.5843 22.7474 13.7676 25.7534L16.8733 30.0324C14.8712 33.3432 13.3811 36.9369 12.4548 40.694L7.23559 41.5227C2.5542 42.2677 -0.637106 46.6663 0.107931 51.3476C0.69161 55.0151 3.56817 57.8916 7.23559 58.4753L12.4548 59.304C13.3811 63.0611 14.8712 66.6548 16.8733 69.9656L13.7676 74.2446C10.9827 78.0813 11.8353 83.448 15.672 86.2329C18.6781 88.4162 22.7479 88.4162 25.7559 86.2329L30.0349 83.1273C33.3458 85.1293 36.9395 86.6194 40.6965 87.5457L41.5252 92.7629C42.2683 97.4443 46.6668 100.636 51.3482 99.8926C55.0176 99.3089 57.8941 96.4324 58.4778 92.7629L59.3065 87.5457C63.0636 86.6194 66.6573 85.1293 69.9681 83.1273L74.2471 86.2329C78.0819 89.0178 83.4505 88.1652 86.2334 84.3305C88.4168 81.3244 88.4168 77.2526 86.2334 74.2466L83.1298 69.9676C85.1318 66.6568 86.6219 63.063 87.5482 59.306L92.7675 58.4773C97.4488 57.7322 100.64 53.3337 99.8951 48.6524C99.3094 44.9849 96.4329 42.1084 92.7635 41.5247ZM92.387 56.1167L86.3769 57.0709C85.8928 57.1486 85.5063 57.5111 85.3988 57.9892C84.4924 62.0292 82.8947 65.8838 80.6775 69.3819C80.4166 69.7963 80.4325 70.3282 80.7194 70.7226L84.2952 75.649C86.3032 78.416 85.6896 82.2886 82.9206 84.2986C80.7512 85.8724 77.8149 85.8724 75.6455 84.2986L70.7171 80.7228C70.3207 80.436 69.7888 80.418 69.3765 80.681C65.8784 82.8982 62.0237 84.4958 57.9838 85.4022C57.5057 85.5098 57.1411 85.8982 57.0654 86.3803L56.1112 92.3904C55.5754 95.769 52.402 98.0718 49.0254 97.536C46.3779 97.1156 44.3002 95.0379 43.8799 92.3904L42.9257 86.3803C42.848 85.8963 42.4854 85.5098 42.0073 85.4022C37.9674 84.4958 34.1127 82.8982 30.6146 80.681C30.2003 80.42 29.6704 80.436 29.2739 80.7228L24.3475 84.2986C21.5805 86.3066 17.7079 85.6931 15.6979 82.9241C14.1242 80.7547 14.1242 77.8184 15.6979 75.649L19.2737 70.7206C19.5606 70.3242 19.5785 69.7923 19.3156 69.3799C17.0984 65.8818 15.5007 62.0292 14.5943 57.9872C14.4868 57.5091 14.0983 57.1446 13.6162 57.0689L7.60611 56.1127C4.22755 55.5768 1.92471 52.4034 2.46058 49.0269C2.8809 46.3794 4.95864 44.3017 7.60611 43.8813L13.6162 42.9271C14.1003 42.8494 14.4868 42.4869 14.5943 42.0088C15.5007 37.9688 17.0984 34.1142 19.3156 30.6161C19.5765 30.2017 19.5606 29.6698 19.2737 29.2754L15.6979 24.349C13.6899 21.582 14.3035 17.7094 17.0725 15.6994C19.2418 14.1257 22.1782 14.1257 24.3475 15.6994L29.2759 19.2752C29.6724 19.564 30.2043 19.58 30.6166 19.317C34.1147 17.0998 37.9694 15.5022 42.0093 14.5958C42.4874 14.4882 42.852 14.0998 42.9277 13.6177L43.8819 7.60758C44.4177 4.22901 47.5911 1.92617 50.9677 2.46204C53.6152 2.88237 55.6929 4.96011 56.1132 7.60758L57.0674 13.6177C57.1451 14.1018 57.5077 14.4882 57.9858 14.5958C62.0257 15.5022 65.8804 17.0998 69.3785 19.317C69.7928 19.58 70.3227 19.562 70.7191 19.2752L75.6455 15.6994C78.4125 13.6914 82.2851 14.3049 84.2952 17.0739C85.8689 19.2433 85.8689 22.1796 84.2952 24.349L80.7194 29.2774C80.4325 29.6738 80.4146 30.2057 80.6775 30.6181C82.8947 34.1162 84.4924 37.9688 85.3988 42.0108C85.5063 42.4889 85.8948 42.8534 86.3769 42.9291L92.387 43.8833C95.7655 44.4192 98.0684 47.5926 97.5325 50.9691C97.1122 53.6206 95.0344 55.6964 92.387 56.1167Z" fill="#1B3B8D" />
                                <path d="M49.9975 25.7739C36.6526 25.7739 25.7938 36.6427 25.7938 50.0016C25.7938 63.3605 36.6526 74.2292 49.9975 74.2292C63.3424 74.2292 74.2013 63.3605 74.2013 50.0016C74.2013 36.6427 63.3444 25.7739 49.9975 25.7739ZM66.2349 64.5497L64.8624 63.1772C64.3883 62.719 63.6313 62.731 63.1731 63.2071C62.7249 63.6712 62.7249 64.4043 63.1731 64.8685L64.5477 66.243C60.8623 69.5658 56.1491 71.526 51.1948 71.7969V69.8307C51.1948 69.1713 50.6589 68.6355 49.9995 68.6355C49.3401 68.6355 48.8043 69.1713 48.8043 69.8307V71.7969C43.85 71.528 39.1367 69.5678 35.4514 66.245L36.8259 64.8705C37.296 64.4083 37.302 63.6513 36.8398 63.1792C36.3777 62.709 35.6207 62.7031 35.1486 63.1652C35.1446 63.1692 35.1386 63.1752 35.1346 63.1792L33.7621 64.5517C30.4512 60.8604 28.499 56.1511 28.2321 51.1988H30.1743C30.8337 51.1988 31.3696 50.6629 31.3696 50.0036C31.3696 49.3442 30.8337 48.8083 30.1743 48.8083H28.2321C28.499 43.858 30.4512 39.1467 33.7621 35.4574L35.1346 36.83C35.6008 37.2961 36.3578 37.2961 36.8259 36.83C37.294 36.3638 37.292 35.6068 36.8259 35.1387L35.4514 33.7642C39.1367 30.4414 43.85 28.4812 48.8043 28.2102V30.1764C48.8043 30.8358 49.3401 31.3717 49.9995 31.3717C50.6589 31.3717 51.1948 30.8358 51.1948 30.1764V28.2102C56.1491 28.4792 60.8623 30.4394 64.5477 33.7622L63.1731 35.1367C62.703 35.5989 62.697 36.3558 63.1592 36.828C63.6213 37.2981 64.3783 37.3041 64.8484 36.8419C64.8524 36.8379 64.8584 36.8319 64.8624 36.828L66.2349 35.4554C69.5458 39.1467 71.498 43.856 71.7649 48.8083H69.8227C69.1633 48.8083 68.6274 49.3442 68.6274 50.0036C68.6274 50.6629 69.1633 51.1988 69.8227 51.1988H71.7649C71.498 56.1471 69.5458 60.8584 66.2349 64.5497Z" fill="#EE6800" />
                                <path d="M41.0913 57.5014H49.3502C49.7678 57.5014 50.1622 56.9901 50.1622 56.4343C50.1622 55.8785 49.7678 55.4117 49.3502 55.4117H42.5296V54.5669C42.5296 52.0105 50.0462 50.4543 50.0462 45.6748C50.0462 43.0072 47.7727 41.251 45.0815 41.251C42.5528 41.251 40.3257 42.8071 40.3257 45.1857C40.3257 46.1861 40.7897 46.4973 41.4393 46.4973C42.2512 46.4973 42.7384 46.0527 42.7384 45.6081C42.7384 44.0965 43.7824 43.4073 45.0815 43.4073C46.8447 43.4073 47.5871 44.6522 47.5871 45.7415C47.5871 49.165 40.0009 50.9656 40.0009 54.5683V56.7247C40.0009 57.1901 40.6273 57.5014 41.0913 57.5014Z" fill="#EE6800" />
                                <path d="M58.05 47.8089C57.4236 47.8089 56.8204 48.0312 56.8204 48.587V51.6548H53.4102L58.1892 42.5181C58.2559 42.4097 58.295 42.2875 58.3052 42.1624C58.3052 41.6067 57.5396 41.251 57.0756 41.251C56.6189 41.2496 56.2042 41.5011 56.0085 41.8957L50.3943 52.4995C50.3058 52.6482 50.258 52.8163 50.2551 52.9886C50.2551 53.5221 50.6263 53.8556 51.1134 53.8556H56.8204V56.7233C56.8204 57.2346 57.4236 57.5014 58.05 57.5014C58.6532 57.5014 59.2796 57.2346 59.2796 56.7233V53.8556H60.4163C60.8571 53.8556 61.2515 53.2998 61.2515 52.7663C61.2515 52.2105 60.9731 51.6548 60.4163 51.6548H59.2796V48.587C59.2796 48.0312 58.6532 47.8089 58.05 47.8089Z" fill="#EE6800" />
                            </svg>
                        </div>
                        <div class="advantage_text">
                            <h4><?= Yii::t('app', '24/7')?></h4>
                            <p><?= Yii::t('app', '24/7_info')?></p>
                        </div>
                    </div>
                    <div class="advantage_body">
                        <div class="advantage_icon">
                            <svg width="90" height="80" viewBox="0 0 90 80" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M89.9392 46.7621C89.9372 46.7398 89.9351 46.7175 89.9331 46.6973C89.9311 46.677 89.927 46.6506 89.923 46.6263C89.9189 46.602 89.9149 46.5817 89.9088 46.5594C89.9027 46.5371 89.8987 46.5148 89.8926 46.4925C89.8865 46.4702 89.8804 46.4479 89.8723 46.4256C89.8642 46.4033 89.8561 46.3831 89.848 46.3608C89.8399 46.3385 89.8318 46.3182 89.8216 46.2959C89.8115 46.2736 89.8013 46.2533 89.7912 46.2331C89.7811 46.2128 89.7689 46.1925 89.7588 46.1722C89.7486 46.152 89.7365 46.1337 89.7243 46.1135C89.7122 46.0932 89.698 46.0729 89.6838 46.0526C89.6696 46.0324 89.6574 46.0182 89.6453 45.9999C89.629 45.9797 89.6128 45.9594 89.5966 45.9412C89.5885 45.933 89.5824 45.9229 89.5743 45.9148L76.824 32.0517C75.6139 30.7482 73.9111 30.0104 72.1334 30.0185H57.7716V23.1346C57.7716 19.6237 54.8607 16.8425 51.3498 16.8425H44.2186C43.4341 16.8425 42.7996 17.477 42.7996 18.2615C42.7996 19.046 43.4341 19.6804 44.2186 19.6804H51.3498C53.2978 19.6804 54.9337 21.1865 54.9337 23.1346V67.9248H31.2554C30.473 62.4131 25.3708 58.5799 19.8592 59.3624C15.4179 59.9928 11.9273 63.4834 11.2969 67.9248H6.42582C4.47983 67.9248 2.8379 66.4085 2.8379 64.4625V23.1346C2.8379 21.1886 4.47983 19.6804 6.42582 19.6804H11.7854C12.5699 19.6804 13.2044 19.046 13.2044 18.2615C13.2044 17.477 12.5699 16.8425 11.7854 16.8425H6.42582C2.91493 16.8425 0 19.6237 0 23.1346V64.4625C0 67.9734 2.91493 70.7627 6.42582 70.7627H11.2948C12.0773 76.2743 17.1794 80.1075 22.6911 79.325C27.1324 78.6946 30.623 75.204 31.2534 70.7627H61.0352C61.8176 76.2743 66.9198 80.1075 72.4314 79.325C76.8727 78.6946 80.3633 75.204 80.9937 70.7627H83.5742C87.0851 70.7627 90 67.9734 90 64.4625V46.8736C90 46.8614 89.9696 46.8513 89.9696 46.8392C89.9716 46.8148 89.9412 46.7885 89.9392 46.7621ZM72.1293 32.8564C73.1125 32.8402 74.0571 33.2395 74.7301 33.9551L85.2972 45.4243H57.7716V32.8564H72.1293ZM21.2762 76.6554C17.2767 76.6554 14.0334 73.412 14.0334 69.4126C14.0334 65.4132 17.2767 62.1699 21.2762 62.1699C25.2756 62.1699 28.5189 65.4132 28.5189 69.4126C28.5148 73.412 25.2735 76.6513 21.2762 76.6554ZM71.0165 76.6554C67.0171 76.6554 63.7737 73.412 63.7737 69.4126C63.7737 65.4132 67.0171 62.1699 71.0165 62.1699C75.0159 62.1699 78.2592 65.4132 78.2592 69.4126C78.2551 73.412 75.0139 76.6513 71.0165 76.6554ZM87.1641 64.4625C87.1641 66.4085 85.5222 67.9248 83.5762 67.9248H80.9958C80.2133 62.4131 75.1091 58.5799 69.5975 59.3624C65.1562 59.9928 61.6676 63.4834 61.0352 67.9248H57.7716V48.2622H87.1641V64.4625Z" fill="#1B3B8D" />
                                <path d="M28.002 0C18.2619 0 10.3665 7.89545 10.3665 17.6355C10.3665 27.3756 18.2619 35.2711 28.002 35.2711C37.7421 35.2711 45.6375 27.3756 45.6375 17.6355C45.6274 7.8995 37.738 0.0121624 28.002 0ZM28.002 32.4332C19.8288 32.4332 13.2044 25.8087 13.2044 17.6355C13.2044 9.46238 19.8288 2.8379 28.002 2.8379C36.1751 2.8379 42.7996 9.46238 42.7996 17.6355C42.7915 25.8046 36.1711 32.423 28.002 32.4332Z" fill="#1B3B8D" />
                                <path d="M29.3925 17.0177V7.11548C29.3925 6.33101 28.758 5.69653 27.9736 5.69653C27.1891 5.69653 26.5546 6.33101 26.5546 7.11548V17.6319C26.5607 18.0272 26.7269 18.4002 27.0188 18.6678L32.4392 23.7355C33.0047 24.2747 33.9027 24.2524 34.4419 23.6868C34.9811 23.1212 34.9588 22.2233 34.3933 21.6841C34.3852 21.678 34.3791 21.6699 34.371 21.6638L29.3925 17.0177Z" fill="#EE6800" />
                                <path d="M10.4801 63.8672C8.53411 63.8672 6.89218 62.3509 6.89218 60.4049V19.677H6.42595C4.47995 19.677 2.83801 21.1831 2.83801 23.1311V64.4591C2.83801 66.4051 4.47995 67.9213 6.42595 67.9213H11.295C11.5018 66.474 12.0247 65.0915 12.8234 63.8672H10.4801Z" fill="#E3E5E8" />
                                <path d="M35.3093 63.8633C34.5289 58.3538 29.4288 54.5226 23.9192 55.3031C20.7569 55.751 17.9961 57.6727 16.4758 60.4802C17.9474 59.6754 19.5975 59.2538 21.2759 59.2558C26.2888 59.272 30.5355 62.9572 31.2552 67.9174H54.9334V63.8633H35.3093Z" fill="#E3E5E8" />
                            </svg>
                        </div>
                        <div class="advantage_text">
                            <h4><?= Yii::t('app', 'avtopark')?></h4>
                            <p><?= Yii::t('app', 'avtopark_info')?></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4 advantage_wrap">
                    <div class="advantage_body">
                        <div class="advantage_icon">
                            <svg width="97" height="96" viewBox="0 0 97 96" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M50.8733 8.23999C49.9267 8.17305 48.9705 8.13672 48.0047 8.13672C25.9833 8.13672 8.13098 25.9891 8.13098 48.0105C8.13098 70.0319 25.9833 87.8842 48.0047 87.8842C48.9686 87.8842 49.9248 87.8479 50.8733 87.781C30.1906 86.3103 13.8682 69.0661 13.8682 48.0105C13.8682 26.9548 30.1906 9.71063 50.8733 8.23999Z" fill="#E3E5E8" />
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M22.8047 7.1481C30.1303 2.61795 38.7655 0.00318008 48.0112 0.0027072C48.0132 0.00203106 48.0149 0.00169233 48.0166 0.0013536C48.0183 0.00101487 48.02 0.000676139 48.022 0C68.2968 0.00206635 85.6329 12.5763 92.6593 30.3516C93.7491 33.1086 94.5909 35.9908 95.1572 38.9706C98.0331 54.0562 93.6313 70.2548 81.9519 81.9319C74.5917 89.292 65.3045 93.8421 55.5585 95.3927C31.4653 99.2646 7.90693 84.2816 1.57396 60.1899C1.57261 60.1831 1.57092 60.1767 1.56923 60.1703C1.56754 60.1639 1.56585 60.1574 1.56449 60.1507C1.55629 60.1136 1.54999 60.0765 1.54552 60.0395C-1.52619 48.1986 -0.100467 35.188 6.55318 23.7889C6.557 23.7831 6.56035 23.7774 6.5637 23.7717C6.56704 23.7659 6.57039 23.7602 6.57422 23.7544C6.58956 23.7304 6.60566 23.7071 6.62246 23.6846C7.92469 21.4727 9.39915 19.3743 11.0274 17.408C11.037 17.3954 11.0468 17.3831 11.0569 17.3708C11.3115 17.0644 11.5702 16.7609 11.833 16.4602C14.2554 13.6837 16.9922 11.1886 19.9879 9.03044C20.9092 8.36632 21.8489 7.73888 22.8047 7.1481ZM12.7681 18.8958C11.212 20.7739 9.81034 22.7728 8.57572 24.8728C8.56303 24.8988 8.54927 24.9244 8.53444 24.9497C7.57231 26.5914 6.71309 28.2903 5.96628 30.0387L11.5795 32.2721L10.7316 34.4047L10.7261 34.4025L10.7222 34.4123L5.11329 32.1806C5.04417 32.3687 4.9763 32.5572 4.90969 32.746C3.31099 37.2834 2.43759 42.0459 2.32499 46.8578L8.34346 46.8537V49.1499H8.33554V49.1589H2.32484C2.32601 49.2086 2.32726 49.2582 2.32859 49.3079C2.35622 50.2976 2.41441 51.2813 2.50433 52.2601C2.5053 52.271 2.50612 52.2819 2.50678 52.2927C2.73381 54.7412 3.15859 57.1656 3.77615 59.5429C3.78331 59.5648 3.78985 59.5871 3.79575 59.6098C4.27716 61.4543 4.87217 63.2663 5.58211 65.0338L11.1265 62.6456L12.0338 64.7538L12.026 64.7572L12.0265 64.7584L6.49198 67.1432C8.59755 71.6947 11.4375 75.8676 14.9009 79.4955L19.1445 75.2518L19.1448 75.2522L19.1509 75.2462L20.7736 76.8689L20.7676 76.8749L20.7681 76.8755L16.5245 81.1191C20.4641 84.877 25.0462 87.9005 30.0529 90.0424L31.1758 87.2207L32.2815 84.4417L34.414 85.2895L34.4108 85.2975L34.4113 85.2977L33.8699 86.6577L32.1868 90.8893C36.8928 92.6184 41.8501 93.5609 46.863 93.6776V87.6825H46.8672V87.6763L49.1633 87.6763L49.1633 93.6777C54.6039 93.5493 59.9797 92.4481 65.0326 90.424L62.6537 84.8999L62.66 84.8972L62.6577 84.892L64.7659 83.9846L67.1459 89.5127C71.6956 87.4095 75.867 84.5713 79.494 81.113L75.2546 76.8735L75.2594 76.8687L75.2569 76.8662L76.8796 75.2435L81.1204 79.4842C84.8787 75.5475 87.9009 70.9693 90.044 65.9682L84.4514 63.7429L84.4553 63.733L84.4551 63.7329L84.8845 62.6528L85.2986 61.6106L85.2988 61.6107L85.303 61.6003L90.896 63.8262C92.6269 59.1225 93.5707 54.1692 93.6908 49.1589H87.6872V46.864H87.6884L87.6884 46.8524L93.6911 46.8537C93.5655 41.4113 92.4659 36.0378 90.4466 30.9843L84.9046 33.372L83.9962 31.2645L84.0032 31.2615L83.9994 31.2525L89.5356 28.8671C89.2878 28.3305 89.0298 27.7992 88.7617 27.2735C86.7549 23.3404 84.1864 19.7157 81.1334 16.516L76.8763 20.7711L75.2546 19.1475L75.2635 19.1386L75.2609 19.1361L79.5081 14.889C75.5678 11.1292 70.9876 8.10525 65.9811 5.96212L63.7531 11.5633L63.7511 11.5626L63.7457 11.5762L61.6134 10.7271L63.8471 5.11228C59.1411 3.38051 54.181 2.43777 49.1674 2.31843L49.166 8.33003L49.1598 8.33003V8.34043H46.8649V2.31825C41.4209 2.44437 36.0456 3.54613 30.9908 5.56822L33.3795 11.113L33.367 11.1184L33.369 11.123L31.2615 12.0314L28.871 6.48157C24.32 8.58514 20.1487 11.4236 16.5214 14.8825L20.7777 19.1388L19.1549 20.7615L19.1545 20.7611L19.1464 20.7692L14.8894 16.5141C14.1703 17.2695 13.4799 18.044 12.8182 18.8396C12.802 18.8589 12.7853 18.8777 12.7681 18.8958Z" fill="#1B3B8D" />
                                <path d="M59.2304 64.6545H36.7787C34.109 64.6526 31.9442 66.8156 31.9423 69.4853C31.9403 72.155 34.1033 74.3199 36.773 74.3218C36.7749 74.3218 36.7768 74.3218 36.7787 74.3218H59.2304C61.9002 74.3199 64.0631 72.155 64.0612 69.4853C64.0593 66.8194 61.8983 64.6565 59.2304 64.6545ZM49.152 66.9494H54.8357V72.0269H49.152V66.9494ZM46.8572 72.0269H41.1735V66.9494H46.8572V72.0269ZM34.2391 69.4891C34.241 68.0873 35.377 66.9513 36.7787 66.9513H38.8786V72.0288H36.7787C35.377 72.025 34.241 70.8909 34.2391 69.4891ZM59.2304 72.0269H57.1306V66.9494H59.2304C60.6322 66.9513 61.7682 68.0873 61.7663 69.4891C61.7663 70.8909 60.6303 72.025 59.2304 72.0269Z" fill="#EE6800" />
                                <path d="M50.5883 48.5417C49.8711 46.9946 48.0352 46.3195 46.4861 47.0367C44.9371 47.7538 44.2639 49.5897 44.9811 51.1388C45.6982 52.6859 47.5341 53.361 49.0832 52.6439C50.6303 51.9248 51.3035 50.0889 50.5883 48.5417ZM47.0637 50.1749C46.8801 49.7771 47.0522 49.3048 47.45 49.1212C47.8478 48.9376 48.3201 49.1097 48.5037 49.5075C48.6873 49.9053 48.5152 50.3776 48.1174 50.5612C47.7215 50.7448 47.2492 50.5727 47.0637 50.1749Z" fill="#1B3B8D" />
                                <path d="M48.0106 7.2168C25.5206 7.2168 7.22461 25.5109 7.22461 47.997C7.22461 70.4831 25.5206 88.7773 48.0106 88.7773C70.5005 88.7773 88.7965 70.4831 88.7965 47.997C88.7965 25.5109 70.5005 7.2168 48.0106 7.2168ZM48.0106 86.4824C26.7866 86.4824 9.5195 69.2171 9.5195 47.997C9.5195 26.7769 26.7866 9.51169 48.0106 9.51169C69.2345 9.51169 86.5017 26.7769 86.5017 47.997C86.5017 69.2171 69.2345 86.4824 48.0106 86.4824Z" fill="#EE6800" />
                                <path d="M70.1352 41.7381L72.3115 39.6727C72.7705 39.2367 72.7896 38.51 72.3536 38.051C72.1069 37.7909 71.7531 37.6609 71.3974 37.701L68.416 38.0261C65.0578 38.3914 61.7818 39.3017 58.7181 40.7226L50.7472 44.4174C47.7504 42.7804 43.9925 43.8819 42.3536 46.8787C40.7166 49.8754 41.8181 53.6333 44.8149 55.2722C47.8116 56.9093 51.5695 55.8077 53.2085 52.811C53.503 52.2717 53.7152 51.6922 53.8396 51.0917L61.8105 47.3969C64.8742 45.976 67.6873 44.0655 70.1352 41.7381ZM59.682 42.8033C62.3957 41.545 65.2892 40.7188 68.2572 40.3535C66.0599 42.3826 63.5584 44.056 60.8447 45.3124L53.8338 48.5616C53.6426 47.6475 53.2448 46.7888 52.6711 46.0525L59.682 42.8033ZM44.2565 51.4761C43.3538 49.5274 44.201 47.2153 46.1517 46.3126C48.1004 45.4099 50.4125 46.2571 51.3152 48.2078C52.2178 50.1565 51.3706 52.4686 49.4219 53.3713C47.4712 54.2701 45.161 53.4229 44.2565 51.4761Z" fill="#1B3B8D" />
                                <path d="M69.961 33.1396C66.9413 28.6818 62.7225 25.3561 57.9415 23.4189C57.9262 23.4112 57.9109 23.4036 57.8956 23.3978C57.7483 23.3385 57.6011 23.285 57.4538 23.2295C57.3372 23.1855 57.2224 23.1396 57.1057 23.0957C56.882 23.0134 56.6563 22.9369 56.4307 22.8604C56.3599 22.8356 56.2892 22.8107 56.2165 22.7878C55.9507 22.6998 55.6848 22.6195 55.4171 22.5411C55.3846 22.5315 55.354 22.5219 55.3215 22.5124C49.502 20.8256 43.3402 21.1718 37.8631 23.4093C37.7751 23.4437 37.6871 23.4781 37.5934 23.5183C27.7656 27.6874 21.3877 37.3335 21.3972 48.0105C21.3972 48.6435 21.9117 49.158 22.5447 49.158C23.1777 49.158 23.6921 48.6435 23.6921 48.0105C23.6864 41.4873 26.2911 35.3886 30.7011 30.9212C30.7145 30.9079 30.7317 30.8983 30.7451 30.8849C34.1932 27.4292 38.5076 25.1764 43.0916 24.2431C43.1452 24.2355 43.193 24.2202 43.2427 24.2087C47.1287 23.4399 51.0511 23.6617 54.7018 24.7193C54.7076 24.7212 54.7133 24.7231 54.7171 24.7231C54.9849 24.8015 55.2526 24.8838 55.5165 24.9698C55.5567 24.9832 55.5949 24.9966 55.6351 25.01C55.8665 25.0865 56.0979 25.1668 56.3274 25.2529C56.4058 25.2815 56.4823 25.3121 56.5607 25.3427C61.1428 27.0792 65.1914 30.1945 68.06 34.4286C68.4157 34.9526 69.1291 35.0884 69.6531 34.7327C70.1809 34.377 70.3167 33.6636 69.961 33.1396Z" fill="#EE6800" />
                                <path d="M48.0047 12.1895C28.2495 12.1895 12.1796 28.2575 12.1796 48.0108C12.1796 48.6438 12.694 49.1583 13.327 49.1583H17.4177C18.0507 49.1583 18.5651 48.6438 18.5651 48.0108C18.5651 47.3778 18.0507 46.8634 17.4177 46.8634H14.4936C14.6217 42.9754 15.4307 39.1391 16.8841 35.5304L19.156 36.5995C19.7298 36.8691 20.4125 36.6243 20.6841 36.0506C20.9556 35.4769 20.7089 34.7941 20.1352 34.5226L17.8154 33.4306C19.2995 30.3746 21.2367 27.5595 23.5622 25.0829L25.3484 26.8691C25.7959 27.3166 26.5226 27.3166 26.9721 26.8691C27.4196 26.4216 27.4196 25.6949 26.9721 25.2455L25.1897 23.4631C27.6185 21.2046 30.3666 19.317 33.3461 17.8617L34.3712 20.1566C34.6255 20.7379 35.3006 21.0038 35.882 20.7494C36.4634 20.495 36.7292 19.82 36.4748 19.2386C36.4729 19.2329 36.4691 19.2271 36.4672 19.2214L35.4421 16.9265C39.0757 15.4539 42.9407 14.6335 46.8611 14.5035V17.0087C46.8592 17.6417 47.3736 18.1562 48.0067 18.1581C48.6397 18.16 49.1541 17.6456 49.156 17.0126C49.156 17.0106 49.156 17.0106 49.156 17.0087V14.5054C52.4702 14.6144 55.75 15.2187 58.8844 16.2954L57.9856 18.6419C57.7561 19.2329 58.0487 19.8984 58.6377 20.1279C59.2268 20.3574 59.8942 20.0648 60.1237 19.4757C60.1256 19.4719 60.1275 19.4681 60.1275 19.4643L61.0263 17.1158C64.637 18.6457 67.9531 20.7934 70.8236 23.465L69.0413 25.2474C68.5938 25.6949 68.5938 26.4216 69.0413 26.871C69.4888 27.3185 70.2155 27.3185 70.6649 26.871L72.4511 25.0848C74.9334 27.7278 76.972 30.7551 78.4886 34.0483L76.1631 35.0867C75.5817 35.3411 75.3178 36.0181 75.5721 36.5975C75.8265 37.1789 76.5035 37.4428 77.0829 37.1885C77.0887 37.1866 77.0925 37.1847 77.0982 37.1808L79.3759 36.1653C80.6744 39.5886 81.3973 43.203 81.5197 46.8634H78.609C77.976 46.8634 77.4616 47.3778 77.4616 48.0108C77.4616 48.6438 77.976 49.1583 78.609 49.1583H82.6863C83.3193 49.1583 83.8337 48.6438 83.8337 48.0108C83.8318 28.2575 67.7599 12.1895 48.0047 12.1895Z" fill="#EE6800" />
                            </svg>
                        </div>
                        <div class="advantage_text">
                            <h4><?= Yii::t('app', 'time')?></h4>
                            <p><?= Yii::t('app', 'time_info')?></p>
                        </div>
                    </div>
                    <div class="advantage_body">
                        <div class="advantage_icon">
                            <svg width="75" height="90" viewBox="0 0 75 90" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M8.5522 9.36643C8.55627 5.54449 11.6533 2.44743 15.4753 2.44336H9.36668C5.54473 2.44743 2.44768 5.54449 2.4436 9.36643V12.2171H8.5522V9.36643Z" fill="#E3E5E8" />
                                <path d="M2.4436 14.6604H8.5522V72.8957H2.4436V14.6604Z" fill="#E3E5E8" />
                                <path d="M8.5522 80.633V75.3389H2.4436V80.633C2.44768 84.4549 5.54473 87.552 9.36668 87.5561H15.4753C11.6533 87.552 8.55627 84.4549 8.5522 80.633Z" fill="#E3E5E8" />
                                <path d="M9.46833 90H42.0475C44.5195 89.9919 46.8876 89.0002 48.6265 87.243C50.3654 85.4837 51.3326 83.1054 51.3122 80.6335V60.2715H48.8688V72.8959H2.44344V14.6606H46.9853C47.6593 14.6606 48.207 14.1129 48.207 13.4389C48.207 12.7649 47.6593 12.2172 46.9853 12.2172H2.44344V9.36652C2.44344 5.54864 5.65045 2.44344 9.46833 2.44344H42.0475C45.8654 2.44344 48.8688 5.54864 48.8688 9.36652V12.2172H46.1199C45.4459 12.2172 44.8982 12.7649 44.8982 13.4389C44.8982 14.1129 45.4459 14.6606 46.1199 14.6606H48.8688V24.4344H51.3122V9.36652C51.3326 6.89457 50.3674 4.51629 48.6265 2.75701C46.8876 0.999774 44.5195 0.0081448 42.0475 0H9.46833C4.30453 0 0 4.20272 0 9.36652V80.6335C0 85.7973 4.30453 90 9.46833 90ZM2.44344 75.3394H48.8688V80.6335C48.8688 84.4514 45.8654 87.5566 42.0475 87.5566H9.46833C5.65045 87.5566 2.44344 84.4514 2.44344 80.6335V75.3394Z" fill="#1B3B8D" />
                                <path d="M25.7576 85.7242C28.1196 85.7242 30.0336 83.8101 30.0336 81.4481C30.0336 79.0861 28.1196 77.1721 25.7576 77.1721C23.3956 77.1721 21.4816 79.0861 21.4816 81.4481C21.4836 83.8081 23.3976 85.7221 25.7576 85.7242ZM25.7576 79.6156C26.7696 79.6156 27.5902 80.4361 27.5902 81.4481C27.5902 82.4601 26.7696 83.2807 25.7576 83.2807C24.7456 83.2807 23.925 82.4601 23.925 81.4481C23.925 80.4361 24.7456 79.6156 25.7576 79.6156Z" fill="#1B3B8D" />
                                <path d="M74.7285 28.3032C74.7285 25.3792 72.3583 23.009 69.4344 23.009H28.7104C25.7864 23.009 23.4163 25.3792 23.4163 28.3032V56.4027C23.4163 59.3267 25.7864 61.6968 28.7104 61.6968H69.4344C72.3583 61.6968 74.7285 59.3267 74.7285 56.4027V28.3032ZM28.8122 59.2534C28.3439 59.2534 27.8816 59.1373 27.4683 58.9154L37.3968 46.6697C37.6798 46.3317 37.7572 45.8674 37.6025 45.4561C37.4477 45.0448 37.0812 44.7475 36.6454 44.6803C36.2097 44.6131 35.7719 44.7862 35.4991 45.1323L25.9493 56.8486C25.9086 56.7041 25.878 56.5554 25.8597 56.4047V32.3043L44.9918 47.3437C46.1097 48.4167 47.6002 49.0133 49.1497 49.0093C50.6789 49.0113 52.1491 48.4127 53.2425 47.3437L72.285 32.3063V56.4027C72.3013 56.5534 72.3034 56.7061 72.2952 56.8588L62.7373 45.1283C62.5337 44.8778 62.2405 44.719 61.9188 44.6864C61.597 44.6538 61.2794 44.7516 61.0289 44.9552C60.5097 45.3848 60.4344 46.1525 60.862 46.6737L70.8679 58.9174C70.4565 59.1373 69.9984 59.2534 69.5321 59.2534H28.8122ZM28.8122 25.4525H69.5362C71.1081 25.4525 72.285 26.7312 72.285 28.3032V29.195L51.6909 45.4663C51.6543 45.4948 51.6461 45.5253 51.6135 45.5579C50.2534 46.9059 48.0604 46.9059 46.6982 45.5579C46.6656 45.5253 46.5862 45.4948 46.5495 45.4663L25.8597 29.195V28.3032C25.8597 26.7312 27.2402 25.4525 28.8122 25.4525Z" fill="#EE6800" />
                            </svg>
                        </div>
                        <div class="advantage_text">
                            <h4><?= Yii::t('app', 'free')?></h4>
                            <p><?= Yii::t('app', 'free_info')?></p>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </section>
    <section class="mobile-app">
        <div class="container-xl">
            <picture><source srcset="/img/left-box.webp" type="image/webp"><img src="/img/left-box.png" class="left-box" alt=""></picture>
            <picture><source srcset="/img/right_box.webp" type="image/webp"><img src="/img/right_box.png" class="right_box" alt=""></picture>
            <div class="row">
                <div class="col-md-5 col-lg-5 lm">
                    <div class="mobile-app_left">
                        <picture><source srcset="/img/phone_mock.png" type="image/webp"><img src="/img/phone_mock.png" alt=""></picture>
                    </div>
                    <div class="mobile-app_right mobile-app-min">
                        <p style="color: #EE6800; font-weight: bold;" class="site-index-min-p"><?= Yii::t('app', 'mobile_download')?></p>
                        <div class="app-link">
                            <a href="<?= $general->appstore ?>" style="display: none">
                                <div class="icon _iconapple"></div>
                                <div class="appstore">
                                    <span>Download on the </span>
                                    <p>App Store</p>
                                </div>
                            </a>
                            <div style="padding: 10px; background: #FFFFFF; margin-right: 10px; display: none;">
                                <img src="/img/app_qr_code.png" height="100">
                            </div>
                            <a href="<?= $general->google_play ?>" style="margin-right: 0px; margin-bottom: 0px;">
                                <div class="icon _icongoogle"></div>
                                <div class="appstore">
                                    <span>Available on the </span>
                                    <p>Google Play</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-md-7 col-lg-7 rm">
                    <div class="mobile-app_right mobile-app-max">
                        <h3><?= Yii::t('app', 'mobile')?></h3>
                        <h4><?= Yii::t('app', 'mobile_info')?></h4>
                        <ul>
                            <li>
                                <div class="_iconcheck"></div>
                                <span><?= Yii::t('app', 'mobile_info_1')?></span>
                            </li>
                            <li>
                                <div class="_iconcheck"></div>
                                <span><?= Yii::t('app', 'mobile_info_2')?></span>
                            </li>
                            <li>
                                <div class="_iconcheck"></div>
                                <span><?= Yii::t('app', 'mobile_info_3')?></span>
                            </li>
                            <li>
                                <div class="_iconcheck"></div>
                                <span><?= Yii::t('app', 'mobile_info_4')?></span>
                            </li>
                            <li>
                                <div class="_iconcheck"></div>
                                <span><?= Yii::t('app', 'mobile_info_5')?></span>
                            </li>
                            <li>
                                <div class="_iconcheck"></div>
                                <span><?= Yii::t('app', 'mobile_info_6')?></span>
                            </li>

                        </ul>
                        <p style="color: #EE6800; font-weight: bold;" class="site-index-min-p"><?= Yii::t('app', 'mobile_download')?></p>
                        <div class="app-link">
                            <a href="<?= $general->appstore ?>" style="display: none">
                                <div class="icon _iconapple"></div>
                                <div class="appstore">
                                    <span>Download on the </span>
                                    <p>App Store</p>
                                </div>
                            </a>
                            <a href="<?= $general->google_play ?>">
                                <div class="icon _icongoogle"></div>
                                <div class="appstore">
                                    <span>Available on the </span>
                                    <p>Google Play</p>
                                </div>
                            </a>
                            <div style="padding: 10px; background: #FFFFFF;">
                                <img src="/img/app_qr_code.png" height="100">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="tg-bot">
        <div class="container-xl">
            <div class="row">
                <div class="col-md-6 col-lg-5 col-lg-5">
                    <div class="tg-bot_body">
                        <h3><?= Yii::t('app', 'easy')?></h3>
                        <p><?= Yii::t('app', 'easy_bot')?></p>
                        <a href="<?= $general->bot_link ?>" class="btn-tg btn" target="_blank"><span> <?= $general->bot_name ?> </span>
                            <div class="_iconright-arrow"></div>
                        </a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-7 col-lg-7 p-0">
                    <div class="tg-bot_img-blo">
                        <picture><source srcset="/img/tg-bot.webp" type="image/webp"><img src="/img/tg-bot.png" alt=""></picture>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <style type="text/css">
        .bts-description {
            padding-bottom: 40px;
        }
        .bts-description .row {
            background: #FFFFFF;
        }
    </style>
    <?php if ($lang == 'uz'): ?>
        <section class="bts-description">
            <div class="container-xl">
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-lg-12">
                        <div style="padding: 60px 50px;" class="site-index-text-min">
                            <h1 style="font-weight: 750; font-size: 40px; color: #1b3b8d; margin-bottom: 24px;">
                                BTS Express pochta xizmatlari
                            </h1>
                            <p style="font-size: 22px; line-height: 35px; text-align: justify;">
                                Bizning <a href="https://bts.uz/uz/service?id=1">kuryerlik xizmatimiz ekspress pochta, kompleks logistika </a>, kuryer xizmatlari yo‘nalishi bo‘yicha pochta va yuklarnini yetkazib berishning turli variantlarini taklif etadi. Yuridik va jismoniy shaxslar uchun yuk va hujjatlar uchun turli talablar mavjud. Ilg'or texnologiyalar, puxta o'ylangan logistika, tezkor jo'natmalarni ustuvor qayta ishlash, yuklarnini kuzatish bizga jo;natmalar mutlaq xavfsizligi bilan tovarlarni o'z vaqtida chet elga yetkazib berishni ta'minlash imkonini beradi. Kompaniyaning maqsadi – jo’natmalar yuqori darajadagi maxfiyligi va yaxlitligini ta'minlash, shuningdek, xaridorlarning xohish-istaklariga moslashgan holda, arzon narxlarda yetkazib berish xizmatini taqdim etishdir. Kompaniyamiz veb-saytida siz amaldagi qoidalar bilan tanishishingiz va tovarlarni jo'natish uchun zarur bo'lgan hujjatlar ro'yxatini yuklab olishingiz mumkin. Sizning qulayligingiz uchun 24/7 ish rejimida faoliyat ko’rsatamiz.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="bts-description">
            <div class="container-xl">
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-lg-12">
                        <div style="padding: 60px 50px;" class="site-index-text-min">
                            <h2 style="font-weight: 750; font-size: 40px; color: #1b3b8d; margin-bottom: 24px;">
                                BTS Express <a href="https://bts.uz/uz/service?id=3">kuryerlik xizmati</a>
                            </h2>
                            <p style="font-size: 22px; line-height: 35px; text-align: justify;">
                                O’zbekistondagi BTS Express ishonchli xususiy kuryerlik kompaniyasi hujjatlar va tovarlarni
                                Toshkent bo'ylab, O’zbekiston va butun dunyo bo'ylab etkazib beradi. Pochta va jo’natmalarni
                                tezkor yetkazib berish shahar bo ylab bir kun ichida, asosiy shaharlararo jo nab ketishlar uchun ʻylab bir kun ichida, asosiy shaharlararo joʻnab ketishlar uchun ʻylab bir kun ichida, asosiy shaharlararo joʻnab ketishlar uchun 1 kunda yetkazib beriladi. <a href="https://bts.uz/uz/service?id=4">Xalqaro yetkazib berish</a> – dunyoning 89 dan ortiq mamlakatlariga amalga oshiriladi. BTS Express kuryerlik xizmati nafaqat tezkor jo‘natmalarni tashish, balki pochta jo‘natmalari, <a href=" https://bts.uz/uz/service?id=5">omborxona xizmatlari</a>,  <a href=" https://bts.uz/uz/service?id=6">onlayn-do‘konlardan</a> tovarlarni yetkazib berish, <a href=" https://bts.uz/uz/service?id=1">individual yuk tashish</a>, yuklarnini sug‘urtalash va jo‘natilmagan yoki talab qilinmagan yuklarnini saqlash kabi xizmatlarning to‘liq spektrini taklif etadi. Biz bilan birga 30 dan ortiq yirik kompaniyalar bilan hamlorlk qiladilar.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php elseif ($lang == 'ru'): ?>
        <section class="bts-description">
            <div class="container-xl">
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-lg-12">
                        <div style="padding: 60px 50px;" class="site-index-text-min">
                            <div class="seo-container">
                                <h1 style="font-weight: 750; font-size: 40px; color: #1b3b8d; margin-bottom: 24px;">
                                    Служба экспресс-почты BTS Express
                                </h1>
                                <p style="font-size: 22px; line-height: 35px; text-align: justify;">
                                    Наша курьерская служба предлагает различные варианты доставки почты и грузов в направлении 
                                    <a href="https://bts.uz/ru/service?id=8">экспресс-почты, комплексной логистики, курьерских служб</a>. Существуют разные требования к 
                                    багажу и документам для юридических и физических лиц. Передовые технологии, продуманная 
                                    логистика, приоритетное оформление экспресс-отправлений, отслеживание грузов позволяют нам 
                                    обеспечить своевременную доставку товаров за границу при абсолютной сохранности отправлений. 
                                    Цель компании – обеспечить высокий уровень конфиденциальности и целостности отправлений, а 
                                    также предоставить услугу доставки по низким ценам, подстраиваясь под пожелания клиентов. На 
                                    сайте нашей компании вы можете ознакомиться с действующими нормативами и скачать перечень 
                                    документов, необходимых для отгрузки товара. Мы работаем 24/7 для вашего удобства
                                </p>
                            </div>
                            <div class="show-all-text">
                                <?= Yii::t('app', 'more') ?>
                                <span class="icon _iconright-arrow" style="display: inline-block; vertical-align: middle;"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="bts-description">
            <div class="container-xl">
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-lg-12">
                        <div style="padding: 60px 50px;" class="site-index-text-min">
                            <div class="seo-container">
                                <h2 style="font-weight: 750; font-size: 40px; color: #1b3b8d; margin-bottom: 24px;">
                                    Курьерская служба BTS Express
                                </h2>
                                <p style="font-size: 22px; line-height: 35px; text-align: justify;">
                                    BTS Express, надежная частная курьерская компания в Узбекистане, доставляет документы и товары по Ташкенту, Узбекистану и всему миру. Ускоренная доставка почты и посылок в течение одного дня по городу, международная доставка в более чем 89 стран мира. <a href="<?= Url::to(['/site/service', 'id'=>10]) ?>">Курьерская служба</a> BTS Express — это не только экспресс-доставка, но и целый комплекс услуг, таких как почтовая доставка, <a href="<?= Url::to(['/site/service', 'id'=>12]) ?>">складские услуги</a>, доставка товаров из интернет-магазинов, <a href="<?= Url::to(['/site/service', 'id'=>23]) ?>">индивидуальная грузоперевозка</a>, страхование груза и хранение недоставленного или невостребованного груза. жидк. Для интернет-магазинов наша компания BTS запустила новую услугу, такую как «<a href="<?= Url::to(['/site/service', 'id'=>13]) ?>">Доставка и возврат товара</a>». Вместе с нами они сотрудничают с более чем 30 крупными компаниями.
                                </p>
                            </div>
                            <div class="show-all-text">
                                <?= Yii::t('app', 'more') ?>
                                <span class="icon _iconright-arrow" style="display: inline-block; vertical-align: middle;"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- New SEO text -->

        <section class="bts-description">
            <div class="container-xl">
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-lg-12">
                        <div style="padding: 60px 50px;" class="site-index-text-min">
                            <div class="seo-container">
                                <p style="font-size: 22px; line-height: 35px; text-align: justify;">
                                    Ищете в Узбекистане надежную службу доставки для постоянного сотрудничества? Требуются услуги комплексной логистики с внутренними и международными перевозками? Желаете арендовать складские помещения в Ташкенте или других городах страны? Компания BTS Express Cargo Servis поможет с решением этих и многих других задач. Мы уже много лет специализируемся на оказании различных транспортных услуг. Наша деятельность охватывает не только всю территорию Узбекистана, но и большинство зарубежных стран. Клиентам предлагаются выгодные, комфортные и надежные условия сотрудничества. Ознакомьтесь с обзором наших услуг по перевозке грузов и преимуществами сервиса.
                                </p>
                                <h2 style="font-weight: 750; font-size: 40px; color: #1b3b8d; margin-bottom: 24px;">
                                    Что мы предлагаем: комплекс услуг от BTS
                                </h2>
                                <p style="font-size: 22px; line-height: 35px; text-align: justify;">
                                    достаточно длительный период деятельности мы освоили целый ряд направлений. На сегодняшний день компания предлагает более десятка востребованных услуг в сфере логистики. Обращаясь в BTS, вы сможете воспользоваться любым из следующих сервисов:
                                </p>
                                <ul style="font-size: 22px; line-height: 35px; text-align: justify; padding-left: 35px;">
                                    <li style="list-style: disc;">
                                        Экспресс почта. Эта услуга позволяет отправлять посылки весом до 20 кг. и корреспонденцию в самые отдаленные населенные пункты Узбекистана.
                                    </li>

                                    <li style="list-style: disc;">
                                        Комплексная логистика. Такой сервис рассчитан на отправления весом от 20 кг и предполагает использование всех доступных видов транспорта.
                                    </li>

                                    <li style="list-style: disc;">
                                        Курьерская служба. Сервис доставки "от двери до двери" позволяет максимально сэкономить ваше время, обеспечивает комфорт и безопасность.
                                    </li>

                                    <li style="list-style: disc;">
                                        Складские услуги. В распоряжении нашей компании имеются крупные складские помещения, соответствующие международным стандартам.
                                    </li>

                                    <li style="list-style: disc;">
                                        E-COMMERCE. Данная услуга предназначена для владельцев интернет-магазинов. Она позволяет сократить затраты на доставку и возврат товара.
                                    </li>

                                    <li style="list-style: disc;">
                                        Международная доставка. Мы постоянно расширяем географию своей деятельности. Сегодня BTS Express доставляет грузы в более 89 стран.
                                    </li>

                                    <li style="list-style: disc;">
                                        Индивидуальная перевозка. Специфика услуги состоит в перевозке крупногабаритных и негабаритных грузов (спецтранспорт, спецмаршруты).
                                    </li>
                                </ul>
                                <p style="font-size: 22px; line-height: 35px; text-align: justify;">
                                    Подробную информацию о каждой из наших услуг по хранению и перевозке грузов вы найдете на соответствующих страницах сайта. Там же можно оставить заявку, заполнив онлайн-анкету. При возникновении вопросов, связанных со стоимостью услуг доставки грузов или другими условиями, задайте их нашему консультанту (контакты указаны в футере).
                                </p>
                                <h2 style="font-weight: 750; font-size: 40px; color: #1b3b8d; margin-bottom: 24px;">
                                    Где в Узбекистане заказать услуги доставки: наши преимущества
                                </h2>
                                <p style="font-size: 22px; line-height: 35px; text-align: justify;">
                                    Разнообразный спектр деятельности, охватывающий широкие интересы клиентов, — не единственный плюс сервиса от BTS. Многолетний опыт позволил нам обеспечить ряд других выгодных для заказчиков условий. Выделим только несколько преимуществ выбора нашей компании для заказа услуг перевозки и хранения грузов в Ташкенте:
                                </p>
                                <ul style="font-size: 22px; line-height: 35px; text-align: justify; padding-left: 35px;">
                                    <li style="list-style: disc;">
                                        Гарантированное качество и надежность. Мы несем ответственность за все грузы. Упаковка производится только один раз. Все отправления максимально защищены от утери или хищения.
                                    </li>
                                    <li style="list-style: disc;">
                                        Надежное хранение. Наше складское помещение площадью 3900 м2 оборудовано по высоким международным стандартам, что позволяет сохранять любые грузы в течение долгого времени.
                                    </li>
                                    <li style="list-style: disc;">
                                        Большой автопарк с автомобилями более чем 90 разных классов. Такой арсенал позволяет оказывать разные виды услуг перевозки грузов, включая негабаритные и крупногабаритные.
                                    </li>
                                    <li style="list-style: disc;">
                                        Оптимальные сроки выполнения заказов. Стандартные перевозки грузов и почты в пределах Узбекистана осуществляются в течение 24 часов. Международные перевозки также выполняются в минимальные сроки.
                                    </li>
                                    <li style="list-style: disc;">
                                        Круглосуточный сервис. Вы можете подать заявку на перевозку или отправление почты, а также связаться с нашим колл-центром в любое время суток за исключением праздничных дней.
                                    </li>
                                    <li style="list-style: disc;">
                                        Комплекс бесплатных услуг. Компания осуществляет смс-оповещение, отправку детализации, возможность отслеживать перемещение вашего груза и ряд других сервисов за свой счет.
                                    </li>
                                </ul>
                                <p style="font-size: 22px; line-height: 35px; text-align: justify;">
                                    Кроме того, мы запустили мобильное приложение, значительно улучшающее качество обслуживания. С помощью этой программы можно оформлять заказы, просматривать цены на услуги перевозки, отслеживать перемещение багажа, управлять своим счетом, сохранять подпись получателя в электронном виде и решать ряд других задач. Перевозите и храните грузы, доставляйте и получайте почту с BTS Express Cargo Servis. Мы сделаем все возможное, чтобы вы были полностью удовлетворены качеством сервиса!
                                </p>
                            </div>
                            <div class="show-all-text">
                                <?= Yii::t('app', 'more') ?>
                                <span class="icon _iconright-arrow" style="display: inline-block; vertical-align: middle;"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    <?php endif ?>
</div>
<?php
    $this->registerJs("
        const swiper = new Swiper('.main-slide', {
            direction: 'horizontal',
            loop: true,
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
        });

        $('.show-all-text').click(function(e){
            var cssValue =$(this).closest('.site-index-text-min').find('.seo-container').css('height');
            if (cssValue == '180px') {
                $(this).closest('.site-index-text-min').find('.seo-container').css('height', 'auto');
            } else {
                $(this).closest('.site-index-text-min').find('.seo-container').css('height', '180px');
            }
        })
    ");
?>