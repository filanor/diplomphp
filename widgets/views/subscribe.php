<?php
/**
 * Created by PhpStorm.
 * User: filanor
 * Date: 2019-04-26
 * Time: 15:33
 */
?>

<!-- Newsletter -->

<div class="newsletter">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="newsletter_border"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <div class="newsletter_content text-center">
                    <div class="newsletter_title">Подпишитесь на нашу рассылку</div>
                    <div class="newsletter_text"><p>Подпишитесь на нашу рассылку и вы всегда будете в курсе наших скидок и новых поступлений.</p></div>
                    <div class="newsletter_form_container">
                        <form action="#" id="newsletter_form" class="newsletter_form">
                            <input type="email" class="newsletter_input" required="required">
                            <button class="newsletter_button trans_200"><span>Подписаться</span></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
   $script = <<<JS
   $('.newsletter_button').on('click', e => {
       let email = $('.newsletter_input').val();
       e.preventDefault();
       $.ajax(
           {
           url: 'site/subscribe',
           data: {email: email},
           method: 'GET',
           success: function(res){
               console.log("ура");
               console.log(res);
           },
           error: function(){
               console.log("не ура");
           }
           
           }
       );
    });
JS;

   $this->registerJS($script);
?>
