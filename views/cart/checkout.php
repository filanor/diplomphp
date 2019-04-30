<?php
/**
 * Created by PhpStorm.
 * User: filanor
 * Date: 2019-04-28
 * Time: 20:59
 */
use yii\widgets\ActiveForm;
use \yii\helpers\Html;
?>

<!-- Home -->

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
                                    <li><a href="/">Главная</a></li>
                                    <li><a href="cart.html">Корзина</a></li>
                                    <li>Оформление заказа</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Checkout -->
<?php
echo "<pre>";
echo var_dump(isset($order));
echo "</pre>";
?>
?>
<div class="checkout">
    <div class="container">
        <div class="row">

            <!-- Billing Info -->
            <div class="col-lg-6">
                <div class="billing checkout_section">
                    <div class="section_title">Адресс</div>
                    <div class="section_subtitle">Введите адрес для доставки</div>
                    <div class="checkout_form_container">

                        <?php $form = ActiveForm::begin(['id' => 'checkout_form', 'class' => 'checkout_form', 'action'=>'#'])?>
                            <div class="row">
                                    <!-- Name -->
                                <?= $form->field($order, 'firstName', ['options' => ['class'=>'col-xl-6']])->textInput(['class'=>'contact_input', 'id'=>'checkout_name'])?>
                                    <!-- Last Name -->
                                <?= $form->field($order, 'lastName', ['options' => ['class'=>'col-xl-6 last_name_col']])->textInput(['class'=>'contact_input', 'id'=>'checkout_last_name'])?>
                            </div>


                                <!-- Address -->
                                <?= $form->field($order, 'addr')->textInput(['class'=>'contact_input', 'id'=>'checkout_address'])?>



                                <!-- Phone no -->
                                <?= $form->field($order, 'phonenum')->textInput(['class'=>'contact_input', 'id'=>'checkout_phone', 'type'=>'phone'])?>


                                <!-- Email -->
                                <?= $form->field($order, 'emailadr')->textInput(['class'=>'contact_input', 'id'=>'checkout_email'])?>


                            <div class="checkout_extra">
                                <div>
                                    <input type="checkbox" id="checkbox_terms" name="regular_checkbox" class="regular_checkbox" checked="checked">
                                    <label for="checkbox_terms"><img src="/images/check.png" alt=""></label>
                                    <span class="checkbox_title">Согласие с условиями</span>
                                </div>

                                <div>
                                    <input type="checkbox" id="checkbox_newsletter" name="regular_checkbox" class="regular_checkbox">
                                    <label for="checkbox_newsletter"><img src="/images/check.png" alt=""></label>
                                    <span class="checkbox_title">Подписаться на нашу рассылку</span>
                                </div>
                            </div>
                    <?php ActiveForm::end()?>

                    </div>
                </div>
            </div>

            <!-- Order Info -->

            <div class="col-lg-6">
                <div class="order checkout_section">
                    <div class="section_title">Ваш заказ</div>
                    <div class="section_subtitle">Подробности расчета</div>

                    <!-- Order details -->
                    <div class="order_list_container">
                        <div class="order_list_bar d-flex flex-row align-items-center justify-content-start">
                            <div class="order_list_title">Товар</div>
                            <div class="order_list_value ml-auto">Сумма</div>
                        </div>
                        <ul class="order_list">
                            <?php foreach ($_SESSION['cart'] as $item) { ?>
                            <li class="d-flex flex-row align-items-center justify-content-start">
                                <div class="order_list_title"><?= $item['name'] ?></div>
                                <div class="order_list_value ml-auto"><?= $item['price'] * $item['qtty']?> руб.</div>
                            </li>
                            <?php } ?>
                            <li class="d-flex flex-row align-items-center justify-content-start">
                                <div class="order_list_title">Стоимость товара</div>
                                <div class="order_list_value ml-auto"><?= $_SESSION['cart.totalSum']?> руб.</div>
                            </li>
                            <li class="d-flex flex-row align-items-center justify-content-start">
                                <div class="order_list_title">Доставка</div>
                                <div class="order_list_value ml-auto"><?= $_SESSION['cart.delivery'] ?> руб.</div>
                            </li>
                            <li class="d-flex flex-row align-items-center justify-content-start">
                                <div class="order_list_title">Итого</div>
                                <div class="order_list_value ml-auto"><?= $_SESSION['cart.delivery'] + $_SESSION['cart.totalSum'] ?> руб.</div>
                            </li>
                        </ul>
                    </div>

                    <!-- Payment Options -->
                    <div class="payment">
                        <div class="payment_options">
                            <label class="payment_option clearfix">Paypal
                                <input type="radio" name="radio">
                                <span class="checkmark"></span>
                            </label>
                            <label class="payment_option clearfix">Наличными при доставке
                                <input type="radio" name="radio">
                                <span class="checkmark"></span>
                            </label>
                            <label class="payment_option clearfix">Банковская карта
                                <input type="radio" name="radio">
                                <span class="checkmark"></span>
                            </label>
                            <label class="payment_option clearfix">Оплата в банк по счету
                                <input type="radio" checked="checked" name="radio">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>

                    <!-- Order Text -->
                    <div class="order_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin pharetra temp or so dales. Phasellus sagittis auctor gravida. Integ er bibendum sodales arcu id te mpus. Ut consectetur lacus.</div>
                    <?= Html::submitButton('Submit', ['class' => 'button order_button newsletter_button placeOrder']) ?>
                    <!--<div class="button order_button newsletter_button"><a href="#" class= "placeOrder">Разместить заказ</a></div>-->
                </div>
            </div>
        </div>
    </div>
</div>
<div class = "checkout_res container" style = "display:block;">
    <h2></h2>
    <div class= "button continue_shopping_button newsletter_button" style='margin: 30px auto 50px auto;'><a href="/">Продолжить покупки</a></div>
</div>


<?php
$orderfinale = <<< JS
    $(document).on('click', '.placeOrder', function(e){
        e.preventDefault();
         console.log($('#checkbox_newsletter').val())
                if( $('#checkbox_newsletter').prop("checked")){
                    let email = $('#checkout_email').val();
                    $.ajax(
                   {
                       url: '/site/subscribe',
                       data: {email: email},
                       method: 'GET',
                       success: function(res){
                           
                           console.log(res);
                       },
                       error: function(){
                           console.log("не ура");
                       }
                   });
                }
        let form = $('#checkout_form');
        console.log(form.serializeArray(),);
        $.ajax({
            url: '/cart/checkout',
            method: 'POST',
            data: form.serializeArray(),
            success: function(res){
                console.log('Успех');
                console.log(res);
                // Подписка, если стоит галка
                $('.checkout').remove();
                $('.checkout_res').css('display', 'block');
                $('.checkout_res h2').text(res);
            },
            error: function(err){
                console.log('Это фиаско, брат');
            }
        });
        
        
        
    })
    

JS;
$this->registerJS($orderfinale);
?>
