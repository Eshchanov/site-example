<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "services".
 *
 * @property int $id
 * @property string $name
 * @property string $image
 * @property string $image_home
 * @property string $text
 * @property string $info
 * @property int $lang
 */
class Services extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'services';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'image', 'image_home', 'text', 'lang', 'info'], 'required'],
            [['text'], 'string'],
            [['name', 'image', 'image_home', 'info'], 'string', 'max' => 255],
            [['lang'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Xizmat nomi'),
            'image' => Yii::t('app', 'Xizmat rasmi'),
            'image_home' => Yii::t('app', 'Xizmat rasmi (bosh sahifa)'),
            'text' => Yii::t('app', 'Xizmat haqida ma\'lumot'),
            'info' => Yii::t('app', 'Xizmat haqida ma\'lumot (qisqacha)'),
            'lang' => Yii::t('app', 'lang'),
        ];
    }
}
