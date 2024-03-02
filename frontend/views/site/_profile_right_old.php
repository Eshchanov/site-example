<?php

/* @var $this yii\web\View */
/* @var $profile \common\models\Profile */
/* @var $user \common\models\User */

use common\models\General;
use common\models\Lang;
use common\widgets\Alert;
use yii\helpers\Html;

$name = isset($userProfile['name']) ? ucfirst($userProfile['name']) : '';
$img = isset($userProfile['photo']) ? $userProfile['photo'] : null;

$this->title = $name;
$this->params['breadcrumbs'][] = $this->title;

$general = General::find()->where(['lang' => Lang::getCurrent()])->one();
?>
<div class="site-profile">
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
                <div class="col-md-3 col-lg-3">
                    <div class="sidebar">
                        <div class="user-menu">
                            <?php if ($img): ?>
                                <a href="#" class="avatar-img" style="padding: 10px;">
                                    <?= Html::img($img, ['style' => 'width: 100px;']); ?>
                                </a>
                            <?php else: ?>
                                <a href="#" class="avatar-img" style="padding: 43px 40px;">
                                    <svg width="40" height="34" viewBox="0 0 40 34" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path
                                                d="M36.5264 20.7159C33.709 19.3462 31.0363 21.2171 30.7357 23.7338C29.3993 23.9231 28.3525 24.5913 27.7066 25.8051C27.0607 27.019 27.1164 28.2551 27.7512 29.5246C27.5619 29.5246 27.4282 29.5246 27.2946 29.5246C19.6664 29.5246 12.0381 29.5246 4.42104 29.5246C1.82632 29.5357 0 27.6983 0 25.0924C0 19.7805 0 14.4797 0 9.1678C0 6.49514 1.81519 4.67995 4.51012 4.67995C6.14713 4.67995 7.78414 4.65768 9.43228 4.69109C9.9 4.70222 10.1784 4.56859 10.3677 4.12314C10.635 3.51066 10.9468 2.92044 11.2586 2.34137C12.0827 0.837992 13.3522 0.0361924 15.0672 0.0139201C17.1607 -0.00835208 19.2655 0.00278403 21.3591 0.00278403C23.2188 0.0139201 24.5551 0.860264 25.4015 2.51954C25.691 3.08749 25.9805 3.65543 26.2478 4.23451C26.3926 4.55745 26.593 4.67995 26.9494 4.67995C28.6532 4.66881 30.3682 4.66881 32.072 4.66881C34.7001 4.66881 36.5264 6.49514 36.5264 9.12326C36.5376 12.865 36.5264 16.5956 36.5264 20.3373C36.5264 20.4487 36.5264 20.56 36.5264 20.7159ZM18.2632 10.0587C14.7776 10.0253 11.8377 12.9095 11.782 16.4397C11.7263 19.981 14.6106 22.9654 18.1519 23.01C21.7265 23.0657 24.6888 20.1703 24.7333 16.6067C24.789 13.0209 21.8936 10.1032 18.2632 10.0587Z"
                                                fill="#C2C5CC" />
                                        <path
                                                d="M32.6622 29.5357C32.1054 29.5357 31.6266 29.5469 31.1366 29.5357C30.0007 29.5135 29.1655 28.6671 29.1766 27.5869C29.1877 26.5067 30.0452 25.6938 31.1811 25.6827C31.6488 25.6827 32.1277 25.6827 32.6622 25.6827C32.6622 25.1258 32.6399 24.5913 32.6622 24.0568C32.6956 23.2773 33.0854 22.7093 33.7758 22.3864C34.4774 22.0523 35.1567 22.1525 35.7692 22.6202C36.248 22.9877 36.493 23.4888 36.5042 24.1013C36.5153 24.6136 36.5042 25.1258 36.5042 25.6938C37.061 25.6938 37.5844 25.6827 38.1078 25.6938C39.0877 25.7161 39.8895 26.451 39.9898 27.4088C40.09 28.3887 39.4441 29.3353 38.4753 29.4912C37.9519 29.5803 37.3951 29.5357 36.8605 29.5469C36.7603 29.5469 36.6712 29.558 36.5153 29.5692C36.5153 30.1037 36.5264 30.6271 36.5153 31.1505C36.493 32.1305 35.7469 32.9323 34.7892 33.0213C33.8092 33.1104 32.9072 32.498 32.7179 31.5402C32.6288 31.0391 32.6733 30.5157 32.6622 30.0035C32.6622 29.8698 32.6622 29.7251 32.6622 29.5357Z"
                                                fill="#C2C5CC" />
                                    </svg>
                                </a>
                            <?php endif ?>
                            <div class="user-name">
                                <?= $name ?>
                            </div>
                        </div>
                        <ul>
                            <li>
                                <?= Html::a(Yii::t('app', 'profile'), ['site/profile'])?>
                            </li>
                            <li>
                                <?= Html::a(Yii::t('app', 'inmail'), ['site/inmail'])?>
                            </li>
                            <li>
                                <?= Html::a(Yii::t('app', 'outmail'), ['site/outmail'])?>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-9 col-lg-9">
                    <div class="primary">
                        <div class="primary_title">
                            <h2><?= Yii::t('app', 'cabinet') ?></h2>
                        </div>
                        <h4 class="subtitle">
                            <?= Yii::t('app', 'profile') ?>
                        </h4>
                        <?= Alert::widget() ?>
                        <form action="#" class="calc-form">
                            <div class="row">
                                <div class="col-md-4 col-lg-4">
                                    <label for="name">To’liq ismi:</label>
                                    <input type="text" name="name" id="name" placeholder="Shavkat Zoirov">
                                </div>
                                <div class="col-md-4 col-lg-4">
                                    <label for="phone">Telefon raqami</label>
                                    <input type="text" class="phone-mask" name="phone" id="phone"
                                           placeholder="+998 (71) 207 08 09">
                                </div>
                                <div class="col-md-4 col-lg-4">
                                    <label for="email">Elektron pochta adresi:</label>
                                    <input type="text" name="email" id="email" placeholder="shavkatzoirov@gmail.com">

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8 col-lg-8">
                                    <label for="adress">Manzil:</label>
                                    <input type="text" name="adress" id="adress"
                                           placeholder="Toshkent sh., Sayxonoxur tum., Alisher Navoiy ko’chasi, 213 - 56">
                                </div>
                            </div>
                            <button type="button" class="submit-btn">Saqlash</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>