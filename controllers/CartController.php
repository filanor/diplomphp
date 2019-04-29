<?php
/**
 * Created by PhpStorm.
 * User: filanor
 * Date: 2019-04-27
 * Time: 22:21
 */

namespace app\controllers;


use app\models\Cart;
use app\models\Delivery;
use app\models\Product;
use yii\web\Controller;
use Yii;
use yii\web\Request;

class CartController extends Controller
{
    public function actionView()
    {
        $session = Yii::$app->session;
        $session->open();

        $delivery = new Delivery();
        $delivery = $delivery->getDelivery();

        //передадим в сессию стоимость доставки
        $this->actionDelivery();
        return $this->render('view', compact('session', 'delivery'));
    }

    public function actionCheckout()
    {
        return $this->render('checkout');
    }


    public function actionDelivery(){
        //обрабатываем доставку
        $get = Yii::$app->request->get();
        $delivery = new Delivery();
        $delivery = $delivery->getDelivery();

        if(isset($get['delivery'])){
            $_SESSION['cart.delivery'] = $get['delivery'];
        } else {
            $_SESSION['cart.delivery'] = $delivery[0]['price'];
        }
        echo $_SESSION['cart.delivery'];
    }

    // Добаление товара в корзину
    public function actionAdd()
    {

        $get = Yii::$app->request->get();
        $item = new Product();
        $item = $item->getOneByID($get['id']);
        $session = Yii::$app->session;
        $session->open();
        $cart = new Cart();
        $cart = $cart->addToCart($item, $get['qtty']);


    }


    //Изменение количества:
    public function actionChange($id, $qtty)
    {
        $cart = new Cart();
        $cart->changeQtty($id, $qtty);
    }

    // Удаление одного товара из корзины
    public function actionDelete($id)
    {
        $cart = new Cart();
        $cart->delItemFromCart($id);
    }


    // Очистка корзины
    public function actionClear()
    {
        $session = Yii::$app->session;
        $session->open();
        $session->remove('cart');
        $session->remove('cart.totalSum');
        $session->remove('cart.totalQuantity');
    }

}