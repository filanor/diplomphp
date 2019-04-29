<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class ContactForm extends Model
{
    public $firstName;
    public $lastName;
    public $subject;
    public $body;
    public $adminEmail = 'filanor@gmail.com';



    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // Обязательные поля
            [['firstName', 'lastName', 'body'], 'required'],
            // Валидация email

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
            'subject' => 'Тема',
            'body' => 'Сообщение*',
        ];
    }

    /**
     * Sends an email to the specified email address using the information collected by this model.
     * @param string $email the target email address
     * @return bool whether the model passes validation
     */
    public function contact()
    {

        if ($this->validate()) {
            $mail = "<div style = 'width: 100% text-align: center'>
                        <h2>Новый отзыв на сайте от " . $this->firstName . " " . $this->lastName . "</h2>" .
                            $this->body . "</div>";
                Yii::$app->mailer->compose()
                ->setTo($this->adminEmail)
                ->setFrom($this->adminEmail)
                ->setSubject($this->subject)
                ->setTextBody($mail)
                ->send();

            return true;
        }
        return false;
    }
}
