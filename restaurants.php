<?php
include 'include/common.php';
if(isset($_SESSION['userType']) && $_SESSION['userType'] == 2) {
    header('Location: restaurant-menu.php');
}
$sql = "SELECT * FROM restaurants";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$restaurants = $stmt->fetchAll();
?>
<div class="container">
    <?php
    foreach ($restaurants as $restaurant) {
    ?>
        <div class="card margin-t-1">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-2 col-6 col-sm-6">
                        <img src="assets/img/dummy-restaurant.jpg" width="100%" height="auto" class="rounded">
                    </div>
                    <div class="col-md-4 col-6 col-sm-6">
                        <h4 class="brand-red-color"><b><?php echo $restaurant['name']; ?></b></h4>
                        <b><?php echo $restaurant['cusine']; ?></b><br>
                        3<i class="fas fa-star green-color"></i> <i><?php echo(rand(90,999)." ratings");
                            ?></i>
                    </div>

                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-2 col-6 col-sm-6">
                        <b>Cost for Two :</b>
                    </div>
                    <div class="col-md-2 col-6 col-sm-6">
                        <?php echo !empty($restaurant['costForTwo'])?("₹".$restaurant['costForTwo']):"NA"; ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2 col-6 col-sm-6">
                        <b>Cusines :</b>
                    </div>
                    <div class="col-md-2 col-6 col-sm-6">
                        North Indian, Mughlai
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 col-12 col-sm-12">
                        <form action="menu.php" method="get">
                            <input type="hidden" value="<?php echo $restaurant['id']; ?>" name="id">
                            <button class="btn btn-success btn-block">Order Now</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php
    }
    ?>

</div>
