<?php

use common\widgets\Alert;
use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;
use yii\helpers\Url;
use frontend\widgets\Wlang;

$this->title = Yii::t('app', 'delete_confirm_title');
$this->params['breadcrumbs'][] = $this->title;
?>
<style type="text/css">
    .sign-in {
        height: auto;
        padding: 30px 0;
    }
    .alert-dismissible .close {
        padding: 7px 14px;
    }
    .lang-selector {
    }
    .dropdown-toggle {
        padding: 7px 15px;
        border: 1px solid #777777;
        border-radius: 3px;
    }
</style>
<section class="sign-in login">
    <div class="container">
        <div class="row justify-content-center">
            <div class="sign-in-body">
                <div style="display: flex; align-items: end; justify-content: flex-end; margin-bottom: 20px;">
                    <?= WLang::widget();?>
                </div>
                <h2 class="title"><?= Yii::t('app', 'delete_confirm_title')?></h2>
                <?= Alert::widget() ?>
                <p class="subtitle"><?= Yii::t('app', 'delete_confirm_description')?></p>
                <div style="margin: 45px;">
                    <span style="background: #DDDDDD; padding: 15px 25px; border: 1px solid #777777;"><?= $user->phone; ?></span>
                </div>
                <a href="<?= Url::to(['/site/delete-confirm']) ?>" class="submit-btn"><?= Yii::t('app', 'delete') ?></a>
            </div>
        </div>
    </div>
</section>
<?php
    $this->registerJs("
        $('#login-phone').mask('+998 00 000-00-00');
        $('.submit-btn').click(function(){
            $(this).css('display', 'none');
        });
    ");
?>