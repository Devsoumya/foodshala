<?php
include 'include/common.php';
if(isset($_SESSION['userId'])) {
    header('Location: index.php');
}
if(isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM users WHERE email = ? AND password = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$email, $password]);
    $user = $stmt->fetch();
    if($user) {

        //start session and set user session data
        session_start();
        $_SESSION['userId'] = $user['id'];
        $_SESSION['name'] = $user['name'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['userType'] = $user['userType'];
        $_SESSION['preference'] = $user['preference'];
        $_SESSION['mobile'] = $user['mobile'];

        //redirect user corresponding to userType (restaurant or customer)
        if ($user['userType'] == 2 ){
            $sql = "SELECT * FROM restaurants WHERE userID = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$user['id']]);
            $restaurant = $stmt->fetch();
            $_SESSION['restaurantId'] = $restaurant['id'];
            $_SESSION['name'] = $restaurant['name'];
            header('Location: restaurant-menu.php');
        } elseif ($user['userType'] == 1) {
            header('Location: restaurants.php');
        } else {
            header('Location: logout.php');
        }
    } else {
        $incorrectPassword = 1;
        ?>
        <div class="container p-2">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong>Sorry!</strong> Invalid Email Or Password.
                    </div>
                </div>
            </div>
        </div>
        <?php

    }
}
?>

<div class="container p-2">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card">
                <div class="card-body">
                    <form method="post">
                        <div class="form-group">
                            <label for="exampleInputEmail1"><b>Email address</b></label>
                            <input required type="email" class="form-control" name="email" placeholder="Enter email">
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                        </div>
                        <div class="form-group">
                            <label><b>Password</b></label>
                            <input required type="password" class="form-control" name="password" placeholder="Password">
                        </div>
                        <button name="login" type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
