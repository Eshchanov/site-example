<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\filters\VerbFilter;
use yii\helpers\FileHelper;

/**
 * This is the model class for table "document".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $file
 * @property string|null $date
 * @property int|null $type
 * @property string|null $created
 * @property int|null $active
 * @property string|null $slug
 */
class Document extends \yii\db\ActiveRecord
{
    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => 'yii\behaviors\TimestampBehavior',
                'attributes' => [
                    \yii\db\ActiveRecord::EVENT_BEFORE_INSERT => ['created'],
                ],
            ],
        ];
    }
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'document';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['active'], 'integer'],
            [['active','type','date','c_order','lang'], 'required'],
            [['name', 'file', 'date', 'created', 'slug','type'], 'string', 'max' => 255],
            [['file'], 'file', 'extensions' => 'pdf', 'skipOnEmpty' => true],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Hазвание документа',
            'file' => 'Документ',
            'date' => 'Дата',
            'type' => 'Тип документа',
            'created' => 'Created',
            'active' => 'Статус',
            'slug' => 'Slug',
            'c_order' => 'Серийный номер',
        ];
    }
    public  function upload($file,$typeName,$dirname)
    {
        if($file){
            $dir = Yii::getAlias('@app') . "/web/documenty/{$typeName}/{$dirname}/";
            if(!is_dir($dir)){
                FileHelper::createDirectory($dir, 0777,true);
            }
            $attribute = $typeName . ".". $file->extension;

            if($file->saveAs($dir . $attribute)){
                return $attribute;
            }
        }
        return null;
    }
    public static function findLatestRecords()
    {
        $subquery = self::find()
            ->select(['type', 'MAX(date) AS max_date'])
            ->where(['<=', 'date', date('Y-m-d')])
            ->groupBy('type');

        return self::find()
            ->select(['id', 'name', 'file', 'date', 'type', 'created', 'active'])
            ->orderBy(['c_order'=>SORT_ASC])
            ->andWhere(['IN', ['type', 'date'], $subquery]);
    }
}
