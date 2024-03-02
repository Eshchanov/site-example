<?php
    use yii\helpers\Url;
    use yii\helpers\Html;
    use yii\widgets\LinkPager;

    $this->title = $model->title;
    $this->params['breadcrumbs'][] = $this->title;
?>
<style type="text/css">
    .news-photo {
        max-width: 400px;
        float: left;
        margin-right: 30px;
    }
    @media (max-width: 800px) {
        .news-photo {
            float: none;
            max-width: 100%;
        }
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
                        <h2><?= $model->title ?></h2>
                    </div>
                    <a data-fancybox href="/img/news/<?= $model->photo ?>" class="link">
                        <img src="/img/news/<?= $model->photo ?>" alt="<?= $model->title ?>" class="news-photo">
                    </a>
                    <?= $model->info_full ?>
                    <div style="clear: both;"></div>
                </div>
            </div>
        </div>
    </div>
</section>
