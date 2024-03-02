<?php

namespace common\models;

use Yii;
use yii\base\Model;

/**
 * Login form
 */
class UpdateProfile extends Model
{
    public $name;
    public $name1;
    public $name2;
    public $regionId;
    public $cityId;
    public $street;
    public $houseNumber;
    public $apartmentNumber;
    public $landmark;
    public $phone;
    public $phone1;
    public $gender;
    public $passportSeries;
    public $passportNumber;
    public $birthdate;

    const GENDER_MALE = 'male';
    const GENDER_FEMALE = 'female';

    public function rules()
    {
        return [
            [['name', 'name2', 'regionId', 'cityId', 'street', 'houseNumber', 'phone', 'gender', 'passportSeries', 'passportNumber', 'birthdate'], 'required'],
            [['name', 'name1', 'name2', 'street', 'houseNumber', 'apartmentNumber', 'landmark', 'passportSeries', 'passportNumber'], 'string', 'max' => 250],
            [['regionId', 'cityId', ], 'integer'],
            [['phone', 'phone1'], 'string', 'max' => 40],
            [['gender'], 'in', 'range' => [self::GENDER_MALE, self::GENDER_FEMALE]],
            [['birthdate'], 'safe'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'name' => Yii::t('app', 'your_name'),
            'name1' => Yii::t('app', 'fathers_name'),
            'name2' => Yii::t('app', 'your_family'),
            'regionId' => Yii::t('app', 'profile_regionId'),
            'cityId' => Yii::t('app', 'profile_cityId'),
            'street' => Yii::t('app', 'profile_street'),
            'houseNumber' => Yii::t('app', 'profile_houseNumber'),
            'apartmentNumber' => Yii::t('app', 'profile_apartmentNumber'),
            'landmark' => Yii::t('app', 'profile_landmark'),
            'phone' => Yii::t('app', 'profile_phone'),
            'phone1' => Yii::t('app', 'profile_phone1'),
            'gender' => Yii::t('app', 'profile_gender'),
            'passportSeries' => Yii::t('app', 'profile_passportSeries'),
            'passportNumber' => Yii::t('app', 'profile_passportNumber'),
            'birthdate' => Yii::t('app', 'profile_birthdate'),
        ];
    }
}
