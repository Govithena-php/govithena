<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
    <link rel="stylesheet" href="<?php echo CSS ?>base.css">
    <link rel="stylesheet" href="<?php echo CSS ?>grid.css">
    <link rel="stylesheet" href="<?php echo CSS ?>profile/index.css">
</head>


<body>
    <?php require_once(COMPONENTS . "navbar.php");
    var_dump($user);
    // die();
    ?>
    <div class="[ container ][ heading ]" container-type="section">

        <div class="[ heading__content ]">
            <div class="[ cover__img ]">
                <img src="<?php echo IMAGES; ?>/placeholder.jpg" alt="">
            </div>
            <div class="[ cover__content ]">
                <div class="[ profile__img ]">
                    <img src="<?php echo UPLOADS . $user['image'] ?>" alt="">
                </div>
                <div class="[ grid ]" sm="4" gap="1">
                    <span class="[ profile__back ]"></span>
                    <div class="[ user__details ]">
                        <h1><?php echo $user['firstName'] . " " . $user['lastName'] ?></h1>
                        <p class="type"><?php echo strtolower($user['userType']) ?></p>
                        <div class="[ flex-row ]">
                            <a>
                                <i class="fa fa-phone"></i>
                                <p><?php echo $user['phoneNumber'] ?></p>
                            </a>
                            <a>
                                <i class="fa fa-envelope"></i>
                                <p><?php echo $user['username'] ?></p>
                            </a>
                        </div>
                    </div>
                    <i class="fa fa-bookmark"></i>
                </div>
            </div>
            <div>
                <h2>Description</h2>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Non sapiente quis recusandae rerum, quo id molestias minima! Facilis molestiae facere optio natus beatae deserunt ratione et quo deleniti, consequatur assumenda.</p>
            </div>
        </div>

        <div class="[ additional__details ]">
            <h2>Additional Details</h2>
            <ul>
                <li>
                    <i class="fa fa-envelope"></i>
                    <div>
                        <p class="[ li__heading ]">Email</p>
                        <p><?php echo $user['username'] ?></p>
                    </div>
                </li>
                <li>
                    <i class="fa fa-map-marker"></i>
                    <div>
                        <p class="[ li__heading ]">Address</p>
                        <p>
                            <?php
                            echo $user['addressLine1'] .
                                "<br>" . $user['addressLine2'] .
                                "<br>" . $user['city'];
                            ?>
                        </p>
                    </div>
                </li>
                <li>
                    <i class="fa fa-building"></i>
                    <div>
                        <p class="[ li__heading ]">District</p>
                        <p><?php echo $user['district'] ?></p>
                    </div>
                </li>
                <li>
                    <i class="fa fa-language"></i>
                    <div>
                        <p class="[ li__heading ]">Language</p>
                        <p>English</p>
                    </div>
                </li>
                <li>
                    <i class="fa fa-tree"></i>
                    <div>
                        <p class="[ li__heading ]">Work History</p>
                        <p>Vegetables, Fruits</p>
                    </div>
                </li>
                <li>
                    <i class="fa fa-calendar"></i>
                    <div>
                        <p class="[ li__heading ]">Join Date</p>
                        <p>2 months ago, on 12/15/2022</p>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <?php

    if (!empty($gigs)) {
    ?>
        <div class="[ container ]" type="section">
            <h2> Active Gigs</h2>
            <div class="[ my-2 ] [ grid ]" gap="1" md="2" lg="4">
                <?php
                foreach ($gigs as $gig) {
                ?>
                    <div class="[ result__card ]">
                        <p class="category__tag"><?php echo $gig["category"] ?></p>
                        <div class="[ card__img ]">
                            <img src="<?php echo UPLOADS . $gig['image'] ?>" alt="test" />
                        </div>
                        <div class="[ card__content ]">

                            <div class="[ flex-row ]">
                                <a class="[ card__link ]" href="<?php echo URLROOT . "/gig/" . $gig['gigId'] ?>">
                                    <?php echo $gig['title'] ?>
                                </a>
                                <div>
                                    <small>Capital :</small>
                                    <p class="[ ]">LKR <?php echo $gig['capital'] ?></p>
                                </div>
                            </div>
                            <div class="[ flex-row ]">
                                <div>
                                    <small>Location :</small>
                                    <p><?php echo $gig['location'] ?></p>
                                </div>
                                <div>

                                    <small>Time Period :</small>
                                    <p><?php echo $gig["timePeriod"] ?> Months</p>
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
    ?>

    <div class="[ container ]" type="section">
        <div class="[ rating__grid ]">
            <div class="[ rating__number ]">
                <h1>0.0</h1>
                <div class="[ stars ]">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                </div>
                <p>0 reviews</p>
            </div>
            <div class="[ rating__bars ]">
                <div class="[ bar ]">
                    <label for="5">5</label>
                    <progress id="5" value="1" max="100"></progress>
                </div>
                <div class="[ bar ]">
                    <label for="4">4</label>
                    <progress id="4" value="1" max="100"></progress>
                </div>
                <div class="[ bar ]">
                    <label for="3">3</label>
                    <progress id="3" value="1" max="100"></progress>
                </div>
                <div class="[ bar ]">
                    <label for="2">2</label>
                    <progress id="2" value="1" max="100"></progress>
                </div>
                <div class="[ bar ]">
                    <label for="1">1</label>
                    <progress id="1" value="1" max="100"></progress>
                </div>
            </div>
        </div>

        <div class="[ reviews ]">
            <h1>Reviews</h1>
            <hr>
            <div class="[ reviews__wrapper ]">

                <div class="[ review ]">
                    <div class="[ review__header ]">
                        <img src="https://xsgames.co/randomusers/avatar.php?g=male" alt="profile">
                        <h3>Reviewer name</h3>
                    </div>
                    <p>
                        Occaecat occaecat et laborum exercitation eiusmod minim. Adipisicing consequat minim nostrud aliqua eu eu laborum officia. Deserunt ex qui consectetur Lorem excepteur culpa cillum culpa aute commodo velit est ex ut.
                    </p>
                    <div class="[ review__footer ]">
                        <p>12/12/2022</p>
                        <div class="[ stars ]">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                    </div>
                </div>
                <div class="[ review ]">
                    <div class="[ review__header ]">
                        <img src="https://xsgames.co/randomusers/avatar.php?g=male" alt="profile">
                        <h3>Reviewer name</h3>
                    </div>
                    <p>
                        Occaecat occaecat et laborum exercitation eiusmod minim. Adipisicing consequat minim nostrud aliqua eu eu laborum officia. Deserunt ex qui consectetur Lorem excepteur culpa cillum culpa aute commodo velit est ex ut.
                    </p>
                    <div class="[ review__footer ]">
                        <p>12/12/2022</p>
                        <div class="[ stars ]">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <?php
    require COMPONENTS . "footer.php";
    ?>
    <script type="text/javascript" src="<?php echo JS ?>navbar/navbar.js"></script>
</body>

</html>