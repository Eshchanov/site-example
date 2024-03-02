<?php

namespace frontend\models;

use common\models\Profile;
use Yii;
use yii\base\Model;
use yii\helpers\Html;
use common\models\User;

/**
 * Signup form
 */
class Login extends Model
{
    // public $username;
    // public $name;
    // public $email;
    // public $password;
    // public $repassword;
    // public $privacy;
    public $phone;
    public $captcha;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['phone', 'trim'],
            ['phone', 'required'],
            ['phone', 'string', 'max' => 255],

            ['captcha', 'required'],
            ['captcha', 'captcha'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'username' => Yii::t('app', 'login_text'),
            'name' => Yii::t('app', 'your_name'),
            'phone' => Yii::t('app', 'your_phone'),
            'password' => Yii::t('app', 'password'),
            'repassword' => Yii::t('app', 'repassword'),
            // 'privacy' => Html::a(Yii::t('app', 'agreement'), ['site/privancy']),
        ];
    }

    public function userSave()
    {
        $phone = $this->phone;

        if ($phone) {
            $phone = str_replace('+', '', $phone);
            $phone = str_replace('-', '', $phone);
            $phone = str_replace(' ', '', $phone);
            $phone = str_replace('(', '', $phone);
            $phone = str_replace(')', '', $phone);
            $phone = '+' . $phone;
        }

        $user = User::findOne(['phone' => $phone]);
        if (!$user) {
            $micTime = microtime(true);
            $micTime = str_replace('.', '', $micTime);
            $randomStr = Yii::$app->security->generateRandomString(3);
            $email = $randomStr . $micTime . '@domen.bts';

            $user = new User();
            $user->username = $phone;
            $user->email = $email;
            $user->phone = $phone;
            $user->setPassword($this->phone);
            $user->generateAuthKey();
            $user->generateEmailVerificationToken();
        }

        $user->status = User::STATUS_INACTIVE;
        // $user->bts_token = $token;

        if ($user->save(false)){
            return $user->id;
        } else {
            return false;
        }
    }
}
