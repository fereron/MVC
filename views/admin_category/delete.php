<?php  include ROOT. '/views/layouts/header_admin.php'; ?>

    <div class="container">
        <div class="row">
            <br>

            <div class="breadcrumbs">
                <ol class="breadcrumb" style="margin-bottom: 30px;">
                    <li><a href="/admin">Админпанель</a></li>
                    <li><a href="/admin/product">Управление категориями</a></li>
                    <li class="active">Удалить категорию</li>
                </ol>
            </div>

            <h4>Удалить категорию #<?=$id?></h4>

            <p>Вы действительно хотите удалить эту категорию?</p>

            <form method="post">
                <input type="submit" name="submit" value="Удалить" class="btn btn-default" style="background: #FE980F; color: #FFFFFF; border: none;">
            </form>

            <br> <br> <br> <br> <br> <br>

        </div>
    </div>




<?php  include ROOT. '/views/layouts/footer_admin.php'; ?>