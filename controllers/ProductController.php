<?php
/**
 * Created by PhpStorm.
 * User: filanor
 * Date: 2019-04-27
 * Time: 17:42
 */

namespace app\controllers;


use app\models\Category;
use app\models\Product;
use yii\web\Controller;
use yii\helpers\Html;
use Yii;

class ProductController extends Controller
{

    public function actionView($id)
    {
        $item = new Product();
        $item = $item->getOneByID($id);
        $cat = new Category();
        $cat = $cat->getOneCategory($item['category']);
        return $this->render('view', compact('item', 'cat'));
    }

    public function smallView($prd){
        return $this->render('smallView', compact('prd'));
    }


    public function actionSearch(){
        $search = Yii::$app->request->get('search');
        $search = Html::encode($search);

        $goods = new Product();
        $goods = $goods->search($search);
        return $this->render('search', compact('goods', 'search'));
    }

}