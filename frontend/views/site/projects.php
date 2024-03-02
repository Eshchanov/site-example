<?php

/* @var $this yii\web\View */
/* @var $projects \common\models\Project */

use common\models\ProjectImage;
use yii\helpers\Html;

$this->title = Yii::t('app', 'ended_projects');
$this->params['breadcrumbs'][] = $this->title;
?>
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
                        <?= Html::a(Yii::t('app', 'ended_projects'), ['site/projects'])?>
                    </li>
                </ul>
            </div>
            <div class="col-md-3 col-lg-3">
                <?= $this->render('_about_left') ?>
            </div>
            <div class="col-md-9 col-lg-9">
                <div class="primary">
                    <div class="primary_title">
                        <h2><?= Yii::t('app', 'ended_projects') ?></h2>
                    </div>
                    <?php foreach ($projects as $project):
                        $images = ProjectImage::find()->where(['project_id' => $project->id])->all();
                        if ($images): ?>
                        <hr>
                        <div class="row">
                            <div class="col-md-6 col-lg-6">
                                <div class="slide-left">
                                    <div class="slider-for images">
                                        <?php foreach ($images as $image): ?>
                                        <div>
                                            <picture>
                                                <source srcset="/img/projects/<?= $image->image ?>" type="image/webp">
                                                <img src="/img/projects/<?= $image->image ?>" alt="" style="width: 100%" />
                                            </picture>
                                        </div>
                                        <?php endforeach; ?>
                                    </div>
                                    <div class="slider-nav thumbs">
                                        <?php foreach ($images as $image): ?>
                                        <div>
                                            <div class="overlay">
                                                <div class="_iconcheck"></div>
                                            </div>
                                            <picture><source srcset="/img/projects/<?= $image->image ?>" type="image/webp"><img src="/img/projects/<?= $image->image ?>" alt="" /></picture>
                                        </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6 right-slide">
                                <div class="project-info">
                                    <div class="project-title"><?= $project->name ?></div>
                                    <div class="project-item">
                                        <div class="icon _iconmapdabl"></div>
                                        <div class="text-inf">
                                            <p><?= Yii::t('app', 'direction') ?>: <b><?= $project->direction ?></b> </p>
                                        </div>
                                    </div>
                                    <div class="project-item">
                                        <div class="icon _iconcalendar"></div>
                                        <div class="text-inf">
                                            <p><?= Yii::t('app', 'duration') ?>: <b><?= $project->duration ?></b> </p>
                                        </div>
                                    </div>
                                    <div class="project-item">
                                        <div class="icon _iconmassa"></div>
                                        <div class="text-inf">
                                            <p><?= Yii::t('app', 'project_weight') ?>: <b><?= $project->weight ?></b> </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="process">
                                    <p><?= Yii::t('app', 'info') ?>:</p>
                                    <?= $project->info ?>
                                </div>
                            </div>
                        </div>
                    <?php endif; endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>
