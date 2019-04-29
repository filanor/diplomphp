<?php
/**
 * Created by PhpStorm.
 * User: filanor
 * Date: 2019-04-26
 * Time: 02:17
 */

namespace app\models;


use yii\db\ActiveRecord;

class Category extends ActiveRecord
{
    public static function tableName()
    {
        return 'category';
    }

    public function getCategories()
    {
        $catList = Category::find()->all();
        return $catList;
    }

    public function getOneCategory($category)
    {
        if( preg_match("/[А-Яа-я]/", $category) ) {
            $cat = Category::find()->where(['category' => $category])->one();
        } else {
            $cat = Category::find()->where(['link' => $category])->one();
        }
        return $cat;
    }


}