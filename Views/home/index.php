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
                    <h1 class="[ fs-9 ]">Earn <span>12%</span> interest per year.</h1>

                    <form class="[ search__bar ]" action="<?php echo URLROOT . "/search/" ?>" method="post">
                        <input type="text" name="search_text" class="" placeholder="search by: name / category / location" />
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


    <style>
        .about {
            padding: 30px 0;
            margin: 75px;

        }

        .about .heading h2 {
            font-size: 30px;
            font-weight: 700;
            margin: 0;
            padding: 0;

        }

        .about .heading h2 span {
            color: #F24259;
        }

        .about .heading p {
            font-size: 15px;
            font-weight: 400;
            line-height: 1.7;
            color: #999999;
            margin: 20px 0 60px;
            padding: 0;
        }

        .about h3 {
            font-size: 25px;
            font-weight: 700;
            margin: 0;
            padding: 0;
        }

        .about p {
            font-size: 15px;
            font-weight: 400;
            line-height: 1.7;
            color: #999999;
            margin: 20px 0 15px;
            padding: 0;
        }

        .about h4 {
            font-size: 15px;
            font-weight: 500;
            margin: 8px 0;
        }

        .about h4 i {
            color: #F24259;
            margin-right: 10px;
        }

        .img>img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 10px;
        }
    </style>


    <section class="about" id="about">
        <div class="">
            <div class="heading text-center">
                <h2>About
                    <span>Us</span>
                </h2>
                <p>A place where Investors, Farmers, Customer and Specialists can meet.
                    <br>
                </p>
            </div>
            <div class="row">
                <div class="img">
                    <img src="<?php echo IMAGES ?>/temp/radish.jpg" alt="about" class="img-fluid" width="100%">
                </div>
                <div class="col-lg-6">
                    <h3>Our Platform </h3>
                    <p>We propose our web-based solution named “Govithena.lk” which would allow the investors to invest in farmers to cultivate the crops of their preference. And farmers can get the financial support that they need to do their farming by contacting the investors through the system. And also, through the system we will provide the opportunity for farmers to sell their products directly to the customers without getting any third parties involved. Farmers who don’t have technical knowledge can get help by hiring technical assistants from the online portal. Also, farmers might not have the necessary educational background about cultivation. For that they can get help from agrologist to get consulting services and knowledge. Finally, people will be able to buy vegetables and fruits at lower price from our website.
                    </p>
                    <div class="row">
                        <div class="col-md-6">
                            <h4>
                                <i class="far fa-star"></i>Invest
                            </h4>
                        </div>
                        <div class="col-md-6">
                            <h4>
                                <i class="far fa-star"></i>
                                Farmer
                            </h4>
                        </div>
                        <div class="col-md-6">
                            <h4>
                                <i class="far fa-star"></i>Share
                            </h4>
                        </div>
                        <div class="col-md-6">
                            <h4>
                                <i class="far fa-star"></i>
                                Sell
                            </h4>
                        </div>
                        <div class="col-md-6">
                            <h4>
                                <i class="far fa-star"></i>Buy
                            </h4>
                        </div>
                        <div class="col-md-6">
                            <h4>
                                <i class="far fa-star"></i>
                                Profit
                            </h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

















    <style>
        .container>h1 {
            text-align: center;
            padding-top: 50px;
            margin-bottom: 60px;
            font-weight: 600;
            position: relative;
        }

        .container>h1::after {
            content: '';
            background: var(--clr-primary);
            width: 100px;
            height: 5px;
            position: absolute;
            bottom: -5px;
            left: 50%;
            transform: translateX(-50%);
        }

        .row {
            display: flex;
            /* grid-template-columns: repeat(auto-fit, minmax(450px, 1fr)); */
            justify-content: center;
            grid-gap: 30px;
        }

        .row2 {
            display: flex;
            /* grid-template-columns: repeat(auto-fit, minmax(450px, 1fr)); */
            justify-content: center;
            grid-gap: 30px;
            margin: 100px auto;
        }

        .service {
            text-align: center;
            padding: 25px 10px;
            border-radius: 5px;
            font-size: 14px;
            cursor: pointer;
            background: transparent;
            transition: transform 0.5s, background 0.5s;
            margin: 0 auto;
            max-width: 200px;
        }

        .service i {
            font-size: 60px;
            margin-bottom: 10px;
            color: #303ef7;
        }

        .service h2 {
            font-weight: 600;
            margin-bottom: 8px;
        }

        .service:hover {
            background: var(--clr-primary);
            color: #fff;
            transform: scale(1.05);
        }

        .service:hover i {
            color: #fff;
        }

        .bg {
            background-color: #eae1f59c;
        }
    </style>

    <section class="bg">
        <div class="container">
            <h1>You can be</h1>
            <div class="row">
                <div class="service">
                    <i class="fa fa-black-tie"></i>
                    <h2>An Investor</h2>
                    <p>
                        Can find farmers and invest for them.
                    </p>
                </div>
                <div class="service">
                    <i class="fa fa-tree"></i>
                    <h2>A Farmer</h2>
                    <p>
                        Can recive investment and sell products to customers.
                    </p>
                </div>
                <div class="service">
                    <i class="fa fa-shopping-basket"></i>
                    <h2>A Customer</h2>
                    <p>
                        Buy products from farmers.
                    </p>
                </div>
            </div>
            <div class="row2">
                <div class="service">
                    <i class="fa fa-book"></i>
                    <h2>An Agrologist</h2>
                    <p>
                        Share their experties and knowledge.
                    </p>
                </div>
                <div class="service">
                    <i class="fa fa-laptop"></i>
                    <h2>A Technicl Assistant</h2>
                    <p>
                        Help farmers to do tackle with technology.
                    </p>
                </div>
            </div>
        </div>
    </section>
































    <!-- Invest in a farmer and their community, earn 18% interest per year.
    Close to the simplicity of manual farming and yet a luxury in the city, Taman Riset is what all new generation
    should dream of. -->
    <!-- 
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
    </div> -->

    <!-- <div class=" invest">
        <div class="container">
            <div class="flex flex-column">
                <div>
                    <h1 class="text-center">Invest with us</h1>
                </div>
            </div>
        </div>
    </div> -->







    <style>
        .footer {
            min-height: 5rem;
            display: grid;
            place-items: center;
            width: 100%;
        }
    </style>


    <?php
    require(COMPONENTS . 'footer.php')
    ?>

    <!-- <div style="height: 100vh;"></div> -->
    <script src="<?php echo JS ?>/app.js"></script>
</body>

</html>