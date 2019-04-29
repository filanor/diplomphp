<?php
/**
 * Created by PhpStorm.
 * User: filanor
 * Date: 2019-04-26
 * Time: 14:23
 */

use yii\helpers\Url;

?>


<nav class="main_nav">
    <ul>
        <li class="active">
            <a href="/">На главную</a>
        </li>
        <li class="hassubs">
            <a href="<?= Url::to(['site/category'])?>">Категории</a>
            <ul>
                <?php foreach ($data as $item) {

                    ?>
                <li><a href="<?= Url::to(['category/'.$item['link']])?>"><?= $item['category']?></a></li>
                <?php } ?>

            </ul>
        </li>
        <li><a href="<?= Url::to(['site/contact'])?>">Свяжитесь с нами</a></li>
    </ul>
</nav>
