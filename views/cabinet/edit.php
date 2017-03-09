<?php  include ROOT. '/views/layouts/header.php'; ?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-4 padding-right">

                <?php if ( isset($result)): ?>
                    <p>Данные отредактированы!</p>
                <?php else:  ?>
                    <?php if (isset($errors) && is_array($errors)):   ?>
                        <ul>
                            <?php foreach ($errors as $error): ?>
                                <li>-<?=$error?></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>

                    <div class="signup-form">
                        <h2>Редактировать данные</h2>
                        <form action="#" method="post">
                            <p>Имя:</p>
                            <input type="text" name="name" placeholder="Имя" value="<?=$name?>"/>
                            <p>Пароль:</p>
                            <input type="password" name="password" placeholder="Пароль"/>
                            <button type="submit" name="submit" class="btn btn-default">Изменить</button>
                        </form>
                    </div>
                    <br>
                    <br>
                <?php endif;  ?>
            </div>
        </div>
    </div>
</section>








<?php  include ROOT. '/views/layouts/footer.php'; ?>

