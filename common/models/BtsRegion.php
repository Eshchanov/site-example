<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "bts_region".
 *
 * @property int $id
 * @property string $name
 * @property string|null $name1
 * @property string|null $nameEn
 * @property string|null $nickname
 * @property string $code
 * @property float|null $coefficient
 * @property string|null $nameUz
 * @property string|null $nameRu
 *
 * @property BtsCity[] $btsCities
 */
class BtsRegion extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bts_region';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'name'], 'required'],
            [['id'], 'integer'],
            [['coefficient'], 'number'],
            [['name', 'name1', 'nameEn', 'nickname'], 'string', 'max' => 60],
            [['code'], 'string', 'max' => 3],
            [['nameUz', 'nameRu'], 'string', 'max' => 255],
            [['name'], 'unique'],
            [['id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'name1' => Yii::t('app', 'Name1'),
            'nameEn' => Yii::t('app', 'Name En'),
            'nickname' => Yii::t('app', 'Nickname'),
            'code' => Yii::t('app', 'Code'),
            'coefficient' => Yii::t('app', 'Coefficient'),
            'nameUz' => Yii::t('app', 'Name Uz'),
            'nameRu' => Yii::t('app', 'Name Ru'),
        ];
    }

    /**
     * Gets query for [[BtsCities]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBtsCities()
    {
        return $this->hasMany(BtsCity::className(), ['regionId' => 'id']);
    }
}
