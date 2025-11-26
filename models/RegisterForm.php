<?php

namespace app\models;

use Yii;
use yii\base\Model;


class RegisterForm extends Model
{
    public $username;
    public $password;
    public $rememberMe = true;

    private $_user = false;

    public int $id = 0;
    public string $name = "";
    public string $surname = "";
    public string $patronymic = "";
    public string $email = "";
    public string $phone = "";
    public string $password_repeat = "";
    public string $rules = "";
    public string $hide = "";



    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['name', 'surname', 'patronymic', 'email', 'phone', 'password'], 'required'],
            [['name', 'surname', 'patronymic', 'email', 'password'], 'string', 'max' => 255],
            [['phone'], 'string', 'max' => 12],
            [['email'], 'unique', 'targetClass' => User::class, 'targetAttribute' => 'email'],
            [['email'], 'email'],
            ['password', 'match', 'pattern' => '/(?=.*[a-zA-Z])(?=.*[0-9])[a-zA-Z0-9!@#$%^&*]{6,20}/', "message" => 'Пароль должен содержать латиницу, цифры и быть от 6 до 20 символов'],
            [['name', 'surname', 'patronymic',], 'match', 'pattern' => "/(?=.*[-])[a-zA-Zа-яА-Я]/"],
            ['phone', 'match', 'pattern' => "/\+\d{11}/", 'message' => "Телефон в формате + и 11 цифр"],
            ['password_repeat', 'compare', 'compareAttribute' => 'password'],
            ['rules', 'required', 'requiredValue' => 1],
        ];
    }
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Имя',
            'surname' => 'Фамилия',
            'patronymic' => 'Отчество',
            'email' => 'Почта',
            'phone' => 'Телефон',
            'password' => 'Пароль',
            'password_repeat' => 'Повторите пароль',
            'rules' => 'Конфиденциальность и т.п',
            'hide' => '',
        ];
    }
}
