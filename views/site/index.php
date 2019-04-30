<?php

/* @var $this yii\web\View */

$this->title = "Наш самый лучший магазин";

use yii\helpers\Url;
?>



<!-- Home -->

<div class="home">
    <div class="home_slider_container">

        <!-- Home Slider -->
        <div class="owl-carousel owl-theme home_slider">

            <!-- Slider Item -->
            <div class="owl-item home_slider_item">
                <div class="home_slider_background" style="background-image:url(/images/home_slider_1.jpg)"></div>
                <div class="home_slider_content_container">
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <div class="home_slider_content"  data-animation-in="fadeIn" data-animation-out="animate-out fadeOut">
                                    <div class="home_slider_title">Незабываемый экспириенс от online шопинга.</div>
                                    <div class="home_slider_subtitle">С нашим сайтом ты получишь незабываемые ощущения от online шопинга.</div>
                                    <div class="button button_light home_button"><a href="<?= Url::to(['/site/category'])?>">Го шопить</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Slider Item -->
            <div class="owl-item home_slider_item">
                <div class="home_slider_background" style="background-image:url(/images/home_slider_1.jpg)"></div>
                <div class="home_slider_content_container">
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <div class="home_slider_content"  data-animation-in="fadeIn" data-animation-out="animate-out fadeOut">
                                    <div class="home_slider_title">Незабываемый экспириенс от online шопинга.</div>
                                    <div class="home_slider_subtitle">С нашим сайтом ты получишь незабываемые ощущения от online шопинга.</div>
                                    <div class="button button_light home_button"><a href="<?= Url::to(['/site/category'])?>">Кликай сюда</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Slider Item -->
            <div class="owl-item home_slider_item">
                <div class="home_slider_background" style="background-image:url(/images/home_slider_1.jpg)"></div>
                <div class="home_slider_content_container">
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <div class="home_slider_content"  data-animation-in="fadeIn" data-animation-out="animate-out fadeOut">
                                    <div class="home_slider_title">Незабываемый экспириенс от online шопинга.</div>
                                    <div class="home_slider_subtitle">С нашим сайтом ты получишь незабываемые ощущения от online шопинга.</div>
                                    <div class="button button_light home_button"><a href="<?= Url::to(['/site/category'])?>">Не веришь?</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>

<!-- Ads -->

<div class="avds">
    <div class="avds_container d-flex flex-lg-row flex-column align-items-start justify-content-between">
        <div class="avds_small">
            <div class="avds_background" style="background-image:url(/images/avds_small.jpg)"></div>
            <div class="avds_small_inner">
                <div class="avds_discount_container">
                    <img src="images/discount.png" alt="">
                    <div>
                        <div class="avds_discount">
                            <div>20<span>%</span></div>
                            <div>Discount</div>
                        </div>
                    </div>
                </div>
                <div class="avds_small_content">
                    <div class="avds_title">Смарт Фоны</div>
                    <div class="avds_link"><a href="<?= Url::to(['category/phones'])?>">Бегу смотреть</a></div>
                </div>
            </div>
        </div>
        <div class="avds_large">
            <div class="avds_background" style="background-image:url(/images/avds_large.jpg)"></div>
            <div class="avds_large_container">
                <div class="avds_large_content">
                    <div class="avds_title">Профессиональные Фотокамеры</div>
                    <div class="avds_text">Плохая память? Пользуйся нашими фотоаппаратами!</div>
                    <div class="avds_link avds_link_large"><a href="<?= Url::to(['category/photo'])?>">Перейти в раздел</a></div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Products -->

<div class="products">
    <div class="container">
        <div class="row">
            <div class="col">

                <div class="product_grid">

                    <!-- Product -->
                    <?php foreach ($products as $prd) {

                        ?>

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

<!-- Ad -->

<div class="avds_xl">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="avds_xl_container clearfix">
                    <div class="avds_xl_background" style="background-image:url(../web/images/avds_xl.jpg)"></div>
                    <div class="avds_xl_content">
                        <div class="avds_title">Наушники</div>
                        <div class="avds_text">Музыка стала неотъемлемой чатью нашей жизни. Хорошие наушники позволят вам наслаждаться ей.</div>
                        <div class="avds_link avds_xl_link"><a href="<?= Url::to(['category/Наушники'])?>">Смотреть товары</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Icon Boxes -->

<div class="icon_boxes">
    <div class="container">
        <div class="row icon_box_row">

            <!-- Icon Box -->
            <div class="col-lg-4 icon_box_col">
                <div class="icon_box">
                    <div class="icon_box_image"><img src="/images/icon_1.svg" alt=""></div>
                    <div class="icon_box_title">Free Shipping Worldwide</div>
                    <div class="icon_box_text">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam a ultricies metus. Sed nec molestie.</p>
                    </div>
                </div>
            </div>

            <!-- Icon Box -->
            <div class="col-lg-4 icon_box_col">
                <div class="icon_box">
                    <div class="icon_box_image"><img src="/images/icon_2.svg" alt=""></div>
                    <div class="icon_box_title">Free Returns</div>
                    <div class="icon_box_text">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam a ultricies metus. Sed nec molestie.</p>
                    </div>
                </div>
            </div>

            <!-- Icon Box -->
            <div class="col-lg-4 icon_box_col">
                <div class="icon_box">
                    <div class="icon_box_image"><img src="/images/icon_3.svg" alt=""></div>
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

