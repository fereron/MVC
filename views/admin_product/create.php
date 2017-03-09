<?php  include ROOT. '/views/layouts/header_admin.php'; ?>

<div class="container">
    <div class="row">
        <br>

        <div class="breadcrumbs">
            <ol class="breadcrumb" style="margin-bottom: 30px;">
                <li><a href="/admin">Админпанель</a></li>
                <li><a href="/admin/product">Управление товарами</a></li>
                <li class="active">Добавить товар</li>
            </ol>
        </div>

        <h4>Добавить новый товар</h4>

        <div class="col-lg-4">
            <div class="signup-form">
                <form action="#" method="post" enctype="multipart/form-data">
                    <br>

                    <p>Название товара:</p>
                    <input type="text" placeholder="" value="" name="name">

                    <p>Код товара:</p>
                    <input type="text" placeholder="" value="" name="code">

                    <p>Стоимость товара, $:</p>
                    <input type="text" placeholder="" value="" name="price">

                    <p>Категория:</p>
                    <select name="category_id" style="background-color: #fff; margin-bottom: 10px; border: 1px solid #96969e; width: 85%">
                        <?php  if (is_array($categoriesList)):  ?>
                            <?php  foreach ($categoriesList as $category):  ?>
                                <option value="<?=$category['id']?>">
                                    <?=$category['name']?>
                                </option>
                            <?php  endforeach;  ?>
                        <?php endif;  ?>
                    </select>

                    <p>Производитель:</p>
                    <input type="text" placeholder="" value="" name="brand">

                    <p>Изображение товара:</p>
                    <input type="file" name="image">

                    <p>Детальное описание товара:</p>
                    <textarea name="description" cols="5" rows="5" style="border: 1px solid #96969e; background-color: #fff; margin-bottom: 12px;"></textarea>

                    <p>Наличие на складе:</p>
                    <select name="availability" style="background-color: #fff; margin-bottom: 10px; border: 1px solid #96969e; width: 85%">
                        <option value="1" selected="selected">Да</option>
                        <option value="0">Нет</option>
                    </select>

                    <p>Новинка:</p>
                    <select name="is_new" style="background-color: #fff; margin-bottom: 10px; border: 1px solid #96969e; width: 85%">
                        <option value="1" selected="selected">Да</option>
                        <option value="0">Нет</option>
                    </select>

                    <p>Рекомендуемые:</p>
                    <select name="is_recommended" style="background-color: #fff; margin-bottom: 10px; border: 1px solid #96969e; width: 85%">
                        <option value="1" selected="selected">Да</option>
                        <option value="0">Нет</option>
                    </select>

                    <p>Статус</p>
                    <select name="status" style="background-color: #fff; margin-bottom: 30px; border: 1px solid #96969e; width: 85%">
                        <option value="1" selected="selected">Отображается</option>
                        <option value="0">Скрыт</option>
                    </select>

                    <input type="submit" name="submit" class="btn btn-default" value="Добавить" style="background: #FE980F; color: #FFFFFF; border: none;">

                 </form>
            </div>
        </div>

    </div>
</div>

    <br> <br>


<?php  include ROOT. '/views/layouts/footer_admin.php'; ?>