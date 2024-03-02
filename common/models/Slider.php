<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "slider".
 *
 * @property int $id
 * @property string $image
 * @property int|null $order
 * @property int $lang
 */
class Slider extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'slider';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['lang'], 'required'],
            [['order', 'lang'], 'integer'],
            [['image','url'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'image' => Yii::t('app', 'Image'),
            'order' => Yii::t('app', 'Order'),
            'lang' => Yii::t('app', 'Lang'),
            'url' => Yii::t('app', 'Url'),
        ];
    }
}
