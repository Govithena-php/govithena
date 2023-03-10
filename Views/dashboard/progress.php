<!DOCTYPE html>
<html lang="en">

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
    <link rel="stylesheet" href="<?php echo CSS ?>/investor/progress.css">

    <title>Dashboard | Investor</title>
</head>

<body>

    <?php
    $active = "gigs";
    $title = "Progress";
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
                    <img src="<?php echo UPLOADS . $gig['image']; ?>" />
                    <div class="[ gig__title ]">
                        <div>
                            <h3><?php echo $gig['title']; ?></h3>
                            <p><?php echo $gig['location'] ?></p>
                        </div>
                        <div class="[ category__tag ]">
                            <p><?php echo $gig['category']; ?></p>
                        </div>
                    </div>
                    <div class="[ grid ]" sm="1" md="2" gap="1">
                        <div class="[ card ]">
                            <div class="[ icon ]">
                                <i class="[ fa fa-bell ]"></i>
                            </div>
                            <div class="[ details ]">
                                <h2><small>LKR</small><br>1,250,000.00</h2>
                                <p>Total Investments</p>
                            </div>
                        </div>
                        <div class="[ card ]">
                            <div class="[ icon ]">
                                <i class="[ fa fa-bell ]"></i>
                            </div>
                            <div class="[ details ]">
                                <h2>12%</h2>
                                <p>Expected profit</p>
                            </div>
                        </div>
                        <div class="[ card ]">
                            <div class="[ icon ]">
                                <i class="[ fa fa-bell ]"></i>
                            </div>
                            <div class="[ details ]">
                                <h2>100 Days</h2>
                                <p>Left, out of 120 Days</p>
                            </div>
                        </div>
                        <div class="[ card ]">
                            <div class="[ icon ]">
                                <i class="[ fa fa-bell ]"></i>
                            </div>
                            <div class="[ details ]">
                                <h2>2 Hectare</h2>
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
                <div class="[ farmer__profile ]">
                    <div class="[ profile__image ]">
                        <img src="<?php echo UPLOADS . $farmer['image'] ?>" />
                    </div>
                    <div class="[ profile__details ]">
                        <a href="<?php echo URLROOT . '/profile/' . $farmer['uid'] ?>"><?php echo $farmer['firstName'] . " " . $farmer['lastName']; ?></a>
                        <p><?php echo $farmer['city']; ?></p>
                    </div>
                </div>
                <div class="[ messages ]">
                    <div class="[ title ]">
                        <h3>Messages</h3>
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
                <button class="control" for="2">Progress Updates</button>
                <button class="control" for="3">Agrologist Updates</button>
                <!-- <span class="[ whitespace ]"></span> -->
                <button class="control" for="4">About Gig</button>
            </div>
            <div class="wrapper">
                <div class="tab" id="1" active="true">
                    <div class="[ requests__continer ]">
                        <div class="[ caption ]">
                            <h2>Analysis</h2>
                            <p>Get the most out of your data with our analysis section - the ultimate tool for unlocking valuable insights and making smarter decisions.</p>
                        </div>
                        <?php
                        if (empty($ar)) {
                            require_once(COMPONENTS . "dashboard/noDataFound.php");
                        } else {
                        ?>
                        <?php
                        }
                        ?>
                    </div>
                </div>

                <div class="tab" id="2">
                    <div class="[ requests__continer ]">
                        <div class="[ caption ]">
                            <h2>Progress Updates</h2>
                            <p>Experience the power of transparency with our farmer's progress updates - your go-to resource for tracking progress and staying informed.</p>
                        </div>
                        <?php
                        if (empty($pr)) {
                            require(COMPONENTS . "dashboard/noDataFound.php");
                        } else {
                        ?>
                            <div class="[ filters ]">
                                <div class="[ options ]">
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
                            <div class="[ requests__wrapper ]">
                                <div class="[ grid__table ]" style="
                                        --xl-cols:  1.2fr 0.35fr 0.35fr 0.35fr 0.35fr 0.4fr 0.7fr;
                                        --lg-cols: 1.5fr 0.5fr 0.5fr 1fr 1fr;
                                        --md-cols: 1fr 0.5fr 0.5fr;
                                        --sm-cols: 2fr 1fr;
                                    ">
                                    <div class="[ head ]">
                                        <div class="[ data ]">
                                            <p>Gig</p>
                                        </div>
                                        <div class="[ data ]" hideIn="md">
                                            <p>Category</p>
                                        </div>
                                        <div class="[ data ]" hideIn="sm">
                                            <p>Offer</p>
                                        </div>
                                        <div class="[ data ]" hideIn="lg">
                                            <p>Time Period</p>
                                        </div>
                                        <div class="[ data ]" hideIn="lg">
                                            <p>Location</p>
                                        </div>
                                        <div class="[ data ]" hideIn="md">
                                            <p>Requested Date</p>
                                        </div>
                                    </div>
                                    <div class="[ body ]">
                                        <?php
                                        foreach ($pr as $request) {
                                        ?>
                                            <div class="[ row ]">
                                                <div class="[ data ]">
                                                    <div class="[ item__card ]">
                                                        <div class="[ img ]">
                                                            <img width="50" src="<?php echo UPLOADS . $request['image'] ?>" />
                                                        </div>
                                                        <div class="[ content ]">
                                                            <a href="<?php echo URLROOT . "/gig/" . $request['gigId'] ?>">
                                                                <h2><?php echo $request['title'] ?></h2>
                                                            </a>
                                                            <p><small>by </small> <a href="<?php echo URLROOT . "/profile/" . $request['uid'] ?>"><?php echo $request['firstName'] . " " . $request['lastName'] ?></p></a>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="[ data ]" hideIn="md">
                                                    <p class="[ tag ]"><?php echo $request['category'] ?></p>
                                                </div>
                                                <div class="[ data ]" hideIn="sm">
                                                    <h3>LKR <?php echo $request['offer'] ?></h3>
                                                </div>
                                                <div class="[ data ]" hideIn="lg">
                                                    <h3><?php echo $request['timePeriod'] ?> Months</h3>
                                                </div>
                                                <div class="[ data ]" hideIn="lg">
                                                    <h3><?php echo $request['location'] ?></h3>
                                                </div>
                                                <div class="[ data ]" hideIn="md">
                                                    <p><?php echo $request['requestedDate'] ?></p>
                                                </div>
                                                <div class="[ data ]">
                                                    <div class="[ actions ]">
                                                        <button for="<?php echo $request['requestId'] ?>"><i class="fa fa-chevron-circle-down"></i></button>
                                                        <a href="<?php echo URLROOT ?>/checkout/<?php echo $request['requestId'] ?>" class="btn btn-primary">Cancel Request</a>
                                                    </div>
                                                </div>
                                                <div id="<?php echo $request['requestId'] ?>" class="[ expand ]">

                                                    <div class="[ data ]" showIn="md">
                                                        <p class="[ tag ]"><?php echo $request['category'] ?></p>
                                                    </div>
                                                    <div class="[ data ]" showIn="sm">
                                                        <h4>Offer :</h4>
                                                        <p>LKR <?php echo $request['offer'] ?></p>
                                                    </div>
                                                    <div class="[ data ]" showIn="lg">
                                                        <h4>Time Periold :</h4>
                                                        <p><?php echo $request['timePeriod'] ?> Months</p>
                                                    </div>
                                                    <div class="[ data ]" showIn="lg">
                                                        <h4>Location</h4>
                                                        <p><?php echo $request['location'] ?></p>
                                                    </div>
                                                    <div class="[ data ]" showIn="md">
                                                        <h4>Request Date</h4>
                                                        <p><?php echo $request['requestedDate'] ?></p>
                                                    </div>

                                                    <div class="[ data ]" always>
                                                        <h4>Your Message :</h4>
                                                        <p><?php echo $request['message'] ?></p>
                                                        <button class="btn btn-primary">Edit</button>
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
                            <h2>Agrologist Updates</h2>
                            <p>View expert advice on growing your crops with our agrologist reports and tailored suggestions.</p>
                        </div>
                        <?php
                        if (!isset($fieldVisits) || empty($fieldVisits)) {
                            require(COMPONENTS . "dashboard/noDataFound.php");
                        } else {
                        ?>

                            <div class="[ ]">
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
                                <div class="[ grid__table ]" style="
                                        --xl-cols: 3fr 1.5fr 1fr 1fr 1fr 0.5fr;
                                        --lg-cols: 2fr 1fr 1fr 0.5fr;
                                        --md-cols: 3fr 1fr 0.5fr;
                                        --sm-cols: 1fr 0.2fr;
                                ">
                                    <div class="[ head ]">
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
                                                <div class="[ data ]">
                                                    <div class="[ actions ]">
                                                        <button for="<?php echo $fieldVisit['visitId'] ?>"><i class="fa fa-chevron-circle-down"></i></button>
                                                    </div>
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

                <div class="tab" id="4">
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