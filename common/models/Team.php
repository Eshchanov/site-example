<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "team".
 *
 * @property int $id
 * @property string $photo
 * @property string $name
 * @property string $position
 * @property int $lang
 */
class Team extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'team';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['photo', 'name', 'position', 'lang'], 'required'],
            [['photo', 'name', 'position'], 'string', 'max' => 255],
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
            'photo' => Yii::t('app', 'Mutaxassis Rasmi'),
            'name' => Yii::t('app', 'Mutaxassis nomi'),
            'position' => Yii::t('app', 'Mutaxassis lavozimi'),
            'lang' => Yii::t('app', 'lang'),
        ];
    }
}
