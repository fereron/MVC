<?php  include ROOT. '/views/layouts/header.php'; ?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2>Каталог</h2>
                    <div class="panel-group category-products">

                        <?php  foreach ($categories as $category): ?>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a href="/category/<?=$category['id'];?>">
                                            <?=$category['name'];?>
                                        </a>
                                    </h4>
                                </div>
                            </div>
                        <?php endforeach;  ?>

                    </div>

                </div>
            </div>
            <div class="col-sm-9 padding-right">
                <div class="features-item">
                    <h2>Корзина</h2>

                    <?php  if ($productsInCart):  ?>
                    <p>Вы выбрали товары:</p>
                    <table class="table-bordered table-striped table">
                        <tr>
                            <th>Код товара:</th>
                            <th>Название:</th>
                            <th>Стоимость:</th>
                            <th>Количество, шт:</th>
                            <th>Удалить:</th>
                        </tr>
                    <?php  foreach ($products as $product): ?>
                        <tr>
                            <td><?=$product['code'];?></td>
                            <td> <a href="/product/<?=$product['id'];?>">
                                    <?=$product['name'];?>
                                </a> </td>
                            <td><?=$product['price'];?></td>
                            <td><?=$productsInCart[$product['id']];?></td>
                            <td><a href="/cart/delete/<?=$product['id'];?>">x</a></td>
                        </tr>
                    <?php  endforeach;  ?>
                        <tr>
                            <td colspan="3">
                                  Общая стоимость:
                            </td>
                            <td colspan="2"><?=$totalPrice;?></td>
                        </tr>
                    </table>
                        <a style="margin-bottom: 20px;" href="/cart/checkout">Оформить заказ</a>
                <?php else:  ?>
                    <p>Корзина пуста</p>
                <?php endif;  ?>

                </div>
            </div>



        </div>
    </div>
</section>








<?php  include ROOT. '/views/layouts/footer.php'; ?>