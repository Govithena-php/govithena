<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Govithena | Home</title>

    <link rel="icon" type="image/x-icon" href="<?php echo IMAGES ?>/favicon.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
    <link rel="stylesheet" href="<?php echo CSS ?>/base.css">
    <link rel="stylesheet" href="<?php echo CSS ?>/grid.css">
    <link rel="stylesheet" href="<?php echo CSS ?>home/hero.css">
    <link rel="stylesheet" href="<?php echo CSS ?>home/home.css">

</head>

<body>

    <?php require_once(COMPONENTS . 'navbar.php'); ?>

    <div class="[ hero ]">

        <div class="[ scroll__indicator ]"></div>

        <div class="[ image__wrapper ]">
            <div class="[ overlay ]"></div>
            <img id="1" show="true" src="Webroot/images/bg1.jpg" alt="bg" />
            <img id="2" show="false" src="Webroot/images/bg2.jpg" alt="bg" />
            <img id="3" show="false" src="Webroot/images/bg3.jpg" alt="bg" />
            <img id="4" show="false" src="Webroot/images/bg4.jpg" alt="bg" />
            <img id="5" show="false" src="Webroot/images/bg5.jpg" alt="bg" />
        </div>

        <div class="[ container content ]" container-type="section">
            <div class="[ heading ]">
                <p>Invest on farmers and their community,</p>
                <h1>Earn <span>12%</span> interest per year.</h1>
            </div>

            <?php
            if (isset($currentUser)) {
            ?>
                <form class="[ search ]" id="searchForm" action="<?php echo URLROOT . "/search/" ?>" method="get">
                    <input type="text" name="terms" id="terms" class="" placeholder="search by: name / category / location" />
                    <button type="submit" class="">search</button>
                </form>
                <!-- <div class="search">
                    <input type="text" name="search_text" id="search_text" class="" placeholder="search by: name / category / location" />
                    <button type="button" id="searchBtn" name="search" value="search" class="">search</button>
                </div> -->
            <?php
            } else {
            ?>
                <div class="[ search ]">
                    <a class="sigin__btn" href="<?php echo URLROOT . "/auth/signin" ?>">Sign In</a>
                    <a class="signup__btn" href="<?php echo URLROOT . "/auth/signup" ?>">Sign Up</a>
                </div>
            <?php
            }
            ?>
        </div>
    </div>


    <?php if (isset($currentUser)) {
    ?>
        <?php
        // var_dump($_SESSION['user']);
        // die();
        ?>
        <!-- <div class="[ container ]" container-type="section">
            <div class="[ text-center ]">
                <h1 class="[ fs-4 ]">Welcome <?php echo $_SESSION['username'] ?></h1>
            </div>
        </div> -->
    <?php
    }
    ?>
    <?php
    $numberOfGigs = 400;
    $numberOfCategories = 20;
    ?>
    <div class="[ container ][ title ]" container-type="section">

        <?php

        if (isset($currentUser)) {
            if ($currentUser->isInvestor()) {
                echo " <h1>Investor</h1>";
            }

            if ($currentUser->isFarmer()) {
                echo " <h1>Farmer</h1>";
            }

            if ($currentUser->isAdmin()) {
                echo " <h1>Admin</h1>";
            }

            if ($currentUser->isAgrologist()) {
                echo " <h1>Agrologist</h1>";
            }

            if ($currentUser->isTechAssistant()) {
                echo " <h1>Tech Assistant</h1>";
            }
        }



        ?>

        <h4><span><?php echo $numberOfGigs; ?>+</span> gigs in <span><?php echo $numberOfCategories; ?>+</span> categories.</h4>
        <h1>Invest in the agreculture of Sri Lanka.</h1>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic facere atque accusantium laborum<br>eligendi at voluptatibus accusamus.</p>
    </div>


    <div class="[ backdrop_gray ]">
        <div class="[ container ][ description ]" container-type="section">
            <div class="[ header ]">
                <h1>Lorem ipsum dolor sit amet con sectetur<br> adipisicing elit.</h1>
            </div>
            <div class="[ content ][ box ]">
                <ul class="[ grid ]" gap="3" lg="2">
                    <li>
                        <H3><i class="fa-regular fa-circle-check"></i>INVESTOR</H3>
                        <p>1Lorem ipsum dolor, sit amet consectetur adipisicing elit. Mollitia, natus libero sed ab, voluptates pariatur unde minima dolorum praesentium explicabo nemo nihil corrupti, odit saepe suscipit. Commodi fugit et ipsum.</p>
                    </li>
                    <li>
                        <H3><i class="fa-regular fa-circle-check"></i>FARMER</H3>
                        <p>2Lorem ipsum dolor, sit amet consectetur adipisicing elit. Mollitia, natus libero sed ab, voluptates pariatur unde minima dolorum praesentium explicabo nemo nihil corrupti, odit saepe suscipit. Commodi fugit et ipsum.</p>
                    </li>
                    <li>
                        <H3><i class="fa-regular fa-circle-check"></i>AGROLOGIST</H3>
                        <p>3Lorem ipsum dolor, sit amet consectetur adipisicing elit. Mollitia, natus libero sed ab, voluptates pariatur unde minima dolorum praesentium explicabo nemo nihil corrupti, odit saepe suscipit. Commodi fugit et ipsum.</p>
                    </li>
                    <li>
                        <H3><i class="fa-regular fa-circle-check"></i>TECHNICAL ASSISTANT</H3>
                        <p>4Lorem ipsum dolor, sit amet consectetur adipisicing elit. Mollitia, natus libero sed ab, voluptates pariatur unde minima dolorum praesentium explicabo nemo nihil corrupti, odit saepe suscipit. Commodi fugit et ipsum.</p>
                    </li>
                </ul>
            </div>
        </div>
    </div>



    <div class="[ container ][ categories ]" container-type="section">
        <div class="[ header ]">
            <h2>Popular Categories</h2>
        </div>
        <div class="[ grid ]" gap="2" md="2" lg="3">

            <div class="[ relative ][ card ]" order="2">
                <div class="[ absolute ][ image ]">
                    <img src="<?php echo IMAGES ?>/temp/17.jpg" alt="category" />
                </div>
                <div class="[ content ]">
                    <h3>Vegetables</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quae.</p>
                </div>
            </div>

            <div class="[ relative ][ card ]" order="1">
                <div class="[ absolute ][ image ]">
                    <img src="<?php echo IMAGES ?>/temp/18.jpg" alt="category" />
                </div>
                <div class="[ content ]">
                    <h3>Fruits</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quae.</p>
                </div>
            </div>

            <div class="[ relative ][ card ]" order="3">
                <div class="[ absolute ][ image ]">
                    <img src="<?php echo IMAGES ?>/temp/cinnamon.jpg" alt="category" />
                </div>
                <div class="[ content ]">
                    <h3>Spices</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quae.</p>
                </div>
            </div>

            <div class="[ relative ][ card ]" order="4">
                <div class="[ absolute ][ image ]">
                    <img src="<?php echo IMAGES ?>/temp/red rice.jpg" alt="category" />
                </div>
                <div class="[ content ]">
                    <h3>Grains</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quae.</p>
                </div>
            </div>

            <div class="[ relative ][ card ]" order="5">
                <div class="[ absolute ][ image ]">
                    <img src="<?php echo IMAGES ?>/temp/15.jpg" alt="category" />
                </div>
                <div class="[ content ]">
                    <h3>Category 1</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quae.</p>
                </div>
            </div>

            <div class="[ relative ][ card ]" order="6">
                <div class="[ absolute ][ image ]">
                    <img src="<?php echo IMAGES ?>/temp/15.jpg" alt="category" />
                </div>
                <div class="[ content ]">
                    <h3>Category 1</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quae.</p>
                </div>
            </div>

        </div>
    </div>

    <div class="[ container ][ services ]" container-type="section">
        <div class="[ header ]">
            <h2>Why Us?</h2>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Modi, facere! Maiores sapiente<br>aliquid eius tenetur numquam id mollitia<br>voluptate ducimus facilis atque ab blanditiis aperiam, ipsa maxime amet, nemo alias.</p>
        </div>

        <div class="[ grid ]" gap="2" md="2" lg="3">
            <div class="[ box ]">
                <i class="fa-solid fa-headset"></i>

                <div class="[ content ]">
                    <h3>Service 1</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quae.</p>
                </div>
            </div>
            <div class="[ box ]">
                <i class="fa-solid fa-headset"></i>

                <div class="[ content ]">
                    <h3>Service 1</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quae.</p>
                </div>
            </div>
            <div class="[ box ]">
                <i class="fa-solid fa-headset"></i>

                <div class="[ content ]">
                    <h3>Service 1</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quae.</p>
                </div>
            </div>
            <div class="[ box ]">
                <i class="fa-solid fa-headset"></i>

                <div class="[ content ]">
                    <h3>Service 1</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quae.</p>
                </div>
            </div>
            <div class="[ box ]">
                <i class="fa-solid fa-headset"></i>

                <div class="[ content ]">
                    <h3>Service 1</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quae.</p>
                </div>
            </div>
            <div class="[ box ]">
                <i class="fa-solid fa-headset"></i>

                <div class="[ content ]">
                    <h3>Service 1</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quae.</p>
                </div>
            </div>
        </div>

    </div>
    </div>











    <!-- <div class="[ container ][ services ]" container-type="section">
        <div class="[ header ]">
            <h2>Our Services</h2>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Modi, facere! Maiores sapiente aliquid eius tenetur numquam id mollitia voluptate ducimus facilis atque ab blanditiis aperiam, ipsa maxime amet, nemo alias.</p>
        </div>

        <div class="[  ]">

        </div>

    </div> -->

    <!-- <div class="[ container ][ services ]" container-type="section">
        <div class="[ header ]">
            <h2>Our Services</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quae.</p>
        </div>

        <div class="[ content grid ]" gap="1" lg="2">
            <div class="[ content ]">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quae.</p>
                <ul>
                    <li>
                        <h4><i class="fa-regular fa-circle-check"></i>Lorem ipsum dolor sit amet consectetur adipisicing elit.</h4>
                        <p>2Lorem ipsum dolor, sit amet consectetur adipisicing elit. Mollitia, natus libero sed ab, voluptates pariatur.</p>
                    </li>
                    <li>
                        <h4><i class="fa-regular fa-circle-check"></i>Lorem ipsum dolor sit amet consectetur adipisicing elit.</h4>
                        <p>2Lorem ipsum dolor, sit amet consectetur adipisicing elit. Mollitia, natus libero sed ab, voluptates pariatur.</p>
                    </li>
                    <li>
                        <h4><i class="fa-regular fa-circle-check"></i>Protected payments, every time</h4>
                        <p>Always know what you'll pay upfront. Your payment isn't released without your consent.</p>
                    </li>
                    <li>
                        <h4><i class="fa-regular fa-circle-check"></i>24/7 support</h4>
                        <p>Questions? Our round-the-clock support team is available to help anytime, anywhere.</p>
                    </li>
                </ul>
            </div>
            <div class="[ image ]">
                <img src="<?php echo IMAGES ?>/temp/11.jpg" alt="category" />
            </div>
        </div>
    </div> -->

    <!-- <div class="[ backdrop_gray ]">
        <div class="[ container ][  ]" container-type="section">
            <div class="[ header ]">
                <h2>Trust and Safety</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quae.</p>
            </div>
            <div class="[ content ]">

            </div>
        </div>

    </div> -->

    <?php require_once(COMPONENTS . 'footer.php'); ?>



    <script src="<?php echo JS ?>/search.js"></script>
    <script src="<?php echo JS ?>/navbar/navbar.js"></script>
    <script src="<?php echo JS ?>/home/hero.js"></script>
</body>

</html>