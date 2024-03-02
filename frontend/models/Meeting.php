<?php

namespace frontend\models;

use Yii;
use yii\base\Model;

class Meeting extends Model
{
    public $type;
    public $message;
    public $name;
    public $phone;
    // public $captcha;

    public function rules() {
        return [
            [['type', 'message', 'name', 'phone'], 'required'],
            [['type'], 'integer'],
            [['message'], 'string'],
            [['name'], 'string', 'max' => 250],
            [['phone'], 'string', 'max' => 45],
            // ['captcha', 'captcha'],
        ];
    }

    public function attributeLabels() {
        return [
            'type'    => Yii::t('app', 'Type of metting'),
            'message' => Yii::t('app', 'complaint_write'),
            'name'    => Yii::t('app', 'your_name'),
            'phone'   => Yii::t('app', 'your_phone'),
            // 'captcha' => Yii::t('app', 'captcha'),
        ];
    }
}
