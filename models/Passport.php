<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "passport".
 *
 * @property int $id
 * @property int $user_id
 * @property int $passport_type_id
 * @property string $passport_expire
 * @property string $passport_number
 * @property string|null $passport_another
 *
 * @property User $user
 */
class Passport extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'passport';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['passport_another'], 'default', 'value' => null],
            [['passport_type_id', 'passport_expire', 'passport_number'], 'required'],
            [['user_id', 'passport_type_id'], 'integer'],
            [['passport_expire'], 'safe'],
            [['passport_number', 'passport_another'], 'string', 'max' => 255],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
            ['passport_expire', 'date', 'format' => 'php:Y-m-d'],
            [
                'passport_expire',
                'compare',
                'operator' => '>=',
                "compareValue" => date("Y-m-d"),
                "message" => 'Дата должна быть равна или больше текущей'
            ],
            [
                'passport_expire',
                'compare',
                'operator' => '>=',
                "compareValue" => date("Y-m-d", strtotime("+180 days")),
                "message" => 'Дата должна быть больше на 180 дней от текущей',
                'on' => 'passport_check',
                'when' => function($model) {
                    return $model->passport_type_id != 1;
                },
                'whenClient' => "(attributes, value) => $('#passport-passport_type_id').val() != '' && $('#passport-passport_type_id').val() != 1"
            ],
            [
                'passport_expire',
                'compare',
                'operator' => '>=',
                'on' => 'default',
                "compareValue" => date("Y-m-d", strtotime("+190 days")),
                "message" => 'Дата должна быть больше на 190 дней от текущей',
                'when' => function($model) {
                    return $model->passport_type_id != DocType::getIdDocument("Паспорт гражданина РФ");
                },
                'whenClient' => "(attributes, value) => $('#passport-passport_type_id').val() != '' && $('#passport-passport_type_id').val() != 1"
            ],
            //  [
            //     'passport_expire',
            //     'compare',
            //     'operator' => '>=',
            //     "compareValue" => date("Y-m-d", strtotime("+190 days")),
            //     "message" => 'Дата должна быть больше на 190 дней от текущей',
            //     // 'targetAttribute' => 'id',
            //     // 'targetClass' => DocType::class,
            //     'when' => function($model) {
            //         return $model->passport_type_id != 1;
            //     },
            //     'whenClient' => "(attributes, value) => $('#passport-passport_type_id').val() != '' && $('#passport-passport_type_id').val() != 1"
            // ],

        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'passport_type_id' => 'Выберите вид документа',
            'passport_expire' => 'Выберите дату окончания действия документа',
            'passport_number' => 'Номер документа',
            'passport_another' => 'Название другого документа',
        ];
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }
}
