<?php
/**
 * Created by PhpStorm.
 * User: filanor
 * Date: 2019-04-28
 * Time: 12:34
 */

namespace app\widgets;


use yii\base\Widget;

class CartWidget extends Widget
{
    public function run()
    {
        return $this->render('cart');
    }

}