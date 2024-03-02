<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "condition".
 *
 * @property int $id
 * @property string $name
 * @property string $condition
 * @property int $lang
 */
class Condition extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'condition';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'condition', 'lang'], 'required'],
            [['condition'], 'string'],
            [['lang'], 'integer'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Yetkazib berish sharti'),
            'condition' => Yii::t('app', 'Ma\'lumot'),
            'lang' => Yii::t('app', 'lang'),
        ];
    }
}
