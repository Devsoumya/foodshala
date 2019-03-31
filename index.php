<?php
include 'include/common.php';
?>
<div class="container mt-3">
    <div class="text-center">
        <h2>Find the best restaurants, cafés, and bars in Delhi NCR</h2>
    </div>

    <div id="myCarousel" class="carousel slide" data-ride="carousel">

        <!-- Indicators -->
        <ul class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ul>

        <!-- The slideshow -->
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="/assets/img/home-slider-1.jpeg" alt="Los Angeles" width="1500" height="400">
            </div>
            <div class="carousel-item">
                <img src="/assets/img/home-slider-1.jpeg" alt="Chicago" width="1500" height="400">
            </div>
            <div class="carousel-item">
                <img src="/assets/img/home-slider-1.jpeg" alt="New York" width="1500" height="400">
            </div>
        </div>

        <!-- Left and right controls -->
        <a class="carousel-control-prev" href="#myCarousel" data-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#myCarousel" data-slide="next">
            <span class="carousel-control-next-icon"></span>
        </a>
    </div>

    <div class="row margin-t-1">
        <div class="col-md-4 offset-md-4">
            <a href="/restaurants.php">
                <button class="btn btn-primary btn-block">Order Now</button>
            </a>
        </div>
    </div>

</div>
