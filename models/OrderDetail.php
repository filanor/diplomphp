<?php
/**
 * Created by PhpStorm.
 * User: filanor
 * Date: 2019-04-30
 * Time: 00:21
 */

namespace app\models;



use yii\db\ActiveRecord;

class OrderDetail extends ActiveRecord
{
    public static function tableName()
    {
        return 'orderDetail';
    }

}