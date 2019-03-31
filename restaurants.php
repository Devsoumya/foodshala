<?php
include 'include/common.php';
if(isset($_SESSION) && $_SESSION['userType'] == 2) {
    header('Location: restaurant-menu.php');
}
?>
<div class="container">
    <div class="card margin-t-1">
        <div class="card-header">
            <div class="row">
                <div class="col-md-2 col-6 col-sm-6">
                    <img src="assets/img/dummy-restaurant.jpg" width="100%" height="auto" class="rounded">
                </div>
                <div class="col-md-4 col-6 col-sm-6">
                    <h4 class="brand-red-color"><b>Handi Xpress & Restaurat</b></h4>
                    <b>MG Road, Gurgaon</b><br>
                    3<i class="fas fa-star green-color"></i> <i>(594 reviews)</i>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-2 col-6 col-sm-6">
                    <b>Cost for Two :</b>
                </div>
                <div class="col-md-2 col-6 col-sm-6">
                    $500
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
                    <a href="menu.php"><button class="btn btn-success btn-block">Order Now</button></a>
                </div>
            </div>
        </div>
    </div>
</div>
