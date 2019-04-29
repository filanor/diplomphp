<?php
$this->title = $item['item'];


?>


<!-- Home -->

<div class="home home-notmain">
    <div class="home_container">
        <div class="home_background" style="background-image:url(/images/categories.jpg)"></div>
        <div class="home_content_container">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="home_content">
                            <div class="home_title"><?= $cat['category']?><span>.</span></div>
                            <div class="home_text"><p><?= $cat['desc']?></p></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Product Details -->

<div class="product_details">
    <div class="container">
        <div class="row details_row">

            <!-- Product Image -->
            <div class="col-lg-6">
                <div class="details_image">
                    <div class="details_image_large">
                        <img src="/images/<?= $item['img']?>" alt="">
                        <?php if($item['status'] != '') { ?>
                            <div class="product_extra product_<?=$item['status']?>"><a href="categories.html"><?= $item['status'] ?></a></div>
                        <?php } ?>
                    </div>
                    <!--
                    <div class="details_image_thumbnails d-flex flex-row align-items-start justify-content-between">
                        <div class="details_image_thumbnail active" data-image="images/details_1.jpg"><img src="/images/<?= $item['img']?>" alt=""></div>
                        <div class="details_image_thumbnail" data-image="images/details_2.jpg"><img src="images/details_2.jpg" alt=""></div>
                        <div class="details_image_thumbnail" data-image="images/details_3.jpg"><img src="images/details_3.jpg" alt=""></div>
                        <div class="details_image_thumbnail" data-image="images/details_4.jpg"><img src="images/details_4.jpg" alt=""></div>
                    </div>
                    -->
                </div>
            </div>

            <!-- Product Content -->
            <div class="col-lg-6">
                <div class="details_content">
                    <div class="details_name"><?= $item['item']?></div>
                    <?php if($item['salePrice'] && $item['salePrice'] > 0) {?>
                        <div class="details_discount"><?= $item['price']?> руб.</div>
                        <div class="details_price"><?= $item['salePrice']?></div>
                    <?php } else { ?>
                        <div class="details_price"><?= $item['price']?> руб.</div>
                    <?php } ?>

                    <!-- In Stock -->
                    <div class="in_stock_container">
                        <div class="availability">Наличие:</div>
                        <?php if ($item['quantity'] > 0 || $item['quantity'] != NULL) {?>
                        <span>В наличии</span>
                        <?php } else {?>
                        <span style = "color: darkred">Нет в наличии</span>
                        <?php }?>
                    </div>
                    <div class="details_text">
                        <p><?= $item['about']?></p>
                    </div>

                    <!-- Product Quantity -->
                    <?php if ($item['quantity'] > 0 || $item['quantity'] != NULL) {?>
                    <div class="product_quantity_container">
                        <div class="product_quantity clearfix">
                            <span>Qty</span>
                            <input id="quantity_input" type="text" pattern="[0-9]*" value="1">
                            <div class="quantity_buttons">
                                <div id="quantity_inc_button" class="quantity_inc quantity_control"><i class="fa fa-chevron-up" aria-hidden="true"></i></div>
                                <div id="quantity_dec_button" class="quantity_dec quantity_control"><i class="fa fa-chevron-down" aria-hidden="true"></i></div>
                            </div>
                        </div>
                        <div class="button cart_button"><a href="#" data-id = "<?=$item['id']?>">Add to cart</a></div>
                    </div>
                    <?php }?>

                    <!-- Share -->
                    <div class="details_share">
                        <span>Share:</span>
                        <ul>
                            <li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="row description_row">
            <div class="col">
                <div class="description_title_container">
                    <div class="description_title">Описание</div>
                </div>
                <div class="description_text">
                    <p><?= $item['about']?></p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Products -->

<?= \app\widgets\RelatedWidget::widget(['category' => $item['category']])?>

<?= \app\widgets\SubscribeWidget::widget()?>


<?php
$add =  <<< JS
    $('.cart_button a').on('click', function (e) {
        e.preventDefault();
        let id = $(this).data('id'),
            qtty =  $('#quantity_input').val();
        console.log(id);
        
        $.ajax({
            url: '../cart/add',
            method: 'GET',
            data: {id: id, qtty: qtty},
            success: function(res){
                console.log('да');
                $('.shopping_cart div span').text('(' + res + 'руб.)')
            },
            error: function(err){
                console.log('нет');
                console.log(err);
            }
        });
        
        
        
        //let text = $('.shopping_cart div span').text();
        //text = 
        //$('.shopping_cart div span').text('(' + ',' +  'руб.)')
    });
JS;

$this->registerJS($add);
?>



