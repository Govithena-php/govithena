<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Govithena | Home</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
    <!-- <link rel="stylesheet" href=""> -->
    <link rel="stylesheet" href="Webroot/css/home.css">
    <link rel="stylesheet" href="Webroot/css/ui.css">

</head>

<body>

    <?php include 'navbar.php'; ?>
    <?php include 'hero.php'; ?>
    <?php include 'search.php'; ?>

    <!-- Invest in a farmer and their community, earn 18% interest per year.
    Close to the simplicity of manual farming and yet a luxury in the city, Taman Riset is what all new generation
    should dream of. -->

    <div id="actor" class="ff-poppins py-2 actor">
        <div class="container">
            <h1 class="text-center flex-c-c fs-7">How It Works</h1>
            <div class="h-devider-100"></div>
            <div class="flex flex-c-c mb-3">
                <button onclick="handleActiveTab('investor')" class="text-dec-none actor__link">
                    <img src="Webroot/images/icons/investor.png" alt="" />
                    <p>Investor</p>
                </button>
                <button onclick="handleActiveTab('farmer')" class="text-dec-none actor__link">
                    <img src="Webroot/images/icons/farmer.png" alt="" />
                    <p>Farmer</p>
                </button>
                <button onclick="handleActiveTab('customer')" class="text-dec-none actor__link">
                    <img src="Webroot/images/icons/customer.png" alt="" />
                    <p>Customer</p>
                </button>
                <button onclick="handleActiveTab('agrologist')" class="text-dec-none actor__link">
                    <img src="Webroot/images/icons/agrologist.png" alt="" />
                    <p>Agrologist</p>
                </button>
                <button onclick="handleActiveTab('techAssistant')" class="text-dec-none actor__link">
                    <img src="Webroot/images/icons/techAssistant.png" alt="" />
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
                        <img src="Webroot/images/temp/11.jpg" alt="about" />
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
                        <img src="Webroot/images/temp/16.jpg" alt="about" />
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
                        <img src="Webroot/images/temp/14.jpg" alt="about" />
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
                        <img src="Webroot/images/temp/1.jpg" alt="about" />
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
                        <img src="Webroot/images/temp/13.jpg" alt="about" />
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="ff-poppins invest">
        <div class="container">
            <div class="flex flex-column">
                <div>
                    <h1 class="text-center">Invest with us</h1>
                </div>
            </div>
        </div>
    </div>

    <div style="height: 100vh;"></div>
    <script src="Webroot/js/app.js"></script>
</body>

</html>