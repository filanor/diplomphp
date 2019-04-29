<?php
/**
 * Created by PhpStorm.
 * User: filanor
 * Date: 2019-04-26
 * Time: 11:29
 */

namespace app\widgets;


use yii\base\Widget;

class SubscribeWidget extends Widget
{
    public $data;

    public function run()
    {
//        ob_start();
//        include __DIR__ . '/templates/subscribe.php';
//        return ob_get_clean();
        return $this->render('subscribe');
    }

}