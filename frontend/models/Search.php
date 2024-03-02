<?php

namespace frontend\models;

use Yii;
use yii\base\Model;

class Search extends Model
{
    public $q;
    public $captcha;

    public function rules() {
        return [
            [['q', 'captcha'], 'required'],
            [['q'], 'string', 'max' => 250],
            ['captcha', 'captcha'],
        ];
    }

    public function attributeLabels() {
        return [
            'q' => Yii::t('app', 'Barcode'),
        ];
    }
}
