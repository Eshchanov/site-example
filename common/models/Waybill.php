<?php

namespace common\models;

use Yii;
use yii\base\Model;

/**
 * Login form
 */
class Waybill extends Model
{
    public $id;
    public $barcode;
    public $isContract;
    public $customerId;
    public $sendDate;

    public $postWidth;
    public $postLength;
    public $postDepth;
    public $postPackageId;
    public $postPackageName;
    public $postPostTypeId;
    public $postPostTypeName;
    public $postPostTypeOther;
    public $postWeight;

    public $receiverId;
    public $receiverName;
    public $receiverPhone;
    public $receiverDelivery;
    public $receiverAvatar;
    public $receiverAddressRegionId;
    public $receiverAddressCityId;
    public $receiverAddressMfy;
    public $receiverAddressStreet;
    public $receiverAddressHome;
    public $receiverAddressApartment;
    public $receiverAddressDestination;
    public $receiverBranchAddress;
    public $receiverBranchId;

    public $senderId;
    public $senderName;
    public $senderPhone;
    public $senderDelivery;
    public $senderAvatar;
    public $senderAddressRegionId;
    public $senderAddressCityId;
    public $senderAddressStreet;
    public $senderAddressHome;
    public $senderAddressApartment;
    public $senderAddressDestination;


    public function rules()
    {
        return [
            [['sendDate', 'senderName', 'senderPhone', 'senderAddressRegionId', 'senderAddressCityId', 'senderAddressStreet', 'senderAddressHome', 'postWeight', 'postPostTypeId', 'receiverName', 'receiverPhone', 'receiverAddressRegionId', 'receiverAddressCityId', 'receiverAddressStreet', 'receiverAddressHome', 'postWidth', 'postLength', 'postDepth'], 'required'],
            [['id', 'customerId', 'isContract', 'postPostTypeId', 'receiverId', 'receiverDelivery', 'receiverAddressRegionId', 'receiverAddressCityId', 'senderId', 'senderDelivery', 'senderAddressRegionId', 'senderAddressCityId', 'receiverBranchId'], 'integer'],
            [['barcode', 'postPackageName', 'postPostTypeName', 'postPostTypeOther', 'receiverName', 'receiverPhone', 'receiverAddressMfy', 'receiverAddressStreet', 'receiverAddressHome', 'receiverAddressApartment', 'receiverAddressDestination', 'senderName', 'senderPhone', 'senderAddressStreet', 'senderAddressHome', 'senderAddressApartment', 'senderAddressDestination', 'receiverBranchAddress'], 'string', 'max' => 250],
            [['sendDate'], 'safe'],
            [['postWidth', 'postLength', 'postDepth', 'postWeight'], 'number'],
            ['postPostTypeId', 'otherPostType'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'barcode' => Yii::t('app', 'Barcode'),
            'isContract' => Yii::t('app', 'isContract'),
            'customerId' => Yii::t('app', 'isContract'),
            'sendDate' => Yii::t('app', 'sendDate'),

            'postWidth' => Yii::t('app', 'postWidth'),
            'postLength' => Yii::t('app', 'postLength'),
            'postDepth' => Yii::t('app', 'postDepth'),
            'postPackageId' => Yii::t('app', 'postPackageId'),
            'postPackageName' => Yii::t('app', 'postPackageName'),
            'postPostTypeId' => Yii::t('app', 'postPostTypeId'),
            'postPostTypeName' => Yii::t('app', 'postPostTypeName'),
            'postPostTypeOther' => Yii::t('app', 'postPostTypeOther'),
            'postWeight' => Yii::t('app', 'postWeight'),

            'receiverId' => Yii::t('app', 'receiverId'),
            'receiverName' => Yii::t('app', 'receiverName'),
            'receiverPhone' => Yii::t('app', 'receiverPhone'),
            'receiverDelivery' => Yii::t('app', 'receiverDelivery'),
            'receiverAddressRegionId' => Yii::t('app', 'receiverAddressRegionId'),
            'receiverAddressCityId' => Yii::t('app', 'receiverAddressCityId'),
            'receiverAddressMfy' => Yii::t('app', 'receiverAddressMfy'),
            'receiverAddressStreet' => Yii::t('app', 'receiverAddressStreet'),
            'receiverAddressHome' => Yii::t('app', 'receiverAddressHome'),
            'receiverAddressApartment' => Yii::t('app', 'receiverAddressApartment'),
            'receiverAddressDestination' => Yii::t('app', 'receiverAddressDestination'),
            'receiverBranchAddress' => Yii::t('app', 'receiverBranchAddress'),
            'receiverBranchId' => Yii::t('app', 'receiverBranchId'),

            'senderId' => Yii::t('app', 'senderId'),
            'senderName' => Yii::t('app', 'senderName'),
            'senderPhone' => Yii::t('app', 'senderPhone'),
            'senderDelivery' => Yii::t('app', 'courer'),
            'senderAddressRegionId' => Yii::t('app', 'senderAddressRegionId'),
            'senderAddressCityId' => Yii::t('app', 'senderAddressCityId'),
            'senderAddressStreet' => Yii::t('app', 'senderAddressStreet'),
            'senderAddressHome' => Yii::t('app', 'senderAddressHome'),
            'senderAddressApartment' => Yii::t('app', 'senderAddressApartment'),
            'senderAddressDestination' => Yii::t('app', 'senderAddressDestination'),
        ];
    }

    public function otherPostType($attribute, $params)
    {
        if ($this->postPostTypeId == 1) {
            if (!$this->postPostTypeOther) {
                $this->addError('postPostTypeOther', Yii::t('yii', '{attribute} cannot be blank.', [
                    'attribute' => Yii::t('app', 'postPostTypeOther'),
                ]));
            }
        }
    }
}
