<?php
/**
 * Created by PhpStorm.
 * User: filanor
 * Date: 2019-04-27
 * Time: 22:22
 */

use yii\helpers\Url;

$this->title = "Корзина";
//echo"<pre>";
//echo var_dump($_SESSION['cart']);
//echo "</pre>";
?>

<!-- Home -->

<div id = "cart-page">

<div class="home home-small">
    <div class="home_container">
        <div class="home_background" style="background-image:url(/images/cart.jpg)"></div>
        <div class="home_content_container">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="home_content">
                            <div class="breadcrumbs">
                                <ul>
                                    <li><a href="\">Главная</a></li>
                                    <li>Корзина</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Cart Info -->

<div class="cart_info">
<?php if(isset($session['cart'])) {?>
    <div class="container">
        <div class="row">
            <div class="col">
                <!-- Column Titles -->
                <div class="cart_info_columns clearfix">
                    <div class="cart_info_col cart_info_col_product">Товар</div>
                    <div class="cart_info_col cart_info_col_price">Цена</div>
                    <div class="cart_info_col cart_info_col_quantity">Количество</div>
                    <div class="cart_info_col cart_info_col_total">Сумма</div>
                </div>
            </div>
        </div>
        <div class="row cart_items_row">
<?php foreach ($session['cart'] as $id => $item) { ?>
            <div class="col-12">

                <!-- Cart Item -->
                <div data-id = "<?= $id ?>" class="cart_item d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-start">
                    <!-- Name -->
                    <div class="cart_item_product d-flex flex-row align-items-center justify-content-start">
                        <div class="cart_item_image">
                            <div><img src="/images/<?= $item['img']?>" alt=""></div>
                        </div>
                        <div class="cart_item_name_container">
                            <div class="cart_item_name"><a href="#"><?= $item['name']?></a></div>
                            <div class="cart_item_edit"><a href="/" class="delete" data-id = "<?= $id ?>" style = "color: darkred;">Удалить товар</a></div>
                        </div>
                    </div>
                    <!-- Price -->
                    <div class="cart_item_price"><?= $item['price']?></div>
                    <!-- Quantity -->
                    <div class="cart_item_quantity">
                        <div class="product_quantity_container">
                            <div class="product_quantity clearfix">
                                <span>Qty</span>
                                <input class="quantity_input" type="text" pattern="[0-9]*" value="<?= $item['qtty']?>">
                                <div class="quantity_buttons">
                                    <div class="quantity_inc quantity_control"><i class="fa fa-chevron-up" aria-hidden="true"></i></div>
                                    <div class="quantity_dec quantity_control"><i class="fa fa-chevron-down" aria-hidden="true"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Total -->
                    <div class="cart_item_total"> руб.</div>
                    <!--<div class="delete" data-id = " style="text-align: center; cursor: pointer; vertical-align: middle; color: red">
                        <span>&#10006;</span></div>-->
                </div>

            </div>

  <?php } ?>
        </div>
        <div class="row row_cart_buttons">
            <div class="col">
                <div class="cart_buttons d-flex flex-lg-row flex-column align-items-start justify-content-start">
                    <div class="button continue_shopping_button newsletter_button"><a href="/">Продолжить покупки</a></div>
                    <div class="cart_buttons_right ml-lg-auto">
                        <div class="button clear_cart_button newsletter_button"><a href="/">Очистить корзину</a></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row row_extra">
            <div class="col-lg-4">

                <!-- Delivery -->
                <div class="delivery">
                    <div class="section_title">Способ доставки</div>
                    <div class="section_subtitle">Выбери подходящий вариант</div>
                    <div class="delivery_options">
                        <?php
                        $i = -1;
                        foreach ($delivery as $del) {
                            $i++;?>
                        <label class="delivery_option clearfix"><?= $del['type']?>
                            <input type="radio" name="delivery" value = "<?= $del['price']?>" <?= $i == 0? 'checked': ''?>>
                            <span class="checkmark"></span>
                            <span class="delivery_price"><?= $del['price']?> руб.</span>
                        </label>
                       <?php } ?>
                    </div>
                </div>

                <!-- Coupon Code -->
                <div class="coupon">
                    <div class="section_title">Скидочный купон</div>
                    <div class="section_subtitle">Eвведите номер купона</div>
                    <div class="coupon_form_container">
                        <form action="#" id="coupon_form" class="coupon_form">
                            <input type="text" class="coupon_input" required="required">
                            <button class="button coupon_button newsletter_button"><span>Применить</span></button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 offset-lg-2">
                <div class="cart_total">
                    <div class="section_title">Предворительный расчет</div>
                    <!--<div class="section_subtitle">Final info</div>-->
                    <div class="cart_total_container">
                        <ul>
                            <li class="d-flex flex-row align-items-center justify-content-start">
                                <div class="cart_total_title">Стоимость</div>
                                <div class="cart_total_value cart_total_value-sum ml-auto"><?= $session['cart.totalSum']?> руб.</div>
                            </li>
                            <li class="d-flex flex-row align-items-center justify-content-start">
                                <div class="cart_total_title">Доставка</div>
                                <div class="cart_total_value cart_total_value-delivery ml-auto"><?= $delivery[0]['price']?> руб.</div>
                            </li>
                            <li class="d-flex flex-row align-items-center justify-content-start">
                                <div class="cart_total_title">Итого</div>
                                <div class="cart_total_value cart_total_value-total ml-auto"><?= $session['cart.totalSum'] + $session['cart.delivery']?> руб.</div>
                            </li>
                        </ul>
                    </div>
                    <div class="button checkout_button newsletter_button"><a href="<?= Url::to(['/cart/checkout'])?>">Оформить заказ</a></div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
} else { ?>
<div style = "width: 100%; text-align: center">Корзина пока пуста :(</div>
    <div class= "button continue_shopping_button newsletter_button" style='margin: 30px auto 50px auto;'><a href="/">Продолжить покупки</a></div>

<?php }?>
</div>
<?php
$script = <<< JS

deleteItem();
function deleteItem()
	{
		$('.delete').each(function(indx) {
		
			$(this).on('click', function(e){
			
				e.preventDefault();
				
				let id = $(this).data('id');
				let el = $(this);


				$.ajax({
					url: '../cart/delete',
					method: 'GET',
					data: {id: id},
					success: function(res){
						console.log('да');
						console.log(res);
						console.log(el.parents('.cart_item')); 
						el.parents('.cart_item').remove();
						if($('.cart_item').length){
						    $('.shopping_cart div span').text(res);
						} else {
						    $('.shopping_cart div span').text('(0)');
						    //$('.cart_info).empty();
						    $('.cart_info').html("<div style = \"width: 100%; text-align: center\">Корзина пока пуста :(" +
						"<div class=\"button continue_shopping_button newsletter_button\" style='margin: 30px auto 50px auto;'><a href=\"/\">Продолжить покупки</a></div>" +"");
						}
						
					},
					error: function(err){
						console.log('нет');
						console.log(err);
					}
				});

			});
		});
	}
	
	
	
	// Вспомогательная функция осуществляет ajax запрос и меняет суммы при изменении количества
	function changeTotal(id, endVal)
	{
		$.ajax({
			url: '../cart/change',
			method: 'GET',
			data: {id: id, qtty: endVal},
			success: function(res){
				console.log(res);
				$('.shopping_cart div span').text('(' + res + 'руб.)')
			},
			error: function(err){
				console.log('нет');
			}
		})

	}
JS;



$this->registerJS($script);
?>