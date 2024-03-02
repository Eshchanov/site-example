<?php
use yii\helpers\Html;

/** @var \common\models\Lang $current */
/** @var \common\models\Lang $langs */

?>
<style>
    .lang-selector .dropdown-menu a.dropdown-item {
        padding: 0.25rem 0.5rem;
    }
</style>
<div class="dropdown lang-selector">
    <button class="dropdown-toggle" data-toggle="dropdown">
        <?= $current->name;?>
    </button>
    <div class="dropdown-menu" style="min-width: 100%">
        <?php foreach ($langs as $lang):?>
            <?= Html::a($lang->name, '/'.$lang->url.Yii::$app->getRequest()->getLangUrl(), ['class' => 'dropdown-item'] )?>
        <?php endforeach;?>
    </div>
</div>