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
                <h1 id="heading-hero">Invest <span>with us</span> <br>for a reasonable profit.</h1>
            </div>

            <?php
            if (isset($currentUser)) {
            ?>
                <form class="[ search ]" id="searchForm" action="<?php echo URLROOT . "/search/" ?>" method="get">
                    <input type="text" name="terms" id="terms" class="" placeholder="search by: name or category" />
                    <button type="submit" class="">search</button>
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
    </div>

    <?php
    $numberOfGigs = 400;
    $numberOfCategories = 20;
    ?>
    <div class="[ container ][ title ]" container-type="section">
        <h4><span><?php echo $numberOfGigs; ?>+</span> gigs in <span><?php echo $numberOfCategories; ?>+</span> categories.</h4>
        <h1>Invest in the agriculture of Sri Lanka.</h1>
        <p>Investing in agriculture in Sri Lanka can be a lucrative opportunity due to its favorable climate conditions and fertile soil. <br>The country is known for its production of crops such as rice, tea, rubber, coconut, and spices. </p>
    </div>

    <?php
    if (!isset($currentUser)) {
    ?>
        <div class="[ backdrop_gray ]">
            <div class="[ container ][ description ]" container-type="section">
                <div class="[ header ]">
                    <h1>Discover Your Role in Agriculture.</h1>
                </div>
                <div class="[ content ][ box ]">
                    <ul class="[ grid ]" gap="3" lg="2">
                        <li>
                            <H3><i class="fa-regular fa-circle-check"></i>INVESTOR</H3>
                            <p>An astute investor who invests in agriculture is not only securing their financial future, but also contributing to the growth and sustainability of the global food supply and supporting responsible farming practices.</p>
                        </li>
                        <li>
                            <H3><i class="fa-regular fa-circle-check"></i>FARMER</H3>
                            <p>Hardworking and dedicated individual who is responsible for growing and cultivating the crops and livestock that feed communities and sustain the world.</p>
                        </li>
                        <li>
                            <H3><i class="fa-regular fa-circle-check"></i>AGROLOGIST</H3>
                            <p>A professional who combines knowledge of agriculture and natural resources to find sustainable solutions for food production and resource management.</p>
                        </li>
                        <li>
                            <H3><i class="fa-regular fa-circle-check"></i>TECHNICAL ASSISTANT</H3>
                            <p>A Technical Assistant is a professional who provides support to farmers in utilizing technology to enhance their operations, maximize yields, and stay up-to-date with the latest advancements in agriculture.</p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    <?php
    }
    ?>

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
                    <p>Potential for financial returns, investing in vegetable cultivation can also have positive social and environmental impacts</p>
                </div>
            </div>

            <div class="[ relative ][ card ]" order="1">
                <div class="[ absolute ][ image ]">
                    <img src="<?php echo IMAGES ?>/temp/fruits.jpg" alt="category" />
                </div>
                <div class="[ content ]">
                    <h3>Fruits</h3>
                    <p>Profitable and sustainable venture, as there is a steady demand for fresh and high-quality fruits both domestically and internationally.</p>
                </div>
            </div>

            <div class="[ relative ][ card ]" order="3">
                <div class="[ absolute ][ image ]">
                    <img src="<?php echo IMAGES ?>/temp/cinnamon.jpg" alt="category" />
                </div>
                <div class="[ content ]">
                    <h3>Spices</h3>
                    <p>Invest in the spices of tomorrow, harvest the profits of today.</p>
                </div>
            </div>

            <div class="[ relative ][ card ]" order="4">
                <div class="[ absolute ][ image ]">
                    <img src="<?php echo IMAGES ?>/temp/red rice.jpg" alt="category" />
                </div>
                <div class="[ content ]">
                    <h3>Grains</h3>
                    <p>Grain up your investments, reap the benefits of a bountiful harvest.</p>
                </div>
            </div>

            <div class="[ relative ][ card ]" order="5">
                <div class="[ absolute ][ image ]">
                    <img src="<?php echo IMAGES ?>/temp/mushroom.jpg" alt="category" />
                </div>
                <div class="[ content ]">
                    <h3>Mushroom</h3>
                    <p>Mushrooming profits: Dive into the fascinating world of mushroom cultivation and watch your investment multiply!</p>
                </div>
            </div>

            <div class="[ relative ][ card ]" order="6">
                <div class="[ absolute ][ image ]">
                    <img src="<?php echo IMAGES ?>/temp/flowers.jpg" alt="category" />
                </div>
                <div class="[ content ]">
                    <h3>Flowers</h3>
                    <p>Blooming with opportunity: Invest in the vibrant beauty of flower farms and let your investments blossom with prosperity!ho</p>
                </div>
            </div>

        </div>
    </div>


    <?php
    if (isset($currentUser)) {
    ?>
        <div class="[ container ][ popular__gig ]" container-type="section">
            <div class="[ header ]">
                <h2>Some of the Gigs available</h2>
            </div>

            <div class="[ grid ]" gap="1" sm="1" md="2" lg="4">
                <?php
                foreach ($gigs as $result) {
                    $imageURL = UPLOADS . $result["thumbnail"];
                ?>

                    <div class="[ gig__card ]">
                        <div class="[ top ]">
                            <a href="<?php echo URLROOT . "/gig/" . $result['gigId'] ?>">
                                <img src="<?php echo $imageURL ?>">
                            </a>
                            <div class="[ farmer__category ]">
                                <a href="<?php echo URLROOT . "/profile/" . $result['farmerId'] ?>"><?php echo $result['firstName'] . " " . $result['lastName'] ?></a>
                                <p><?php echo $result['category'] ?></p>
                            </div>
                            <div class="[ profit__margin ]">
                                <p><?php echo $result['profitMargin'] ?>%</p>
                                <small>Profit margin</small>
                            </div>
                        </div>
                        <div class="[ bottom ]">
                            <div class="[ gig__title ]">
                                <a class="[ gig__title_link limit-text-2 ]" href="<?php echo URLROOT . "/gig/" . $result['gigId'] ?>">
                                    <?php echo $result['title'] ?>
                                </a>
                            </div>
                            <div class="[ investmet__location ]">
                                <div class="[ item ]">
                                    <small>Initial investment :</small>
                                    <p class="[ LKR ]"><?php echo number_format($result['capital'], 2, '.', ',') ?></p>
                                </div>
                                <div class="[ item ]">
                                    <small>Location :</small>
                                    <p><?php echo $result['city'] ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                }

                ?>
            </div>
        </div>
        <?php
    }
        ?>ල්

        <div class="[ container ][ services ]" container-type="section">
            <div class="[ header ]">
                <h2>Why Us?</h2>
                <p>Investing in agriculture offers the potential for growth and long-term stability, <br>making it a smart choice for those looking to secure their financial future..</p>
            </div>

            <div class="[ grid ]" gap="2" md="2" lg="3">
                <div class="[ box ]">
                    <i class="fa-solid fa-headset"></i>

                    <div class="[ content ]">
                        <h3>Knowledge & Experience</h3>
                        <p>Our team has extensive knowledge and experience in the agriculture industry</p>
                    </div>
                </div>
                <div class="[ box ]">
                    <i class="fa-solid fa-headset"></i>

                    <div class="[ content ]">
                        <h3>Best Guidance & Support</h3>
                        <p>Dedicated to providing the best guidance and support to our investors.</p>
                    </div>
                </div>
                <div class="[ box ]">
                    <i class="fa-solid fa-headset"></i>

                    <div class="[ content ]">
                        <h3>Proven Track Record</h3>
                        <p>We have a proven track record of successful investments in agriculture, with a history of delivering positive returns to our investors.</p>
                    </div>
                </div>
                <div class="[ box ]">
                    <i class="fa-solid fa-headset"></i>

                    <div class="[ content ]">
                        <h3>Diversification</h3>
                        <p>Investing in agriculture offers the opportunity to diversify your portfolio and reduce your overall risk.</p>
                    </div>
                </div>
                <div class="[ box ]">
                    <i class="fa-solid fa-headset"></i>

                    <div class="[ content ]">
                        <h3>Sustainability</h3>
                        <p>We believe in responsible and sustainable agriculture practices, and work to ensure that our investments have a positive impact on the environment and local communities.</p>
                    </div>
                </div>
                <div class="[ box ]">
                    <i class="fa-solid fa-headset"></i>

                    <div class="[ content ]">
                        <h3>High demand</h3>
                        <p>The demand for high-quality agricultural products continues to grow, both domestically and internationally.</p>
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

        <script src="<?php echo JS ?>/navbar/navbar.js"></script>
        <script src="<?php echo JS ?>/home/hero.js"></script>
</body>

</html>







<!-- 
ABOUT US
Agriculture Investment - Building a Sustainable Future

Agriculture is a vital industry that plays a crucial role in feeding the world and sustaining the global economy. By investing in this sector, you can not only help to secure a food-secure future, but also support the growth of a responsible and sustainable agricultural industry.

At [Company Name], we are dedicated to providing our clients with innovative and profitable investment opportunities in the agriculture sector. Our team of experts leverages their deep knowledge of the industry and access to cutting-edge technologies to identify high-potential investment opportunities and help you make informed decisions.

Whether you're looking to invest in farmland, agribusiness, or cutting-edge agriculture technologies, we have the expertise and resources to help you achieve your goals. Our portfolio of investments is diversified and balanced, ensuring that you are exposed to a range of opportunities across different stages of the agriculture value chain.

Investing with [Company Name] not only offers you the potential for strong financial returns, but also the satisfaction of knowing that you are contributing to the growth of a sustainable and responsible agriculture sector. We are committed to responsible investment practices and work closely with our partners to ensure that our investments promote sustainable agriculture practices, conserve natural resources, and benefit local communities.

Join us today and help build a brighter future for agriculture and the world. Get in touch with our team to learn more about our agriculture investment opportunities and start building your portfolio. -->