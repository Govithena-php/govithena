<!DOCTYPE html>
<html lang="en">
<?php

// var_dump($investments);
// die();
// foreach ($progress as $p) {
//     foreach ($p as $i) {
//         var_dump($i);
//         echo "<br>";
//     }
//     echo "<br>";
// }

// die();


?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="<?php echo IMAGES ?>/favicon.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />

    <link rel="stylesheet" href="<?php echo CSS ?>/ui.css">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>/base.css">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>/grid.css">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>/tabs.css">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>/gridTable.css">
    <link rel="stylesheet" href="<?php echo CSS ?>/investor/gig.css">

    <title>Dashboard | Investor</title>
</head>

<body>

    <?php
    $active = "gigs";
    $title = "Gig";
    require_once("navigator.php");
    ?>

    <?php $name = "Janith"; ?>

    <div class="[ container ]" container-type="dashboard-section">

        <div class="[ caption ]">
            <h3>Track your gig's progress with ease!</h3>
            <p>With progress page, you can monitor every step of your gig's progress and stay in control of the outcome.</p>
        </div>

        <div class="[ gigs ]">

            <div>
                <div class="[ cards ]">
                    <img class="[ card__img ]" src="<?php echo UPLOADS . $gig['thumbnail']; ?>" />
                    <div class="[ gig__title ]">
                        <div class="[ category__tag ]">
                            <p><?php echo $gig['category']; ?></p>
                        </div>
                        <div class="[ farmer__profile ]">
                            <div class="[ profile__image ]">
                                <img src="<?php echo UPLOADS . $farmer['image'] ?>" />
                            </div>
                            <div class="[ profile__details ]">
                                <a href="<?php echo URLROOT . '/profile/' . $farmer['uid'] ?>"><?php echo $farmer['firstName'] . " " . $farmer['lastName']; ?></a>
                                <p><?php echo $farmer['city']; ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="[ flex__title ]">
                        <h3><?php echo $gig['title']; ?></h3>
                        <p><?php echo $gig['city'] ?></p>
                    </div>
                    <div class="[ grid ]" sm="1" md="2" gap="1">
                        <div class="[ card ]">
                            <div class="[ icon ]">
                                <i class="[ fa fa-bell ]"></i>
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
                                <i class="[ fa fa-bell ]"></i>
                            </div>
                            <div class="[ details ]">
                                <h2><?php echo $gig['profitMargin'] ?> %</h2>
                                <p>Expected profit</p>
                            </div>
                        </div>
                        <div class="[ card ]">
                            <div class="[ icon ]">
                                <i class="[ fa fa-bell ]"></i>
                            </div>
                            <div class="[ details ]">
                                <h2><?php
                                    if (isset($numberOfDaysLeft)) echo $numberOfDaysLeft;
                                    else echo 0
                                    ?> Days</h2>
                                <p>out of <?php echo $gig['cropCycle'] ?> Days</p>
                            </div>
                        </div>
                        <div class="[ card ]">
                            <div class="[ icon ]">
                                <i class="[ fa fa-bell ]"></i>
                            </div>
                            <div class="[ details ]">
                                <h2><?php echo $gig['landArea'] ?> Hectare</h2>
                                <p>Of Land</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="[ special__announcment ]">
                    <div class="[ icon ]">
                        <i class="[ fa fa-bell ]"></i>
                    </div>
                    <div class="[ details ]">
                        <h3>Special Announcment</h3>
                        <p>Our platform is currently undergoing maintenance. We will be back online shortly. Thank you for your patience.</p>
                    </div>
                </div>
                <!-- <p class="[ freespace__text ]">Track your investment journey with ease by accessing all your active and completed gigs in one convenient location, where you can also generate detailed reports on your progress and achievements.</p> -->
            </div>
            <div>
                <div class="[ messages ]">
                    <div class="[ title ]">
                        <h3>Recent Activities</h3>
                    </div>

                    <div class="[ activity ]">
                        <div class="[ icon ]">
                            <i class="[ fa fa-bell ]"></i>
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
                            <i class="[ fa fa-bell ]"></i>
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
                            <i class="[ fa fa-bell ]"></i>
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
                            <i class="[ fa fa-bell ]"></i>
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
                            <i class="[ fa fa-bell ]"></i>
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

        </div>

        <div class="[ tabs ][ gigTabs ]" tab="2">
            <div class="controls">
                <button class="control" for="1">Analysis</button>
                <button class="control" for="2">Investments</button>
                <button class="control" for="3">Progress Updates</button>
                <button class="control" for="4">Agrologist Updates</button>
                <!-- <span class="[ whitespace ]"></span> -->
                <button class="control" for="5">About Gig</button>
            </div>
            <div class="wrapper">
                <div class="tab" id="1">
                    <div class="[ requests__continer ]">
                        <div class="[ caption ]">
                            <h2>Analysis</h2>
                            <p>Get the most out of your data with our analysis section - the ultimate tool for unlocking valuable insights and making smarter decisions.</p>
                        </div>
                        <?php
                        // if (empty($ar)) {
                        //     require(COMPONENTS . "dashboard/noDataFound.php");
                        // } else {
                        ?>
                        <?php
                        // }
                        ?>
                    </div>
                </div>

                <div class="tab" id="2">
                    <div class="[ requests__continer ]">
                        <div class="[ caption ]">
                            <h2>Investments</h2>
                            <p>Get the most out of your data with our analysis section - the ultimate tool for unlocking valuable insights and making smarter decisions.</p>
                        </div>
                        <?php
                        if (!isset($investments)) {
                            require(COMPONENTS . "dashboard/noDataFound.php");
                        } else {
                        ?>
                            <div class="[ requests__wrapper ]">
                                <div class="[ grid__table ]" style="
                                        --xl-cols: 1fr 1fr 1fr;
                                        --lg-cols: 1fr 1fr 1fr;
                                        --md-cols: 1fr 1fr 1fr;
                                        --sm-cols: 1fr 1fr 1fr;
                                    ">
                                    <div class="[ head stick_to_top ]">
                                        <div class="[ grid ][ filters ]" md="1" lg="2" gap="2">
                                            <div class="[ grid ][ options ]" sm="1" md="6" lg="6" gap="1">
                                                <div class="[ input__control ]">
                                                    <label for="from">Visit Date :</label>
                                                    <input id="from" type="date">
                                                </div>
                                                <div class="[ input__control ]">
                                                    <label for="to">Entry Date :</label>
                                                    <input id="to" type="date">
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
                                        <div class="[ row ]">
                                            <div class="[ data ]">
                                                <p>Date</p>
                                            </div>
                                            <div class="[ data ]" hideIn="md">
                                                <p>Time</p>
                                            </div>
                                            <div class="[ data ]" hideIn="md">
                                                <p>Amount</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="[ body ]">
                                        <?php
                                        foreach ($investments as $investment) {
                                        ?>
                                            <div class="[ row ]">
                                                <div class="[ data ]" hideIn="md">
                                                    <h3><?php echo $investment['date'] ?></h3>
                                                </div>
                                                <div class="[ data ]" hideIn="md">
                                                    <h3><?php echo $investment['time'] ?></h3>
                                                </div>
                                                <div class="[ data ]" hideIn="md">
                                                    <h3 class="[ LKR ]"><?php echo number_format($investment['amount'], 2, '.', ',') ?></h3>
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

                <div class="tab" id="3" active="true">
                    <div class="[ requests__continer ]">
                        <div class="[ caption ]">
                            <h2>Progress Updates</h2>
                            <p>Experience the power of transparency with our farmer's progress updates - your go-to resource for tracking progress and staying informed.</p>
                        </div>
                        <?php
                        if (!isset($progress) || empty($progress)) {
                            require(COMPONENTS . "dashboard/noDataFound.php");
                        } else {
                        ?>

                            <div class="[ requests__wrapper ]">
                                <div class="[ grid__table ]" style="
                                        --xl-cols:  2fr 1fr 1fr 0.5fr;
                                        --lg-cols: 1.5fr 0.75fr 0.75fr 0.3fr;
                                        --md-cols: 2fr 0.5fr;
                                        --sm-cols: 2fr 1fr;
                                    ">
                                    <div class="[ head stick_to_top ]">
                                        <div class="[ grid ][ filters ]" md="1" lg="2" gap="2">
                                            <div class="[ grid ][ options ]" sm="1" md="6" lg="6" gap="1">
                                                <div class="[ input__control ]">
                                                    <label for="from">Visit Date :</label>
                                                    <input id="from" type="date">
                                                </div>
                                                <div class="[ input__control ]">
                                                    <label for="to">Entry Date :</label>
                                                    <input id="to" type="date">
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
                                        <div class="[ row ]">
                                            <div class="[ data ]">
                                                <p>Title</p>
                                            </div>
                                            <div class="[ data ]" hideIn="md">
                                                <p>Updated Date</p>
                                            </div>
                                            <div class="[ data ]" hideIn="md">
                                                <p>Updated Time</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="[ body ]">
                                        <?php
                                        foreach ($progress as $pr) {
                                        ?>
                                            <div class="[ row ]">
                                                <div class="[ data ]">
                                                    <div class="[ item__card ]">
                                                        <div class="[ img ]">
                                                            <img width="50" src="<?php echo UPLOADS3 . $pr['images'][0]  ?>" />
                                                        </div>
                                                        <div class="[ content ]">
                                                            <p><?php echo $pr['subject'] ?></p>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="[ data ]" hideIn="md">
                                                    <h3><?php echo $pr['date'] ?></h3>
                                                </div>
                                                <div class="[ data ]" hideIn="md">
                                                    <h3><?php echo $pr['time'] ?></h3>
                                                </div>
                                                <div class="[ actions ]">
                                                    <button for="<?php echo $pr['progressId'] ?>"><i class="fa fa-chevron-circle-down"></i></button>
                                                    <!-- <a href="<?php echo URLROOT ?>/<?php echo $pr['progressId'] ?>" class="btn btn-primary">Cancel Request</a> -->
                                                </div>
                                                <div id="<?php echo $pr['progressId'] ?>" class="[ expand progress__more ]">

                                                    <div class="[ data ]" showIn="md">
                                                        <div class="[ progress__date_time ]">
                                                            <div class="[ date ]">
                                                                <h4>Updated Date :</h4>
                                                                <h3><?php echo $pr['date'] ?></h3>
                                                            </div>
                                                            <div class="[ time ]">
                                                                <h4>Updated Time :</h4>
                                                                <h3><?php echo $pr['time'] ?></h3>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="[ data ]" always>
                                                        <div class="[ progress__content ]">
                                                            <h4>Description</h4>
                                                            <p><?php echo $pr['description'] ?></p>
                                                        </div>
                                                        <div class="[ progress__images ]">
                                                            <?php
                                                            foreach ($pr['images'] as $img) {
                                                            ?>
                                                                <div class="[ img ]">
                                                                    <img src="<?php echo UPLOADS3 . $img ?>">
                                                                </div>
                                                            <?php
                                                            }
                                                            ?>
                                                        </div>
                                                        <div class="[ progress__actions ]">
                                                            <a href="<?php echo URLROOT ?>/<?php echo $pr['progressId'] ?>" class="[ feedback__btn ]">Give some feedback</a>
                                                        </div>

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

                <div class="tab" id="4">
                    <div class="[ requests__continer ]">
                        <div class="[ caption ]">
                            <h2>Agrologist Updates</h2>
                            <p>View expert advice on growing your crops with our agrologist reports and tailored suggestions.</p>
                        </div>
                        <?php
                        if (!isset($fieldVisits) || empty($fieldVisits)) {
                            require(COMPONENTS . "dashboard/noDataFound.php");
                        } else {
                        ?>

                            <div class="[ ]">
                                <div class="[ grid__table ]" style="
                                        --xl-cols: 3fr 1.5fr 1fr 1fr 1fr 0.5fr;
                                        --lg-cols: 2fr 1fr 1fr 0.5fr;
                                        --md-cols: 3fr 1fr 0.5fr;
                                        --sm-cols: 1fr 0.2fr;
                                ">
                                    <div class="[ head stick_to_top ]">
                                        <div class="[ grid ][ filters ]" md="1" lg="2" gap="2">
                                            <div class="[ grid ][ options ]" sm="1" md="6" lg="6" gap="1">
                                                <div class="[ input__control ]">
                                                    <label for="from">Visit Date :</label>
                                                    <input id="from" type="date">
                                                </div>
                                                <div class="[ input__control ]">
                                                    <label for="to">Entry Date :</label>
                                                    <input id="to" type="date">
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
                                        <div class="[ row ]">
                                            <div class="[ data ]">
                                                <p>Week</p>
                                            </div>
                                            <div class="[ data ]" hideIn="sm">
                                                <p>Agrologist</p>
                                            </div>
                                            <div class="[ data ]" hideIn="md">
                                                <p>Visit Date</p>
                                            </div>
                                            <div class="[ data ]" hideIn="lg">
                                                <p>Entry Date</p>
                                            </div>
                                            <div class="[ data ]" hideIn="lg">
                                                <p>Entry Time</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="[ body ]">
                                        <?php
                                        foreach ($fieldVisits as $fieldVisit) {
                                        ?>
                                            <div class="[ row ]">
                                                <div class="[ data ]">
                                                    <div class="[ item__card ]">
                                                        <div class="[ img ]">
                                                            <img width="50" src="<?php echo UPLOADS . $fieldVisit['fimage'] ?>" />
                                                        </div>
                                                        <div class="[ content ]">
                                                            <h2><?php echo $fieldVisit['week'] ?></h2>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="[ data ]" hideIn="sm">
                                                    <div class="[ profile__card ]">
                                                        <div class="[ img ]">
                                                            <img width="50" src="<?php echo UPLOADS . $fieldVisit['uimage'] ?>" />
                                                        </div>
                                                        <div class="[ content ]">
                                                            <a href="<?php echo URLROOT . '/profile/' . $fieldVisit['agrologistId']; ?>"><?php echo $fieldVisit['firstName'] . " " . $fieldVisit['lastName'] ?></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="[ data ]" hideIn="md">
                                                    <p><?php echo $fieldVisit['visitDate'] ?></p>
                                                </div>
                                                <div class="[ data ]" hideIn="lg">
                                                    <p><?php echo $fieldVisit['entryDate'] ?></p>
                                                </div>
                                                <div class="[ data ]" hideIn="lg">
                                                    <p><?php echo $fieldVisit['entryTime'] ?></p>
                                                </div>
                                                <div class="[ actions ]">
                                                    <button for="<?php echo $fieldVisit['visitId'] ?>"><i class="fa fa-chevron-circle-down"></i></button>
                                                </div>
                                                <div id="<?php echo $fieldVisit['visitId'] ?>" class="[ expand ]">
                                                    <div class="[ expand__card ]" showIn="sm">
                                                        <h4>Agrologist :</h4>
                                                        <div class="[ profile__card ]">
                                                            <div class="[ img ]">
                                                                <img width="50" src="<?php echo UPLOADS . $fieldVisit['uimage'] ?>" />
                                                            </div>
                                                            <div class="[ content ]">
                                                                <a href="<?php echo URLROOT . '/profile/' . $fieldVisit['agrologistId']; ?>"><?php echo $fieldVisit['firstName'] . " " . $fieldVisit['lastName'] ?></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="[ expand__card ]" showIn="md">
                                                        <h4>Visited Date :</h4>
                                                        <p><?php echo $fieldVisit['visitDate'] ?></p>
                                                    </div>
                                                    <div class="[ expand__card ]" showIn="lg">
                                                        <h4>Entry Date :</h4>
                                                        <p><?php echo $fieldVisit['entryDate'] ?></p>
                                                    </div>
                                                    <div class="[ expand__card ]" showIn="lg">
                                                        <h4>Entry Time :</h4>
                                                        <p><?php echo $fieldVisit['entryTime'] ?></p>
                                                    </div>
                                                    <div class="[ expand__card ]" always>
                                                        <h4>Agrologist Message :</h4>
                                                        <p class="[ text__width ]"><?php echo $fieldVisit['fieldVisitDetails'] ?></p>
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

                <div class="tab" id="5">
                    <div class="[ requests__continer ]">
                        <div class="[ caption ]">
                            <h2>About Gig</h2>
                            <p>Get the full scoop on this gig with this section - the ultimate resource for learning more.</p>
                        </div>
                        <?php
                        if (!isset($gig) || empty($gig)) {
                            require(COMPONENTS . "dashboard/noDataFound.php");
                        } else {
                        ?>
                            <div class="[ about__gig ]">
                                <div>
                                    <h3>Description</h3>
                                    <p><?php echo $gig['description'] ?></p>
                                </div>
                            </div>

                            <?php
                            if (!isset($gigImages) || empty($gigImages)) {
                            ?>
                                <h1>No other Images</h1>
                            <?php
                            } else {
                            ?>
                                <h3 class="[ about__gig_images_title ]">Gallery</h3>
                                <div class="[ about__gig_images ]">
                                    <?php
                                    foreach ($gigImages as $gigImage) {
                                    ?>
                                        <div class="[ gig__image ]">
                                            <img src="<?php echo UPLOADS . $gigImage['image'] ?>" />
                                        </div>
                                    <?php
                                    }

                                    ?>

                                </div>
                            <?php
                            }
                            ?>
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
    <script>
        const controls = document.querySelectorAll(".controls>button");
        const tabs = document.querySelectorAll(".tab");

        Array.from(controls).forEach(control => {
            control.addEventListener("click", () => {
                let For = control.getAttribute("for")
                Array.from(tabs).forEach(tab => {
                    if (tab.id == For) {
                        tab.setAttribute("active", true)
                        control.toggleAttribute("active")
                    } else {
                        tab.setAttribute("active", false)
                    }
                })
            })
        })


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