<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "project_image".
 *
 * @property int $id
 * @property int $project_id
 * @property string $image
 */
class ProjectImage extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'project_image';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['project_id', 'image'], 'required'],
            [['project_id'], 'integer'],
            [['image'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'project_id' => Yii::t('app', 'Proekt IDsi'),
            'image' => Yii::t('app', 'Rasm'),
        ];
    }
}
