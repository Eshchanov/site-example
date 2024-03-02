<?php
    use yii\helpers\Html;

    $name = isset($userProfile['name']) ? ucfirst($userProfile['name']) : '';
    $img = isset($userProfile['photo']) ? $userProfile['photo'] : null;

    $this->title = Yii::t('app', 'KOMPLEKS LOGISTIKA VA POCHTA XIZMATLARI');
    $this->params['breadcrumbs'][] = $this->title;

    $beginNum = (1 * $dataHistory['page'] - 1) * (1 * $dataHistory['limit']) + 1;
    if ($beginNum < 0) {
        $beginNum = 0;
    }
    $endNum = (1 * $dataHistory['page']) * (1 * $dataHistory['limit']);
    $all = (1 * $dataHistory['itemsCount']);
    if ($endNum >= $all) {
        $endNum = $all;
    }
    $summary = Yii::t('yii', 'Showing <b>{begin, number}-{end, number}</b> of <b>{totalCount, number}</b> {totalCount, plural, one{item} other{items}}.', [
        'begin' => $beginNum,
        'end' => $endNum,
        'totalCount' => $all,
    ]);
?>
<style type="text/css">
    .userpage .stats-block .stats-item {
        min-width: 35px;
        max-width: 135px;
    }
    .userpage .stats-block .stats-info {
        -webkit-column-gap: 60px;
        -moz-column-gap: 60px;
        column-gap: 60px;
    }
</style>
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
                            <?= Html::a(Yii::t('app', 'inmail'), ['site/inmail'])?>
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
                            <h2><?= Yii::t('app', 'inmail') ?></h2>
                        </div>
                        <p class="text-right"><?= $summary ?></p>
                        <?php $results = $dataHistory['results'] ?>
                        <?php foreach ($results as $key => $result): ?>
                            <div class="stats-block">
                                <div class="stats-location">
                                    <div class="in"><?= $result['regionName']; ?> </div>
                                    <div class="icon _iconright-arrow"></div>
                                    <div class="out"><?= $result['senderRegionName'] ?></div>
                                </div>
                                <div class="stats-info">
                                    <div class="stats-item">
                                        <img height="35" src="<?= $result['stateIcon'] ?>">
                                    </div>

                                    <div class="stats-item">
                                        <p><?= Yii::t('app', 'Date') ?></p>
                                        <?= $result['date'] ?>
                                    </div>

                                    <div class="stats-item">
                                        <p><?= Yii::t('app', 'Barcode') ?></p>
                                        <?= divideString($result['barcode'], 3) ?>
                                    </div>

                                    <?php if ($result['avatar']): ?>
                                        <div class="stats-item">
                                            <img height="50" style="border-radius: 50%" src="<?= $result['avatar'] ?>">
                                        </div>
                                    <?php endif ?>

                                    <div class="stats-item">
                                        <p><?= Yii::t('app', 'Receiver name') ?></p>
                                        <?= $result['name'] ?><br>
                                    </div>

                                    <div class="stats-item">
                                        <p><?= Yii::t('app', 'Receiver phone') ?></p>
                                        <?= $result['phone'] ?><br>
                                    </div>

                                    <div class="stats-item">
                                        <p><?= Yii::t('app', 'Status') ?></p>
                                        <?= $result['statusInfo'] ?><br>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach ?>
                        <center>
                            <?php if ((1 * $dataHistory['page']) > 2): ?>
                                <?= Html::a('&#10094;&#10094;', ['/site/inmail'], ['class' => 'submit-btn']) ?>
                            <?php endif ?>
                            <?php if ($dataHistory['prevPage']): ?>
                                <?= Html::a('&#10094;', ['/site/inmail', 'serverPaginationUrl' => $dataHistory['prevPage']], ['class' => 'submit-btn']) ?>
                            <?php endif ?>
                            <?php if ($dataHistory['nextPage']): ?>
                                <?= Html::a('&#10095;', ['/site/inmail', 'serverPaginationUrl' => $dataHistory['nextPage']], ['class' => 'submit-btn']) ?>
                            <?php endif ?>
                            <?php //= Html::a('&#10095;&#10095;', $dataHistory['prevPage'], ['class' => 'submit-btn']) ?>
                        </center>

                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

