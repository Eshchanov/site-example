<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Xizmat narxini xisoblash';
$this->params['breadcrumbs'][] = $this->title;
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
                        <span class="step">Yukning turi</span>
                        <span class="step">Yuk narxini hisoblatish</span>
                    </div>
                </div>
            </div>
            <div class="col-md-9 col-lg-9">
                <div class="primary">
                    <form id="calcForm" action="">
                        <div class="tab">
                            <div class="primary_title">
                                <h2>Yukingizning narxini hisoblating</h2>
                                <p>Buning uchun quyidagi formalarni to’ldiring</p>
                            </div>
                            <div class="row">
                                <div class="col-md-4 col-lg-4">
                                    <div class="form_radio_btn">
                                        <input id="radio-1" type="radio" name="radio" value="1" checked>
                                        <label for="radio-1">O’zbekiston bo’yicha</label>
                                    </div>
                                    <div class="form_radio_btn">
                                        <input id="radio-2" type="radio" name="radio" value="2">
                                        <label for="radio-2">Xalqaro</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 col-lg-4">
                                    <label for="in">Qayerdan?</label>
                                    <input type="text" name="in" id="in" oninput="this.className = ''">
                                </div>
                                <div class="col-md-4 col-lg-4">
                                    <label for="name">Qayerga?</label>
                                    <input type="text" name="to" id="to" oninput="this.className = ''">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8 col-lg-8">
                                    <p>Yetkazib berish muddati</p>
                                    <input type="dayrange" id="dayrange" value="0" name="volume" min="1" max="15"
                                           class="dayRange" data-rangeslider>
                                    <!-- <div class="dateRange">
                                        <div class="min">0</div>
                                        <div class="max">15</div>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                        <div class="tab">
                            <div class="primary_title">
                                <h2>Yukingiz og’irligi va hajmini belgilang</h2>
                            </div>
                            <div class="row">
                                <div class="col-md-4 col-lg-4">
                                    <div class="primary-btn-block">
                                        <a href="#" class="kg form-btn active">Kilogram</a>
                                        <a href="#" class="tn form-btn">Tonna</a>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8 col-lg-8">
                                    <div class="kgr">
                                        <input type="range" id="kgrange" value="0" name="volume" min="1" max="1000"
                                               class="kgrange" data-rangeslider>
                                    </div>
                                    <div class="tnr hidden-form">
                                        <input type="range" id="tnrange" value="0" name="volume" min="1" max="1000"
                                               class="tnrange" data-rangeslider>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8 col-lg-8">
                                    <p>Yuk hajmi</p>
                                    <input type="range" id="wght" value="0" name="volume" min="1" max="1000"
                                           class="wght" data-rangeslider>
                                </div>
                            </div>
                        </div>
                        <div class="tab">
                            <div class="primary_title">
                                Yukning turi

                            </div>
                            <p>(bir nechta variantni belgilashingiz mumkin)</p>
                            <div class="row">

                                <div class="col-md-4 col-lg-4">
                                    <ul>
                                        <li class="chexbox-block">
                                            <input type="checkbox" id="med">
                                            <label for="med">Tibbiyot uskunalari
                                                va dorilar</label>
                                        </li>
                                        <li class="chexbox-block">
                                            <input type="checkbox" id="international">
                                            <label for="international">Katta hajmda qurilish
                                                materiallari</label>
                                        </li>
                                        <li class="chexbox-block">
                                            <input type="checkbox" id="ecommerce">
                                            <label for="ecommerce">Ishlab chiqarish
                                                uskunalari</label>
                                        </li>
                                    </ul>

                                </div>
                                <div class="col-md-4 col-lg-4">
                                    <ul>
                                        <li class="chexbox-block">
                                            <input type="checkbox" id="logistic">
                                            <label for="logistic">Har xil kategoriyadagi
                                                xavfli yuklar</label>
                                        </li>
                                        <li class="chexbox-block">
                                            <input type="checkbox" id="int-logistic">
                                            <label for="int-logistic">Oziq-ovqat
                                                mahsulotlari</label>
                                        </li>
                                        <li class="chexbox-block">
                                            <input type="checkbox" id="warehouse">
                                            <label for="warehouse">Har xil temperaturani
                                                talab qiladigan yuklar</label>
                                        </li>

                                    </ul>

                                </div>
                                <div class="col-md-4 col-lg-4">
                                    <div class="chexbox-block">
                                        <input type="checkbox" id="individual">
                                        <label for="individual">Suyuqlik ko‘rinishdagi
                                            yuklar</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 col-lg-4">
                                    <label for="other">Boshqa turdagi yuk</label>
                                    <input type="text" name="other" id="other" oninput="this.className = ''">
                                </div>
                            </div>
                            <hr>
                            <div class="primary_title">
                                Qo’shimcha xizmatlar
                            </div>
                            <div class="row">

                                <div class="col-md-4 col-lg-4">
                                    <div class="chexbox-block">
                                        <input type="checkbox" id="boj">
                                        <label for="boj">Bojxona rasmiylashtiruvi</label>
                                    </div>
                                </div>
                                <div class="col-md-4 col-lg-4">
                                    <div class="chexbox-block">
                                        <input type="checkbox" id="skld">
                                        <label for="skld">Sklad xizmati</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab">
                            <div class="primary_title">
                                Siz belgilagan shartlar asosida yukingizning
                                narxlarini jo’natamiz
                            </div>
                            <p>Ma’lumot olish turini tanlang:</p>
                            <div class="row">
                                <div class="col-md-6 col-lg-6">
                                    <div class="form_radio_btn">
                                        <input id="connect" type="radio" name="connectType" value="1" checked>
                                        <label for="connect">Telefon orqali</label>
                                    </div>
                                    <div class="form_radio_btn">
                                        <input id="connect2" type="radio" name="connectType" value="2">
                                        <label for="connect2">Telegram orqali</label>
                                    </div>
                                    <div class="form_radio_btn">
                                        <input id="connect3" type="radio" name="connectType" value="2">
                                        <label for="connect3">SMS orqali</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 col-lg-4">
                                    <label for="name">Ismingiz</label>
                                    <input type="text" name="name" id="name" oninput="this.className = ''">
                                </div>
                                <div class="col-md-4 col-lg-4">
                                    <label for="phone">Telefon raqamingiz </label>
                                    <input type="text" name="phone" id="phone" oninput="this.className = ''">
                                </div>
                            </div>
                            <div class="row"><div class="g-recaptcha" data-sitekey="6LcyMEUdAAAAAPCaK2ZHVmE-DQRSW0lxWESvmAU3"></div></div>
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
</section>