<?php
include 'include/common.php';
if($_SESSION['userType'] != 1) {
    header('Location: index.php');
}
if(isset($_POST['placeOrder'])) {
    $restaurantId = $_POST['restaurantId'];
    $cartDetails = $_POST['cart'];
    $customerId = $_SESSION['userId'];
    $sql = "INSERT INTO orders(customerId,restaurantId,cart,dateTime,status) VALUES(?,?,?,?,?)";
    $status = $pdo->prepare($sql)->execute([$customerId, $restaurantId, $cartDetails, date('Y-m-d H:i:s'), '1']);
    if($status) {
        ?>
        <div class="container p-1">
            <div class="alert alert-primary alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                Order Placed Successfully! <strong>Enjoy eating !</strong>
            </div>
        </div>
        <?php
    }
}

$orderSql = "SELECT t1.*, t2.name , t2.image as restaurantImage FROM orders as t1 
            INNER JOIN restaurants as t2 on t1.restaurantId = t2.id
            WHERE t1.customerId = ?           
            ORDER BY t1.datetime DESC";
$stmt = $pdo->prepare($orderSql);
$stmt->execute([$_SESSION['userId']]);
$orders = $stmt->fetchAll();
?>
<div class="container">
<?php
if(!$orders) {

} else {
    foreach ($orders as $key=>$order) {
        $cartDetails = json_decode($order['cart'],TRUE);
        if($cartDetails) {
            $items = array();
            $cart = array();
            $cost = 0;
            foreach ($cartDetails as $itemId => $quantity) {
                $orderSql = "SELECT * FROM menu WHERE id = (?)";
                $stmt = $pdo->prepare($orderSql);
                $stmt->execute([$itemId]);
                $itemFromDB = $stmt->fetch();
                $cart[$itemId]['quantity'] = $quantity;
                $cart[$itemId]['name'] = $itemFromDB['name'];
                $cart[$itemId]['cost'] = $itemFromDB['cost'];
                $cost += $quantity*$itemFromDB['cost'];

            }
            $order['totalCost'] = $cost;
            ?>


            <div class="card margin-t-1">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-2 col-6 col-sm-6">
                            <img src="<?php echo $order['restaurantImage']; ?>" width="100%" height="80px" class="rounded">
                        </div>
                        <div class="col-md-4 col-6 col-sm-6">
                            <h4 class="brand-red-color"><b><?php echo $order['name']; ?></b></h4>
                            <b><?php echo date('D, d-M, H:i', strtotime($order['dateTime'])); ?></b><br>
                            <i>₹ <?php echo $order['totalCost']; ?></i>
                        </div>

                    </div>
                </div>
                <div class="card-body">
                    <?php
                    foreach($cart as $itemDetails) {

                    ?>
                    <div class="row">
                        <div class="col-md-2 col-4 col-sm-4">
                            <b><?php echo $itemDetails['name']; ?></b>
                        </div>
                        <div class="col-md-2 col-4 col-sm-4">
                            <?php echo $itemDetails['quantity']; ?>
                        </div>
                        <div class="col-md-2 col-4 col-sm-4">
                            ₹ <?php echo ($itemDetails['cost'])*($itemDetails['quantity']); ?>
                        </div>
                    </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
            <?php
        }


    }
}
?>
</div>
