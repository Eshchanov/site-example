<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "general".
 *
 * @property int $id
 * @property string $telegram
 * @property string $instagram
 * @property string $facebook
 * @property string $youtube
 * @property string $call_centre
 * @property string $tel
 * @property string $video
 * @property string $appstore
 * @property string $google_play
 * @property string $bot_name
 * @property string $bot_link
 * @property string $mail
 * @property string $address
 * @property string $hours
 * @property string $about_main
 * @property string $aim_main
 * @property string $about_about
 * @property string $aim_about
 * @property int $tonn
 * @property int $partners
 * @property int $workers
 * @property string $video_about
 * @property int $lang
 */
class General extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'general';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['telegram', 'instagram', 'facebook', 'youtube', 'call_centre', 'tel', 'video', 'appstore', 'google_play', 'bot_name', 'bot_link', 'mail', 'address', 'hours', 'about_main', 'aim_main', 'about_about', 'aim_about', 'tonn', 'partners', 'workers', 'video_about', 'lang'], 'required'],
            [['about_main', 'aim_main', 'about_about', 'aim_about'], 'string'],
            [['tonn', 'partners', 'workers', 'lang'], 'integer'],
            [['telegram', 'instagram', 'facebook', 'youtube', 'call_centre', 'tel', 'video', 'appstore', 'google_play', 'bot_name', 'bot_link', 'mail', 'address', 'hours', 'video_about'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'telegram' => Yii::t('app', 'Telegram linki'),
            'instagram' => Yii::t('app', 'Instagram linki'),
            'facebook' => Yii::t('app', 'Facebook linki'),
            'youtube' => Yii::t('app', 'Youtube linki'),
            'call_centre' => Yii::t('app', 'Call Centre (1230)'),
            'tel' => Yii::t('app', 'Telefon raqam ((998-71) 207-08-09)'),
            'video' => Yii::t('app', 'Kompaniya haqida video linki (bosh sahifadagi)(Youtube)'),
            'appstore' => Yii::t('app', 'Appstore linki'),
            'google_play' => Yii::t('app', 'Google Play linki'),
            'bot_name' => Yii::t('app', 'Telegram bot nomi'),
            'bot_link' => Yii::t('app', 'Telegram bot nomi linki'),
            'mail' => Yii::t('app', 'Pochta addressi (email)'),
            'address' => Yii::t('app', 'Manzil'),
            'hours' => Yii::t('app', 'Ish vaqti'),
            'about_main' => Yii::t('app', 'Kompaniya haqida (bosh sahifadagi)'),
            'aim_main' => Yii::t('app', 'Oliy maqsadimiz (bosh sahifadagi)'),
            'about_about' => Yii::t('app', 'Kompaniya haqida (kompaniya haqida sahifadagi)'),
            'aim_about' => Yii::t('app', 'Oliy maqsadimiz (kompaniya haqida sahifadagi)'),
            'tonn' => Yii::t('app', 'Necha tonna yuk yetqazilgan'),
            'partners' => Yii::t('app', 'Hamkorlar soni'),
            'workers' => Yii::t('app', 'Hozirdagi hodimlar soni'),
            'video_about' => Yii::t('app', 'Kompaniya haqida video linki (kompaniya haqida sahifadagi)(Youtube)'),
            'lang' => Yii::t('app', 'lang'),
        ];
    }
}
