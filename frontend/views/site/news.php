<?php
    use yii\helpers\Url;
    use yii\helpers\Html;
    use yii\widgets\LinkPager;

    $this->title = Yii::t('app', 'news');
    $this->params['breadcrumbs'][] = $this->title;
?>
<style type="text/css">
    .news-title {
        display: -webkit-box;
        max-width: 100%;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
        min-height: 93px;
    }
    .news-excerpt {
        display: -webkit-box;
        max-width: 100%;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
        min-height: 66px;
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
                        <?= Html::a(Yii::t('app', 'news'), ['site/news'])?>
                    </li>
                </ul>
            </div>
            <div class="col-md-3 col-lg-3">
                <?= $this->render('_about_left') ?>
            </div>
            <div class="col-md-9 col-lg-9">
                <div class="primary">
                    <div class="primary_title">
                        <h2><?= Yii::t('app', 'news') ?></h2>
                    </div>
                    <div class="row news-gallery">
                        <?php foreach ($news as $item): ?>
                        <div class="col-md-6 col-lg-4">
                            <div class="news-body">
                                <a href="<?= Url::to(['/site/news-view', 'id' => $item->id]) ?>">
                                    <div class="news-thumb">
                                        <picture><source srcset="/img/news/<?= $item->photo ?>" type="image/webp"><img src="/img/news/<?= $item->photo ?>" alt=""></picture>
                                    </div>
                                </a>
                                <a href="<?= Url::to(['/site/news-view', 'id' => $item->id]) ?>" class="news-wrap">
                                    <div class="news-title">
                                        <?= $item->title ?>
                                    </div>
                                    <div class="news-excerpt">
                                        <?= $item->info ?>
                                    </div>
                                    <div class="news-meta">
                                        <div class="date">
                                            <div class="icon _iconcalendar"></div>
                                            <div class="time"><?= $item->date ?></div>
                                        </div>
                                        <div class="icon _iconright-arrow"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="row">
                        <?= LinkPager::widget([
                            'pagination' => $pagination,
                        ]);?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
