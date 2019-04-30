<?php
/**
 * Created by PhpStorm.
 * User: filanor
 * Date: 2019-04-30
 * Time: 03:59
 */
?>



<h2 style = "display: block; width: 100%; text-align: center; font-size: 25px; ">Результаты посиска <?= $search?></h2>
<div class="products">
    <div class="container">
        <div class="row">
            <div class="col">

                <!-- Product Sorting -->
                <div class="sorting_bar d-flex flex-md-row flex-column align-items-md-center justify-content-md-start">
                    <div class="results">Showing <span>12</span> results</div>
                    <div class="sorting_container ml-md-auto">
                        <div class="sorting">
                            <ul class="item_sorting">
                                <li>
                                    <span class="sorting_text">Sort by</span>
                                    <i class="fa fa-chevron-down" aria-hidden="true"></i>
                                    <ul>
                                        <li class="product_sorting_btn" data-isotope-option='{ "sortBy": "original-order" }'><span>Default</span></li>
                                        <li class="product_sorting_btn" data-isotope-option='{ "sortBy": "price" }'><span>Price</span></li>
                                        <li class="product_sorting_btn" data-isotope-option='{ "sortBy": "title" }'><span>Name</span></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">

                <div class="product_grid">

                    <!-- Product -->
                    <?php foreach ($goods as $prd) {?>
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
                    <?php } ?>

                </div>

            </div>
        </div>
    </div>
</div>
