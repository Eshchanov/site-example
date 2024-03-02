<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "office".
 *
 * @property int $id
 * @property string $address
 * @property string $address_link
 * @property string|null $video_link
 * @property string $lng
 * @property string $lat
 * @property string $destination
 * @property string $tel
 * @property string $region
 * @property int $lang
 */
class Office extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'office';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['address', 'address_link', 'lng', 'lat', 'destination', 'tel', 'region', 'lang', 'video_link'], 'required'],
            [['lang'], 'integer'],
            [['address', 'address_link', 'video_link', 'destination'], 'string', 'max' => 255],
            [['lng', 'lat', 'tel', 'region'], 'string', 'max' => 25],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'address' => Yii::t('app', 'Ofis Addressi'),
            'address_link' => Yii::t('app', 'Address linki (google maps)'),
            'video_link' => Yii::t('app', 'Video'),
            'lng' => Yii::t('app', 'Longitude'),
            'lat' => Yii::t('app', 'Latitude'),
            'destination' => Yii::t('app', 'Mo\'ljal'),
            'tel' => Yii::t('app', 'Ofis telefon raqam'),
            'region' => Yii::t('app', 'Ofis regioni'),
            'lang' => Yii::t('app', 'lang'),
        ];
    }
}
