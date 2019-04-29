<?php
/**
 * Created by PhpStorm.
 * User: filanor
 * Date: 2019-04-27
 * Time: 20:09
 */

namespace app\widgets;


use app\models\Product;
use yii\base\Widget;

class RelatedWidget extends Widget
{
    public $category;

    public function run()
    {
        $items = new Product();
        $items = $items->getByCat($this->category, 4);

        return $this->render('related', compact('items'));

    }


}