<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "news".
 *
 * @property int $id
 * @property string $photo
 * @property string $title
 * @property string $date
 * @property string $info
 * @property string $info_full
 * @property int $lang
 */
class News extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'news';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['photo', 'title', 'date', 'info', 'info_full', 'lang'], 'required'],
            [['info_full'], 'string'],
            [['lang'], 'integer'],
            [['photo', 'title', 'date', 'info'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'photo' => Yii::t('app', 'Rasm'),
            'title' => Yii::t('app', 'Yangilik'),
            'date' => Yii::t('app', 'Sana'),
            'info' => Yii::t('app', 'Qisqacha ma\'lumot'),
            'info_full' => Yii::t('app', 'To\'liq ma\'lumot'),
            'lang' => Yii::t('app', 'lang'),
        ];
    }
}
