<?php

namespace app\models;

use Yii;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $name
 * @property string $surname
 * @property string $patronymic
 * @property string $email
 * @property string $phone
 * @property string $password
 * @property int $role
 * @property string|null $auth_key
 *
 * @property Passport[] $passports
 */
class User extends \yii\db\ActiveRecord implements IdentityInterface
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['auth_key'], 'default', 'value' => null],
            [['role'], 'default', 'value' => 0],
            [['name', 'surname', 'patronymic', 'email', 'phone', 'password'], 'required'],
            [['role'], 'integer'],
            [['name', 'surname', 'patronymic', 'email', 'password', 'auth_key'], 'string', 'max' => 255],
            [['phone'], 'string', 'max' => 12],
            [['email'], 'unique'],
            [['email'], 'email'],
            ['phone', 'match', 'pattern' => "/\+\d{11}/", 'message' => "Телефон в формате + и 11 цифр"],
        ];
    }
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAuthKey()
    {
        return $this->auth_key;
    }

    public function validateAuthKey($authKey)
    {
        return $this->auth_key === $authKey;
    }
    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'surname' => 'Surname',
            'patronymic' => 'Patronymic',
            'email' => 'Email',
            'phone' => 'Phone',
            'password' => 'Password',
            'role' => 'Role',
            'auth_key' => 'Auth Key',
        ];
    }

    /**
     * Gets query for [[Passports]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPassports()
    {
        return $this->hasMany(Passport::class, ['user_id' => 'id']);
    }

    public static function findByUsername($email) {
        return self::findOne(['email' => $email]);
    }
    public function validatePassword($password) {
        return Yii::$app->security->validatePassword($password, $this->password);
    }

    public function getIsAdmin() {
        return $this->role == 1;
    }
    public function getIsClient() {
        return $this->role == 0;
    }
}
