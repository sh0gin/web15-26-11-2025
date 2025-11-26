<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "doc_type".
 *
 * @property int $id
 * @property string $title
 */
class DocType extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */

    public static function tableName()
    {
        return 'doc_type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['id_region'], 'integer'],
            [['title'], 'string', 'max' => 255],
            [['id_region'], 'exist', 'skipOnError' => true, 'targetClass' => Region::class, 'targetAttribute' => ['id_region' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
        ];
    }

    public static function getTitle()
    {
        return self::find()->select('title')->indexBy("id")->column();
    }

    /**
     * Gets query for [[Region]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRegion()
    {
        return $this->hasOne(Region::class, ['id' => 'id_region']);
    }

    public static function getTitleDocument($id) {
        return self::findOne($id)->title;
    }

    public static function getIdDocument($title) {
        return self::findOne(['title' => $title])->id;
    }
}
