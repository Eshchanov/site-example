<?php

/* @var $this yii\web\View */
/* @var $privancy \common\models\PrivancyPolicy */

use yii\helpers\Html;
use yii\helpers\Url;
//vd($lang['url']);
$typeList = [
    'umumiy-shartlar'=>'BTSning umumiy shartlari',
    'xizmatlarining-tarif-karta'=>'BTS xizmatlarining tarif kartasi',
    'ommaviy-oferta-shartnoma'=>'BTS Ommaviy Oferta Shartnomasi',
    'express-shartnoma'=>'BTS Express shartnomasi',
    'etiroz-dalolatnoma'=>'BTS E\'tiroz dalolatnomasi',
];
if ($lang['url'] == 'uz'){
    $typeList = [
        'umumiy-shartlar'=>'BTSning umumiy shartlari',
        'xizmatlarining-tarif-karta'=>'BTS xizmatlarining tarif kartasi',
        'ommaviy-oferta-shartnoma'=>'BTS Ommaviy Oferta Shartnomasi',
        'express-shartnoma'=>'BTS Express shartnomasi',
        'etiroz-dalolatnoma'=>'BTS E\'tiroz dalolatnomasi',
    ];
}elseif ($lang['url'] == 'ru'){
    $typeList = [
        'umumiy-shartlar'=>'Генеральные условия BTS',
        'xizmatlarining-tarif-karta'=>'Тарифная карта услуг BTS',
        'ommaviy-oferta-shartnoma'=>'Договор публичной оферты BTS',
        'express-shartnoma'=>'Договор на оказание курьерских услуг BTS',
        'etiroz-dalolatnoma'=>'Претензионный акт',
    ];
}elseif ($lang['url'] == 'en'){
    $typeList = [
        'umumiy-shartlar'=>'General Conditions of BTS Express',
        'xizmatlarining-tarif-karta'=>'Tariff card of BTS Express',
        'ommaviy-oferta-shartnoma'=>'Public Offer Agreement',
        'express-shartnoma'=>'Contract',
        'etiroz-dalolatnoma'=>'Act of Claims',
    ];
}

$this->title = Yii::t('app', 'privancies');
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
                        <?= Html::a(Yii::t('app', 'privancies'), ['site/privancies'])?>
                    </li>
                </ul>
            </div>
            <div class="col-md-3 col-lg-3">
                <?= $this->render('_clients-left') ?>
            </div>
            <div class="col-md-9 col-lg-9">
                <div class="primary">
                    <div class="primary_title">
                        <h2><?= Yii::t('app', 'privancies') ?></h2>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-lg-12">
                            <?= $privancy->text ?>
                            <?php foreach ($documents as $document): ?>
                                <p><strong>› </strong><a href="<?="/documenty/{$document->type}/{$document->date}/{$document->file}" ?>"><strong><?=$typeList[$document->type]?></strong></a></p>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>

</section>
