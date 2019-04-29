<?php
/**
 * Created by PhpStorm.
 * User: filanor
 * Date: 2019-04-28
 * Time: 02:08
 */

namespace app\models;


use yii\db\ActiveRecord;

class Cart extends ActiveRecord
{

    // Добавление в корзину
    public function addToCart($item, $qtty)
    {

        if (isset($_SESSION['cart'][$item->id]))  {

            $_SESSION['cart'][$item->id]['qtty'] += $qtty;
        } else {
            // Выбираем нужную стоимость (со скидкой или без) и помещаем данные в сессию
            $price = ($item['salePrice'] > 0 ? $item['salePrice'] : $item['price']);
            $_SESSION['cart'][$item->id] =
                [
                    'qtty' => $qtty,
                    'name' => $item['item'],
                    'price' => $price,
                    'img' => $item['img'],
                ];
        }

        $_SESSION['cart.totalSum'] = isset($_SESSION['cart.totalSum']) ? $_SESSION['cart.totalSum']+$_SESSION['cart'][$item->id]['price'] * $qtty : $_SESSION['cart'][$item->id]['price']* $qtty;
        $_SESSION['cart.totalQuantity'] = isset($_SESSION['cart.totalQuantity']) ? $_SESSION['cart.totalQuantity']+$qtty : $qtty;

        // Данные для отображения в корзине в меню
        echo $_SESSION['cart.totalQuantity'] . ', ' . $_SESSION['cart.totalSum'];
    }



    // Удаление товара из корзины
    public function delItemFromCart($id)
    {

        $quantity = $_SESSION['cart'][$id]['qtty'];
        $price = $_SESSION['cart'][$id]['price'] * $quantity;

        $_SESSION['cart.totalSum'] = $_SESSION['cart.totalSum'] - $price;
        $_SESSION['cart.totalQuantity'] -= $quantity;


        unset($_SESSION['cart'][$id]);

        // Если нет товаров в корзине убираем из сессии
        if(count($_SESSION['cart']) == 0){
            unset($_SESSION['cart']);
            echo '(0)';
        }
        else{
            // Данные для отображения в корзине в меню
            echo $_SESSION['cart.totalQuantity'] . ', ' . $_SESSION['cart.totalSum'];
        }

    }



    public function changeQtty($id, $qtty){
        $oldQtty = $_SESSION['cart'][$id]['qtty'];
        $oldPrice = $_SESSION['cart'][$id]['price'] * $oldQtty;
        $newPrice = $_SESSION['cart'][$id]['price'] * $qtty;


        $_SESSION['cart'][$id]['qtty'] = $qtty;
        $_SESSION['cart.totalSum'] = $_SESSION['cart.totalSum'] - $oldPrice + $newPrice;
        $_SESSION['cart.totalQuantity'] = $_SESSION['cart.totalQuantity'] - $oldQtty + $qtty;

        echo $_SESSION['cart.totalQuantity'] . ', ' . $_SESSION['cart.totalSum'];
    }



}