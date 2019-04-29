<?php
/**
 * Created by PhpStorm.
 * User: filanor
 * Date: 2019-04-28
 * Time: 22:21
 */

namespace app\models;


use yii\db\ActiveRecord;

class Delivery extends ActiveRecord
{
    public static function tableName()
    {
        return 'delivery';
    }

    public function getDelivery()
    {
        $delivery = Delivery::find()->orderBy(['price' => SORT_DESC])->asArray()->all();
        return $delivery;
    }

}