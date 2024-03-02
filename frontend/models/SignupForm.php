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
class SignupForm extends Model
{
    public $username;
    public $name;
    // public $email;
    public $phone;
    public $password;
    public $repassword;
    // public $privacy;
    public $captcha;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => Yii::t('app', 'This username has already been taken')],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['name', 'trim'],
            ['name', 'required'],
            ['name', 'string', 'min' => 2, 'max' => 255],

            // ['email', 'trim'],
            // ['email', 'required'],
            // ['email', 'email'],
            // ['email', 'string', 'max' => 255],
            // ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],

            ['phone', 'trim'],
            ['phone', 'required'],
            ['phone', 'string', 'max' => 255],
            // ['phone', 'unique', 'targetClass' => '\common\models\Profile', 'message' => 'This phone number has already been taken.'],

            ['password', 'required'],
            ['password', 'string', 'min' => Yii::$app->params['user.passwordMinLength']],

            ['repassword', 'required'],
            ['repassword', 'compare', 'compareAttribute' => 'password', 'message' => Yii::t('app', 'Passwords don\'t match')],

            // ['privacy', 'required'],

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

    /**
     * Signs user up.
     *
     * @return array|bool
     */
    public function signup()
    {
        if (!$this->validate()) {
            return $this->errors;
        }
        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->verify_number = rand(1000, 9999);
        $profile = new Profile();
        $profile->name = $this->name;
        $profile->phone = $this->phone;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        $user->generateEmailVerificationToken();

        if ($user->save(false)){
            $profile->user_id = $user->id;
//            $login = '';
//            $password = '';
//
//            $sms_string = '{
//              "messages":
//              [
//                {
//                  "recipient":"'.$this->phone.'",
//                  "message-id":"abc000000001",
//
//                  "sms":{
//                    "originator": "3700",
//                    "content": {
//                      "text": "'.$user->verify_number.'"
//                    }
//                  }
//                }
//              ]
//            }';
//
//            $sms = curl_init('http://91.204.239.44/broker-api/send');
//            curl_setopt($sms, CURLOPT_CUSTOMREQUEST, "POST");
//            curl_setopt($sms, CURLOPT_POSTFIELDS, $sms_string);
//            curl_setopt($sms, CURLOPT_RETURNTRANSFER, true);
//            curl_setopt($sms, CURLOPT_HTTPHEADER, array(
//                    'Authorization: Basic '.base64_encode($login.':'.$password),
//                    'Content-Type: application/json',
//                    'Content-Length: ' . strlen($sms_string))
//            );
//            curl_exec($sms);
//            $bts_string = http_build_query(
//                array(
//                    'username' => $this->username,
//                    'fullname' => $this->name,
//                    'phone' => $this->phone,
//                    'password' => $this->password,
//                    'role' => 9
//                )
//            );
//            $bts = curl_init('http://api.bts.uz:8080/index.php?r=auth/signup');
//            curl_setopt($bts, CURLOPT_CUSTOMREQUEST, "POST");
//            curl_setopt($bts, CURLOPT_POSTFIELDS, $bts_string);
//            curl_setopt($bts, CURLOPT_RETURNTRANSFER, true);
//            curl_setopt($bts, CURLOPT_HTTPHEADER, array(
//                    'Content-Type: application/json',
//                    'Content-Length: ' . strlen($bts_string))
//            );
//            curl_exec($bts);
            if ($profile->save(false)){
                return $user->id;
            } else {
                $user->delete();
                return "";
            }
        } else {
            return false;
        }
    }

    /**
     * Sends confirmation email to user
     * @param User $user user model to with email should be send
     * @return bool whether the email was sent
     */
    protected function sendEmail($user)
    {
        return Yii::$app
            ->mailer
            ->compose(
                ['html' => 'emailVerify-html', 'text' => 'emailVerify-text'],
                ['user' => $user]
            )
            ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name . ' robot'])
            ->setTo($this->email)
            ->setSubject('Account registration at ' . Yii::$app->name)
            ->send();
    }
}
