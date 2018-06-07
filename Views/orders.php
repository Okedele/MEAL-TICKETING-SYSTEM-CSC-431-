<?php
    require_once('../Model/OrderModel.php');
    session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/bootstrap-material-design-font/css/material.css">
    <link rel="stylesheet" href="../assets/tether/tether.min.css">
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/dropdown/css/style.css">
    <link rel="stylesheet" href="../assets/animate.css/animate.min.css">
    <link rel="stylesheet" href="../assets/theme/css/style.css">
    <link rel="stylesheet" href="../assets/mobirise/css/mbr-additional.css" type="text/css">
    <link rel="stylesheet" href="../css/styles.css">
    
    <title>Order Now!</title>
    <style>
        .cd-top.cd-top--show {
            visibility: visible;
            opacity: 1;
        }
        .cd-top.cd-top--show, .cd-top.cd-top--fade-out, .cd-top:hover {
            -webkit-transition: opacity .3s 0s,visibility 0s 0s,background-color .3s 0s;
            transition: opacity .3s 0s,visibility 0s 0s,background-color .3s 0s;
        }
        @media only screen and (min-width: 768px){
        .cd-top {
            right: 20px;
            bottom: 20px;
        }
        .cd-top {
            display: inline-block;
            height: 40px;
            width: 40px;
            position: fixed;
            bottom: 40px;
            right: 10px;
            -webkit-box-shadow: 0 0 10px rgba(0,0,0,.05);
            box-shadow: 0 0 10px rgba(0,0,0,.05);
            overflow: hidden;
            text-indent: 100%;
            white-space: nowrap;
            background: rgba(232,98,86,.8) url('../images/cd-top-arrow.svg') no-repeat center 50%;
            visibility: hidden;
            opacity: 0;
            -webkit-transition: opacity .3s 0s,visibility 0s .3s,background-color .3s 0s;
            transition: opacity .3s 0s,visibility 0s .3s,ba
            ckground-color .3s 0s;
        }
        }
        a {
            color: #e86256;
            text-decoration: none;
        }
        .img-fluid{
            height: 119.91px;
        }
        h6{
            font-size: small;
        }
        .badge {
            display: inline-block;
            padding: 0.25em 0.4em;
            font-size: 75%;
            font-weight: 700;
            line-height: 1;
            text-align: center;
            white-space: nowrap;
            vertical-align: baseline;
            border-radius: 0.25rem;
        }
        .badge-pill {
            padding-right: 0.6em;
            padding-left: 0.6em;
            border-radius: 10rem;
        }
        .badge-danger {
            color: #fff;
            background-color: #dc3545;
        }

        .badge-danger[href]:hover, .badge-danger[href]:focus {
            color: #fff;
            text-decoration: none;
            background-color: #bd2130;
        }
    </style>

    <script>
        function checkit(){
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                if(this.responseText > 0){
                    window.location = "checkout.php";
                } else{
                    alert("No item in Cart");
                    window.location = "orders.php";
                }
            }
        };
        xmlhttp.open("POST", "check.php", true);
        xmlhttp.send();
    }
     </script>
</head>

