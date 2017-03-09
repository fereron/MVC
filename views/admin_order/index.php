<?php  include ROOT. '/views/layouts/header_admin.php'; ?>

<div class="container">
    <div class="row">
        <br>

        <div class="breadcrumbs">
            <ol class="breadcrumb" style="margin-bottom: 30px;">
                <li><a href="/admin">Админпанель</a></li>
                <li class="active">Управление заказами</li>
            </ol>
        </div>



        <h4>Список заказов</h4>

        <br/>

        <table class="table-bordered table">
            <tr>
                <th>ID заказа</th>
                <th>Имя покупателя</th>
                <th>Телефон покупателя</th>
                <th>Комментарий покупателя</th>
                <th></th>
                <th></th>
                <th></th>
            </tr>

            <?php  foreach ($orders as $order): ?>
                <tr>
                    <td><?=$order['id']?></td>
                    <td><?=$order['name']?></td>
                    <td><?=$order['telefon']?></td>
                    <td><?=$order['comment']?></td>
                    <td><a href="/admin/order/view/<?=$order['id']?>" title="Сведения о заказе"><i class="fa fa-eye"></i></a></td>
                    <td><a href="/admin/order/update/<?=$order['id']?>" title="Редактировать"><i class="fa fa-pencil-square-o"></i></a></td>
                    <td><a href="/admin/order/delete/<?=$order['id']?>" title="Удалить"><i class="fa fa-times"></i></a></td>
                </tr>
            <?php  endforeach;  ?>

        </table>
        <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br>

    </div>
</div>




<?php  include ROOT. '/views/layouts/footer_admin.php'; ?>
