<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="<?php echo IMAGES ?>/favicon.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">

    <link rel="stylesheet" href="<?php echo CSS ?>/ui.css">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>/base.css">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>/grid.css">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>/tabs.css">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>/gridTable.css">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>/progressBar.css">
    <link rel="stylesheet" href="<?php echo CSS ?>/investor/gigs.css">

    <title>Dashboard | Investor</title>
</head>

<body>

    <?php
    $active = "gigs";
    $title = "Gigs";
    require_once("navigator.php");
    ?>

    <?php $name = "Janith"; ?>

    <div class="[ container ]" container-type="dashboard-section">

        <div class="[ caption ]">
            <h3>Track the progress of your gigs with ease!</h3>
            <p>Your active gigs are just a click away! Easily view your current projects and stay up-to-date on their progress with our intuitive dashboard.</p>
        </div>

        <div class="[ gigs ]">
            <div>
                <div class="[ grid ][ cards ]" sm="1" md="2" gap="1">
                    <div class="[ card ]">
                        <div class="[ icon ]">
                            <i class="bi bi-bell"></i>
                        </div>
                        <div class="[ details ]">
                            <h2><?php
                                if (isset($activeGigCount)) echo $activeGigCount;
                                else echo 0;
                                ?></h2>
                            <p>Active Gigs</p>
                        </div>
                    </div>
                    <div class="[ card ]">
                        <div class="[ icon ]">
                            <i class="bi bi-bell"></i>
                        </div>
                        <div class="[ details ]">
                            <h2><?php
                                if (isset($completedGigCount)) echo $completedGigCount;
                                else echo 0;
                                ?></h2>
                            <p>Completed Gigs</p>
                        </div>
                    </div>
                    <div class="[ card ]">
                        <div class="[ icon ]">
                            <i class="bi bi-bell"></i>
                        </div>
                        <div class="[ details ]">
                            <h2><small>LKR</small><br>
                                <?php
                                if (isset($totalInvestment)) echo number_format($totalInvestment, 2, '.', ',');
                                else echo "0.00";
                                ?></h2>
                            <p>Total Investments</p>
                        </div>
                    </div>
                    <div class="[ card ]">
                        <div class="[ icon ]">
                            <i class="bi bi-bell"></i>
                        </div>
                        <div class="[ details ]">
                            <h2><small>LKR</small><br>
                                <?php
                                if (isset($totalInvestment)) echo number_format($totalInvestment, 2, '.', ',');
                                else echo "0.00";
                                ?></h2>
                            <p>Total Profit</p>
                        </div>
                    </div>
                </div>
                <div class="[ special__announcment ]">
                    <div class="[ icon ]">
                        <i class="bi bi-bell"></i>
                    </div>
                    <div class="[ details ]">
                        <h3>Special Announcment</h3>
                        <p>Our platform is currently undergoing maintenance. We will be back online shortly. Thank you for your patience.</p>
                    </div>
                </div>
            </div>
            <div class="[ activities ]">
                <div class="[ title ]">
                    <h3>Recent Activities</h3>
                </div>

                <div class="[ activity ]">
                    <div class="[ icon ]">
                        <i class="bi bi-bell"></i>
                    </div>
                    <div class="[ details ]">
                        <h5>Investment</h5>
                        <p>You have invested <strong>LKR 100,000.00</strong> in <strong>gig title</strong></p>
                        <div class="[ time ]">
                            <p>2 hours ago</p>
                        </div>
                    </div>
                </div>
                <div class="[ activity ]">
                    <div class="[ icon ]">
                        <i class="bi bi-bell"></i>
                    </div>
                    <div class="[ details ]">
                        <h5>Investment</h5>
                        <p>You have invested <strong>LKR 100,000.00</strong> in <strong>gig title</strong></p>
                        <div class="[ time ]">
                            <p>2 hours ago</p>
                        </div>
                    </div>
                </div>
                <div class="[ activity ]">
                    <div class="[ icon ]">
                        <i class="bi bi-bell"></i>
                    </div>
                    <div class="[ details ]">
                        <h5>Investment</h5>
                        <p>You have invested <strong>LKR 100,000.00</strong> in <strong>gig title</strong></p>
                        <div class="[ time ]">
                            <p>2 hours ago</p>
                        </div>
                    </div>
                </div>
                <div class="[ activity ]">
                    <div class="[ icon ]">
                        <i class="bi bi-bell"></i>
                    </div>
                    <div class="[ details ]">
                        <h5>Investment</h5>
                        <p>You have invested <strong>LKR 100,000.00</strong> in <strong>gig title</strong></p>
                        <div class="[ time ]">
                            <p>2 hours ago</p>
                        </div>
                    </div>
                </div>
                <div class="[ activity ]">
                    <div class="[ icon ]">
                        <i class="bi bi-bell"></i>
                    </div>
                    <div class="[ details ]">
                        <h5>Investment</h5>
                        <p>You have invested <strong>LKR 100,000.00</strong> in <strong>gig title</strong></p>
                        <div class="[ time ]">
                            <p>2 hours ago</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="[ tabs ][ gigTabs ]" tab="2">
            <div class="controls">
                <button class="control" for="1" active>Active Gigs</button>
                <button class="control" for="2">To Review</button>
                <button class="control" for="3">Completed Gigs</button>
            </div>
            <div class="wrapper">
                <div class="tab" id="1" active="true">
                    <div class="[ requests__continer ]">
                        <div class="[ caption ]">
                            <h2>Active Gigs</h2>
                            <p>Keep your eyes on the prize by tracking progress with ease.</p>
                        </div>
                        <?php
                        if (!isset($activeGigs) || empty($activeGigs)) {
                            require(COMPONENTS . "dashboard/noDataFound.php");
                        } else {
                        ?>
                            <div class="active__gigs">
                                <?php
                                foreach ($activeGigs as $activeGig) {
                                ?>
                                    <div class="active__gig">
                                        <div class="active__gig_img">
                                            <img src="<?php echo UPLOADS . $activeGig['thumbnail'] ?>" />
                                            <div class="active__gig_farmer">
                                                <div class="img">
                                                    <img src="<?php echo UPLOADS . $activeGig['image'] ?>" />
                                                </div>
                                                <div class="details">
                                                    <a href="<?php echo URLROOT . "/profile/" . $activeGig['farmerId'] ?>"><?php echo $activeGig['firstName'] . " " . $activeGig['lastName'] ?></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="active__gig_content">

                                            <div class="active__gig_title">
                                                <h3 class=""><?php echo $activeGig['title'] ?></h3>
                                                <p><?php echo $activeGig['city'] ?></p>
                                            </div>

                                            <div class="grid active__gig_progress_bars" lg="2" gap="1">
                                                <div class="progress__bar">
                                                    <div class="progress__details">
                                                        <p>20 Days out of 100 Days</p>
                                                    </div>
                                                    <div class="bar">
                                                        <div class="fill" style="--value: 50%;"></div>
                                                    </div>
                                                </div>
                                                <div class="progress__bar">
                                                    <div class="progress__details">
                                                        <p>Progress</p>
                                                        <p>5 / 10</p>
                                                    </div>
                                                    <div class="bar">
                                                        <div class="fill" style="--value: 50%;"></div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="active__gig_other">
                                                <div class="item">
                                                    <small>Total Investments</small>
                                                    <p class="LKR"><?php
                                                                    if (isset($totalInvestmentPerGig[$activeGig['gigId']])) {
                                                                        echo number_format($totalInvestmentPerGig[$activeGig['gigId']], 2, '.', ',');
                                                                    }
                                                                    ?></p>
                                                </div>
                                                <div class="item">
                                                    <small>Progress Updates</small>
                                                    <p>50</p>
                                                </div>
                                                <div class="item">
                                                    <small>Agrologist updates</small>
                                                    <p>50</p>
                                                </div>
                                                <span class="grow"></span>
                                                <a href="<?php echo URLROOT . "/dashboard/gig/" . $activeGig['gigId'] ?>" class="button__primary">View More</a>

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
                <div class="tab" id="2">
                    <div class="[ requests__continer ]">
                        <div class="[ caption ]">
                            <h2>To Review</h2>
                            <p>Keep your eyes on the prize by tracking progress with ease.</p>
                        </div>
                        <?php
                        if (!isset($toReviewGigs) || empty($toReviewGigs)) {
                            require(COMPONENTS . "dashboard/noDataFound.php");
                        } else {
                        ?>
                            <div class="[  ]">

                                <div class="[ grid__table ]" style="
                                        --xl-cols:  2fr 1fr;
                                        --lg-cols: 4fr 1fr;
                                        --md-cols: 5fr 1fr;
                                        --sm-cols: 3fr 1fr;
                                    ">
                                    <div class="[ head stick_to_top ]">

                                        <!-- <div class="[ grid ][ filters ]" md="1" lg="2" gap="2">
                                            <div class="[ grid ][ options ]" sm="1" md="6" lg="6" gap="1">
                                                <div class="[ input__control ]">
                                                    <label for="from">From :</label>
                                                    <input id="from" type="date">
                                                </div>
                                                <div class="[ input__control ]">
                                                    <label for="to">To :</label>
                                                    <input id="to" type="date">
                                                </div>
                                                <div class="[ input__control ]">
                                                    <label for="location">Location :</label>
                                                    <select id="location">
                                                        <option value="all">All</option>
                                                        <option value="colombo">Colombo</option>
                                                        <option value="galle">Galle</option>
                                                        <option value="kandy">Kandy</option>
                                                        <option value="matara">Matara</option>
                                                        <option value="nuwaraeliya">Nuwara Eliya</option>
                                                        <option value="trincomalee">Trincomalee</option>
                                                    </select>
                                                </div>
                                                <div class="[ input__control ]">
                                                    <label for="category">Category :</label>
                                                    <select id="category">
                                                        <option value="all">All</option>
                                                        <option value="vegetable">Vegetable</option>
                                                        <option value="fruit">Fruit</option>
                                                        <option value="grains">Grains</option>
                                                        <option value="spices">Spices</option>
                                                    </select>
                                                </div>
                                                <div class="[ input__control ]">
                                                    <button type="button">Apply</button>
                                                </div>

                                            </div>
                                            <div class="[ search ]">
                                                <input type="text" placeholder="Search">
                                                <button type="button">
                                                    <i class="fas fa-search"></i>
                                                </button>
                                            </div>
                                        </div> -->
                                        <!-- <div class="[ row ]">
                                            <div class="[ data ]">
                                                <p>Gig</p>
                                            </div>
                                            <div class="[ data ]" hideIn="md">
                                                <p>Category</p>
                                            </div>
                                            <div class="[ data ]" hideIn="lg">
                                                <p>Prograss</p>
                                            </div>
                                        </div> -->
                                    </div>
                                    <div class="[ body ]">
                                        <?php
                                        foreach ($toReviewGigs as $gig) {
                                        ?>
                                            <div class="[ row ]">
                                                <div class="[ data ]">
                                                    <div class="[ item__card ]">
                                                        <div class="[ img ]">
                                                            <img width="50" src="<?php echo UPLOADS . $gig['thumbnail'] ?>" />
                                                        </div>
                                                        <div class="[ content ]">
                                                            <a href="<?php echo URLROOT . "/gig/" . $gig['gigId'] ?>">
                                                                <h2><?php echo $gig['title'] ?></h2>
                                                            </a>
                                                            <!-- <p><small>by </small> <a href="<?php echo URLROOT . "/profile/" . $request['uid'] ?>"><?php echo $request['firstName'] . " " . $request['lastName'] ?></p></a> -->
                                                            <h3><?php echo $gig['city'] ?></h3>

                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- <div class="[ data ]" hideIn="md">
                                                    <p class="[ tag ]"><?php echo $gig['category'] ?></p>
                                                </div> -->
                                                <!-- <div class="[ data ]" hideIn="lg">
                                                    <div class="[ progress__bar ]">
                                                        <label>
                                                            <span>Days</span>
                                                            <span>20 days out of 100 days</span>
                                                        </label>
                                                        <progress min="0" max="100" value="20"></progress>
                                                    </div>
                                                </div> -->
                                                <!-- <div class="[ data ]" hideIn="lg">
                                                    <div class="[ progress__bar ]">
                                                        <label>
                                                            <span>overroll</span>
                                                            <span>50%</span>
                                                        </label>
                                                        <progress min="0" max="100" value="50"></progress>
                                                    </div>
                                                </div> -->
                                                <div class="[ data flex-center ]">
                                                    <div class="[ actions ]">
                                                        <a href="<?php echo URLROOT ?>/dashboard/review/<?php echo $gig['gigId'] ?>" class="[ button__primary-invert ]">Write Review</a>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php
                                        }
                                        ?>

                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>

                <div class="tab" id="3">
                    <div class="[ requests__continer ]">
                        <div class="[ caption ]">
                            <h2>Completed Gigs</h2>
                            <p>Get a complete overview of your completed gigs and track your progress with just a few clicks!</p>
                        </div>
                        <?php
                        if (!isset($completedGigs) || empty($completedGigs)) {
                            require(COMPONENTS . "dashboard/noDataFound.php");
                        } else {
                        ?>
                            <div class="[  ]">
                                <div class="[ grid__table ]" style="
                                        --xl-cols: 2fr 0.5fr;
                                        --lg-cols: 4fr 1fr;
                                        --md-cols: 5fr 1fr;
                                        --sm-cols: 3fr 1fr;
                                    ">
                                    <div class="[ head stick_to_top ]">
                                        <div class="[ grid ][ filters ]" md="1" lg="2" gap="2">
                                            <div class="[ grid ][ options ]" sm="1" md="6" lg="6" gap="1">
                                                <div class="[ input__control ]">
                                                    <label for="from">From :</label>
                                                    <input id="from" type="date">
                                                </div>
                                                <div class="[ input__control ]">
                                                    <label for="to">To :</label>
                                                    <input id="to" type="date">
                                                </div>
                                                <div class="[ input__control ]">
                                                    <label for="location">Location :</label>
                                                    <select id="location">
                                                        <option value="all">All</option>
                                                        <option value="colombo">Colombo</option>
                                                        <option value="galle">Galle</option>
                                                        <option value="kandy">Kandy</option>
                                                        <option value="matara">Matara</option>
                                                        <option value="nuwaraeliya">Nuwara Eliya</option>
                                                        <option value="trincomalee">Trincomalee</option>
                                                    </select>
                                                </div>
                                                <div class="[ input__control ]">
                                                    <label for="category">Category :</label>
                                                    <select id="category">
                                                        <option value="all">All</option>
                                                        <option value="vegetable">Vegetable</option>
                                                        <option value="fruit">Fruit</option>
                                                        <option value="grains">Grains</option>
                                                        <option value="spices">Spices</option>
                                                    </select>
                                                </div>
                                                <div class="[ input__control ]">
                                                    <button type="button">Apply</button>
                                                </div>

                                            </div>
                                            <div class="[ search ]">
                                                <input type="text" placeholder="Search">
                                                <button type="button">
                                                    <i class="fas fa-search"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <!-- <div class="[ row ]">
                                            <div class="[ data ]">
                                                <p>Gig</p>
                                            </div>
                                            <div class="[ data ]" hideIn="md">
                                                <p>Category</p>
                                            </div>
                                            <div class="[ data ]" hideIn="lg">
                                                <p>Prograss</p>
                                            </div>
                                        </div> -->
                                    </div>
                                    <div class="[ body ]">
                                        <?php
                                        foreach ($completedGigs as $gig) {
                                        ?>
                                            <div class="[ row ]">
                                                <div class="[ data ]">
                                                    <div class="[ item__card ]">
                                                        <div class="[ img ]">
                                                            <img width="50" src="<?php echo UPLOADS . $gig['thumbnail'] ?>" />
                                                        </div>
                                                        <div class="[ content ]">
                                                            <a href="<?php echo URLROOT . "/gig/" . $gig['gigId'] ?>">
                                                                <h2><?php echo $gig['title'] ?></h2>
                                                            </a>
                                                            <!-- <p><small>by </small> <a href="<?php echo URLROOT . "/profile/" . $request['uid'] ?>"><?php echo $request['firstName'] . " " . $request['lastName'] ?></p></a> -->
                                                            <h3><?php echo $gig['city'] ?></h3>

                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- <div class="[ data ]" hideIn="md">
                                                    <p class="[ tag ]"><?php echo $gig['category'] ?></p>
                                                </div> -->
                                                <!-- <div class="[ data ]" hideIn="lg">
                                                    <div class="[ progress__bar ]">
                                                        <label>
                                                            <span>Days</span>
                                                            <span>20 days out of 100 days</span>
                                                        </label>
                                                        <progress min="0" max="100" value="20"></progress>
                                                    </div>
                                                </div> -->
                                                <!-- <div class="[ data ]" hideIn="lg">
                                                    <div class="[ progress__bar ]">
                                                        <label>
                                                            <span>overroll</span>
                                                            <span>50%</span>
                                                        </label>
                                                        <progress min="0" max="100" value="50"></progress>
                                                    </div>
                                                </div> -->
                                                <div class="[ data flex-center ]">
                                                    <div class="[ actions ]">
                                                        <a href="<?php echo URLROOT ?>/dashboard/gig/<?php echo $gig['gigId'] ?>" class="[ button__primary-invert ]">View More</a>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <?php

    if (isset($error)) {
        // require_once(COMPONENTS . "dashboard/noDataFound.php");
    } else {
        if (empty($withdrawls)) {
            // require_once(COMPONENTS . "dashboard/noDataFound.php");
        } else {
    ?>
            <div class="[ investments__container ]">
                <div class="[ investment__heading ]">
                    <h3>Title</h3>
                    <h3>Amount</h3>
                    <h3>Timestamp</h3>
                    <h3>Category</h3>
                </div>
                <?php
                foreach ($withdrawls as $withdrawl) {
                ?>
                    <div class="[ investment ]">
                        <h3><?php echo $withdrawl['title'] ?></h3>
                        <p><?php echo $withdrawl['amount'] ?></p>
                        <p><?php echo $withdrawl['timestamp'] ?></p>
                        <p><?php echo $withdrawl['category'] ?></p>
                    </div>
                <?php
                }
                ?>
            </div>
    <?php
        }
    }
    ?>

    </div>
    <?php
    require_once("footer.php");
    ?>
    <script src="<?php echo JS ?>/dashboard/dashboard.js"></script>
    <script src="<?php echo JS ?>/tabs.js"></script>

    <script>
        const expandBtns = document.querySelectorAll(".actions>button")
        const expands = document.querySelectorAll(".expand")
        const icons = document.querySelectorAll(".actions>button>i")
        Array.from(expandBtns).forEach(expandBtn => {

            expandBtn.addEventListener("click", () => {
                let id = expandBtn.getAttribute("for")

                Array.from(icons).forEach(icon => {
                    icon.removeAttribute("show")
                })

                Array.from(expands).forEach(expand => {
                    if (expand.id == id) {
                        expand.toggleAttribute("show")
                        if (expand.hasAttribute("show")) {
                            expandBtn.children[0].setAttribute("show", null)
                        }
                    } else {
                        expand.removeAttribute("show")
                    }
                })

            })
        })
    </script>
</body>

</html>