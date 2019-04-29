<?php
/**
 * Created by PhpStorm.
 * User: filanor
 * Date: 2019-04-27
 * Time: 20:18
 */?>

<?php
use yii\helpers\Url;
?>

<div class="products">
    <div class="container">
        <div class="row">
            <div class="col text-center">
                <div class="products_title">Схожие товары</div>
            </div>
        </div>
        <div class="row">
            <div class="col">

                <div class="product_grid">

                    <?php foreach ($items as $item) {?>
                    <!-- Product -->
                    <div class="product">
                        <a href = "<?=Url::to(['product/'.$item['id']])?>" class="product_image"><img src="/images/<?= $item['img']?>" alt=""></a>
                        <?php if($item['status'] != '') { ?>
                            <div class="product_extra product_<?=$item['status']?>"><a href="categories.html"><?= $item['status'] ?></a></div>
                        <?php } ?>
                        <div class="product_content">
                            <div class="product_title"><a href="<?= Url::to(['product/'.$item['id']])?>"><?= $item['item']?></a></div>
                            <div class="product_price"><?= $item['price']?></div>
                        </div>
                    </div>

                   <?php }?>

                </div>
            </div>
        </div>
    </div>
</div>

