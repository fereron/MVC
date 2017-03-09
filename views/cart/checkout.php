<?php  include ROOT. '/views/layouts/header.php'; ?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-4 padding-right">


    <?php if( isset($result)):   ?>
        <p>Ваш заказ оформлен! Ждите звонка оператора!</p>
    <?php  else:  ?>




    <div class="signup-form" style="width: 300px;">
<!--        <h2>Оформление заказа</h2>-->
        <p>Выбрано товаров: <?=Cart::countItemsInCart();?>, на сумму: <?=$totalPrice?>$</p>

        <?php   if (isset($errors) && is_array($errors)):    ?>
            <ul>
                <?php     foreach ($errors as $error):     ?>
                    <li>-<?=$error?></li>
                <?php   endforeach;   ?>
            </ul>
        <?php  endif;   ?>

        <p>Для оформления заказа заполните форму. Наш менеджер свяжется с вами.</p>

        <form action="#" method="post" style="border-top: 1px solid #333; ">
            <br>
            <span>Ваше имя:</span>
            <input type="text" name="name" placeholder="Имя"/>
            <span>Номер телефона:</span>
            <input type="tel" name="tel" placeholder="Телефон"/>
            <span>Комментарий к заказу:</span>
            <input type="text" name="comment" placeholder="Комментарий"/>
            <button style="width: 85%; border-radius: 4px;" type="submit" name="submit" class="btn btn-default">Оформить заказ</button>
        </form>
    </div>
    <br>
    <br>
    <?php  endif;  ?>


            </div>
        </div>
    </div>
</section>




<?php  include ROOT. '/views/layouts/footer.php'; ?>