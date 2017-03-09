<?php  include ROOT. '/views/layouts/header_admin.php'; ?>

<div class="container">
    <div class="row">
        <br>

        <div class="breadcrumbs">
            <ol class="breadcrumb" style="margin-bottom: 30px;">
                <li><a href="/admin">Админпанель</a></li>
                <li class="active">Управление товарами</li>
            </ol>
        </div>

        <a href="/admin/product/create" class="btn btn-default back"><i class="fa fa-plus"></i> Добавить товар</a>
        <br> <br>

        <h4>Список товаров</h4>

        <br/>

        <table class="table-bordered table">
            <tr>
                <th>ID товара</th>
                <th>Код товара</th>
                <th>Название товара</th>
                <th>Цена</th>
                <th></th>
                <th></th>
            </tr>

            <?php  foreach ($productList as $product): ?>
            <tr>
                <td><?=$product['id']?></td>
                <td><?=$product['code']?></td>
                <td><?=$product['name']?></td>
                <td><?=$product['price']?></td>
                <td><a href="/admin/product/update/<?=$product['id']?>" title="Редактировать"><i class="fa fa-pencil-square-o"></i></a></td>
                <td><a href="/admin/product/delete/<?=$product['id']?>" title="Удалить"><i class="fa fa-times"></i></a></td>
            </tr>
            <?php  endforeach;  ?>

        </table>


    </div>
</div>




<?php  include ROOT. '/views/layouts/footer_admin.php'; ?>
