<?php   include ROOT. '/views/layouts/header.php'; ?>

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
                                        <a href="/category/<?=$category['id'];?>"
                                           class="<?php  if($category_id == $category['id']) echo "active"; ?>"     >
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
                <div class="features_items"><!--features_items-->
                    <h2 class="title text-center">Последние товары</h2>

                    <?php  foreach ($productList as $productItem):  ?>
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="<?=Product::getImage($productItem['id'])?>"  style="height: 200px" alt="" />
                                        <h2><?=$productItem['price'];?>$</h2>
                                        <p>
                                            <a class="product_name" href="/product/<?=$productItem['id']?>" style="color: #696763;
                                                     onmouseout="this.style.backgroundColor='#333';" onmouseover="this.style.color='#fdb45e';" onmouseout="this.style.color='#696763';">

                                            <?=$productItem['name']?>
                                            </a>
                                        </p>
                                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>В корзину</a>
                                    </div>
                                    <?php  if($productItem['is_new'] == 1): ?>
                                        <img src="/templates/images/home/new.png"  class="new" alt="" />
                                    <?php   endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php  endforeach; ?>



                </div>
                <div class="col-md-5 col-md-offset-3">,
                    <?php  echo $pagination->get();  ?>
                </div>

            </div>
        </div>
</section>

<?php  include ROOT. '/views/layouts/footer.php'; ?>

