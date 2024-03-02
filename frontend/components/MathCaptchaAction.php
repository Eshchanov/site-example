<?php
namespace frontend\components;

use yii\captcha\CaptchaAction;

class MathCaptchaAction extends CaptchaAction
{
    public $minLength = 2;
    public $maxLength = 9;

    /**
     * @inheritdoc
     */
    protected function generateVerifyCode()
    {
        $num = mt_rand((int)$this->minLength, (int)$this->maxLength);
        return $num;
    }

    /**
     * @inheritdoc
     */
    protected function renderImage($code)
    {
        return parent::renderImage($this->getText($code));
    }

    protected function getText($code)
    {
        $code = (int)$code;
        $rand = mt_rand(min(1, $code - 1), max(1, $code - 1));
        $operation = mt_rand(0, 1);
        if ($operation === 1) {
            return $code - $rand . ' + ' . $rand . ' =';
        } else {
            return $code + $rand . ' - ' . $rand . ' =';
        }
    }
}