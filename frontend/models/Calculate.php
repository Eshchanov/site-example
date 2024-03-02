<?php

namespace frontend\models;

use Yii;
use yii\base\Model;

class Calculate extends Model
{
    public $bringBackWaybill;
    public $senderRegionId;
    public $senderCityId;
    public $senderDelivery;
    public $receiverRegionId;
    public $receiverCityId;
    public $receiverDelivery;
    public $weight;
    public $isBox;
    public $volume;
    public $x;
    public $y;
    public $z;
    public $captcha;

    public function rules() {
        return [
            [['senderRegionId', 'senderCityId', 'receiverRegionId', 'receiverCityId', 'weight'], 'required'],
            [['senderRegionId', 'senderCityId', 'receiverRegionId', 'receiverCityId', 'bringBackWaybill', 'senderDelivery', 'receiverDelivery', 'isBox'], 'integer'],
            [['weight', 'volume', 'x', 'y', 'z'], 'number'],
            ['captcha', 'captcha'],
        ];
    }

    public function attributeLabels() {
        return [
            'bringBackWaybill' => Yii::t('app', 'bringBackWaybill'),
            'senderRegionId' => Yii::t('app', 'profile_regionId'),
            'senderCityId' => Yii::t('app', 'profile_cityId'),
            'senderDelivery' => Yii::t('app', 'courer'),
            'receiverRegionId' => Yii::t('app', 'profile_regionId'),
            'receiverCityId' => Yii::t('app', 'profile_cityId'),
            'receiverDelivery' => Yii::t('app', 'receiverDelivery'),
            'weight' => Yii::t('app', 'postWeight'),
            'isBox' => Yii::t('app', 'isBox'),
            'x' => Yii::t('app', 'postWidth'),
            'y' => Yii::t('app', 'postLength'),
            'z' => Yii::t('app', 'postDepth'),
        ];
    }
}
