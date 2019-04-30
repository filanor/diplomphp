<?php
/**
 * Created by PhpStorm.
 * User: filanor
 * Date: 2019-04-26
 * Time: 22:48
 */

namespace app\models;


use yii\db\ActiveRecord;
use yii\filters\HostControl;
use yii\helpers\Url;
use Yii;

class Subscribe extends ActiveRecord
{
    public static function tableName()
    {
        return 'subscribe';
    }

    public function newSubscribe($email)
    {
        // Проверяем есть ли уже такой email
        if(Subscribe::find()->where(['email' => $email])->one()) {
            echo "Такой email уже есть.";

        } else {
            $date = time();
            $token = md5($email . $date);
            $this->token = $token;
            $this->date = $date;
            $this->email = $email;

            $link = Yii::$app->urlManager->createAbsoluteUrl(['/']);
            $link = $link . 'site/subscribe?email=' . $email . '&token=' . $token;
            if ($this->save()) {
                echo $link;
                //echo "Вам выслано письмо для подтверждения подписки.";
            } else {
                echo 'no';
            }
        }

    }

    public function subscribe($email, $token)
    {
        $user = Subscribe::findOne(['email'=>$email]);
        if($user['token'] == $token){
            $user->flag = 1;
            $user->update();
            return "Вы успешно подписались на обновления";

        }
        return "Неверная ссылка";

    }


}