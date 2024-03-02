<?php

/* @var $this yii\web\View */
/* @var $faqs \common\models\Faq */

use yii\helpers\Html;

$this->title = Yii::t('app', 'faq');
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
                        <?= Html::a(Yii::t('app', 'clients'), ['site/calculate'])?>
                    </li>
                    <li>
                        <?= Html::a(Yii::t('app', 'faq'), ['site/faq'])?>
                    </li>
                </ul>
            </div>
            <div class="col-md-3 col-lg-3">
                <?= $this->render('_clients-left') ?>
            </div>
            <div class="col-md-9 col-lg-9">
                <div class="primary">
                    <div class="primary_title">
                        <h2><?= Yii::t('app', 'faq') ?></h2>
                    </div>
                    <div class="faq-body">
                        <?php foreach ($faqs as $faq): ?>
                        <div class="faq-item">
                            <div class="faq-item-left">
                                <div class="question">
                                    <?= $faq->question ?>
                                </div>
                            </div>
                            <div class="faq-item-right">
                                <div class="answer">
                                    <?= $faq->answer ?>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                        <p class="mb-4"><?= Yii::t('app', 'have_questions') ?></p>
                        <a href="#popup" class="open-popup-link submit-btn"><?= Yii::t('app', 'ask') ?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
