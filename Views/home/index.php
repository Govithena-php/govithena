<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" type="image/x-icon" href="<?php echo IMAGES ?>/favicon.png">

    <title>Govithena | Home</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />

    <link rel="stylesheet" href="<?php echo CSS ?>home/home.css">
    <link rel="stylesheet" href="<?php echo CSS ?>home/hero.css">
    <link rel="stylesheet" href="<?php echo CSS ?>/variables.css">
    <link rel="stylesheet" href="<?php echo CSS ?>/ui.css">

</head>

<body>

    <?php require_once(COMPONENTS . 'navbar.php'); ?>

    <section class="[ hero ]">

        <div class="[ scroll__indicator ]"></div>

        <div class="[ image__wrapper ]">
            <div class="[ overlay ]"></div>
            <img id="1" show="true" src="Webroot/images/bg1.jpg" alt="bg" />
            <img id="2" show="false" src="Webroot/images/bg2.jpg" alt="bg" />
            <img id="3" show="false" src="Webroot/images/bg3.jpg" alt="bg" />
            <img id="4" show="false" src="Webroot/images/bg4.jpg" alt="bg" />
            <img id="5" show="false" src="Webroot/images/bg5.jpg" alt="bg" />
        </div>

        <div class="[ content ]">
            <div class="[ header ]">
                <p>Invest on farmers and their community,</p>
                <h1>Earn <span>12%</span> interest per year.</h1>
            </div>

            <?php
            if (Session::isLoggedIn()) {
            ?>
                <form class="[ search ]" action="<?php echo URLROOT . "/search/" ?>" method="post">
                    <input type="text" name="search_text" class="" placeholder="search by: name / category / location" />
                    <button type="submit" name="search" value="search" class="">search</button>
                </form>
            <?php
            } else {
            ?>
                <div class="[ search ]">
                    <a class="sigin__btn" href="<?php echo URLROOT . "/signin" ?>">Sign In</a>
                    <a class="signup__btn" href="<?php echo URLROOT . "/signup" ?>">Sign Up</a>
                </div>
            <?php
            }
            ?>





        </div>







        <!-- <div class="[ hero__content_layer ]">
            <div class="[ container ] [ h-full ]">
                <div class="[ text-light ] [ hero__content ]">
                    <p class="[ fs-4 ]">Invest on farmers and their community,</p>
                    <h1 class="[ fs-9 ]">Earn <span>12%</span> interest per year.</h1>

                    <form class="[ search__bar ]" action="<?php echo URLROOT . "/search/" ?>" method="post">
                        <input type="text" name="search_text" class="" placeholder="search by: name / category / location" />
                        <button type="submit" name="search" value="search" class="">search</button>
                    </form>
                </div>
            </div>
        </div> -->
    </section>

    <section class="[ container ]">

        <?php if (Session::isLoggedIn()) { ?>
            ?>
            <!-- <div class="[ text-center ]">
                <h1 class="[ fs-7 ]">Welcome <?php echo $_SESSION['uid'] ?></h1>
            </div> -->
        <?php

        } ?>
    </section>


    <script src="<?php echo JS ?>/navbar/navbar.js"></script>
    <script src="<?php echo JS ?>/home/hero.js"></script>
</body>

</html>