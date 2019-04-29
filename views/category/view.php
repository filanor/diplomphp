<!-- Home -->
<?php use yii\helpers\Url;
use \yii\widgets\LinkPager;
use app\widgets\Pager;
$this->title = $catRow["category"];

?>



<div class="home home-notmain">
    <div class="home_container">
        <div class="home_background" style="background-image:url(/images/categories.jpg)"></div>
        <div class="home_content_container">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="home_content">
                            <div class="home_title"><?= $catRow["category"]?><span>.</span></div>
                            <div class="home_text"><p><?= $catRow["desc"]?></p></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Products -->

<?php
    if($pages->totalCount == 0){
?>
        <div style = "width: 100%; line-height: 40px; text-align: center; font-size: 30px; margin-top: 30px">Раздел пуст. Нам нечего тебе предложить</div>

<?php
    } else{
?>

<div class="products">
    <div class="container">
        <div class="row">
            <div class="col">

                <!-- Product Sorting -->
                <div class="sorting_bar d-flex flex-md-row flex-column align-items-md-center justify-content-md-start">
                    <div class="results">Всего товаров: <span><?= $pages->totalCount?></span></div>
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
                    <?php foreach ($models as $prd) {?>
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
                <div class="product_pagination">
                    <?php echo \app\widgets\Pager::widget([
                        'pagination' => $pages,
                        'prevPageLabel' => false,
                        'nextPageLabel' => false,
                        'options' => ['class' => ''],
                        ])?>
                </div>

            </div>
        </div>
    </div>
</div>

        <?php }?>

<!-- Icon Boxes -->

<div class="icon_boxes">
    <div class="container">
        <div class="row icon_box_row">

            <!-- Icon Box -->
            <div class="col-lg-4 icon_box_col">
                <div class="icon_box">
                    <div class="icon_box_image"><img src="images/icon_1.svg" alt=""></div>
                    <div class="icon_box_title">Free Shipping Worldwide</div>
                    <div class="icon_box_text">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam a ultricies metus. Sed nec molestie.</p>
                    </div>
                </div>
            </div>

            <!-- Icon Box -->
            <div class="col-lg-4 icon_box_col">
                <div class="icon_box">
                    <div class="icon_box_image"><img src="images/icon_2.svg" alt=""></div>
                    <div class="icon_box_title">Free Returns</div>
                    <div class="icon_box_text">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam a ultricies metus. Sed nec molestie.</p>
                    </div>
                </div>
            </div>

            <!-- Icon Box -->
            <div class="col-lg-4 icon_box_col">
                <div class="icon_box">
                    <div class="icon_box_image"><img src="images/icon_3.svg" alt=""></div>
                    <div class="icon_box_title">24h Fast Support</div>
                    <div class="icon_box_text">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam a ultricies metus. Sed nec molestie.</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<?= \app\widgets\SubscribeWidget::widget()?>