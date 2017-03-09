<?php  include ROOT. '/views/layouts/header.php'; ?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-4 padding-right">

                    <?php if (isset($errors) && is_array($errors)):   ?>
                        <ul>
                            <?php foreach ($errors as $error): ?>
                                <li>-<?=$error?></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>

                    <div class="signup-form">
                        <h2>Вход на сайт</h2>
                        <form action="#" method="post">
                            <input type="text" name="email" placeholder="Email" value="<?=$email?>"/>
                            <input type="password" name="password" placeholder="Пароль"/>
                            <button type="submit" name="submit" class="btn btn-default">Войти</button>
                        </form>
                    </div>
                    <br>
                    <br>

            </div>
        </div>
    </div>
</section>


<?php  include ROOT. '/views/layouts/footer.php'; ?>

