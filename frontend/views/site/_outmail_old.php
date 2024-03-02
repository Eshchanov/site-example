<?php
    use yii\helpers\Html;

    $name = isset($userProfile['name']) ? ucfirst($userProfile['name']) : '';
    $img = isset($userProfile['photo']) ? $userProfile['photo'] : null;

    $this->title = Yii::t('app', 'about_bts');
    $this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <section class="page-wrap userpage">
        <div class="container-xl">
            <div class="row">
                <div class="breadcrumbs">
                    <ul>
                        <li>
                            <?= Html::a(Yii::t('app', 'home'), ['site/index'])?>
                        </li>
                        <li>
                            <?= Html::a(Yii::t('app', 'cabinet'), ['site/profile'])?>
                        </li>
                        <li>
                            <?= Html::a(Yii::t('app', 'profile'), ['site/profile'])?>
                        </li>
                    </ul>
                </div>
                <?= $this->render('_profile_left', [
                    'name' => $name,
                    'img' => $img,
                ]) ?>
                <div class="col-md-8 col-lg-9">
                    <div class="primary">
                        <div class="primary_title">
                            <h2><?= Yii::t('app', 'cabinet') ?></h2>
                        </div>
                        <h4 class="subtitle">
                            <?= Yii::t('app', 'outmail') ?>
                        </h4>

                        <div class="stats-block">
                            <div class="stats-location">
                                <div class="in">Toshkent </div>
                                <div class="icon _iconright-arrow"></div>
                                <div class="out">Samarqand</div>
                            </div>
                            <div class="stats-info">
                                <div class="stats-item">
                                    <p>Sana</p>
                                    17.05.2021
                                </div>
                                <div class="stats-item">
                                    <p>ID</p>
                                    8126155246163929
                                </div>
                                <div class="stats-item">
                                    <p>Jo’natma og’irligi</p>
                                    5 kg
                                </div>
                                <div class="stats-item">
                                    <p>Status</p>
                                    Yakunlandi
                                </div>
                                <div class="stats-item">
                                    <p>Narxi</p>
                                    500 000 sum
                                </div>
                            </div>
                            <div class="stats-item price">
                                <p>Hujjatlar</p>
                                <a href="">shartnoma № 536, 10.05.2021.pdf</a>
                            </div>
                            <button type="button" class="submit-btn">Yuk statusini kuzatish</button>
                        </div>
                        <div class="stats-block">
                            <div class="stats-location">
                                <div class="in">Buxoro </div>
                                <div class="icon _iconright-arrow"></div>
                                <div class="out">Samarqand</div>
                            </div>
                            <div class="stats-info">
                                <div class="stats-item">
                                    <p>Sana</p>
                                    10.05.2021
                                </div>
                                <div class="stats-item">
                                    <p>ID</p>
                                    6598155246167832
                                </div>
                                <div class="stats-item">
                                    <p>Jo’natma og’irligi</p>
                                    2.35 tonna
                                </div>
                                <div class="stats-item">
                                    <p>Status</p>
                                    Yakunlandi
                                </div>
                                <div class="stats-item">
                                    <p>Narxi</p>
                                    5 000 000 sum
                                </div>
                            </div>
                            <div class="stats-item price">
                                <p>Hujjatlar</p>
                                <a href="">nakladnaya № 185, 09.05.2021.pdf</a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

