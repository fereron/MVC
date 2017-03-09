<?php  include ROOT. '/views/layouts/header_admin.php'; ?>

<div class="container">
    <div class="row">
        <br>

        <div class="breadcrumbs">
            <ol class="breadcrumb" style="margin-bottom: 30px;">
                <li><a href="/admin">Админпанель</a></li>
                <li><a href="/admin/order">Управление заказами</a></li>
                <li class="active">Сведения о заказе</li>
            </ol>
        </div>



        <h4>Сведения о заказе #<?=$order['id'];?></h4>

        <br>

        <h5>Информация о заказе</h5>
        <table class=" table-bordered  table" style="width: 500px;">
            <tr>
                <td width="40%">Номер заказа</td>
                <td ><?php echo $order['id']; ?></td>
            </tr>
            <tr>
                <td>Имя клиента</td>
                <td><?=$order['name']?></td>
            </tr>
            <tr>
                <td>Телефон клиента</td>
                <td><?=$order['telefon']?></td>
            </tr>
            <tr>
                <td>Комментарий клиента</td>
                <td><?=$order['comment']?></td>
            </tr>
            <?php if ( $order['userId'] != 0):  ?>
            <tr>
                <td>ID клиента</td>
                <td><?=$order['userId']?></td>
            </tr>
            <?php endif;  ?>
            <tr>
                <td>Статус заказа</td>
                <td><?=Order::getStatusText($order['status'])?></td>
            </tr>
        </table>

            <h5>Товары в заказе</h5>

            <table class="table-admin-medium table-bordered  table " style="width: 1000px;">
                <tr>
                    <th>ID товара</th>
                    <th>Код товара</th>
                    <th>Название</th>
                    <th>Цена</th>
                    <th>Количество</th>
                </tr>
                <?php foreach ($products as $product): ?>
                    <tr>
                        <td><?php echo $product['id']; ?></td>
                        <td><?php echo $product['code']; ?></td>
                        <td><?php echo $product['name']; ?></td>
                        <td>$<?php echo $product['price']; ?></td>
                        <td><?php echo $productQuantity[$product['id']]; ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>

            <a href="/admin/order/" class="btn btn-default back"><i class="fa fa-arrow-left"></i> Назад</a>


        <br> <br> <br>







    </div>
</div>



<?php  include ROOT. '/views/layouts/footer_admin.php'; ?>
