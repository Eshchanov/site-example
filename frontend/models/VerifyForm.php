<?php

namespace frontend\models;

use Yii;
use common\models\User;
use yii\base\InvalidArgumentException;
use yii\base\Model;

class VerifyForm extends Model
{
    /**
     * @var string
     */
    public $number;
    public $captcha;

    public function rules() {
        return [
            [['number'], 'required'],
            [['number'], 'string', 'min' => 3, 'max' => 10],

            ['captcha', 'required'],
            ['captcha', 'captcha'],
        ];
    }

    public function attributeLabels() {
        return [
            'number' => Yii::t('app', 'code'),
        ];
    }

    /**
     * Verify email
     *
     * @return User|string the saved model or null if saving fails
     */
    public function verify($id)
    {
        $user = User::findOne($id);
        if ($user){
            if ($user->verify_number == $this->number){
                $user->status = User::STATUS_ACTIVE;
                return $user->save(false) ? $user->id : 'Could not save User';
            } else {
                return "Wrong verification number";
            }
        } else {
            return 'User not found';
        }
    }
}
