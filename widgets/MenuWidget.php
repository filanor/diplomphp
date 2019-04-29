<?php
/**
 * Created by PhpStorm.
 * User: filanor
 * Date: 2019-04-26
 * Time: 11:27
 */

namespace app\widgets;


use yii\base\Widget;
use app\models\Category;


class MenuWidget extends Widget
{
    public $data;

    public function run()
    {
        $this->data = new Category();
        $this->data = $this->makeMenu( $this->data->getCategories() );
        return $this->data;
    }

    public function makeMenu($data)
    {
        ob_start();
        include __DIR__ . '/views/menu.php';
        return ob_get_clean();
    }

}