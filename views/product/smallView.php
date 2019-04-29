<?php
/**
 * Created by PhpStorm.
 * User: filanor
 * Date: 2019-04-29
 * Time: 12:05
 */

use yii\helpers\Url;
?>


 <!-- Product -->
    <div class="product">
        <a href = "<?=Url::to(['product/'.$prd['id']])?>" class="product_image"><img src="/images/<?= $prd['img']?>" alt=""></a>
        <?php if($prd['status'] != '') { ?>
            <div class="product_extra product_<?=$prd['status']?>"><a href="categories.html"><?= $prd['status'] ?></a></div>
        <?php } ?>
        <div class="product_content">
            <div class="product_title"><a href="<?=Url::to(['product/'.$prd['id']])?>"><?= $prd['item']?></a></div>
            <div class="product_price"><?= $prd['price']?> руб.</div>
        </div>
    </div>
