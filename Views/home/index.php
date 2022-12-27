<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" type="image/x-icon" href="<?php echo IMAGES ?>/favicon.png">

    <title>Govithena | Home</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />

    <link rel="stylesheet" href="<?php echo CSS ?>/base.css">
    <link rel="stylesheet" href="<?php echo CSS ?>home/hero.css">
    <link rel="stylesheet" href="<?php echo CSS ?>home/home.css">

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

        <div class="[ container content ]" continer-type="section">
            <div class="[ heading ]">
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
                    <a class="sigin__btn" href="<?php echo URLROOT . "/auth/signin" ?>">Sign In</a>
                    <a class="signup__btn" href="<?php echo URLROOT . "/auth/signup" ?>">Sign Up</a>
                </div>
            <?php
            }
            ?>
        </div>
    </section>


    <?php if (Session::isLoggedIn()) {
    ?>
        <section class="[ container ]" continer-type="section">
            <div class="[ text-center ]">
                <h1 class="[ fs-4 ]">Welcome <?php echo $_SESSION['username'] ?></h1>
            </div>
        </section>
    <?php
    }
    ?>

    <section class="[ container ][ description ]" continer-type="section">
        <div class="[ header ]">
            <h1>Lorem ipsum dolor sit amet con sectetur<br> adipisicing elit.</h1>
        </div>
        <div class="[ grid ]" lg="2">
            <div class="[ box ]">
                <ul>
                    <li>
                        <h4><i class="fa-regular fa-circle-check"></i>Lorem ipsum dolor sit amet consectetur adipisicing elit.</h4>
                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Mollitia, natus libero sed ab, voluptates pariatur unde minima dolorum praesentium explicabo nemo nihil corrupti, odit saepe suscipit. Commodi fugit et ipsum.</p>
                    </li>
                    <li>
                        <h4><i class="fa-regular fa-circle-check"></i>Lorem ipsum dolor sit amet consectetur adipisicing elit.</h4>
                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Mollitia, natus libero sed ab, voluptates pariatur unde minima dolorum praesentium explicabo nemo nihil corrupti, odit saepe suscipit. Commodi fugit et ipsum.</p>
                    </li>
                </ul>
            </div>

            <div class="[ box ]">
                <ul>
                    <li>
                        <h4><i class="fa-regular fa-circle-check"></i>Lorem ipsum dolor sit amet consectetur adipisicing elit.</h4>
                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Mollitia, natus libero sed ab, voluptates pariatur unde minima dolorum praesentium explicabo nemo nihil corrupti, odit saepe suscipit. Commodi fugit et ipsum.</p>
                    </li>
                    <li>
                        <h4><i class="fa-regular fa-circle-check"></i>Lorem ipsum dolor sit amet consectetur adipisicing elit.</h4>
                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Mollitia, natus libero sed ab, voluptates pariatur unde minima dolorum praesentium explicabo nemo nihil corrupti, odit saepe suscipit. Commodi fugit et ipsum.</p>
                    </li>
                </ul>
            </div>

        </div>
    </section>



    <section class="[ container ][ categories ]" continer-type="section">
        <div class="[ header ]">
            <h2>Popular Categories</h2>
        </div>
        <div class="[ grid ]" gap="2" md="2" lg="3">

            <div class="[ relative ][ card ]">
                <div class="[ absolute ][ image ]">
                    <img src="<?php echo IMAGES ?>/temp/5.jpg" alt="category" />
                </div>
                <div class="[ content ]">
                    <h3>Category 1</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quae.</p>
                </div>
            </div>

            <div class="[ relative ][ card ]">
                <div class="[ absolute ][ image ]">
                    <img src="<?php echo IMAGES ?>/temp/5.jpg" alt="category" />
                </div>
                <div class="[ content ]">
                    <h3>Category 1</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quae.</p>
                </div>
            </div>

            <div class="[ relative ][ card ]">
                <div class="[ absolute ][ image ]">
                    <img src="<?php echo IMAGES ?>/temp/5.jpg" alt="category" />
                </div>
                <div class="[ content ]">
                    <h3>Category 1</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quae.</p>
                </div>
            </div>

            <div class="[ relative ][ card ]">
                <div class="[ absolute ][ image ]">
                    <img src="<?php echo IMAGES ?>/temp/5.jpg" alt="category" />
                </div>
                <div class="[ content ]">
                    <h3>Category 1</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quae.</p>
                </div>
            </div>

            <div class="[ relative ][ card ]">
                <div class="[ absolute ][ image ]">
                    <img src="<?php echo IMAGES ?>/temp/5.jpg" alt="category" />
                </div>
                <div class="[ content ]">
                    <h3>Category 1</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quae.</p>
                </div>
            </div>

            <div class="[ relative ][ card ]">
                <div class="[ absolute ][ image ]">
                    <img src="<?php echo IMAGES ?>/temp/5.jpg" alt="category" />
                </div>
                <div class="[ content ]">
                    <h3>Category 1</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quae.</p>
                </div>
            </div>

        </div>
    </section>





















    <section id="categories" class="[ container categories]">
        <div class="[ header ]">
            <h2>Popular Categories</h2>
        </div>
        <div class="[ contnent ]">
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
        </div>
    </section>


    <script src="<?php echo JS ?>/navbar/navbar.js"></script>
    <script src="<?php echo JS ?>/home/hero.js"></script>
</body>

</html>