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

class Subscribe extends ActiveRecord
{
    public static function tableName()
    {
        return 'subscribe';
    }

    public function newSubscribe($email)
    {
        // = new Subscribe();
        $date = time();
        $token = md5($email . $date);
        $this->token = $token;
        $this->date = $date;
        $this->email = $email;

        $link .= '/site/SubscribeCheck?token='.$token;
        if( $this->save() ) {
            echo $link;
        }
        else {
            echo 'no';
        }
    }


}