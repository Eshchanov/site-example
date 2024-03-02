<?php

/* @var $this yii\web\View */
/* @var $services \common\models\Services */

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
                        <?= Html::a(Yii::t('app', 'home'), ['site/index'])?>
                    </li>
                    <li>
                        <?= Html::a(Yii::t('app', 'clients'), ['site/clients'])?>
                    </li>
                    <li>
                        <?= Html::a(Yii::t('app', 'calculate'), ['site/clients'])?>
                    </li>
                </ul>
            </div>
            <div class="col-md-3 col-lg-3">
                <div class="sidebar">
                    <ul>
                        <li>
                            <?= Html::a(Yii::t('app', 'calculate'), ['site/clients'])?>
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
                            <?= Html::a(Yii::t('app', 'privancies'), ['site/privancy'])?>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-9 col-lg-9">
                <div class="primary">
                    <div class="primary_title">
                        <h2><?= Yii::t('app', 'calculate') ?></h2>
                    </div>
                    <form class="calc-form">
                        <input type="text" name="type" class="hidden" value="Xizmat narxini hisoblash: O'zbekiston bo'ylab">
                        <div class="row align-items-end">
                            <div class="col-md-4 col-lg-4">
                                <div class="primary_dropdown">
                                    <label for="servis"><?= Yii::t('app', 'which_service')?></label>
                                    <select name="servis" id="servis">
                                        <?php foreach ($services as $service): ?>
                                        <option value="<?= $service->name ?>"><?= $service->name ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4 col-lg-6">
                                <div class="primary-btn-block">
                                    <a href="#" class="uzb form-btn active"><?= Yii::t('app', 'in_uzb')?></a>
                                    <a href="#" class="world form-btn"><?= Yii::t('app', 'global')?></a>
                                </div>
                            </div>
                            <div class="col-md-4 col-lg-4"></div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 col-lg-4">
                                <label for="name"><?= Yii::t('app', 'your_name')?><span class="requried">*</span></label>
                                <input type="text" name="name" id="name">
                            </div>
                            <div class="col-md-4 col-lg-4">
                                <label for="phone"><?= Yii::t('app', 'your_phone')?><span class="requried">*</span></label>
                                <input type="text" class="phone-mask" name="phone" id="phone">
                            </div>
                            <div class="col-md-4 col-lg-4"></div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 col-lg-4">
                                <label for="where"><?= Yii::t('app', 'from')?>?<span class="requried">*</span></label>
                                <input type="text" name="where" id="where">

                            </div>
                            <div class="col-md-4 col-lg-4">
                                <label for="where-2"><?= Yii::t('app', 'to')?>?<span class="requried">*</span></label>
                                <input type="text" name="where-2" id="where-2">

                            </div>
                            <div class="col-md-4 col-lg-4">
                                <label for="quantity"><?= Yii::t('app', 'weight')?>:<span class="requried">*</span></label>
                                <input type="number" id="quantity" name="quantity" placeholder="5kg" min="1" max="">

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 col-lg-4">
                                <input type="text" name="courier-plus" class="hidden">
                                <div class="chexbox-block">
                                    <input type="checkbox" name="courier" value="Kuryer bilan olib ketish" id="courier">
                                    <label for="courier"><?= Yii::t('app', 'with_courier')?></label>
                                </div>
                            </div>
                            <div class="col-md-4 col-lg-4">
                                <div class="chexbox-block">
                                    <input type="checkbox" name="courier" value="Kuryer bilan eshikgacha olib borish" id="courier-2">
                                    <label for="courier-2"><?= Yii::t('app', 'courier_door')?></label>
                                </div>
                            </div>
                            <div class="col-md-4 col-lg-4">
                                <div class="chexbox-block">
                                    <input type="checkbox" name="courier" value="Bilmayman" id="courier-3">
                                    <label for="courier-3"><?= Yii::t('app', 'dont_know')?></label>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="primary_title">
                            <h2><?= Yii::t('app', 'calculate_weight')?></h2>
                        </div>
                        <div class="row">
                            <div class="col-md-3 col-lg-3">
                                <picture><source srcset="/img/kub.webp" type="image/webp"><img src="/img/kub.png" class="img-1" alt=""></picture>
                                <picture><source srcset="/img/rulon.webp" type="image/webp"><img src="/img/rulon.png" class="img-2 dnone" alt=""></picture>
                            </div>
                            <div class="col-md-3 col-lg-3">
                                <div class="size-radiobox">
                                    <div class="size-radiobox-kub">
                                        <input type="radio" id="kub" name="kubik" value="kub" checked>
                                        <label for="kub"><?= Yii::t('app', 'cube')?></label>
                                    </div>
                                    <div class="size-radiobox-kub">
                                        <input type="radio" id="rulon" name="kubik" value="rulon">
                                        <label for="rulon"><?= Yii::t('app', 'rulon')?></label>
                                    </div>
                                </div>
                                <div class="width">
                                    <label for="width"><?= Yii::t('app', 'length')?> (A)<span class="requried">*</span></label>
                                    <input type="text" name="width" id="width" placeholder="00sm">

                                </div>
                            </div>
                            <div class="col-md-3 col-lg-3">
                                <div class="height">
                                    <label for="height"><?= Yii::t('app', 'height')?> (H)<span class="requried">*</span></label>
                                    <input type="text" name="height" id="height" placeholder="00sm">
                                </div>
                            </div>
                            <div class="col-md-3 col-lg-3">
                                <div class="height eni">
                                    <label for="length"><?= Yii::t('app', 'eni')?> (B)<span class="requried">*</span></label>
                                    <input type="text" name="length" id="length" placeholder="00sm">
                                </div>
                            </div>
                            <div class="col-md-3 col-lg-3">
                            </div>
                            <div class="col-md-4 col-lg-4 hidden">
                                <a href="#" class="form-btn active mb-4 hajm"><?= Yii::t('app', 'calculate_size_btn')?></a>
                                <p><a href="#" class="form_link"><?= Yii::t('app', 'calculate_size_which')?></a></p>
                            </div>
                        </div>
                        <hr>
                        <div class="cargo-type">
                            <input type="text" name="danger-plus" class="hidden">
                            <div class="chexbox-block">
                                <input type="checkbox" name="danger" value="Xavfli yuk" id="danger">
                                <label for="danger"><?= Yii::t('app', 'dangerous')?></label>
                            </div>
                            <div class="chexbox-block">
                                <input type="checkbox" name="danger" value="Katta hajmdagi yuk" id="big-cargo">
                                <label for="big-cargo"><?= Yii::t('app', 'big')?></label>
                            </div>
                        </div>
                        <button type="button" class="submit-btn"><?= Yii::t('app', 'calculate_btn')?></button>
                        <p class="help-box">Barcha hududlarni to'ldiring</p>
                    </form>
                    <form class="calc-form-2 hidden-form">
                        <input type="text" name="type" class="hidden" value="Xizmat narxini hisoblash: Xalqaro po'chta">
                        <div class="row align-items-end">
                            <div class="col-md-4 col-lg-4">
                                <div class="primary_dropdown">
                                    <label for="servis2"><?= Yii::t('app', 'which_service')?></label>
                                    <select name="servis2" id="servis2">
                                        <?php foreach ($services as $service): ?>
                                            <option value="<?= $service->name ?>"><?= $service->name ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4 col-lg-6">
                                <div class="primary-btn-block">
                                    <a href="#" class="uzb form-btn active"><?= Yii::t('app', 'in_uzb')?></a>
                                    <a href="#" class="world form-btn"><?= Yii::t('app', 'global')?></a>
                                </div>
                            </div>
                            <div class="col-md-4 col-lg-4"></div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 col-lg-4">
                                <label for="name2"><?= Yii::t('app', 'your_name')?><span class="requried">*</span></label>
                                <input type="text" name="name2" id="name2">
                            </div>
                            <div class="col-md-4 col-lg-4">
                                <label for="phone2"><?= Yii::t('app', 'your_phone')?><span class="requried">*</span></label>
                                <input type="text" class="phone-mask" name="phone2" id="phone2">
                            </div>
                            <div class="col-md-4 col-lg-4"></div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 col-lg-4">
                                <label for="country"><?= Yii::t('app', 'from_country')?> <span class="requried">*</span></label>
                                <input type="text" name="country" id="country">
                            </div>
                            <div class="col-md-4 col-lg-4">
                                <label for="country2"><?= Yii::t('app', 'to_country')?> <span class="requried">*</span></label>
                                <input type="text" class="phone-mask" name="country2" id="country2">
                            </div>
                            <div class="col-md-4 col-lg-4"></div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 col-lg-4">
                                <label for="where2"><?= Yii::t('app', 'city')?>?<span class="requried">*</span></label>
                                <input type="text" name="where2" id="where2">

                            </div>
                            <div class="col-md-4 col-lg-4">
                                <label for="where-2-2"><?= Yii::t('app', 'city')?>?<span class="requried">*</span></label>
                                <input type="text" name="where-2-2" id="where-2-2">

                            </div>
                            <div class="col-md-4 col-lg-4">
                                <label for="quantity2"><?= Yii::t('app', 'weight')?>:<span class="requried">*</span></label>
                                <input type="number" id="quantity2" name="quantity2" placeholder="5kg" min="1" max="">

                            </div>
                        </div>
                        <div class="row">
                            <input type="text" name="courier-plus2" class="hidden">
                            <div class="col-md-4 col-lg-4">
                                <div class="chexbox-block">
                                    <input type="checkbox" name="courier2" id="courier2">
                                    <label for="courier2"><?= Yii::t('app', 'with_courier')?></label>
                                </div>
                            </div>
                            <div class="col-md-4 col-lg-4">
                                <div class="chexbox-block">
                                    <input type="checkbox" name="courier2" id="courier3">
                                    <label for="courier3"><?= Yii::t('app', 'with_courier')?></label>
                                </div>
                            </div>
                            <div class="col-md-4 col-lg-4">
                                <div class="chexbox-block">
                                    <input type="checkbox" name="courier2" id="courier4">
                                    <label for="courier4"><?= Yii::t('app', 'dont_know')?></label>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="primary_title">
                            <h2><?= Yii::t('app', 'calculate')?></h2>
                        </div>
                        <div class="row">
                            <div class="col-md-3 col-lg-3">
                                <picture><source srcset="/img/kub.webp" type="image/webp"><img src="/img/kub.png" class="img-1" alt=""></picture>
                                <picture><source srcset="/img/rulon.webp" type="image/webp"><img src="/img/rulon.png" class="img-2 dnone" alt=""></picture>
                            </div>
                            <div class="col-md-3 col-lg-3">
                                <div class="size-radiobox">
                                    <div class="size-radiobox-kub">
                                        <input type="radio" id="kub" name="kubik" value="kub" checked>
                                        <label for="kub"><?= Yii::t('app', 'cube')?></label>
                                    </div>
                                    <div class="size-radiobox-kub">
                                        <input type="radio" id="rulon" name="kubik" value="rulon">
                                        <label for="rulon"><?= Yii::t('app', 'rulon')?></label>
                                    </div>
                                </div>
                                <div class="width">
                                    <label for="width2"><?= Yii::t('app', 'length')?> (A)<span class="requried">*</span></label>
                                    <input type="text" name="width2" id="width2" placeholder="00sm">

                                </div>
                            </div>
                            <div class="col-md-3 col-lg-3">
                                <div class="height">
                                    <label for="height2"><?= Yii::t('app', 'height')?> (H)<span class="requried">*</span></label>
                                    <input type="text" name="height2" id="height2" placeholder="00sm">
                                </div>
                            </div>
                            <div class="col-md-3 col-lg-3">
                                <div class="height eni">
                                    <label for="length2"><?= Yii::t('app', 'eni')?> (B)<span class="requried">*</span></label>
                                    <input type="text" name="length2" id="length2" placeholder="00sm">
                                </div>
                            </div>
                            <div class="col-md-3 col-lg-3">
                            </div>
                            <div class="col-md-4 col-lg-4 hidden">
                                <a href="#" class="form-btn active mb-4 hajm"><?= Yii::t('app', 'calculate_size_btn')?></a>
                                <p><a href="#" class="form_link"><?= Yii::t('app', 'calculate_size_which')?></a></p>
                            </div>
                        </div>
                        <hr>
                        <div class="cargo-type">
                            <input type="text" name="danger-plus2" class="hidden">
                            <div class="chexbox-block">
                                <input type="checkbox" name="danger2" value="Xavfli yuk" id="danger2">
                                <label for="danger2"><?= Yii::t('app', 'dangerous')?></label>
                            </div>
                            <div class="chexbox-block">
                                <input type="checkbox" name="danger2" value="Katta hajmdagi yuk" id="big-cargo2">
                                <label for="big-cargo2"><?= Yii::t('app', 'big')?></label>
                            </div>
                        </div>
                        <button type="button" class="submit-btn"><?= Yii::t('app', 'calculate_btn')?></button>
                        <p class="help-box">Barcha hududlarni to'ldiring</p>
                    </form>
                    <div class="ps">
                        <span class="requried">*</span> <?= Yii::t('app', 'must')?>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
