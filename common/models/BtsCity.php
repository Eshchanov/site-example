<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "bts_city".
 *
 * @property int $id
 * @property int $regionId
 * @property string $name
 * @property string|null $name1
 * @property string|null $nameEn
 * @property string|null $center_name
 * @property int|null $zonaId
 * @property float|null $distance_branch
 * @property int|null $main poytaxt
 * @property int|null $center
 * @property int|null $is_active
 * @property string|null $didox_code
 * @property int|null $is_franchising
 * @property int|null $newZonaId
 * @property string|null $nameUz
 * @property string|null $nameRu
 *
 * @property BtsRegion $region
 */
class BtsCity extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bts_city';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['regionId', 'name'], 'required'],
            [['regionId', 'zonaId', 'main', 'center', 'is_active', 'is_franchising', 'newZonaId'], 'integer'],
            [['distance_branch'], 'number'],
            [['name', 'name1', 'nameEn'], 'string', 'max' => 60],
            [['center_name', 'nameUz', 'nameRu'], 'string', 'max' => 255],
            [['didox_code'], 'string', 'max' => 20],
            [['regionId'], 'exist', 'skipOnError' => true, 'targetClass' => BtsRegion::className(), 'targetAttribute' => ['regionId' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'regionId' => Yii::t('app', 'Region ID'),
            'name' => Yii::t('app', 'Name'),
            'name1' => Yii::t('app', 'Name1'),
            'nameEn' => Yii::t('app', 'Name En'),
            'center_name' => Yii::t('app', 'Center Name'),
            'zonaId' => Yii::t('app', 'Zona ID'),
            'distance_branch' => Yii::t('app', 'Distance Branch'),
            'main' => Yii::t('app', 'Main'),
            'center' => Yii::t('app', 'Center'),
            'is_active' => Yii::t('app', 'Is Active'),
            'didox_code' => Yii::t('app', 'Didox Code'),
            'is_franchising' => Yii::t('app', 'Is Franchising'),
            'newZonaId' => Yii::t('app', 'New Zona ID'),
            'nameUz' => Yii::t('app', 'Name Uz'),
            'nameRu' => Yii::t('app', 'Name Ru'),
        ];
    }

    /**
     * Gets query for [[Region]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRegion()
    {
        return $this->hasOne(BtsRegion::className(), ['id' => 'regionId']);
    }
}