<body id="body">
    <a href="#0" class="cd-top js-cd-top cd-top--show cd-top--fade-out">Top</a>
    <section id="ext_menu-f">

        <nav class="navbar navbar-dropdown">
            <div class="container">

                <div class="mbr-table">
                    <div class="mbr-table-cell">

                        <div class="navbar-brand">

                            <span class="navbar-caption"><a class="nav-link link" href="../index.php">IYA MORIYA</a></span>
                        </div>

                    </div>

                    <div class="mbr-table-cell">

                        <button class="navbar-toggler pull-xs-right hidden-md-up" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar">
                        <div class="hamburger-icon"></div>
                    </button>

                        <ul class="nav-dropdown collapse pull-xs-right nav navbar-nav navbar-toggleable-sm" id="exCollapsingNavbar">
                            <li class="nav-item"><a class="nav-link link" href="#Traditional">TRADITIONAL</a></li>
                            <li class="nav-item"><a class="nav-link link" href="#Continental">CONTINENTAL</a></li>
                            <li class="nav-item"><a class="nav-link link" href="#Assorted">ASSORTED</a></li>
                            <li class="nav-item"><a class="nav-link link" href="#Drinks">DRINKS</a></li>
                            <li class="nav-item"><a class="nav-link link" href="" onclick="checkit()"><i style="font-size:24px" class="fa">&#xf07a;</i>
                            <?php if(!empty($_SESSION["shopping_cart"])){ ?>
                            <sup><span class="badge badge-danger"><?= $count = count($_SESSION["shopping_cart"]); ?></span></sup>
                            <?php } else { ?>
                            <sup><span class="badge badge-danger">0</span></sup>
                            <?php } ?>
                            </a></li>
                        </ul>
                        <button hidden="" class="navbar-toggler navbar-close" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar">
                        <div class="close-icon"></div>
                    </button>

                    </div>
                </div>

            </div>
        </nav>

    </section>
    <div style="margin-top: 110px; border: 1px solid #cccccc; box-sizing: border-box; transition: transform .1s; box-shadow: 0 2px 6px rgba(0, 0, 0, .2); background-color: #fff; border-radius: 4px; margin-right: 20px; margin-left:20px;">
        <button type='button' class='close' onclick='$(this).parent().remove();'>&times;</button>
        <h5 class="text-danger" style="padding-left: 40%; margin-top: 8px;">All prices are based on one serving only!</h5>
        </div>

        <div class="clearfix" id="Traditional" style="margin-top: 110px;box-sizing: border-box; transition: transform .1s; box-shadow: 0 2px 6px rgba(0, 0, 0, .2); background-color: #fff; padding: 20px; border-radius: 4px; margin-right: 20px; margin-left:20px; margin-bottom: 20px;">
                    <h2 class="center-block" style="width: 100%; max-width: 265px; font-size: 24px; padding: 0 35px; background-image: url(../images/decor_elem_left_red.svg), url(../images/decor_elem_right_red.svg); letter-spacing: 0.5px; text-align: center; background-position: -0.5% center, 100% center; background-size: 30px; background-repeat: no-repeat; margin-bottom: 25px; margin-top: 15px; color: #323232; font-family: 'Open Sans', sans-serif;">TRADITIONAL</h2>
                    <div class="col-xs-12" style="width: 100%; height: 3px; background: 0 0 url(../images/border.png) repeat-x; margin-bottom: 25px; margin-top: 15px; "></div>
                <div class="row">
                    <?php 
                        $model = new OrderModel;
                        echo $model->getTraditional(); ?>
                </div>
        </div>


        <div class="clearfix" id="Continental" style="margin-top: 110px;box-sizing: border-box; transition: transform .1s; box-shadow: 0 2px 6px rgba(0, 0, 0, .2); background-color: #fff; padding: 20px; border-radius: 4px; margin-right: 20px; margin-left:20px; margin-bottom: 20px;">
                    <h2 class="center-block" style="width: 100%; max-width: 265px; font-size: 24px; padding: 0 35px; background-image: url(../images/decor_elem_left_red.svg), url(../images/decor_elem_right_red.svg); letter-spacing: 0.5px; text-align: center; background-position: -0.5% center, 100% center; background-size: 30px; background-repeat: no-repeat; margin-bottom: 25px; margin-top: 15px; color: #323232; font-family: 'Open Sans', sans-serif;">CONTINENTAL</h2>
                    <div class="col-xs-12" style="width: 100%; height: 3px; background: 0 0 url(../images/border.png) repeat-x; margin-bottom: 25px; margin-top: 15px; "></div>
                <div class="row">
                    <?php
                        $model1 = new OrderModel;
                        echo $model1->getContinental(); ?>
            </div>
        </div>


        <div class="clearfix" id="Assorted" style="margin-top: 110px;box-sizing: border-box; transition: transform .1s; box-shadow: 0 2px 6px rgba(0, 0, 0, .2); background-color: #fff; padding: 20px; border-radius: 4px; margin-right: 20px; margin-left:20px; margin-bottom: 20px;">
                    <h2 class="center-block" style="width: 100%; max-width: 265px; font-size: 24px; padding: 0 35px; background-image: url(../images/decor_elem_left_red.svg), url(../images/decor_elem_right_red.svg); letter-spacing: 0.5px; text-align: center; background-position: -0.5% center, 100% center; background-size: 30px; background-repeat: no-repeat; margin-bottom: 25px; margin-top: 15px; color: #323232; font-family: 'Open Sans', sans-serif;">ASSORTED</h2>
                    <div class="col-xs-12" style="width: 100%; height: 3px; background: 0 0 url(../images/border.png) repeat-x; margin-bottom: 25px; margin-top: 15px; "></div>
                <div class="row">
                    <?php 
                        $model2 = new OrderModel;
                        echo $model2->getAssorted(); ?>
                </div>
        </div>


        <div class="clearfix" id="Drinks" style="margin-top: 110px;box-sizing: border-box; transition: transform .1s; box-shadow: 0 2px 6px rgba(0, 0, 0, .2); background-color: #fff; padding: 20px; border-radius: 4px; margin-right: 20px; margin-left:20px; margin-bottom: 20px;">
                    <h2 class="center-block" style="width: 100%; max-width: 265px; font-size: 24px; padding: 0 35px; background-image: url(../images/decor_elem_left_red.svg), url(../images/decor_elem_right_red.svg); letter-spacing: 0.5px; text-align: center; background-position: -0.5% center, 100% center; background-size: 30px; background-repeat: no-repeat; margin-bottom: 25px; margin-top: 15px; color: #323232; font-family: 'Open Sans', sans-serif;">DRINKS</h2>
                    <div class="col-xs-12" style="width: 100%; height: 3px; background: 0 0 url(../images/border.png) repeat-x; margin-bottom: 25px; margin-top: 15px; "></div>
                <div class="row">
                    <?php 
                        $model3 = new OrderModel;
                        echo $model3->getDrinks(); ?>
                </div>
        </div>

    <script src="../assets/web/assets/jquery/jquery.min.js"></script>
    <script src="../assets/tether/tether.min.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/smooth-scroll/smooth-scroll.js"></script>
    <script src="../assets/dropdown/js/script.min.js"></script>
    <script src="../assets/touch-swipe/jquery.touch-swipe.min.js"></script>
    <script src="../assets/viewport-checker/jquery.viewportchecker.js"></script>
    <script src="../assets/theme/js/script.js"></script>
    <script src="../js/main.js"></script>



</body>

</html>