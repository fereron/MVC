<?php


class AdminOrderController extends AdminBase
{

    public function actionIndex()
    {
        self::checkAdmin();

        $orders = Order::getOrdersList();

        require_once (ROOT. '/views/admin_order/index.php');

        return true;
    }

    public function actionView($id)
    {
        self::checkAdmin();

        $order = Order::getOrderById($id);

        $productQuantity = json_decode($order['products'], true);
        $productsIds =  array_keys($productQuantity);

        $products = Product::getProductsByIdList($productsIds);

        require_once (ROOT. '/views/admin_order/view.php');

        return true;
    }

    public function actionDelete($id)
    {
        self::checkAdmin();


        if (isset($_POST['submit'])) {
            Order::deleteOrderById($id);

            header("Location: /admin/order");
        }

        require_once (ROOT. '/views/admin_order/delete.php');

        return true;
    }

}