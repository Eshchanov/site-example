<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "review".
 *
 * @property int $id
 * @property string $video
 * @property string $name
 * @property string $position
 * @property int $lang
 */
class Review extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'review';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['video', 'name', 'position', 'lang'], 'required'],
            [['video', 'name', 'position'], 'string', 'max' => 255],
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
            'video' => Yii::t('app', 'Video linki'),
            'name' => Yii::t('app', 'Mijoz ismi'),
            'position' => Yii::t('app', 'Mijoz lavozimi'),
            'lang' => Yii::t('app', 'lang'),
        ];
    }
}
