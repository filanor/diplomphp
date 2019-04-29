<?php
/**
 * Created by PhpStorm.
 * User: filanor
 * Date: 2019-04-26
 * Time: 01:03
 */

namespace app\controllers;


use app\models\Category;
use app\models\Product;
use yii\data\Pagination;
use yii\web\Controller;
//use yii\data\Pagination;

class CategoryController extends Controller
{
    public function actionView($cat){
        $catRow = new Category();
        $catRow = $catRow->getOneCategory($cat);
        $items = new Product();
        $items = $items->getByCat($catRow['category']);


        $itemsCopy = clone $items;

        $pages = new Pagination(['totalCount' =>  $itemsCopy->count(), 'pageSize' => 4]);
        $pages->pageSizeParam = false;

        $models = $items->offset($pages->offset)->limit($pages->limit)->all();

        return $this->render('view', compact('models', 'catRow', 'pages'));
    }
}