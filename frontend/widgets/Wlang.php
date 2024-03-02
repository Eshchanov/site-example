<?php

namespace frontend\widgets;

use yii\bootstrap4\Widget;
use common\models\Lang;

class Wlang extends Widget
{
    public function init(){}

    public function run() {
        return $this->render('wlang/view', [
            'current' => Lang::getCurrent(),
            'langs' => Lang::find()->where('id != :current_id', [':current_id' => Lang::getCurrent()->id])->all(),
        ]);
    }
}