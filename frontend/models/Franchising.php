<?php

namespace frontend\models;

use Yii;
use yii\base\Model;

class Franchising extends Model
{
    public $name;
    public $phone;
    public $captcha;

    public function rules() {
        return [
            [['name', 'phone'], 'required'],
            [['name', 'phone'], 'string', 'max' => 250],
            ['captcha', 'captcha'],
        ];
    }

    public function attributeLabels() {
        return [
            'name' => Yii::t('app', 'your_name'),
            'phone' => Yii::t('app', 'your_phone'),
        ];
    }
}
