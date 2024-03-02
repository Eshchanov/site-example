<?php

namespace frontend\models;

use Yii;
use common\models\User;
use yii\base\InvalidArgumentException;
use yii\base\Model;

class ForgotPasswordForm extends Model
{
    /**
     * @var string
     */
    public $login;

    public function rules() {
        return [
            [['login'], 'required'],
            [['login'], 'string'],
        ];
    }

    public function attributeLabels() {
        return [
            'login' => Yii::t('app', 'login_or_phone'),
        ];
    }
}
