<?php

/* @var $this yii\web\View */
/* @var $reviews \common\models\Review */

use yii\helpers\Html;

$this->title = Yii::t('app', 'review');
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
                        <?= Html::a(Yii::t('app', 'review'), ['site/review'])?>
                    </li>
                </ul>
            </div>
            <div class="col-md-3 col-lg-3">
                <?= $this->render('_about_left') ?>
            </div>
            <div class="col-md-9 col-lg-9">
                <div class="primary">
                    <div class="primary_title">
                        <h2><?= Yii::t('app', 'review') ?></h2>
                    </div>
                    <div class="swiper-container testimonials">
                        <div class="swiper-wrapper">
                            <?php foreach ($reviews as $review): ?>
                            <div class="swiper-slide">
                                <div class="slide-item">
                                    <div class="yotube-frame">
                                        <iframe width="100%" height="315"
                                                src="<?= $review->video ?>" title="YouTube video player"
                                                frameborder="0"
                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                                allowfullscreen></iframe>
                                    </div>
                                    <div class="client-name">
                                        <p><?= $review->name ?></p>
                                        <span><?= $review->position ?></span>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <div class="row slide-btn">
                        <div class="btn-blk">
                            <div class="slider-controllers">
                                <div class="icon-left">
                                    <i class="arrow left-arr"></i>
                                </div>
                                <div class="icon-right">
                                    <i class="arrow right-arr"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="primary_title">
                        <h2><?= Yii::t('app', 'trusted') ?></h2>
                    </div>
                    <div class="row">
                        <div class="col-sm-4 col-md-2 col-lg-2 col-6">
                            <div class="partners">
                                <picture><source srcset="/img/sqb.webp" type="image/webp"><img src="/img/sqb.jpg" alt=""></picture>
                            </div>
                        </div>
                        <div class="col-sm-4 col-md-2 col-lg-2 col-6">
                            <div class="partners">
                                <picture><source srcset="/img/ecovice.webp" type="image/webp"><img src="/img/ecovice.jpg" alt=""></picture>
                            </div>
                        </div>
                        <div class="col-sm-4 col-md-2 col-lg-2 col-6">
                            <div class="partners">
                                <picture><source srcset="/img/imzo.webp" type="image/webp"><img src="/img/imzo.jpg" alt=""></picture>
                            </div>
                        </div>
                        <div class="col-sm-4 col-md-2 col-lg-2 col-6">
                            <div class="partners">
                                <picture><source srcset="/img/crafers.webp" type="image/webp"><img src="/img/crafers.jpg" alt=""></picture>
                            </div>
                        </div>
                        <div class="col-sm-4 col-md-2 col-lg-2 col-6">
                            <div class="partners">
                                <picture><source srcset="/img/hamkorbank.webp" type="image/webp"><img src="/img/hamkorbank.jpg" alt=""></picture>
                            </div>
                        </div>
                        <div class="col-sm-4 col-md-2 col-lg-2 col-6">
                            <div class="partners">
                                <picture><source srcset="/img/lg.webp" type="image/webp"><img src="/img/lg.jpg" alt=""></picture>
                            </div>
                        </div>
                        <div class="col-sm-4 col-md-2 col-lg-2 col-6">
                            <div class="partners">
                                <picture><source srcset="/img/agrobank.webp" type="image/webp"><img src="/img/agrobank.jpg" alt=""></picture>
                            </div>
                        </div>
                        <div class="col-sm-4 col-md-2 col-lg-2 col-6">
                            <div class="partners">
                                <picture><source srcset="/img/universalbank.webp" type="image/webp"><img src="/img/universalbank.jpg" alt=""></picture>
                            </div>
                        </div>
                        <div class="col-sm-4 col-md-2 col-lg-2 col-6">
                            <div class="partners">
                                <picture><source srcset="/img/roison.webp" type="image/webp"><img src="/img/roison.jpg" alt=""></picture>
                            </div>
                        </div>
                        <div class="col-sm-4 col-md-2 col-lg-2 col-6">
                            <div class="partners">
                                <picture><source srcset="/img/xalqbanki.webp" type="image/webp"><img src="/img/xalqbanki.jpg" alt=""></picture>
                            </div>
                        </div>
                        <div class="col-sm-4 col-md-2 col-lg-2 col-6">
                            <div class="partners">
                                <picture><source srcset="/img/ipotekabank.webp" type="image/webp"><img src="/img/ipotekabank.jpg" alt=""></picture>
                            </div>
                        </div>
                        <div class="col-sm-4 col-md-2 col-lg-2 col-6">
                            <div class="partners">
                                <picture><source srcset="/img/havoyollari.webp" type="image/webp"><img src="/img/havoyollari.jpg" alt=""></picture>
                            </div>
                        </div>
                        <div class="col-sm-4 col-md-2 col-lg-2 col-6">
                            <div class="partners">
                                <picture><source srcset="/img/nikapharm.webp" type="image/webp"><img src="/img/nikapharm.jpg" alt=""></picture>
                            </div>
                        </div>
                        <div class="col-sm-4 col-md-2 col-lg-2 col-6">
                            <div class="partners">
                                <picture><source srcset="/img/zeppelin.webp" type="image/webp"><img src="/img/zeppelin.jpg" alt=""></picture>
                            </div>
                        </div>
                        <div class="col-sm-4 col-md-2 col-lg-2 col-6">
                            <div class="partners">
                                <picture><source srcset="/img/korzinka.webp" type="image/webp"><img src="/img/korzinka.jpg" alt=""></picture>
                            </div>
                        </div>
                        <div class="col-sm-4 col-md-2 col-lg-2 col-6">
                            <div class="partners">
                                <picture><source srcset="/img/mediapark.webp" type="image/webp"><img src="/img/mediapark.jpg" alt=""></picture>
                            </div>
                        </div>
                        <div class="col-sm-4 col-md-2 col-lg-2 col-6">
                            <div class="partners">
                                <picture><source srcset="/img/claas.webp" type="image/webp"><img src="/img/claas.jpg" alt=""></picture>
                            </div>
                        </div>
                        <div class="col-sm-4 col-md-2 col-lg-2 col-6">
                            <div class="partners">
                                <picture><source srcset="/img/samsung.webp" type="image/webp"><img src="/img/samsung.jpg" alt=""></picture>
                            </div>
                        </div>
                        <div class="col-sm-4 col-md-2 col-lg-2 col-6">
                            <div class="partners">
                                <picture><source srcset="/img/farmak.webp" type="image/webp"><img src="/img/farmak.jpg" alt=""></picture>
                            </div>
                        </div>
                        <div class="col-sm-4 col-md-2 col-lg-2 col-6">
                            <div class="partners">
                                <picture><source srcset="/img/uzbekleasing.webp" type="image/webp"><img src="/img/uzbekleasing.jpg" alt=""></picture>
                            </div>
                        </div>
                        <div class="col-sm-4 col-md-2 col-lg-2 col-6">
                            <div class="partners">
                                <picture><source srcset="/img/abbot.webp" type="image/webp"><img src="/img/abbot.jpg" alt=""></picture>
                            </div>
                        </div>
                        <div class="col-sm-4 col-md-2 col-lg-2 col-6">
                            <div class="partners">
                                <picture><source srcset="/img/uzkorgas.webp" type="image/webp"><img src="/img/uzkorgas.jpg" alt=""></picture>
                            </div>
                        </div>
                        <div class="col-sm-4 col-md-2 col-lg-2 col-6">
                            <div class="partners">
                                <picture><source srcset="/img/sheraua.webp" type="image/webp"><img src="/img/sheraua.jpg" alt=""></picture>
                            </div>
                        </div>
                        <div class="col-sm-4 col-md-2 col-lg-2 col-6">
                            <div class="partners">
                                <picture><source srcset="/img/medcins.webp" type="image/webp"><img src="/img/medcins.jpg" alt=""></picture>
                            </div>
                        </div>
                        <div class="col-sm-4 col-md-2 col-lg-2 col-6">
                            <div class="partners">
                                <picture><source srcset="/img/25.webp" type="image/webp"><img src="/img/25.jpg" alt=""></picture>
                            </div>
                        </div>
                        <div class="col-sm-4 col-md-2 col-lg-2 col-6">
                            <div class="partners">
                                <picture><source srcset="/img/disvan.webp" type="image/webp"><img src="/img/disvan.jpg" alt=""></picture>
                            </div>
                        </div>
                        <div class="col-sm-4 col-md-2 col-lg-2 col-6">
                            <div class="partners">
                                <picture><source srcset="/img/hyundai.webp" type="image/webp"><img src="/img/hyundai.jpg" alt=""></picture>
                            </div>
                        </div>
                        <div class="col-sm-4 col-md-2 col-lg-2 col-6">
                            <div class="partners">
                                <picture><source srcset="/img/knauf.webp" type="image/webp"><img src="/img/knauf.jpg" alt=""></picture>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

</section>
