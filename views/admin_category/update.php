<?php  include ROOT. '/views/layouts/header_admin.php'; ?>

    <div class="container">
        <div class="row">
            <br>

            <div class="breadcrumbs">
                <ol class="breadcrumb" style="margin-bottom: 30px;">
                    <li><a href="/admin">Админпанель</a></li>
                    <li><a href="/admin/category">Управление категориями</a></li>
                    <li class="active">Изменить категорию</li>
                </ol>
            </div>

            <h4>Изменить категорию</h4>

            <div class="col-lg-4">
                <div class="signup-form">
                    <form action="#" method="post">
                        <br>


                        <p>Название категории:</p>
                        <input type="text" placeholder="" value="<?=$category['name']?>" name="name">

                        <p>Порядковый номер</p>
                        <input type="text" name="sort_order" placeholder="" value="<?=$category['sort_order']?>">

                        <p>Статус</p>
                        <select name="status" style="background-color: #fff; margin-bottom: 30px; border: 1px solid #96969e; width: 85%">
                            < <option value="1" <?php   if($category['status'] == 1)  echo 'selected="selected"' ?>>Отображается</option>
                            <option value="0" <?php   if($category['status'] == 0)  echo 'selected="selected"' ?>>Скрыта</option>
                        </select>

                        <input type="submit" name="submit" class="btn btn-default" value="Изменить" style="background: #FE980F; color: #FFFFFF; border: none;">

                    </form>
                </div>
            </div>

        </div>
    </div>

    <br> <br>


<?php  include ROOT. '/views/layouts/footer_admin.php'; ?>