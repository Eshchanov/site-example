<?php
    use yii\helpers\Html;
    $controller = Yii::$app->controller->id;
    $action = Yii::$app->controller->action->id;
    $urlRoute = "/" . $controller . "/" . $action;
?>
<style type="text/css">
    .page-wrap .sidebar ul li.active a {
        color: #ee6800;
    }
    @media screen and (max-width: 768px) {
        .page-wrap .sidebar ul li a {
            padding: 12px 0;
        }
    }
</style>
<div class="sidebar">
    <ul>
        <li <?php if ($urlRoute == '/site/calculate'): ?>class="active"<?php endif ?>>
            <?= Html::a(Yii::t('app', 'calculate'), ['site/calculate'])?>
        </li>
        <li <?php if ($urlRoute == '/site/contract'): ?>class="active"<?php endif ?>>
            <?= Html::a(Yii::t('app', 'contract'), ['site/contract'])?>
        </li>
        <li <?php if ($urlRoute == '/site/office'): ?>class="active"<?php endif ?>>
            <?= Html::a(Yii::t('app', 'offices'), ['site/office'])?>
        </li>
        <li <?php if ($urlRoute == '/site/complaint'): ?>class="active"<?php endif ?>>
            <?= Html::a(Yii::t('app', 'complaint'), ['site/complaint'])?>
        </li>
        <li <?php if ($urlRoute == '/site/faq'): ?>class="active"<?php endif ?>>
            <?= Html::a(Yii::t('app', 'faq'), ['site/faq'])?>
        </li>
        <li <?php if ($urlRoute == '/site/privancy'): ?>class="active"<?php endif ?>>
            <?= Html::a(Yii::t('app', 'privancies'), ['site/privancy'])?>
        </li>
    </ul>
</div>