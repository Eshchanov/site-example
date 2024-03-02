<?php

namespace frontend\models;

use Yii;
use yii\base\Model;

class Contract extends Model
{
    public $name;
    public $surname;
    public $patronymic;
    public $phone;
    public $companyname;
    public $position;
    public $city;
    public $address;
    public $services;
    public $weight;
    public $volume;
    public $shortInfo;
    public $captcha;

    public function rules() {
        return [
            [['name', 'surname', 'phone', 'companyname', 'city', 'address', 'services', 'shortInfo'], 'required'],
            [['name', 'surname', 'patronymic', 'phone', 'companyname', 'position', 'city', 'address'], 'string', 'max' => 255],
            [['services'], 'safe'],
            [['weight', 'volume'], 'number'],
            [['shortInfo'], 'string'],
            ['captcha', 'captcha'],
        ];
    }

    public function attributeLabels() {
        return [
            'name' => Yii::t('app', 'your_name'),
            'surname' => Yii::t('app', 'your_family'),
            'patronymic' => Yii::t('app', 'fathers_name'),
            'phone' => Yii::t('app', 'your_phone'),
            'companyname' => Yii::t('app', 'company_name'),
            'position' => Yii::t('app', 'your_position'),
            'city' => Yii::t('app', 'which_city'),
            'address' => Yii::t('app', 'address'),
            'services' => Yii::t('app', 'which_service'),
            'weight' => Yii::t('app', 'expecting_weight'),
            'volume' => Yii::t('app', 'expecting_size'),
            'shortInfo' => Yii::t('app', 'expecting_info'),
            'captcha' => Yii::t('app', 'captcha'),
        ];
    }
}
