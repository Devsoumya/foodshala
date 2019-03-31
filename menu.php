<?php
include 'include/common.php';
if(isset($_GET['id'])) {
    $sql = "SELECT * FROM restaurants where id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$_GET['id']]);
    $restaurant = $stmt->fetch();
    if(!$restaurant) {
        header('Location: index.php');
    }
    $restaurantName = $restaurant['name'];
    $restaurantCusine = $restaurant['cusine'];

    $sql = "SELECT * FROM menu where restaurantId = ? and isDeleted=0";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$_GET['id']]);
    $menu = $stmt->fetchAll();
    $categoryWiseItems = array();
    foreach ($menu as $item) {
        $categoryWiseItems[$item['category']][] = $item;
    }
} else {
    header('Location: index.php');
}
?>
    <div class="container">
        <div class="row margin-t-1 margin-b-1">
            <div class="col-md-2 col-4 col-sm-4">
                <img src="assets/img/dummy-restaurant.jpg" width="75%" height="auto" class="rounded">
            </div>
            <div class="col-md-4 col-6 col-sm-6">
                <h4 class="brand-red-color"><b><?php echo $restaurant['name']; ?></b></h4>
                <b><?php echo $restaurant['cusine']; ?></b><br>
            </div>
            <div class="col-md-2 col-2 col-sm-2">
                <h4 class="text-primary"><i class="fas fa-cart-plus text-primary"></i></h4>
                <h5><b>₹<span id="cartTotal">0</span></b></h5>
            </div>
        </div>
        <div class="row margin-b-1">
            <div class="offset-md-2 col-md-5 col-12 col-sm-12">
                <form action="" method="post">
                    <input type="hidden" value="" id="cart">
                    <button type="submit" class="btn-success btn btn-block">Place Order</button>
                </form>
            </div>
        </div>
        <?php
        $categoryCount = 0;
        foreach ($categoryWiseItems as $category=>$categoryWiseItem) {
            $categoryCount++;
            ?>
            <div class="width-75" id="<?php echo "parent".$categoryCount; ?>">
                <div class="card">
                    <div class="card-header" id="<?php echo "main".$categoryCount; ?>">
                        <h5 class="mb-0">
                            <button class="btn btn-link" data-toggle="collapse" data-target="#<?php echo "data".$categoryCount; ?>" aria-expanded="true" aria-controls="<?php echo "data".$categoryCount; ?>">
                                <b><?php echo $category; ?></b>
                            </button>
                        </h5>
                    </div>

                    <div id="<?php echo "data".$categoryCount; ?>" class="collapse show" aria-labelledby="<?php echo "main".$categoryCount; ?>" data-parent="#<?php echo "parent".$categoryCount; ?>">
                        <div class="card-body">
                            <?php
                            foreach ($categoryWiseItem as $item) {
                                ?>
                                <div class="row margin-t-1">
                                    <div class="col-md-1 col-1 col-sm-1 text-right">
                                        <?php
                                        if($item['type'] == 1) {
                                            $classColor = "green";
                                            $iconCode = "leaf";
                                        } else if($item['type'] == 2) {
                                            $classColor = "golden";
                                            $iconCode = "egg";
                                        } else if($item['type'] == 3) {
                                            $classColor = "red";
                                            $iconCode = "dot-circle";
                                        }
                                        ?>
                                        <i class="fas fa-<?php echo $iconCode;?> <?php echo $classColor;?>-color"></i>
                                    </div>
                                    <div class="col-md-3 col-4 col-sm-4">
                                        <b><?php echo $item ['name'];?></b>
                                    </div>
                                    <div class="col-md-2 col-2 col-sm-2">
                                        ₹ <?php echo $item ['cost'];?>
                                    </div>
                                    <div class="col-md-2 col-5 col-sm-5">
                                        <button class="btn btn-sm btn-success" onclick="changeItemQuantity('<?php echo $item ['id'];?>','1','<?php echo $item ['cost'];?>')"> <i class="fas fa-minus"></i></button>
                                        <button class="btn btn-sm btn-light" disabled> <b><div id="<?php echo "item".$item ['id'];?>">0</div></b></button>
                                        <button class="btn btn-sm btn-success" onclick="changeItemQuantity('<?php echo $item ['id'];?>','2','<?php echo $item ['cost'];?>')"><i class="fas fa-plus"></i></button>
                                    </div>
                                </div>
                                <?php
                            }
                            ?>

                        </div>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>

    </div>


