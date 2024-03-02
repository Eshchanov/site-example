<?php
    use yii\helpers\Html;
?>
<section class="page-wrap">
    <div class="container-xl">
        <div class="row">
            <div class="breadcrumbs">
                <ul>
                    <li>
                        <?= Html::a(Yii::t('app', 'home'), ['site/index']) ?>
                    </li>
                    <li>
                        <?= Html::a(Yii::t('app', 'calculate'), ['site/calculate']) ?>
                    </li>
                </ul>
            </div>
            <div class="col-md-3 col-lg-3">
                <div class="sidebar">
                    <div class="steps-form">
                        <span class="step">Manzillar</span>
                        <span class="step">Yukning og’irligi va hajmi</span>
                        <!-- <span class="step">Yukning turi</span> -->
                        <!-- <span class="step">Yuk narxini hisoblatish</span> -->
                    </div>
                </div>
            </div>
            <div class="col-md-9 col-lg-9">
                <div class="primary">
                    <form id="calcForm" action="">
                        <div class="tab">
                            First
                        </div>
                        <div class="tab">
                            Second
                        </div>
                        <div class="stepForm">
                            <button type="button" id="nextBtn" class="submit-btn" onclick="nextPrev(1)">Keyingi</button>
                            <button type="button" id="submitBtn" class="submit-btn"
                                    onclick="nextPrev(1)">Yuborish
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>