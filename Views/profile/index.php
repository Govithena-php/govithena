<!DOCTYPE html>
<html lang="en">
<?php

function render_stars($stars, $outof)
{
    for ($i = 1; $i <= $outof; $i++) {
        if ($i <= $stars) {
            echo '<i class="fas fa-star glow"></i>';
        } else {
            echo '<i class="fas fa-star"></i>';
        }
    }
}
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile | Farmer</title>
    <link rel="icon" type="image/x-icon" href="<?php echo IMAGES ?>/favicon.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">

    <link rel="stylesheet" href="<?php echo CSS ?>base.css">
    <link rel="stylesheet" href="<?php echo CSS ?>grid.css">
    <link rel="stylesheet" href="<?php echo CSS ?>profile/index.css">
</head>


<body>
    <?php require_once(COMPONENTS . "navbar.php");
    ?>
    <div class="[ container ][ heading ]" container-type="section">

        <div class="[ two__columns ]">
            <div class="[ left ]">
                <div class="user__profile">
                    <div class="picture__name">
                        <div class="picture">
                            <img src="<?php echo UPLOADS . '/profilePictures/' . $user['image'] ?>" alt="">
                        </div>
                        <div class="name">
                            <h1><?php echo $user['firstName'] . " " . $user['lastName'] ?></h1>
                            <p class="type"><?php echo strtolower($user['userType']) ?> from <?php echo $user['city'] ?></p>
                        </div>
                    </div>
                    <!-- <button class="button__primary">Contact</button> -->
                </div>
                <div class="preformance">
                    <div class="cards">
                        <div class="card">
                            <small>Worked with </small>
                            <p><?php echo $WorkedWith; ?></p>
                            <small>Investors</small>
                        </div>
                        <div class="card">
                            <small>Recived Over </small>
                            <p class="[ LKR accequerdOver ]"><?php echo number_format($accequerdOver, 0, '', ',') ?>+</p>
                            <small>From the platform</small>
                        </div>
                        <div class="card">
                            <small>Overall Score </small>
                            <p><?php echo $farmerAvgStars ?></p>
                            <small>out of 5<i class="bi bi-star-fill"></i></small>
                        </div>
                    </div>
                    <div class="progress">
                        <div class="[ caption ]">
                            <h2>Farmer Profile Evaluation</h2>
                            <p>Explore the comprehensive evaluation of our farmers' performance, including their communication skills, quality of work, overall performance, and more.</p>
                        </div>
                        <div class="[ grid ]" sm="1" md="2" gap="1">
                            <div class="progress__bar">
                                <div class="progress__details">
                                    <p>Reccomandations</p>
                                    <p><?php echo $qPrecentages['q7Count'] ?>%</p>
                                </div>
                                <div class="bar">
                                    <div class="fill" style="--value: <?php echo $qPrecentages['q7Count'] ?>%;"></div>
                                </div>
                            </div>
                            <div class="progress__bar">
                                <div class="progress__details">
                                    <p>Quality of Work</p>
                                    <p><?php echo $qPrecentages['q3Count'] ?>%</p>
                                </div>
                                <div class="bar">
                                    <div class="fill" style="--value: <?php echo $qPrecentages['q3Count'] ?>%;"></div>
                                </div>
                            </div>
                            <div class="progress__bar">
                                <div class="progress__details">
                                    <p>Overall performance</p>
                                    <p><?php echo $qPrecentages['q4Count'] ?>%</p>
                                </div>
                                <div class="bar">
                                    <div class="fill" style="--value: <?php echo $qPrecentages['q4Count'] ?>%;"></div>
                                </div>
                            </div>
                            <div class="progress__bar">
                                <div class="progress__details">
                                    <p>Communication</p>
                                    <p><?php echo $qPrecentages['q5Count'] ?>%</p>
                                </div>
                                <div class="bar">
                                    <div class="fill" style="--value: <?php echo $qPrecentages['q5Count'] ?>%;"></div>
                                </div>
                            </div>
                            <div class="progress__bar">
                                <div class="progress__details">
                                    <p>Experties</p>
                                    <p><?php echo $qPrecentages['q6Count'] ?>%</p>
                                </div>
                                <div class="bar">
                                    <div class="fill" style="--value: <?php echo $qPrecentages['q6Count'] ?>%;"></div>
                                </div>
                            </div>
                            <div class="progress__bar">
                                <div class="progress__details">
                                    <p>Professionalism</p>
                                    <p><?php echo $qPrecentages['q7Count'] ?>%</p>
                                </div>
                                <div class="bar">
                                    <div class="fill" style="--value: <?php echo $qPrecentages['q7Count'] ?>%;"></div>
                                </div>
                            </div>
                            <div class="progress__bar">
                                <div class="progress__details">
                                    <p>Ease of Collaboration</p>
                                    <p><?php echo $qPrecentages['q7Count'] ?>%</p>
                                </div>
                                <div class="bar">
                                    <div class="fill" style="--value: <?php echo $qPrecentages['q6Count'] ?>%;"></div>
                                </div>
                            </div>
                            <div class="progress__bar">
                                <div class="progress__details">
                                    <p>Financial Management.</p>
                                    <p><?php echo $qPrecentages['q6Count'] ?>%</p>
                                </div>
                                <div class="bar">
                                    <div class="fill" style="--value: <?php echo $qPrecentages['q6Count'] ?>%;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="[ right ]">
                <div class="personal__details">
                    <div class="[ caption ]">
                        <h2>Personal Details</h2>
                        <p>Update your Personal Details.</p>
                    </div>
                    <ul class="items">
                        <li class="item">
                            <i class="bi bi-envelope-at"></i>
                            <div>
                                <p class="email"><?php echo $user['username'] ?></p>
                                <small>Email Address</small>
                            </div>
                        </li>
                        <li class="item">
                            <i class="bi bi-phone"></i>
                            <div>
                                <p class="email"><?php echo $user['phoneNumber'] ?></p>
                                <small>Phone Number</small>
                            </div>
                        </li>
                        <li class="item">
                            <i class="bi bi-signpost-split"></i>
                            <div>
                                <p>
                                    <?php
                                    echo $user['addressLine1'] .
                                        "<br>" . $user['addressLine2'] .
                                        "<br>" . $user['city'];
                                    ?>
                                </p> <small>Address</small>
                            </div>
                        </li>
                        <li class="item">
                            <i class="bi bi-geo"></i>
                            <div>
                                <p><?php echo $user['district'] ?></p>
                                <small>District</small>
                            </div>
                        </li>

                        <li class="item">
                            <i class="bi bi-tree"></i>
                            <div>
                                <p><?php echo "Fruits" ?></p>
                                <small>Categories</small>
                            </div>
                        </li>
                        <li class="item">
                            <i class="bi bi-calendar"></i>
                            <div>
                                <p><?php echo "2 months ago, on 12/15/2022" ?></p>
                                <small>Joined Date</small>
                            </div>
                        </li>
                    </ul>
                    <br>
                    <a href="tel:<?php echo $user['phoneNumber'] ?>" class="contact_button">Contact Farmer</a>
                </div>
            </div>

        </div>

        <!-- <div class="previous__work">
            <div class="[ caption ]">
                <h2>Previous Work</h2>
                <p>Update your Personal Details.</p>
            </div>
            <div class="previous__work__wrapper">
                <?php
                if (!isset($previousWorks) && empty($previousWorks)) {
                    require(COMPONENTS . "dashboard/noDataFound.php");
                } else {
                    foreach ($previousWorks as $previousWork) {
                ?>
                        <div class="previous__work__item">
                            <div class="previous__work__image">
                                <img src="<?php echo UPLOADS . 'previousWorks/' . $previousWork['image'] ?>" alt="previous work">
                            </div>
                            <div class="previous__work__details">
                                <h3><?php echo $previousWork['title'] ?></h3>
                                <p><?php echo $previousWork['description'] ?></p>
                            </div>
                        </div>
                <?php
                    }
                }
                ?>
            </div>
        </div> -->


        <div class="reviews">
            <div class="[ caption ]">
                <h2>Investor Feedback and Experiences</h2>
                <p>Explore investor feedback on our farmers' performance and success in sustainable farming investments.</p>
            </div>
            <div class="reviews__wrapper">
                <?php
                if (!isset($reviews) || empty($reviews)) {
                ?>
                    <div class="no__reviews">
                        <img src="<?php echo IMAGES ?>/svg/no_data.svg" alt="no reviews">
                        <h3>No Reviews Yet</h3>
                        <p>There are no reviews yet. Be the first to review.</p>
                    </div>

                    <?php
                } else {
                    foreach ($reviews as $review) {
                    ?>
                        <div class="review">
                            <div class="review__header">
                                <div class="reviewer_image">
                                    <img src="<?php echo UPLOADS . 'profilePictures/' . $review['image'] ?>" alt="profile">
                                </div>
                                <h3><?php echo $review['firstName'] . " " . $review['lastName'] ?></h3>
                            </div>
                            <p><?php echo $review['q9'] ?></p>
                            <div class="[ review__footer ]">
                                <p><?php echo $review['timestamp'] ?></p>
                                <!-- <div class="[ stars ]">
                                    <?php render_stars($review['q1'], 5); ?>
                                </div> -->
                            </div>
                        </div>
                <?php
                    }
                }
                ?>
            </div>
        </div>



        <div class="other__gigs">
            <div class="[ caption ]">
                <h2>Other Available Gigs</h2>
                <p>Update your Personal Details.</p>
            </div>
            <?php
            if (!isset($gigs) || empty($gigs)) {
                require(COMPONENTS . "dashboard/noDataFound.php");
            } else {
            ?>
                <div class="[ my-2 ] [ grid ]" gap="1" md="2" lg="4">
                    <?php
                    foreach ($gigs as $result) {
                        $imageURL = UPLOADS . $result["thumbnail"];
                    ?>

                        <div class="[ gig__card ]">
                            <div class="[ top ]">
                                <a href="<?php echo URLROOT . "/gig/" . $result['gigId'] ?>">
                                    <img src="<?php echo $imageURL ?>">
                                </a>
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

            <?php
            }
            ?>

        </div>
    </div>
    <?php
    require COMPONENTS . "footer.php";
    ?>
    <script type="text/javascript" src="<?php echo JS ?>navbar/navbar.js"></script>
</body>

</html>