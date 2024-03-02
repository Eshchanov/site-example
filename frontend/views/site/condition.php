<?php

/* @var $this yii\web\View */
/* @var $conditions yii\web\View */

use yii\helpers\Html;

$this->title = Yii::t('app', 'condition');
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
                        <?= Html::a(Yii::t('app', 'condition'), ['site/condition'])?>
                    </li>
                </ul>
            </div>
            <div class="col-md-3 col-lg-3">
                <div class="sidebar">
                    <ul>
                        <li>
                            <?= Html::a(Yii::t('app', 'calculate'), ['site/calculate'])?>
                        </li>
                        <li>
                            <?= Html::a(Yii::t('app', 'contract'), ['site/contract'])?>
                        </li>
                        <li>
                            <?= Html::a(Yii::t('app', 'offices'), ['site/office'])?>
                        </li>
                        <li>
                            <?= Html::a(Yii::t('app', 'complaint'), ['site/complaint'])?>
                        </li>
                        <li>
                            <?= Html::a(Yii::t('app', 'faq'), ['site/faq'])?>
                        </li>
                        <li>
                            <?= Html::a(Yii::t('app', 'condition'), ['site/condition'])?>
                        </li>
                        <li>
                            <?= Html::a(Yii::t('app', 'privancies'), ['site/privancy'])?>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-9 col-lg-9">
                <div class="primary">
                    <div class="primary_title">
                        <h4><?= Yii::t('app', 'condition') ?></h4>
                    </div>
                    <div class="accordion-container">
                        <ul class="accordion-list">
                            <?php foreach ($conditions as $condition): ?>
                            <li>
                                <div class="accordion-title">
                                    <h4><?= $condition->name ?></h4>
                                    <figure>
                                        <svg width="10" height="7" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M1 .799l4 4 4-4" stroke="#F47B56" stroke-width="2" fill="none"
                                                  fill-rule="evenodd" />
                                        </svg>
                                    </figure>
                                </div>
                                <?= $condition->name ?>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>

                    <script>//accardion
                        let accordion = document.querySelector('.accordion-container .accordion-list');
                        let items = accordion.querySelectorAll('.accordion-container .accordion-list li');
                        let questions = accordion.querySelectorAll('.accordion-container .accordion-title');
                        questions.forEach(question => question.addEventListener('click', toggleAccordion));
                        function toggleAccordion() {
                            thisItem = this.parentNode;
                            items.forEach(item => {
                                if (thisItem == item) {
                                    thisItem.classList.toggle('open');
                                    return;
                                }
                                item.classList.remove('open');
                            })
                        };</script>
                </div>
            </div>
        </div>
    </div>
</section>
