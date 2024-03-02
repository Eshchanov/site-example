<?php

/* @var $this \yii\web\View */
/* @var $content string */

use common\widgets\Alert;
use frontend\assets\AppAsset;
use frontend\widgets\Wlang;
use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap4\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use yii\helpers\Url;

$general = \common\models\General::find()->where(['lang' => \common\models\Lang::getCurrent()])->one();

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="google-site-verification" content="dgbsaAPHx6C6-reJ0aWrGaCo3j66Olg0Pf_11qKhDiw" />
        <?php $this->registerCsrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
        <style type="text/css">
            div.required label:after {
                content: " *";
                color: red;
            }
            .btn-bts {
                color: rgba(255, 255, 255, 0.5) !important;
                text-align: center;
                border: 1px solid rgba(255, 255, 255, 0.5);
                border-radius: 100px;
                padding: 12px 24px;
                -webkit-transition: all 0.3s ease 0s;
                -o-transition: all 0.3s ease 0s;
                transition: all 0.3s ease 0s;
            }
            .btn-bts:hover {
                background: #ee6800;
                color: #fff !important;
                border: 1px solid #ee6800;
            }
            .page-wrap .breadcrumbs ul {
                margin: 0;
            }
            .form-group .is-invalid {
                border: 1px solid #DC3545;
            }
            .form-group .is-valid {
                border: 1px solid #00B7A7;
            }
            .btn-disable {
                white-space: nowrap;
                cursor: no-drop !important;
                opacity: 0.5;
            }
            .btn-danger {
                color: #fff;
                background-color: #dc3545;
                width: fit-content;
                float: left;
            }
            .btn-danger:hover {
                color: #fff;
                background-color: #c82333;
            }
            .btn-danger:visited {
                color: #fff;
            }
            .btn-success {
                color: #fff;
                background-color: #28a745;
                width: fit-content;
                float: right;
            }
            .btn-success:hover {
                color: #fff;
                background-color: #218838;
            }
            .btn-success:visited {
                color: #fff;
            }
            .sign-up.sms {
                height: auto;
                padding: 30px 0;
            }
            .vertical-time-simple::before {
                left: 11px;
            }
            .vertical-timeline-item {
                position: relative;
                margin: 0 !important;
                padding-bottom: 0.5rem;
            }
            .vertical-timeline-item::before {
                content: '';
                position: absolute;
                top: 0;
                left: 11px;
                height: 100%;
                width: 4px;
                background: #cccccc;
                border-radius: 0.25rem;
            }
            .vertical-timeline::before {
                content: none;
            }
            .vertical-time-simple .timeline-title {
                font-size: 16px;
            }
            .vertical-timeline-element-content {
                font-size: 16px;
            }
            .history-item-selected {
                box-shadow: inset 0 0 10px #777;
                border-radius: 5px;
                background-color: #eee;
            }
            .perfect-media {
                justify-content: center !important;
            }
            .sweet-alert
            {
                overflow: visible;
            }
            .alert-confirm-logo
            {
                width: 80px;
                height: 80px;
                margin-left: auto;
                margin-right: auto;
                padding-top: 17px;
                border: 3px solid #e77713;
                border-radius: 50%;
                margin-top: -90px;
                background-color: #FFFFFF;
            }
            .alert-confirm-logo img
            {
                max-width: 100%;
            }
            .sweet-alert .sa-button-container .confirm
            {
                color: #fff !important;
                background-color: #337ab7 !important;
                border-color: #2e6da4 !important;
            }
            .sweet-alert .sa-button-container .cancel {
                color: #fff !important;
                background-color: #c9302c !important;
                border-color: #ac2925 !important;
            }

            .call-back {
                position: fixed;
                right: 50px;
                bottom: 50px;
            }

            .pulsenew {
                height: 80px;
                width: 80px;
                background: #1B3B8D;
                position: relative;
                margin: auto;
                left: 0;
                right: 0;
                top: 0;
                bottom: 0;
                border-radius: 50%;
                display: grid;
                place-items: center;
                font-size: 50px;
                color: #ffffff;
                margin-top: 13%;
                cursor: pointer;
            }

            .pulsenew:before,
            .pulsenew:after {
                content: "";
                position: absolute;
                height: 100%;
                width: 100%;
                background-color: rgba(70, 70, 70, 0.5);
                border-radius: 50%;
                z-index: 1;
                opacity: 0.7;
            }

            .pulsenew:before {
                -webkit-animation: pulsenew 2s ease-out infinite;
                animation: pulsenew 2s ease-out infinite;
            }

            .pulsenew:after {
                -webkit-animation: pulsenew 2s 1s ease-out infinite;
                animation: pulsenew 2s 1s ease-out infinite;
            }

            .pulsenew i {
                font-size: 30px;
            }

            @-webkit-keyframes pulsenew {
                100% {
                    -webkit-transform: scale(2.5);
                    transform: scale(2.5);
                    opacity: 0;
                }
            }

            @keyframes pulsenew {
                100% {
                    -webkit-transform: scale(2.5);
                    transform: scale(2.5);
                    opacity: 0;
                }
            }

            @media screen and (max-width: 768px)
            {
                .input-group-prepend {
                    /*margin-bottom: 15px;*/
                }
                .input-group input[type=text], .input-group input[type=number], .input-group input[type=password], .input-group select {
                    margin-bottom: 0;
                }
                .call-back {
                    right: 20px;
                    bottom: 20px;
                }
                .pulsenew {
                    width: 40px;
                    height: 40px;
                }
                .pulsenew i {
                    font-size: 20px;
                }
                .pulsenew span {
                    margin-top: 0 !important;
                    font-size: 20px;
                }
            }
            @media screen and (max-width: 991px)
            {
                .copyright {
                    text-align: center;
                    margin-bottom: 15px;
                }
                .perfect-media {
                    justify-content: center !important;
                    flex-wrap: wrap;
                }
                .perfect-media a {
                    flex: 0 0 100%;
                    max-width: 100%;
                }
            }
            @media screen and (max-width: 1200px)
            {
                .perfect-media {
                    margin-top: 15px;
                }
            }
        </style>
        <script src="https://www.google.com/recaptcha/api.js"></script>
    </head>
    <body>
    <?php $this->beginBody() ?>
    <header>
        <?php if (!Yii::$app->user->isGuest) {
            if (Yii::$app->user->identity->role == 100){
                NavBar::begin([
                    'brandLabel' => Yii::$app->name,
                    'brandUrl' => Yii::$app->homeUrl,
                    'options' => [
                        'class' => 'navbar navbar-expand-md navbar-dark bg-dark fixed-top',
                    ],
                ]);
                $menuItems = [
                    ['label' => 'Asosiy', 'url' => ['general/view']],
                    ['label' => 'Slider', 'url' => ['slider/index']],
                    ['label' => 'Xizmatlar', 'url' => ['services/index']],
                    ['label' => 'Ofislar', 'url' => ['office/index']],
                    ['label' => 'Proektlar', 'url' => ['project/index']],
                    ['label' => 'Yangiliklar', 'url' => ['news/index']],
                    ['label' => 'Jamoa', 'url' => ['team/index']],
                    [
                        'label' => 'Haqida',
                        'items' => [
                            ['label' => 'FAQ', 'url' => ['faq/index']],
                            ['label' => 'Shartlar', 'url' => ['condition/index']],
                            ['label' => 'Biz haqimizda fikrlar', 'url' => ['review/index']],
                            ['label' => 'Bo\'sh ish o\'rinlari', 'url' => ['vacancy/index']],
                            ['label' => Yii::t('app', 'privancies'), 'url' => ['privancy-policy/view']],
                        ],
                    ],
                ];
                $menuItems[] = '<li class="ml-auto">'
                    . Html::beginForm(['/site/logout'], 'post', ['class' => 'form-inline'])
                    . Html::submitButton(
                        'Logout (' . Yii::$app->user->identity->username . ')',
                        ['class' => 'btn btn-link logout btn-sm']
                    )
                    . Html::endForm()
                    . '</li>';
                echo Nav::widget([
                    'options' => ['class' => 'navbar-nav', 'style' => 'width: 100%;'],
                    'items' => $menuItems,
                ]);
                NavBar::end();
            }
        } ?>
        <div class="container-xl" <?php if (!Yii::$app->user->isGuest):if (Yii::$app->user->identity->role == 100): ?>style="padding-top: 66px"<?php endif;endif; ?>>
            <div class="row">
                <div class="col-sm-3 col-md-6 col-xl-8">
                    <div class="logo-block">
                        <?= Html::a('<picture><source srcset="/img/logo.svg" type="image/webp"><img src="/img/logo.svg" alt=""></picture>', ['site/index'], ['class' => 'logo'])?>
                        <div class="support">
                            <div class="icon _iconsupport"></div>
                            <div class="support_phone">
                                <p> <a href="tel:<?= $general->call_centre ?>" class="link"><?= $general->call_centre ?></a> </p>
                                <a href="tel:<?= $general->tel ?>" class="link"><?= $general->tel ?></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-8 col-md-6 col-xl-4">
                    <div class="header_right_block">
                        <div class="social">
                            <ul>
                                <li>
                                    <a href="<?= $general->instagram ?>" class="link" target="_blank">
                                        <div class="_iconinsta"></div>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= $general->facebook ?>" class="link" target="_blank">
                                        <div class="_iconfb"></div>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= $general->telegram ?>" class="link" target="_blank">
                                        <div class="_icontg"></div>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= $general->youtube ?>" class="link" target="_blank">
                                        <div class="_iconyoutube"></div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <?= WLang::widget();?>
                        <a href="<?= Url::to(['/site/profile']) ?>">
                            <div class="registration_block" style="gap: 10px; margin-right: 0; margin-left: 40px;">
                                <?php if (Yii::$app->user->isGuest): ?>
                                    <?= Html::a('<span>'.Yii::t('app', 'cabinet').'</span><div class="icon _iconuser" style="font-size: 30px; margin-right: 0; margin-left: 10px;"></div>', ['site/login'], ['class' => 'log_in'])?>
                                <?php else: ?>
                                    <?php
                                        $session = Yii::$app->session;
                                        $img = $session->get('img');
                                        $name = $session->get('name');
                                    ?>
                                    <?php if ($name): ?>
                                        <?= $name ?>
                                    <?php else: ?>
                                        <?= Yii::t('app', 'cabinet') ?>
                                    <?php endif ?>
                                    <?php if ($img): ?>
                                        <?= Html::img($img, [
                                            'style' => '
                                                width: 75px;
                                                border-radius: 50%;
                                                padding: 5px;
                                                border: 1px solid #c2c5cc;
                                            '
                                        ]); ?>
                                    <?php else: ?>
                                        <div class="icon _iconuser" style="font-size: 30px;"></div>
                                        <!-- <div class="icon _iconuser"></div> -->
                                        <!-- <div class="icon _iconVector"></div> -->
                                    <?php endif ?>
                                <?php endif; ?>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="header_burger">
            <span></span>
        </div>
        <div class="main-menu">
            <div class="container-xl">
                <div class="row">
                    <div class="col-12">
                        <nav>
                            <ul>
                                <li>
                                    <?= (Yii::$app->controller->action->id == 'index' && Yii::$app->controller->id == 'site')
                                        ? Html::a(Yii::t('app', 'main'), ['site/index'], ['class' => 'nav-link active'])
                                        : Html::a(Yii::t('app', 'main'), ['site/index'], ['class' => 'nav-link']) ; ?>
                                </li>
                                <li>
                                    <?= (Yii::$app->controller->action->id == 'calculate' && Yii::$app->controller->id == 'site')
                                        ? Html::a(Yii::t('app', 'clients'), ['site/calculate'], ['class' => 'nav-link active'])
                                        : Html::a(Yii::t('app', 'clients'), ['site/calculate'], ['class' => 'nav-link']) ; ?>
                                </li>
                                <li>
                                    <?= (Yii::$app->controller->action->id == 'service' && Yii::$app->controller->id == 'site')
                                        ? Html::a(Yii::t('app', 'services'), ['site/services'], ['class' => 'nav-link active'])
                                        : Html::a(Yii::t('app', 'services'), ['site/services'], ['class' => 'nav-link']) ; ?>
                                </li>
                                <li>
                                    <?= (Yii::$app->controller->action->id == 'partner' && Yii::$app->controller->id == 'site')
                                        ? Html::a(Yii::t('app', 'partner'), ['site/partner'], ['class' => 'nav-link active'])
                                        : Html::a(Yii::t('app', 'partner'), ['site/partner'], ['class' => 'nav-link']) ; ?>
                                </li>
                                <li>
                                    <?= (Yii::$app->controller->action->id == 'about' && Yii::$app->controller->id == 'site')
                                        ? Html::a(Yii::t('app', 'about'), ['site/about'], ['class' => 'nav-link active'])
                                        : Html::a(Yii::t('app', 'about'), ['site/about'], ['class' => 'nav-link']) ; ?>
                                </li>
                                <li>
                                    <?= (Yii::$app->controller->action->id == 'contact' && Yii::$app->controller->id == 'site')
                                        ? Html::a(Yii::t('app', 'contact'), ['site/contact'], ['class' => 'nav-link active'])
                                        : Html::a(Yii::t('app', 'contact'), ['site/contact'], ['class' => 'nav-link']) ; ?>
                                </li>
                                <li>
                                    <?= Html::a(Yii::t('app', 'vacancies'), 'https://hr.bts.uz/', ['class' => 'nav-link']) ?>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <?= $content ?>
    <a href="#succes" class="open-succes-link hidden"></a>
    <div id="succes" class="white-popup mfp-hide">
        <div class="succes">
            <p><picture><source srcset="/img/succes-icon.webp" type="image/webp"><img src="/img/succes-icon.png" alt=""></picture></p>
            <h3><?= Yii::t('app', 'accepted') ?></h3>
            <span><?= Yii::t('app', 'will_connect') ?></span>
        </div>
    </div>
    <div id="popup" class="white-popup mfp-hide">
        <div class="popup-form primary">
            <div class="submiter">
                <h3><?= Yii::t('app', 'fill_form') ?></h3>
                <form method="post" role="form" id="request-form">
                    <input type="hidden" name="type" value="Savollaringizni yo’llang">
                    <div class="form-group">
                        <label for="name"><?= Yii::t('app', 'your_name') ?> <span class="requried">*</span> </label>
                        <input type="text" name="name" id="name" required>
                    </div>
                    <div class="form-group">
                        <label for="phone"><?= Yii::t('app', 'your_phone') ?> <span class="requried">*</span></label>
                        <input type="text" class="phone-mask" name="phone" id="phone" required>
                    </div>
                    <div class="form-group">
                        <label for="question"><?= Yii::t('app', 'write_question') ?></label>
                        <textarea name="question" cols="30" rows="6" required></textarea>
                    </div>
                    <div class="text-center faq-btn-send">
                        <button type="button" class="submit-btn"><?= Yii::t('app', 'ask') ?></button>
                        <p class="help-box">Barcha hududlarni to'ldiring</p>
                    </div>
                </form>
            </div>
            <div class="loader"></div>
            <div class="submited" style="display: none">
                <div id="succes" class="white-popup">
                    <div class="succes">
                        <p><picture><source srcset="/img/succes-icon.webp" type="image/webp"><img src="/img/succes-icon.png" alt=""></picture></p>
                        <h3><?= Yii::t('app', 'accepted') ?></h3>
                        <span><?= Yii::t('app', 'will_connect') ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer>
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-md-2 col-lg-2">
                        <div class="foot-menu">
                            <h4><?= Yii::t('app', 'clients')?></h4>
                            <ul>
                                <li><?= Html::a(Yii::t('app', 'calculate'), ['site/calculate'])?></li>
                                <li><?= Html::a(Yii::t('app', 'cabinet'), ['site/login'])?></li>
                                <li><?= Html::a(Yii::t('app', 'contract'), ['site/contract'])?></li>
                                <li><?= Html::a(Yii::t('app', 'status'), ['site/search-form'])?></li>
                                <li><?= Html::a(Yii::t('app', 'complaint'), ['site/complaint'])?></li>
                                <li><?= Html::a(Yii::t('app', 'faq'), ['site/faq'])?></li>
                                <li><?= Html::a(Yii::t('app', 'offices'), ['site/office'])?></li>
                                <li><?= Html::a(Yii::t('app', 'privancies'), ['site/privancy'])?></li>

                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2 col-lg-2">
                        <div class="foot-menu">
                            <h4><?= Yii::t('app', 'services')?></h4>
                            <ul>
                                <?php $services = \common\models\Services::find()->where(['lang' => \common\models\Lang::getCurrent()])->all();
                                foreach ($services as $service): ?>
                                    <li>
                                        <?= Html::a($service->name, ['site/service', 'id' => $service->id])?>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2 col-lg-2">
                        <div class="foot-menu">
                            <h4><?= Yii::t('app', 'to_partners')?></h4>
                            <ul>
                                <li><?= Html::a(Yii::t('app', 'partner'), ['site/partner'])?></li>
                                <li><?= Html::a(Yii::t('app', 'API for developers'), 'https://docs.bts.uz/', ['target' => '_blank']) ?></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2 col-lg-2">
                        <div class="foot-menu">
                            <h4><?= Yii::t('app', 'about')?></h4>
                            <ul>
                                <li><?= Html::a(Yii::t('app', 'about_bts'), ['site/about'])?></li>
                                <li><?= Html::a(Yii::t('app', 'ended_projects'), ['site/projects'])?></li>
                                <li><?= Html::a(Yii::t('app', 'news'), ['site/news'])?></li>
                                <li><?= Html::a(Yii::t('app', 'review'), ['site/review'])?></li>
                                <li><?= Html::a(Yii::t('app', 'vacancies'), 'https://hr.bts.uz/')?></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2 col-lg-2">
                        <div class="foot-menu">
                            <h4><?= Yii::t('app', 'contact')?></h4>
                            <ul>
                                <li><?= Html::a(Yii::t('app', 'contact'), ['site/contact'])?></li>
                                <li><?= Html::a(Yii::t('app', 'write'), ['site/contact'])?></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2 col-lg-2">
                        <div class="support" style="justify-content: flex-start;">
                            <div class="icon _iconsupport"></div>
                            <div class="support_phone">
                                <p><a href="tel:<?= $general->call_centre ?>" class="link"><?= $general->call_centre ?></a></p>
                                <a href="tel:<?= $general->tel ?>" class="link"><?= $general->tel ?></a>
                                <p style="font-size: 22px; margin-top: 15px; color: #fff;"><?= Yii::t('app', 'Helpline') ?></p>
                                <a href="tel:+99893 505-25-41">+99893 505-25-41</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-middle">
            <div class="container">
                <div class="row">
                    <div class="col-sm-2 col-md-2 col-lg-2">
                        <div class="foot-logo">
                            <picture><source srcset="/img/logo-foot.webp" type="image/webp"><img src="/img/logo-foot.png" alt=""></picture>
                        </div>
                    </div>
                    <div class="col-sm-10 col-md-4 col-lg-4">
                        <div>
                            <div class="row" style="margin-bottom: 15px;">
                                <div class="col-xl-1" style="color: #EE6800; font-size: 14px;">
                                    <div class="icon _icontime"></div>
                                </div>
                                <div class="col-xl-3" style="color: #EE6800; font-size: 16px;">
                                    <div><?= Yii::t('app', 'hours') ?>:</div>
                                </div>
                                <div class="col-xl-8" style="color: #FFFFFF; font-size: 16px;">
                                    <div><?= $general->hours ?></div>
                                </div>
                            </div>
                            <div class="row" style="margin-bottom: 15px;">
                                <div class="col-xl-1" style="color: #EE6800; font-size: 14px;">
                                    <div class="icon _iconmail"></div>
                                </div>
                                <div class="col-xl-3" style="color: #EE6800; font-size: 16px;">
                                    <div><?= Yii::t('app', 'mail') ?>:</div>
                                </div>
                                <div class="col-xl-8" style="color: #FFFFFF; font-size: 16px;">
                                    <div><?= $general->mail ?></div>
                                </div>
                            </div>
                            <div class="row" style="margin-bottom: 15px;">
                                <div class="col-xl-1" style="color: #EE6800; font-size: 14px;">
                                    <div class="icon _iconmap"></div>
                                </div>
                                <div class="col-xl-3" style="color: #EE6800; font-size: 16px;">
                                    <div><?= Yii::t('app', 'address') ?>:</div>
                                </div>
                                <div class="col-xl-8" style="color: #FFFFFF; font-size: 16px;">
                                    <div><?= $general->address ?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8 col-md-4 col-lg-4">
                        <div class="callback">
                            <div class="callback-text">
                                <p><?= Yii::t('app', 'contact_us') ?></p>
                                <span><?= Yii::t('app', 'question_or_offer') ?></span>
                            </div>
                            <div class="callback-btn">
                                <?= Html::a(Yii::t('app', 'order_call'), ['site/contact'])?>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 col-md-2 col-lg-2">
                        <div class="foot-social">
                            <p><?= Yii::t('app', 'social') ?></p>
                            <ul>
                                <li>
                                    <a href="<?= $general->instagram ?>" target="_blank">
                                        <div class="_iconinsta"></div>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= $general->facebook ?>" target="_blank">
                                        <div class="_iconfb"></div>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= $general->telegram ?>" target="_blank">
                                        <div class="_icontg"></div>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= $general->youtube ?>" target="_blank">
                                        <div class="_iconyoutube"></div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <div class="row justify-content-between align-items-center">
                    <div class="col-xl-3">
                        <div class="copyright" style="text-align: left;">
                            <?php $date = date('Y'); ?>
                            <p style="margin-bottom: 0">
                                ООО BTS EXPRESS CARGO SERVIS<br>
                                <?= "Copyright © 2011-$date" ?>
                            </p>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="perfect-media">
                            <?= Html::a(Yii::t('app', 'Privacy policy'), '/files/privacy_policy.pdf', [
                                'target' => '_blank',
                                'class' => 'btn-bts'
                            ])?>
                            <?= Html::a(Yii::t('app', 'Public offer'), '/files/public_offer.pdf', [
                                'target' => '_blank',
                                'class' => 'btn-bts'
                            ])?>
                        </div>
                    </div>
                    <div class="col-xl-5">
                        <div class="perfect-media">
                            <!-- <a href="http://bank.uz/currency/cb.html" target="_blank"
                               title="Bank.uz - все о банках Узбекистана">
                                <img border="0" src="http://bank.uz/scripts/informercb?fg=00008B&amp;bg=FFFFFF">
                            </a> -->
                            <!--LiveInternet counter-->
                            <script type="text/javascript"><!--
                            document.write("<a href='http://www.liveinternet.ru/click' " +
                                "target=_blank><img src='//counter.yadro.ru/hit?t13.7;r" +
                                escape(document.referrer) + ((typeof (screen) == "undefined") ? "" :
                                    ";s" + screen.width + "*" + screen.height + "*" + (screen.colorDepth ?
                                    screen.colorDepth : screen.pixelDepth)) + ";u" + escape(document.URL) +
                                ";" + Math.random() +
                                "' alt='' title='LiveInternet: показано число просмотров за 24" +
                                " часа, посетителей за 24 часа и за сегодня' " +
                                "border='0' width='88' height='31'><\/a>")
                            //--></script>
                            <!--/LiveInternet-->
                            <!-- begin of Top100 code -->
                            <script id="top100Counter" type="text/javascript"
                                    src="https://counter.rambler.ru/top100.jcn?2518124"></script>
                            <noscript>
                                <a href="http://top100.rambler.ru/navi/2518124/">
                                    <img src="https://counter.rambler.ru/top100.cnt?2518124" alt="Rambler's Top100" border="0"/>
                                </a>
                            </noscript>
                            <!-- end of Top100 code -->
                            <!-- START WWW.UZ TOP-RATING -->
                            <SCRIPT language="javascript" type="text/javascript">
                                <!--
                                top_js = "1.0";
                                top_r = "id=25458&r=" + escape(document.referrer) + "&pg=" + escape(window.location.href);
                                document.cookie = "smart_top=1; path=/";
                                top_r += "&c=" + (document.cookie ? "Y" : "N")
                                //-->
                            </SCRIPT>
                            <SCRIPT language="javascript1.1" type="text/javascript">
                                <!--
                                top_js = "1.1";
                                top_r += "&j=" + (navigator.javaEnabled() ? "Y" : "N")
                                //-->
                            </SCRIPT>
                            <SCRIPT language="javascript1.2" type="text/javascript">
                                <!--
                                top_js = "1.2";
                                top_r += "&wh=" + screen.width + 'x' + screen.height + "&px=" +
                                    (((navigator.appName.substring(0, 3) == "Mic")) ? screen.colorDepth : screen.pixelDepth)
                                //-->
                            </SCRIPT>
                            <SCRIPT language="javascript1.3" type="text/javascript">
                                <!--
                                top_js = "1.3";
                                //-->
                            </SCRIPT>
                            <SCRIPT language="JavaScript" type="text/javascript">
                                <!--
                                top_rat = "&col=F49918&t=ffffff&p=008ACC";
                                top_r += "&js=" + top_js + "";
                                document.write('<a href="http://www.uz/rus/toprating/cmd/stat/id/25458" target=_top><img src="http://www.uz/plugins/top_rating/count/cnt.png?' + top_r + top_rat + '" width=88 height=31 border=0 alt="Топ рейтинг www.uz"><\/a>')//-->
                            </SCRIPT>
                            <NOSCRIPT><A href="http://www.uz/rus/toprating/cmd/stat/id/25458" target=_top>
                                <IMG height=31 src="http://www.uz/plugins/top_rating/count/nojs_cnt.png?id=25458&amp;col=F49918&t=ffffff&p=008ACC" width=88 border=0 alt="Топ рейтинг www.uz"></A>
                            </NOSCRIPT>
                            <!-- END WWW.UZ TOP-RATING -->
                            <span>Разработка сайта</span>
                            <div class="logo">
                                <a href="https://perfectmedia.uz/" target="_blank"><picture><source srcset="/img/perfect_logo.svg" type="image/webp"><img src="/img/perfect_logo.svg" alt=""></picture></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <div class="modal fade" id="phoneCallBack" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <?= Yii::t('app', 'Call back') ?>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <div style="text-align: center;"><img src="/img/loading.gif" style="height: 200px;"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="call-back">
        <div class="pulsenew" style="margin-top: 0;">
            <span style="margin-top: -10px;">
                <i class="fas fa-phone" style=""></i>
            </span>
        </div>
    </div>
    <?php $this->endBody() ?>
        <script type="text/javascript">
            yii.confirm = function (message, okCallback, cancelCallback) {
                swal({
                    title: '<div class=\"alert-confirm-logo\"><img src=\"/img/logo_new.png\"></div>',
                    text: message,
                    confirmButtonText: '<?= Yii::t('app', 'Yes') ?>',
                    showCancelButton: true,
                    closeOnConfirm: true,
                    cancelButtonText: '<?= Yii::t('app', 'No') ?>',
                    allowOutsideClick: true,
                    html: true
                }, okCallback);
            };
            $(function(){
                $('.call-back').click(function(){
                    $('#phoneCallBack').modal('show').find('.modal-body').load('<?= Url::to(['/site/call-back']) ?>');
                });
            });
        </script>
    </body>
</html>
<?php $this->endPage();
