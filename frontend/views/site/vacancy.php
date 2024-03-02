<?php

/* @var $this yii\web\View */
/* @var $vacancies \common\models\Vacancy */

use yii\helpers\Html;

$this->title = Yii::t('app', 'vacancies');
$this->params['breadcrumbs'][] = $this->title;
?>
<style>
    .color-red {
        color: red;
    }
</style>
<section class="page-wrap">
    <div class="container-xl">
        <div class="row">
            <div class="breadcrumbs">
                <ul>
                    <li>
                        <?= Html::a(Yii::t('app', 'home'), ['site/index'])?>
                    </li>
                    <li>
                        <?= Html::a(Yii::t('app', 'about'), ['site/about'])?>
                    </li>
                    <li>
                        <?= Html::a(Yii::t('app', 'vacancies'), ['site/vacancies'])?>
                    </li>
                </ul>
            </div>
            <div class="col-md-3 col-lg-3">
                <?= $this->render('_about_left') ?>
            </div>
            <div class="col-md-9 col-lg-9">
                <div class="primary">
                    <div class="primary_title">
                        <h2><?= Yii::t('app', 'vacancies') ?></h2>
                    </div>
                    <div class="row">
                        <?php if (!$vacancies): ?>
                        <p class="color-red"><?= Yii::t('app', 'no_vacancy') ?></p>
                        <?php endif; foreach ($vacancies as $vacancy): ?>
                        <div class="col-md-6 col-lg-6">
                            <div class="vakant-body">
                                <div class="vakant-name">
                                    <?= $vacancy->name ?>
                                </div>
                                <div class="vakant-type">
                                    <?= Yii::t('app', 'requirements') ?>
                                </div>
                                <div class="vakant-info">
                                    <?= $vacancy->requirements ?>
                                </div>
                                <div class="vakant-adress">
                                    <p><?= Yii::t('app', 'address') ?></p>
                                    <span><?= $vacancy->address ?></span>
                                </div>
                                <div class="vakant-phone">
                                    <p><?= Yii::t('app', 'phone') ?></p>
                                    <span><?= $vacancy->tel ?></span>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
