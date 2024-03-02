<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "profile".
 *
 * @property int $id
 * @property int $user_id
 * @property string $name
 * @property string $phone
 * @property string|null $address
 */
class Profile extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'profile';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'name', 'phone', 'lang'], 'required'],
            [['user_id'], 'integer'],
            [['name', 'address'], 'string', 'max' => 255],
            [['phone'], 'string', 'max' => 25],
            [['phone'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'user_id' => Yii::t('app', 'Foydalanuvchi idsi'),
            'name' => Yii::t('app', 'Foydalanuvchi ismi'),
            'phone' => Yii::t('app', 'Foydalanuvchi telefon raqami'),
            'address' => Yii::t('app', 'Foydalanuvchi manzili'),
        ];
    }
}
