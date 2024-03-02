<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "vacancy".
 *
 * @property int $id
 * @property string $name
 * @property string $requirements
 * @property string $address
 * @property string $tel
 * @property int $lang
 */
class Vacancy extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'vacancy';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'requirements', 'address', 'tel', 'lang'], 'required'],
            [['requirements'], 'string'],
            [['name', 'address', 'tel'], 'string', 'max' => 255],
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
            'name' => Yii::t('app', 'Lavozim'),
            'requirements' => Yii::t('app', 'Talablar'),
            'address' => Yii::t('app', 'Manzil'),
            'tel' => Yii::t('app', 'Telefon raqam'),
            'lang' => Yii::t('app', 'lang'),
        ];
    }
}
