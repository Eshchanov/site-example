<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/base.css',
        'css/site.css',
        'css/style.css',
        'css/magnific-popup.css',
        'css/slick.css',
        'css/rating.css',
        'css/swiper-bundle.min.css',
        'css/jquery.fancybox.min.css',
        'css/fontawesome-pro-5.4.1/css/all.css',
        'fontawesome-free/css/all.min.css',
        'js/sweetalert/sweetalert.css',
    ];
    public $js = [
        // 'https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js',
        'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js',
        'js/bootstrap.js',
        'https://cdnjs.cloudflare.com/ajax/libs/rangeslider.js/2.3.3/rangeslider.min.js',
        'js/swiper-bundle.min.js',
        'js/jquery.fancybox.min.js',
        'js/slick.min.js',
        'js/jquery.magnific-popup.min.js',
        // 'js/jquery.mask.min.js',
        'js/scriptBts.js',
        'js/main.js',
        'js/sweetalert/sweetalert.min.js',
        // 'js/bootstrap/bootstrap-inputmask.js',
        'js/jquery.input.js',
        'js/jquery.barrating.js',
        // 'js/jquery.barrating.min.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap4\BootstrapAsset',
    ];
}
