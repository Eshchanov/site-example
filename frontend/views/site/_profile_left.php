<?php
    use yii\helpers\Html;
    $controller = Yii::$app->controller->id;
    $action = Yii::$app->controller->action->id;
    $urlRoute = "/" . $controller . "/" . $action;
?>
<style type="text/css">
    .page-wrap .sidebar ul li.active a {
        color: #ee6800;
        font-weight: bold;
    }
    .leftProfileBadge {
        font-size: 8px;
        /*margin-top: -15px;*/
        /*display: inline-block;*/
        vertical-align: super;
    }
    @media screen and (max-width: 768px) {
        .page-wrap .sidebar ul li a {
            padding: 12px 0;
        }
        .sidebar, .sidebar ul {
            margin-bottom: 15px !important;
        }
    }
</style>
<div class="col-md-4 col-lg-3">
    <div class="sidebar">
        <ul style="margin-bottom: 60px;">
            <li <?php if ($urlRoute == '/site/profile'): ?>class="active"<?php endif ?>>
                <?= Html::a(Yii::t('app', 'profile'), ['site/profile'])?>
            </li>
            <li <?php if ($urlRoute == '/site/new'): ?>class="active"<?php endif ?>>
                <?= Html::a(Yii::t('app', 'new'), ['site/new'])?>
            </li>
            <li <?php if ($urlRoute == '/site/payments'): ?>class="active"<?php endif ?>>
                <?= Html::a(Yii::t('app', 'payments') . ' <span class="badge badge-danger leftProfileBadge">new</span>', ['site/payments'])?>
            </li>
            <!-- <li <?php if ($urlRoute == '/site/payment'): ?>class="active"<?php endif ?>>
                <?= Html::a(Yii::t('app', 'Payment'), ['site/payment'])?>
            </li> -->
            <li <?php if ($urlRoute == '/site/outmail'): ?>class="active"<?php endif ?>>
                <?= Html::a(Yii::t('app', 'outmail'), ['site/outmail'])?>
            </li>
            <li <?php if ($urlRoute == '/site/inmail'): ?>class="active"<?php endif ?>>
                <?= Html::a(Yii::t('app', 'inmail'), ['site/inmail'])?>
            </li>
            <li <?php if ($urlRoute == '/site/complaint'): ?>class="active"<?php endif ?>>
                <?= Html::a(Yii::t('app', 'My appeals') . ' <span class="badge badge-danger leftProfileBadge">new</span>', ['site/complaint'])?>
            </li>
            <li <?php if ($urlRoute == '/site/bts-logout'): ?>class="active"<?php endif ?>>
                <?= Html::a(Yii::t('app', 'Logout'), ['site/bts-logout'])?>
            </li>
        </ul>
    </div>
</div>