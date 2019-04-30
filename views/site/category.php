<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Категории';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="home home-small">
    <div class="home_container">
        <div class="home_background" style="background-image:url(/images/contact.jpg)"></div>
        <div class="home_content_container">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="home_content">
                            <div class="breadcrumbs">
                                <ul>
                                    <li><a href="/">Главная</a></li>
                                    <li>Категории</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


    <div class = "categories container" style = "margin-top: 40px; margin-bottom: 40px;">
        <div class="row">
            <?php foreach ($categories as $cat) { ?>
            <a href = "/category/<?= $cat['link']?>" class="col-6 <?= $cat['link'] ?>" style = "display: block; background-image: url('/images/<?= $cat['img']?>'); background-repeat:no-repeat;background-size: cover; box-sizing: border-box;">
                <h2><?= $cat['category']?></h2>
                <p><?= $cat['desc'] ?></p>
            </a>
            <?php } ?>
        </div>

    </div>
    <?= \app\widgets\SubscribeWidget::widget()?>

    <!--<code><?= __FILE__ ?></code>-->

<style>
    .categories a{
        height: 400px;
    }

    .categories h2{
       display: block;
        margin: 60px auto 150px;
        font-weight: bold;
    }
    .categories p{
        color: #e6e6e6;
        font-size: 20px;
        line-height: 18px;
        display:block;
    }
</style>