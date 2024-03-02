<?php

/* @var $this \yii\web\View */
/* @var $content string */

use frontend\assets\AppAsset;
use frontend\widgets\Wlang;
use yii\bootstrap4\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use common\widgets\Alert;

$general = \common\models\General::find()->where(['lang' => \common\models\Lang::getCurrent()])->one();

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>" class="h-100">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <script src="https://cdn.ckeditor.com/ckeditor5/30.0.0/classic/ckeditor.js"></script>
        <?php $this->registerCsrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
        <style>
            html, body {
                font-size: 16px;
            }
            h1, .h1 {
                font-size: 2.5rem;
            }
            h2, .h2 {
                font-size: 2rem;
            }
            h3, .h3 {
                font-size: 1.75rem;
            }
            h4, .h4 {
                font-size: 1.5rem;
            }
            .btn {
                width: auto;
                display: inline-block;
                padding: 10px 15px;
            }
            .btn.btn-success {
                color: #fff;
                background-color: #28a745;
                border-color: #28a745;
            }
            .btn.btn-success:hover {
                color: #fff;
                background-color: #218838;
                border-color: #1e7e34;
            }
            .btn.btn-primary {
                color: #fff;
                background-color: #007bff;
                border-color: #007bff;
            }
            .btn.btn-primary:hover {
                color: #fff;
                background-color: #0069d9;
                border-color: #0062cc;
            }
            .btn.btn-danger {
                color: #fff;
                background-color: #dc3545;
                border-color: #dc3545;
            }
            .btn.btn-danger:hover {
                color: #fff;
                background-color: #c82333;
                border-color: #bd2130;
            }
            .form-group.has-error .form-control {
                border: 1px solid #DC3545;
            }
            .form-group.has-error .help-block {
                color: #DC3545;
                font-size: 80%;
            }
            .form-group.has-success .form-control {
                border: 1px solid #00B7A7;
            }
            .form-group.has-success .help-block {
                color: #00B7A7;
                font-size: 80%;
            }
        </style>
    </head>
    <body>
    <?php $this->beginBody() ?>

    <header>
        <?php
        if (!Yii::$app->user->isGuest) {
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
                            ['label' => 'Maxfiylik siyosati', 'url' => ['privancy-policy/view']],
                        ],
                    ],
                ];
                $menuItems[] = '<li class="ml-auto">'
                    . Html::beginForm(['/site/logout'], 'post', ['class' => 'form-inline'])
                    . Html::submitButton(
                        'Logout (' . Yii::$app->user->identity->username . ')',
                        ['class' => 'btn btn-link logout']
                    )
                    . Html::endForm()
                    . '</li>';
                echo Nav::widget([
                    'options' => ['class' => 'navbar-nav', 'style' => 'width: 100%;'],
                    'items' => $menuItems,
                ]);
                NavBar::end();
            }
        }
        ?>
        <div class="container-xl" style="margin-top: 66px">
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

                <div class="col-sm-9 col-md-6 col-xl-4">
                    <div class="header_right_block">
                        <div class="registration_block">
                            <?php if (Yii::$app->user->isGuest): ?>
                                <?= Html::a('<div class="icon _iconVector"></div><span>'.Yii::t('app', 'login').'</span>', ['site/login'], ['class' => 'log_in'])?>
                                <?= Html::a('<div class="icon _iconuser"></div><span>'.Yii::t('app', 'signup').'</span>', ['site/signup'], ['class' => 'sign_in'])?>
                            <?php else: ?>
                                <?= Html::beginForm(['/site/logout'], 'post').
                                Html::submitButton('<span class="icon _iconuser"></span><span>'.Yii::t('app', 'logout').'</span>', ['class' => 'log_out']).
                                Html::endForm() ?>
                            <?php endif; ?>
                        </div>
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
                                    <?= (Yii::$app->controller->action->id == 'clients' && Yii::$app->controller->id == 'site')
                                        ? Html::a(Yii::t('app', 'clients'), ['site/clients'], ['class' => 'nav-link active'])
                                        : Html::a(Yii::t('app', 'clients'), ['site/clients'], ['class' => 'nav-link']) ; ?>
                                </li>
                                <li>
                                    <?= (Yii::$app->controller->action->id == 'services' && Yii::$app->controller->id == 'site')
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
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <section class="page-wrap">
        <div class="container-xl">
            <div class="pt-5 pb-5">
                <div class="primary">
                    <?= Alert::widget() ?>
                    <?= $content ?>
                </div>
            </div>
        </div>
    </section>
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
                                <li><?= Html::a(Yii::t('app', 'status'), ['site/login'])?></li>
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
                                <li><?= Html::a(Yii::t('app', 'vacancies'), ['site/vacancy'])?></li>
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
                        <div class="support">
                            <div class="icon _iconsupport"></div>
                            <div class="support_phone">
                                <p><a href="tel:<?= $general->call_centre ?>" class="link"><?= $general->call_centre ?></a></p>
                                <a href="tel:<?= $general->tel ?>" class="link"><?= $general->tel ?></a>
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
                        <div class="work-time">
                            <div class="work-time-item">
                                <div class="icon _icontime"></div>
                                <div class="item-txt">
                                    <p><?= Yii::t('app', 'hours') ?>:</p>
                                    <p class="hours"><?= $general->hours ?> </p>
                                </div>
                            </div>
                            <div class="work-time-item">
                                <div class="icon _iconmail"></div>
                                <div class="item-txt">
                                    <p><?= Yii::t('app', 'mail') ?>: </p>
                                    <span> <a href="mailto:<?= $general->mail ?>"><?= $general->mail ?></a> </span>
                                </div>

                            </div>
                            <div class="work-time-item">
                                <div class="icon _iconmap"></div>
                                <div class="item-txt">
                                    <p><?= Yii::t('app', 'address') ?>: </p>
                                    <span><?= $general->address ?></span>
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
                    <div class="col-sm-6 col-md-2 col-lg-2">
                        <div class="copyright">
                            <p><?= date('Y') ?> <?= Html::encode(Yii::$app->name) ?></p>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <div class="perfect-media">
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
    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage();
