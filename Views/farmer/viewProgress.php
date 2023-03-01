<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="<?php echo IMAGES ?>/favicon.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>/base.css">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>/grid.css">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>/gridTable.css">
    <link rel="stylesheet" href="<?php echo CSS ?>/farmer/viewProgress.css">

    <title>Dashboard | Farmer</title>
</head>


<body>

    <?php
    $active = "progress";
    $title = "view Progress";
    require_once("navigator.php");
    ?>



    <div class="container" container-type="dashboard-section">

        <div class="[ caption ]">
            <h3>Track all of your ongoing gigs with investors.</h3>
            <p>Stay on top of your gigs and provide excellent service to your investors by regularly checking this page.</p>
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
                        <img src="<?php echo UPLOADS . $investor['image'] ?>" />
                    </div>
                    <div class="[ profile__details ]">
                        <a href="<?php echo URLROOT . '/profile/' . $investor['uid'] ?>"><?php echo $investor['firstName'] . " " . $investor['lastName']; ?></a>
                        <p><?php echo $investor['city']; ?></p>
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

        <?php
        if (!isset($gigs) || empty($gigs)) {
            require(COMPONENTS . "dashboard/noDataFound.php");
        } else {
        ?>

            <div class="[ ]">
                <div class="[ grid ][ filters ]" md="1" lg="2" gap="2">
                    <div class="[ grid ][ options ]" sm="1" md="6" lg="6" gap="1">
                        <div class="[ input__control ]">
                            <label for="from">Start Date :</label>
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
                                        --xl-cols: 3fr 1.5fr 1fr 1fr 1fr 1fr;
                                        --lg-cols: 1.75fr 1.25fr 1fr 0.75fr;
                                        --md-cols: 2fr 1fr 1fr;
                                        --sm-cols: 2fr 1fr;
                                ">
                    <div class="[ head ]">
                        <div class="[ data ]">
                            <p>Week</p>
                        </div>
                        <div class="[ data ]" hideIn="sm">
                            <p>Investor</p>
                        </div>
                        <div class="[ data ]" hideIn="md">
                            <p>Investments</p>
                        </div>
                        <div class="[ data ]" hideIn="lg">
                            <p>Started Date</p>
                        </div>
                        <div class="[ data ]" hideIn="lg">
                            <p>Days left</p>
                        </div>
                    </div>
                    <div class="[ body ]">
                        <?php
                        foreach ($gigs as $gig) {
                        ?>
                            <div class="[ row ]">
                                <div class="[ data ]">
                                    <div class="[ item__card ]">
                                        <div class="[ img ]">
                                            <img width="50" src="<?php echo UPLOADS . $gig['gimage'] ?>" />
                                        </div>
                                        <div class="[ content ]">
                                            <h2><?php echo $gig['title'] ?></h2>
                                            <p><?php echo $gig['location'] ?></p>
                                            <!-- <p><?php echo $gig['category'] ?></p> -->
                                        </div>
                                    </div>
                                </div>
                                <div class="[ data ]" hideIn="sm">
                                    <div class="[ profile__card ]">
                                        <div class="[ img ]">
                                            <img width="50" src="<?php echo UPLOADS . $gig['uimage'] ?>" />
                                        </div>
                                        <div class="[ content ]">
                                            <a href="<?php echo URLROOT . '/profile/' . $gig['investorId']; ?>"><?php echo $gig['firstName'] . " " . $gig['lastName'] ?></a>
                                            <p><?php echo $gig['city'] ?></p>

                                        </div>
                                    </div>
                                </div>
                                <div class="[ data ]" hideIn="md">
                                    <p><?php echo $gig['category'] ?></p>
                                </div>
                                <div class="[ data ]" hideIn="lg">
                                    <p><?php echo $gig['timestamp'] ?></p>
                                </div>
                                <div class="[ data ]" hideIn="lg">
                                    <p><?php echo $gig['timestamp'] ?></p>
                                </div>
                                <div class="[ data ]">
                                    <div class="[ actions ]">
                                        <!-- <button for="<?php echo $gig['gigId'] ?>"><i class="fa fa-chevron-circle-down"></i></button> -->
                                        <a href="<?php echo URLROOT ?>/farmer/progress/<?php echo $gig['gigId'] ?>" class="btn btn-primary">View More</a>
                                    </div>
                                </div>
                                <!-- <div id="<?php echo $gig['gigId'] ?>" class="[ expand ]">
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
                                </div> -->
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
    <?php
    require_once("footer.php");
    ?>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="<?php echo JS ?>/dashboard/chart.js"></script>
    <script src="<?php echo JS ?>/dashboard/dashboard.js"></script>
</body>

</html>