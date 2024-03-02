<?php

namespace frontend\models;

use Yii;
use common\models\User;
use yii\base\InvalidArgumentException;
use yii\base\Model;

class BtsUpdatePassword extends Model
{
    /**
     * @var string
     */
    public $code;
    public $password;
    public $repassword;

    public function rules() {
        return [
            [['code'], 'required'],
            [['code'], 'string', 'min' => 3, 'max' => 10],

            ['password', 'required'],
            ['password', 'string', 'min' => Yii::$app->params['user.passwordMinLength']],

            ['repassword', 'required'],
            ['repassword', 'compare', 'compareAttribute' => 'password', 'message' => Yii::t('app', 'Passwords don\'t match')],
        ];
    }

    public function attributeLabels() {
        return [
            'code' => Yii::t('app', 'code'),
            'password' => Yii::t('app', 'new_password'),
            'repassword' => Yii::t('app', 'repassword'),
        ];
    }
}
