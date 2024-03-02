<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "project".
 *
 * @property int $id
 * @property string $name
 * @property string $direction
 * @property string $duration
 * @property string $weight
 * @property string $info
 * @property int $lang
 */
class Project extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'project';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'direction', 'duration', 'weight', 'info', 'lang'], 'required'],
            [['info'], 'string'],
            [['name', 'direction', 'duration', 'weight'], 'string', 'max' => 255],
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
            'name' => Yii::t('app', 'Proekt nomi'),
            'direction' => Yii::t('app', 'Proekt yo\'nalishi'),
            'duration' => Yii::t('app', 'Proekt Davomiyligi'),
            'weight' => Yii::t('app', 'Proekt yuk miqdori'),
            'info' => Yii::t('app', 'Proektga izoh'),
            'lang' => Yii::t('app', 'lang'),
        ];
    }
}
