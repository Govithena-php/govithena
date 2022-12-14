<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" type="image/x-icon" href="<?php echo IMAGES ?>/favicon.png">

    <title>Govithena | Home</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
    <!-- <link rel="stylesheet" href=""> -->
    <link rel="stylesheet" href="<?php echo CSS ?>/home.css">
    <link rel="stylesheet" href="<?php echo CSS ?>/navbar.css">
    <link rel="stylesheet" href="<?php echo CSS ?>/ui.css">

</head>

<body>

    <?php include COMPONENTS . 'navbar.php'; ?>

    <section class="[ hero ]">
        <div class="[ relative ][ hero__img ]">
            <img class="" src="Webroot/images/bg.jpg" alt="hero" />
        </div>
        <div class="[ scroll__indicator ]"></div>
        <div class="[ hero__content_layer ]">
            <div class="[ container ] [ h-full ]">
                <div class="[ text-light ] [ hero__content ]">
                    <p class="[ fs-4 ]">Invest on farmers and their community,</p>
                    <h1 class="[ fs-9 ]">Earn <span>18%</span> interest per year.</h1>

                    <form class="[ search__bar ]" action="<?php echo URLROOT . "/search/" ?>" method="post">
                        <input type="text" name="search_text" class="" placeholder="search anything..." />
                        <button type="submit" name="search" value="search" class="">search</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- <section class="[ container ]">
        <h1 class="[ fs-7 ]">Popular Gigs</h1>

        <div class="[ popular__wrapper ]">

            <div class="[ popular__content_item ]">
                <div class="[ popular__content_item_img ]">
                    <img src="<?php echo IMAGES ?>/temp/1.jpg" alt="popular" />
                </div>
                <div class="[ popular__content_item_text ]">
                    <p class="[ fs-8 ]">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quae.</p>
                    <a href="#">Read More</a>
                </div>
            </div>

        </div>

    </section> -->




































    <!-- Invest in a farmer and their community, earn 18% interest per year.
    Close to the simplicity of manual farming and yet a luxury in the city, Taman Riset is what all new generation
    should dream of. -->

    <div id="actor" class=" py-2 actor">
        <div class="container">
            <h1 class="text-center flex-c-c fs-7">How It Works</h1>
            <div class="h-devider-100"></div>
            <div class="flex flex-c-c mb-3">
                <button onclick="handleActiveTab('investor')" class="text-dec-none actor__link">
                    <img src="<?php echo IMAGES ?>/icons/investor.png" alt="" />
                    <p>Investor</p>
                </button>
                <button onclick="handleActiveTab('farmer')" class="text-dec-none actor__link">
                    <img src="<?php echo IMAGES ?>/icons/farmer.png" alt="" />
                    <p>Farmer</p>
                </button>
                <button onclick="handleActiveTab('customer')" class="text-dec-none actor__link">
                    <img src="<?php echo IMAGES ?>/icons/customer.png" alt="" />
                    <p>Customer</p>
                </button>
                <button onclick="handleActiveTab('agrologist')" class="text-dec-none actor__link">
                    <img src="<?php echo IMAGES ?>/icons/agrologist.png" alt="" />
                    <p>Agrologist</p>
                </button>
                <button onclick="handleActiveTab('techAssistant')" class="text-dec-none actor__link">
                    <img src="<?php echo IMAGES ?>/icons/techAssistant.png" alt="" />
                    <p>Tech Assistant</p>
                </button>
            </div>

            <span class="h-devider-600"></span>

            <div class="actor__content">

                <div id="investor" class="actor__content_item">


                    <div class="actor__content_item_text">
                        <div class="actor__content_item_title">
                            <p class="fs-7">Investor</p>
                        </div>
                        <p class="fs-8 mb-1">We are here to help you to grow your plants.</p>
                        <a href="#">Get Started</a>
                    </div>

                    <div class="actor__img">
                        <img src="<?php echo IMAGES ?>/temp/11.jpg" alt="about" />
                    </div>
                </div>

                <div id="farmer" class="actor__content_item send_back">
                    <div class="actor__content_item_text">
                        <div class="actor__content_item_title">
                            <p class="fs-7">Farmer</p>
                        </div>
                        <p class="fs-8 mb-1">We are here to help you to grow your plants.</p>
                        <a href="#">Get Started</a>
                    </div>

                    <div class="actor__img">
                        <img src="<?php echo IMAGES ?>/temp/16.jpg" alt="about" />
                    </div>
                </div>

                <div id="customer" class="actor__content_item send_back">
                    <div class="actor__content_item_text">
                        <div class="actor__content_item_title">
                            <p class="fs-7">Customer</p>
                        </div>
                        <p class="fs-8 mb-1">We are here to help you to grow your plants.</p>
                        <a href="#">Get Started</a>
                    </div>

                    <div class="actor__img">
                        <img src="<?php echo IMAGES ?>/temp/14.jpg" alt="about" />
                    </div>
                </div>

                <div id="agrologist" class="actor__content_item send_back">
                    <div class="actor__content_item_text">
                        <div class="actor__content_item_title">
                            <p class="fs-7">Agrologist</p>
                        </div>
                        <p class="fs-8 mb-1">We are here to help you to grow your plants.</p>
                        <a href="#">Get Started</a>
                    </div>

                    <div class="actor__img">
                        <img src="<?php echo IMAGES ?>/temp/1.jpg" alt="about" />
                    </div>
                </div>
                <div id="techAssistant" class="actor__content_item send_back">
                    <div class="actor__content_item_text">
                        <div class="actor__content_item_title">
                            <p class="fs-7">Tech Assistant</p>
                        </div>
                        <p class="fs-8 mb-1">We are here to help you to grow your plants.</p>
                        <a href="#">Get Started</a>
                    </div>

                    <div class="actor__img">
                        <img src="<?php echo IMAGES ?>/temp/13.jpg" alt="about" />
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- <div class=" invest">
        <div class="container">
            <div class="flex flex-column">
                <div>
                    <h1 class="text-center">Invest with us</h1>
                </div>
            </div>
        </div>
    </div> -->








    <div style="height: 100vh;"></div>
    <script src="<?php echo JS ?>/app.js"></script>
</body>

</html>