<?php

namespace frontend\models;

use Yii;
use yii\base\Model;

class Payment extends Model
{
    public $id;
    public $amount;
    public $captcha;

    public function rules() {
        return [
            [['id', 'amount'], 'required'],
            [['id'], 'string', 'max' => 250],
            [['amount'], 'number'],
            ['captcha', 'captcha'],
        ];
    }

    public function attributeLabels() {
        return [
            'id' => Yii::t('app', 'Barcode'),
            'amount' => Yii::t('app', 'PaymentAmount'),
        ];
    }
}
