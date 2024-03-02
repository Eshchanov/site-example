<?php
use frontend\widgets\Wlang;
use common\widgets\Alert;
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
            <div class="sign-in-body" style="font-size: 24px;">
                <?= Alert::widget() ?>
            </div>
        </div>
    </div>
</section>