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
    <title>Govithena | Search</title>
    <link rel="icon" type="image/x-icon" href="<?php echo IMAGES ?>/favicon.png">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS ?>/sidebar.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="<?php echo CSS ?>/ui.css">
    <link rel="stylesheet" href="<?php echo CSS ?>/base.css">
    <link rel="stylesheet" href="<?php echo CSS ?>/grid.css">
    <link rel="stylesheet" href="<?php echo CSS ?>/modal.css">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>/formModal.css">

    <link rel="stylesheet" href="<?php echo CSS ?>gig/index.css">

</head>

<body>
    <?php
    include COMPONENTS . 'navbar.php';
    ?>
    <?php

    if (Session::has('send_gig_request_alert')) {
        $alert = Session::pop('send_gig_request_alert');
        $alert->show_default_alert();
    }

    ?>
    <div class="[ container mb ]" container-type="section">

        <div class="[ images__details ]" gap="2" md="2">
            <div class="[ left ]">
                <div>
                    <div class="[ fs-3 breadcrumbs ]">
                        <a href="<?php echo URLROOT ?>">Govithena</a>
                        <a href="<?php echo URLROOT ?>/search/">Search</a>
                        <p>Gig</p>
                        <p><?php echo $gig['category'] ?></p>
                    </div>
                    <h2 class="[ gig__title ]"><?php echo $gig['title'] ?></h2>
                    <div class="[ image__gallery ]">
                        <div class="[ thumbnail ]" id="0" show="true">
                            <img src="<?php echo UPLOADS . $gig['thumbnail']; ?>" />
                        </div>
                        <div class="[ thumbnail ]" id="1" show="false">
                            <img src="<?php echo UPLOADS . $gig['thumbnail']; ?>" />
                        </div>
                        <div class="[ thumbnail ]" id="2" show="false">
                            <img src="<?php echo UPLOADS . $gig['thumbnail']; ?>" />
                        </div>
                        <div class="[ thumbnail ]" id="3" show="false">
                            <img src="<?php echo UPLOADS . $gig['thumbnail']; ?>" />
                        </div>

                        <div class="[ slider ]">
                            <button class="[ slide active ]" for="0">
                                <img src="<?php echo UPLOADS . $gig['thumbnail']; ?>" />
                            </button>
                            <button class="[ slide ]" for="1">
                                <img src="<?php echo UPLOADS . $gig['thumbnail']; ?>" />
                            </button>
                            <button class="[ slide ]" for="2">
                                <img src="<?php echo UPLOADS . $gig['thumbnail']; ?>" />
                            </button>
                            <button class="[ slide ]" for="3">
                                <img src="<?php echo UPLOADS . $gig['thumbnail']; ?>" />
                            </button>
                            <!-- <div class="[ slide ]">
                            <img src="<?php echo UPLOADS . $gig['thumbnail']; ?>" />
                        </div> -->
                        </div>
                    </div>
                </div>

                <div class="[ gig__description ]">
                    <h3>About Gig</h3>
                    <p class="mb-1"><?php echo $gig['description'] ?>.</p>
                    <?php var_dump($farmer) ?>
                </div>

                <div class="[ about__farmer ]">
                    <h3>About The Farmer</h3>
                    <div class="[ farmer__image_name ]">
                        <div class="[ farmer__image ]">
                            <img src="<?php echo UPLOADS . $farmer['image']; ?>" />
                        </div>
                        <a href="<?php echo URLROOT . "/profile/" .  $farmer['uid'] ?>" class="[ farmer__name ]">
                            <h3><?php echo $farmer['firstName'] . " " . $farmer['lastName'] ?></h3>
                            <h4><?php echo $farmer['city'] ?></h4>
                            <div class="[ stars ]">
                                <?php render_stars(4, 5); ?>
                            </div>
                        </a>
                    </div>

                    <div class="[ farmer__details grid ]" sm="2" gap="1">
                        <div>
                            <small>From</small>
                            <p class="[ ]"><?php echo $farmer['city'] ?>, <?php echo $farmer['district'] ?></p>
                        </div>
                        <div>
                            <small>Member Since</small>
                            <p class="[ ]">2020-10-20</p>
                        </div>
                        <div>
                            <small>Languages</small>
                            <p class="[ ]">English</p>
                            <p class="[ ]">Sinhala</p>
                        </div>
                        <div>
                            <small>Interactions</small>
                            <p class="[ ]">10</p>
                        </div>
                    </div>
                    <div class="[ bio ]">
                        <p>
                            BIO Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eum dignissimos quia, consequuntur dolorum iste sed possimus doloribus nostrum non tempore hic harum distinctio sunt, nulla minus illum eveniet placeat in.
                        </p>
                    </div>
                </div>


                <div class="[ ratings ]">
                    <div class="[ rating__title ]">
                        <h3>Ratings</h3>
                        <?php
                        if (!isset($noOfReviews)) {
                            $noOfReviews = 0;
                        }
                        ?>
                        <p><?php echo $noOfReviews ?> reviews for this gig.</p>
                    </div>
                    <?php
                    if (isset($gigAvgStars) || isset($stars) || isset($noOfReviews)) {
                    ?>
                        <div class="[ rating__grid ]">

                            <div class="[ rating__bars ]">
                                <div class="[ bar ]">
                                    <label for="5">
                                        <p>5</p> <i class="fa fa-star"></i>
                                    </label>
                                    <progress id="5" value="<?php echo $stars['5'] ?>" max="100"></progress>
                                </div>
                                <div class="[ bar ]">
                                    <label for="4">
                                        <p>4</p> <i class="fa fa-star"></i>
                                    </label>
                                    <progress id="4" value="<?php echo $stars['4'] ?>" max="100"></progress>
                                </div>
                                <div class="[ bar ]">
                                    <label for="3">
                                        <p>3</p> <i class="fa fa-star"></i>
                                    </label>
                                    <progress id="3" value="<?php echo $stars['3'] ?>" max="100"></progress>
                                </div>
                                <div class="[ bar ]">
                                    <label for="2">
                                        <p>2</p> <i class="fa fa-star"></i>
                                    </label>
                                    <progress id="2" value="<?php echo $stars['2'] ?>" max="100"></progress>
                                </div>
                                <div class="[ bar ]">
                                    <label for="1">
                                        <p>1</p> <i class="fa fa-star"></i>
                                    </label>
                                    <progress id="1" value="<?php echo $stars['1'] ?>" max="100"></progress>
                                </div>
                            </div>

                            <div class="[ rating__number ]">
                                <?php
                                if (!isset($gigAvgStars)) {
                                    $gigAvgStars = 0;
                                }
                                ?>
                                <h1><?php echo $gigAvgStars ?></h1>
                                <div class="[ stars ]">
                                    <?php render_stars($gigAvgStars, 5); ?>
                                </div>
                                <p>overall score</p>
                            </div>

                        </div>
                    <?php
                    }
                    ?>
                    <p class="[ catch__phrase ]">See what others think - ratings range from 1 to 5 stars, with 5 stars being the best.</p>
                </div>

                <div class="[ reviews ]">
                    <h3>Reviews</h3>
                    <div class="[ reviews__wrapper ]">
                        <?php
                        if (!isset($reviews) && empty($reviews)) {
                            require(COMPONENTS . "dashboard/noDataFound.php");
                        } else {
                            foreach ($reviews as $review) {
                        ?>
                                <div class="[ review ]">
                                    <div class="[ review__header ]">
                                        <img src="<?php echo UPLOADS . 'profilePictures/' . $review['image'] ?>" alt="profile">
                                        <h3><?php echo $review['firstName'] . " " . $review['lastName'] ?></h3>
                                    </div>
                                    <p><?php echo $review['q8'] ?></p>
                                    <div class="[ review__footer ]">
                                        <div class="[ flexsb ]">
                                            <p><?php echo $review['timestamp'] ?></p>
                                            <p><?php echo $review['timestamp'] ?></p>
                                        </div>
                                        <div class="[ stars ]">
                                            <?php render_stars($review['q1'], 5); ?>
                                        </div>
                                    </div>
                                </div>
                        <?php
                            }
                        }
                        ?>
                    </div>
                </div>

            </div>

            <div class="[ right ]">
                <div class="[ result__content ]">
                    <div class="[ card__top ]">
                        <div class="[ category__subcategory ]">
                            <p><?php echo $gig['category'] ?></p>
                            <p>></p>
                            <p><?php echo $gig['category'] ?></p>
                        </div>
                        <div class="[ active__batch ]">
                            <p>Active</p>
                        </div>
                    </div>
                    <div class="[ capital__profitRate ]">
                        <div>
                            <small>Initial Investment</small>
                            <p class="[ LKR ]"><?php echo number_format($gig['capital'], 2, '.', ',') ?></p>
                        </div>
                        <div>
                            <small>Profit Margin</small>
                            <p class="[ profit__precentage ]"><?php echo $gig['profitMargin'] ?><span class="[ precentage ]">%</span></p>
                        </div>
                    </div>
                    <div class="[ flexsb ]">
                        <div>
                            <div class="[ content__item ]">
                                <small>Land Area</small>
                                <p><?php echo $gig['landArea'] ?><span class="[ arces ]"> Arces</span></p>
                            </div>
                            <div class="[ content__item ]">
                                <small>Crop Cycle</small>
                                <p><?php echo $gig['cropCycle'] ?><span class="[ days ]"> Days</span></p>
                            </div>
                            <div class="[ content__item ]">
                                <small>Market Demand (pre 1 Unit)</small>
                                <p><span class="[ LKR ]"></span>500.00 - <span class="[ LKR ]"></span>600.00</p>
                            </div>
                        </div>
                        <div class="[ content__item address ]">
                            <small>Location</small>
                            <!-- <p><?php echo $gig['district'] ?></p>
                            <p><?php echo $gig['district'] ?></p> -->
                            <p><?php echo $gig['city'] ?>,</p>
                            <p><?php echo $gig['district'] ?></p>
                        </div>
                    </div>
                    <div class="[ btns ]">
                        <?php
                        if (isset($state) && $state == 'success') {
                        ?>
                            <button class="[ button__primary ]">cancel request</button>
                        <?php
                        } else {
                        ?>
                            <button class="[ button__primary ]" onclick="openModal()">send request</button>
                        <?php
                        }
                        ?>
                        <button class="[ button__primary-invert ]">Add To Wishlist</button>

                    </div>

                </div>
            </div>
        </div>

        <!-- <div class="[ grid chart__rating ]" gap="4" md="2">
            <div>
                <h3>ROI (Return on Investment) performance</h3>
                <canvas id="myChart"></canvas>
            </div>
        </div> -->

    </div>

    <?php
    include COMPONENTS . 'footer.php';
    ?>

    </div>


    <dialog id="modal" class="modal">
        <div class="[ modal__container ]">
            <div class="[ modal__header ]">
                <h2>Make Your Offer</h2>
            </div>
            <div class="[ modal__body ]">
                <p class="[ fs-4 my-1 fw-5 ]"><?php echo $gig['title'] ?></p>
                <form class="[ modal__form ]" method="post" action="<?php echo URLROOT ?>/gig/request">
                    <div class="[ input__control ]">
                        <label for="offerAmount">Offer Amount (LKR)</label>
                        <input type="number" name="offerAmount" id="offerAmount" placeholder="Offer Amount" value="<?php echo $gig['capital'] ?>" required />
                    </div>
                    <div class="[ input__control ]">
                        <label for="message">Message</label>
                        <textarea name="message" id="message" required></textarea>
                    </div>
                    <div class="[ flexsb ]">
                        <button type="button" class="[ button__danger ] " onclick="closeModal()">Cancel</button>
                        <button type="submit" name="submit_request" class="[ button__primary ]">Send</button>
                    </div>
                </form>

            </div>
        </div>
    </dialog>


    <script src=" <?php echo JS ?>/navbar/navbar.js"></script>

    <script src=" <?php echo JS ?>/app.js"></script>
    <script>
        function openModal() {
            document.getElementById("modal").showModal();
        }

        function closeModal() {
            document.getElementById("modal").close();
        }


        setTimeout(() => {
            document.querySelector(".alert").style.display = "none";
        }, 5000);
    </script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        const ctx = document.getElementById('myChart');

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                datasets: [{
                    label: '# of Votes',
                    data: [12, 19, 3, 5, 2, 3],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>

    <script>
        const iconButtons = document.querySelectorAll(".slide");

        const thumbnails = document.querySelectorAll(".thumbnail");

        console.log(iconButtons);
        iconButtons.forEach((iconButton) => {
            iconButton.addEventListener("click", () => {
                let buttonFor = iconButton.getAttribute("for");

                iconButtons.forEach((ib) => {
                    if (ib.getAttribute("for") != buttonFor)
                        ib.classList.remove("active")
                    else
                        ib.classList.add("active")
                });

                thumbnails.forEach((thumbnail) => {
                    if (thumbnail.id == buttonFor)
                        thumbnail.setAttribute("show", true)
                    else
                        thumbnail.setAttribute("show", false)
                });

                console.log(buttonFor);
            });
        });
    </script>


</body>

</html>