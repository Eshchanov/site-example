<?php

namespace frontend\models;

use Yii;
use yii\base\Model;

class Services extends Model
{
    public $service;
    public $name;
    public $phone;
    public $captcha;

    public function rules() {
        return [
            [['service', 'name', 'phone'], 'required'],
            [['service', 'name', 'phone'], 'string', 'max' => 250],
            ['captcha', 'captcha'],
        ];
    }

    public function attributeLabels() {
        return [
            'service' => Yii::t('app', 'Select service'),
            'name' => Yii::t('app', 'your_name'),
            'phone' => Yii::t('app', 'your_phone'),
        ];
    }
}
