<?php
/**
 * Created by PhpStorm.
 * User: filanor
 * Date: 2019-04-26
 * Time: 01:58
 */

namespace app\models;


use yii\db\ActiveRecord;

class Product extends ActiveRecord
{
    public static function tableName()
    {
        return 'product';
    }

    public function getEightPrd ()
    {
        $products = Product::find()->orderBy('id desc')->limit(8)->all();
        return $products;
    }

    public function getByCat($cat, $qtty = 0)
    {
        if  ($qtty > 0){

            $items = Product::find()->where(['category' => $cat])->limit($qtty)->asArray()->all();
        } else {
            $items = Product::find()->where(['category' => $cat]);
            //$items = Product::find()->where(['category' => $cat])->asArray()->all();
        }
        return $items;
    }

    public function getOneByID($id)
    {
        $item = Product::find()->where(['id'=>$id])->one();
        return $item;
    }

    public function search($str) {
        $searchResults = Product::find()->where(['like', 'item', $str])->orWhere(['like', 'about', $str])->asArray()->all();
        return $searchResults;
    }
}