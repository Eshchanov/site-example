<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "privancy_policy".
 *
 * @property int $id
 * @property string $text
 * @property int $lang
 */
class PrivancyPolicy extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'privancy_policy';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['text', 'lang'], 'required'],
            [['text'], 'string'],
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
            'text' => Yii::t('app', 'privancies'),
            'lang' => Yii::t('app', 'lang'),
        ];
    }
}
