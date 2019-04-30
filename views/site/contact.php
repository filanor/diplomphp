<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Свяжитесь с нами';
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
                                    <li>Свяжитесь с нами</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Contact -->

<div class="contact">
    <div class="container">
        <div class="row">

            <!-- Get in touch -->
            <div class="col-lg-8 contact_col">
                <div class="get_in_touch">
                    <div class="section_title">Будь на связи</div>
                    <div class="section_subtitle">напиши нам</div>
                    <div class="res_container" style = "width: 100%; line-height: 40px; font-size: 30px; text-align: center;"></div>
                    <div class="contact_form_container">
                        <!--<form action="#" id="contact_form" class="contact_form">-->
                        <?php

                        $form = ActiveForm::begin(['id' => 'contact-form', 'class' => 'contact-form', 'action'=>['']]); ?>
                            <div class="row">
                                <?= $form->field($model, 'firstName', ['options' => ['class'=>'col-xl-6']])->textInput(['autofocus' => true, 'class'=>'contact_input'])?>
                                <?= $form->field($model, 'lastName', ['options' => ['class'=>'col-xl-6 last_name_col']])->textInput(['autofocus' => true, 'class'=>'contact_input']) ?>

                            </div>
                                <?= $form->field($model, 'subject', ['options' => ['class'=>'']])->textInput(['autofocus' => true, 'class'=>'contact_input']) ?>

                                <?= $form->field($model, 'body')->textarea(['rows' => 6, 'class'=>'contact_input contact_textarea']) ?>
                                <!--<textarea id="contact_textarea" class="contact_input contact_textarea" required="required"></textarea>-->

                            <!--<button class="button contact_button newsletter_button"><span>Отправить</span></button>-->
                        <?= Html::submitButton('Submit', ['class' => 'button contact_button newsletter_button', 'name' => 'contact-button']) ?>
                        <!--</form>-->
                        <?php ActiveForm::end(); ?>
                    </div>
                </div>
            </div>

            <!-- Contact Info -->
            <div class="col-lg-3 offset-xl-1 contact_col">
                <div class="contact_info">
                    <div class="contact_info_section">
                        <div class="contact_info_title">Комерческий отдел</div>
                        <ul>
                            <li>Phone: <span>+53 345 7953 3245</span></li>
                            <li>Email: <span>yourmail@gmail.com</span></li>
                        </ul>
                    </div>
                    <div class="contact_info_section">
                        <div class="contact_info_title">Доставка и возврат</div>
                        <ul>
                            <li>Phone: <span>+53 345 7953 3245</span></li>
                            <li>Email: <span>yourmail@gmail.com</span></li>
                        </ul>
                    </div>
                    <div class="contact_info_section">
                        <div class="contact_info_title">Инвормация</div>
                        <ul>
                            <li>Phone: <span>+53 345 7953 3245</span></li>
                            <li>Email: <span>yourmail@gmail.com</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!--<div class="row map_row">-->
        <!--<div class="col">-->

        <!--&lt;!&ndash; Google Map &ndash;&gt;-->
        <!--<div class="map">-->
        <!--<div id="google_map" class="google_map">-->
        <!--<div class="map_container">-->
        <!--<div id="map"></div>-->
        <!--</div>-->
        <!--</div>-->
        <!--</div>-->

        <!--</div>-->
        <!--</div>-->
    </div>
</div>

<?php


$contact = <<< JS
    $(document).on('click', '.contact_button', function(e){
        e.preventDefault();
       let form = $(this).parents('#contact-form');
       //console.log(form.attr('method'));
       
       $.ajax({
            type: 'POST',
            url: '/site/contact',
            data: form.serializeArray(),
            success: function(res){
                if (res.validation) {
                    console.log(res.validation);
                    form.yiiActiveForm('updateMessages', res.validation, true);
                } else{
                    $('.contact_input').val('');
                    $('.res_container').text(res);
                }
                },
            error: function(err){
                $('.res_container').text('Ошибка. Попробуйте позже.');
            },
        
       });
    });
JS;

$this->registerJS($contact);


?>
