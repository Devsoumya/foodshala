<?php
ini_set('display_errors',1);

        include 'connection.php';
        if(!isset($_SESSION))
        {
            session_start();
        }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>FoodShala</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css?family=Titillium+Web" rel="stylesheet">
    <link rel="stylesheet" href="assets/bootstrap.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/custom.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="assets/custom.js"></script>

</head>

<body>
<nav class="navbar navbar-expand-sm bg-danger navbar-dark">

    <a class="navbar-brand" href="index.php">
        <img src="assets/img/logo.png" alt="Logo" style="width:150px;">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Links -->
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <?php
        if(isset($_SESSION['userType']) && $_SESSION['userType']==1) {
        ?>
            <div class="navbar-nav">
                <a class="nav-item nav-link active" href="restaurants.php">Find Restaurants <span class="sr-only">(current)</span></a>
                <a class="nav-item nav-link" href="order.php">My Orders<span class="sr-only">(current)</span></a>
            </div>
        <?php
        } elseif(isset($_SESSION['userType']) && $_SESSION['userType']==2) {
            ?>
            <div class="navbar-nav">
                <a class="nav-item nav-link active" href="restaurant-menu.php">My Menu <span class="sr-only">(current)</span></a>
                <a class="nav-item nav-link" href="order-details.php">My Orders<span class="sr-only">(current)</span></a>
            </div>
            <?php
        } else {
            ?>
            <div class="navbar-nav">
                <a class="nav-item nav-link" href="restaurants.php">Find Restaurants <span class="sr-only">(current)</span></a>
            </div>
            <?php
        }
        ?>

        <ul class="nav navbar-nav ml-auto">
            <?php
            if(isset($_SESSION['userId'])) {
                ?>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php"> <i class="fas fa-sign-in-alt"></i> Logout</a>
                </li>
                <?php
            } else {
                ?>
                <li class="nav-item">
                    <a class="nav-link" href="login.php"> <i class="fas fa-sign-in-alt"></i> Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="signup.php"> <i class="fas fa-user-plus"></i></i> Signup</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="register_restaurant.php"> <i class="fas fa-plus"></i></i> Add Restaurant</a>
                </li>
                <?php
            }
            ?>
        </ul>
    </div>


</nav>
</body>

</html>