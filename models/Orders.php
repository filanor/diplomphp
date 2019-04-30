<?php
/**
 * Created by PhpStorm.
 * User: filanor
 * Date: 2019-04-30
 * Time: 00:19
 */

namespace app\models;


use yii\db\ActiveRecord;

class Orders extends ActiveRecord
{
    public $firstName;
    public $lastName;
    public $emailadr;
    public $phonenum;
    public $addr;
    public $adminEmail = 'filanor@gmail.com';

    public static function tableName()
    {
        return 'orders';
    }

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // Обязательные поля
            [['firstName', 'lastName', 'emailadr', 'phonenum', 'addr'], 'required'],
            // Валидация email
            //[['email'] => 'email'],
            [['firstName', 'lastName', 'emailadr', 'phonenum', 'addr'], 'string', 'max'=>255],

        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            'firstName' => 'Имя*',
            'lastName' => 'Фамилия*',
            'address' => 'Адресс*',
            'phonenum' => 'Телефон №*',
            'emailadr' => 'Email',
        ];
    }

}