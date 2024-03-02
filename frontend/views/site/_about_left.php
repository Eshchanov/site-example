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
        <li <?php if ($urlRoute == '/site/about'): ?>class="active"<?php endif ?>>
            <?= Html::a(Yii::t('app', 'about_bts'), ['site/about'])?>
        </li>
        <li <?php if ($urlRoute == '/site/projects'): ?>class="active"<?php endif ?>>
            <?= Html::a(Yii::t('app', 'ended_projects'), ['site/projects'])?>
        </li>
        <li <?php if ($urlRoute == '/site/news'): ?>class="active"<?php endif ?>>
            <?= Html::a(Yii::t('app', 'news'), ['site/news'])?>
        </li>
        <li <?php if ($urlRoute == '/site/review'): ?>class="active"<?php endif ?>>
            <?= Html::a(Yii::t('app', 'review'), ['site/review'])?>
        </li>
        <li <?php if ($urlRoute == '/site/vacancy'): ?>class="active"<?php endif ?>>
            <?= Html::a(Yii::t('app', 'vacancies'), 'https://hr.bts.uz/')?>
        </li>
    </ul>
</div>