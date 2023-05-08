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
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>/filters.css">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>/alertModal.css">

    <link rel="stylesheet" href="<?php echo CSS ?>/investor/gig.css">

    <title>Dashboard | Investor</title>
</head>

<body>
    <dialog id="confirmModal" class="[ alertModal ]">
        <div class="[ container ]">
            <i class="bi bi-x-circle"></i>
            <div class="[ content ]">
                <h2>Are you sure?</h2>
                <p>Do you really want to mark this gig as completed? This process can't be undone.</p>
            </div>
            <form id="deleteForm" action="<?php echo URLROOT ?>/dashboard/gig_mark_as_under_review" method="POST" class="[ buttons ]">
                <button type="button" class="[ button__primary ]" onclick="closeConfirmModal()" data-dismiss="modal">No, Cancel</button>
                <button id="" name="gigId" value="<?php echo $gigId ?>" type="submit" class="[ button__danger ]">Yes, Confirm</button>
            </form>
        </div>
    </dialog>
    <?php
    $active = "gigs";
    $title = "Gig";
    require_once("navigator.php");
    ?>

    <div class="[ container ]" container-type="dashboard-section">
        <div class="[ caption ]">
            <h3>Track your gig with ease!</h3>
            <p>You can monitor every step of your gig's progress and stay in control of the outcome.</p>
        </div>
        <?php
        if ($gig['status'] == 'COMPLETED') {
        ?>
            <div class="floating__message">
                <div class="icon">
                    <i class="bi bi-check-circle"></i>
                </div>
                <div class="content">
                    <h2>This gig is completed!</h2>
                    <p>Explore your past investments, stay updated with progress reports, and receive valuable insights from our agrologists. However, for this gig, no new investments can sprout. Stay tuned for exciting opportunities ahead!</p>
                </div>
            </div>
        <?php
        }
        ?>
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
                                <i class="bi bi-coin"></i>
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
                                <i class="bi bi-currency-dollar"></i>
                            </div>
                            <div class="[ details ]">
                                <h2><?php echo $gig['profitMargin'] ?> %</h2>
                                <p>Expected profit</p>
                            </div>
                        </div>
                        <div class="[ card ]">
                            <div class="[ icon ]">
                                <i class="bi bi-calendar2-week"></i>
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
                                <i class="bi bi-tree"></i>
                            </div>
                            <div class="[ details ]">
                                <h2><?php echo $gig['landArea'] ?> Hectare</h2>
                                <p>Of Land</p>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                if ($gig['status'] == "UNDER_COMPLETION") {
                ?>
                    <div class="[ special__announcment special__announcment-danger ]">
                        <div class="[ icon ]">
                            <i class="bi bi-bell"></i>
                        </div>
                        <div class="[ details grow ]">
                            <h3>Gig has been marked as completed</h3>
                            <p>The gig has been marked as completed by the farmer. Confirm to proceed with the next steps.</p>
                        </div>
                        <button onclick="openConfirmModal()" class="button__primary">Confirm</button>
                    </div>
                <?php
                } else if ($gig['status'] == "UNDER_REVIEW") {
                ?>
                    <div class="[ special__announcment special__announcment-secondary ]">
                        <div class="[ icon ]">
                            <i class="bi bi-bell"></i>
                        </div>
                        <div class="[ details grow ]">
                            <h3>Tell us how you feel.</h3>
                            <p>Please take time to write your feedback about the farmer and gig and help us to provide better services.</p>
                        </div>
                        <div class="actions"><a href="<?php echo URLROOT . '/dashboard/review/' . $gig['gigId'] ?>" class="button__primary">Write a review</a></div>
                    </div>

                <?php
                } else {

                    $latestAr = $recentActivities[0];
                ?>
                    <div class="[ special__announcment ]">
                        <div class="[ icon ]">
                            <i class="bi bi-bell"></i>
                        </div>
                        <div class="[ details grow ]">
                            <h3><?php echo str_replace("_", " ", $latestAr['type']) ?></h3>
                            <?php
                            if ($latestAr['type'] == 'INVESTMENT') {
                            ?>
                                <p>You have invested <strong class="LKR"><?php echo number_format($latestAr['amount'], 2, '.', ',') ?></strong></p>
                            <?php
                            } else if ($latestAr['type'] == 'PROGRESS') {
                            ?>
                                <p class="">New progress update record has been created.</p>
                            <?php
                            } else if ($latestAr['type'] == 'FIELD_VISIT') {
                            ?>
                                <p class="">New Field visit record has been created.</p>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
            <div>
                <div class="[ messages ]">
                    <div class="[ title ]">
                        <h3>Recent Activities</h3>
                    </div>
                    <?php
                    if (!isset($recentActivities) || empty($recentActivities)) {
                        require(COMPONENTS . "dashboard/noDataFound.php");
                    } else {
                        foreach ($recentActivities as $ra) {
                    ?>
                            <div class="[ activity ]">
                                <div class="[ details ]">
                                    <div class="icon_and_type">
                                        <div class="[ icon ]">
                                            <?php
                                            if ($ra['type'] == 'INVESTMENT') {
                                                echo "<i class='bi bi-coin'></i>";
                                            } else if ($ra['type'] == 'PROGRESS') {
                                                echo "<i class='bi bi-graph-up-arrow'></i>";
                                            } else if ($ra['type'] == 'FIELD_VISIT') {
                                                echo "<i class='bi bi-tree'></i>";
                                            } else {
                                                echo "<i class='bi bi-bell'></i>";
                                            }
                                            ?>
                                        </div>
                                        <h5><?php echo str_replace("_", " ", ucwords($ra['type'])) ?></h5>
                                    </div>
                                    <?php
                                    if ($ra['type'] == 'INVESTMENT') {
                                    ?>
                                        <p>You have invested <strong class="LKR"><?php echo number_format($ra['amount'], 2, '.', ',') ?></strong></p>
                                    <?php
                                    } else if ($ra['type'] == 'PROGRESS') {
                                    ?>
                                        <p class="">New progress update record has been created.</p>
                                    <?php
                                    } else if ($ra['type'] == 'FIELD_VISIT') {
                                    ?>
                                        <p class="">New Field visit record has been created.</p>
                                    <?php
                                    }

                                    ?>
                                    <div class="[ time ]">
                                        <p><?php echo $ra['timestamp'] ?></p>
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

        <div class="[ tabs ][ gigTabs ]" tab="4">
            <div class="controls">
                <!-- <button class="control" for="1">Analysis</button> -->
                <button class="control" for="2" active>Progress Updates</button>
                <button class="control" for="3">Agrologist Updates</button>
                <button class="control" for="4">Investments</button>
                <button class="control" for="5">About Gig</button>
            </div>
            <div class="wrapper">
                <!-- <div class="tab" id="1">
                    <div class="[ requests__continer ]">
                        <div class="[ caption ]">
                            <h2>Analysis</h2>
                            <p>Get the most out of your data with our analysis section - the ultimate tool for unlocking valuable insights and making smarter decisions.</p>
                        </div>
                    </div>
                </div> -->

                <div class="tab" id="2" active="true">
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
                                        --xl-cols:  2.5fr 1.5fr 1fr 1fr 1.5fr 0.2fr;
                                        --lg-cols: 1.5fr 0.75fr 0.75fr 0.3fr;
                                        --md-cols: 2fr 0.5fr;
                                        --sm-cols: 2fr 1fr;
                                    ">
                                    <div class="[ head stick_to_top ]">

                                        <div class="[ row ]">
                                            <div class="[ data ]">
                                                <p>Title</p>
                                            </div>
                                            <div class="[ data ]" hideIn="md">
                                                <p>By</p>
                                            </div>
                                            <div class="[ data ]" hideIn="md">
                                                <p>Updated Date</p>
                                            </div>
                                            <div class="[ data ]" hideIn="md">
                                                <p>Updated Time</p>
                                            </div>
                                            <div class="[ data ]" hideIn="md">
                                                <p>Short Description</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="[ body ]">
                                        <?php
                                        foreach ($progress as $pr) {
                                        ?>
                                            <div class="[ row ]">
                                                <div class="[ data ]">
                                                    <p><?php echo $pr['subject'] ?></p>
                                                </div>
                                                <div class="[ data ]">
                                                    <div class="table_farmer_image_and_name">
                                                        <div class="img">
                                                            <img src="<?php echo UPLOADS . '/profilePictures/' . $pr['image'] ?>" alt="">
                                                        </div>
                                                        <div class="name">
                                                            <p><?php echo $pr['firstName'] . ' ' . $pr['lastName'] ?></p>
                                                            <small><?php echo ucwords($pr['userType']) ?></small>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="[ data ]" hideIn="md">
                                                    <p><?php echo $pr['date'] ?></p>
                                                </div>
                                                <div class="[ data ]" hideIn="md">
                                                    <p><?php echo $pr['time'] ?></p>
                                                </div>
                                                <div class="[ data ]" hideIn="md">
                                                    <p class="limit-text-1"><?php echo $pr['description'] ?></p>
                                                </div>
                                                <div class="[ actions ]">
                                                    <button for="<?php echo $pr['progressId'] ?>"><i class="bi bi-three-dots-vertical"></i></button>
                                                </div>
                                                <div id="<?php echo $pr['progressId'] ?>" class="[ expand progress__more ]">

                                                    <div class="[ data ]" showIn="md">
                                                        <div class="[ progress__date_time ]">
                                                            <div class="[ date ]">
                                                                <h4>Updated Date</h4>
                                                                <h3><?php echo $pr['date'] ?></h3>
                                                            </div>
                                                            <div class="[ time ]">
                                                                <h4>Updated Time</h4>
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
                                                                    <img src="<?php echo UPLOADS . '/progress/' . $img ?>">
                                                                </div>
                                                            <?php
                                                            }
                                                            ?>
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
                                <div class="[ grid__table ]" style="
                                        --xl-cols: 2fr 1.5fr 1fr 1fr 2.5fr 0.3fr;
                                        --lg-cols: 2fr 1fr 1fr 0.5fr;
                                        --md-cols: 3fr 1fr 0.5fr;
                                        --sm-cols: 1fr 0.2fr;
                                ">
                                    <div class="[ head stick_to_top ]">

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
                                                <p>Visit Time</p>
                                            </div>
                                            <div class="[ data ]" hideIn="lg">
                                                <p>Visit Details</p>
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
                                                            <p><?php echo $fieldVisit['week'] ?></p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="[ data ]" hideIn="sm">
                                                    <div class="table_farmer_image_and_name">
                                                        <div class="img">
                                                            <img src="<?php echo UPLOADS . '/profilePictures/' . $fieldVisit['uimage'] ?>" alt="">
                                                        </div>
                                                        <div class="name">
                                                            <p><?php echo $fieldVisit['firstName'] . ' ' . $fieldVisit['lastName'] ?></p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="[ data ]" hideIn="md">
                                                    <p><?php echo $fieldVisit['visitDate'] ?></p>
                                                </div>
                                                <div class="[ data ]" hideIn="md">
                                                    <p><?php echo $fieldVisit['visitTime'] ?></p>
                                                </div>
                                                <div class="[ data ]" hideIn="md">
                                                    <p class="limit-text-1"><?php echo $fieldVisit['fieldVisitDetails'] ?></p>
                                                </div>
                                                <div class="[ actions ]">
                                                    <button for="<?php echo $fieldVisit['visitId'] ?>"><i class="bi bi-three-dots-vertical"></i></button>
                                                </div>
                                                <div id="<?php echo $fieldVisit['visitId'] ?>" class="[ expand ]">
                                                    <div class="[ expand__card ]" showIn="sm">
                                                        <h3>Agrologist</h3>
                                                        <div class="table_farmer_image_and_name">
                                                            <div class="img">
                                                                <img src="<?php echo UPLOADS . '/profilePictures/' . $fieldVisit['uimage'] ?>" alt="">
                                                            </div>
                                                            <div class="name">
                                                                <p><?php echo $fieldVisit['firstName'] . ' ' . $fieldVisit['lastName'] ?></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="[ expand__card ]" showIn="md">
                                                        <h3>Visited Dat</h3>
                                                        <p><?php echo $fieldVisit['visitDate'] ?></p>
                                                    </div>
                                                    <div class="[ expand__card ]" showIn="lg">
                                                        <h3>visited Time Date :</h3>
                                                        <p><?php echo $fieldVisit['visitTime'] ?></p>
                                                    </div>

                                                    <div class="[ data ]" always>
                                                        <div class="[ progress__content ]">
                                                            <h4>Visit Details</h4>
                                                            <p><?php echo $fieldVisit['fieldVisitDetails'] ?></p>
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
                        <div class="flex-row-space-between align-items-end">
                            <div class="[ caption ]">
                                <h2>Investments</h2>
                                <p>Get the most out of your data with our analysis section - the ultimate tool for unlocking valuable insights and making smarter decisions.</p>
                            </div>
                            <?php
                            if ($gig['status'] == 'RESERVED') {
                            ?>
                                <div class="inv__new">
                                    <a href="<?php echo URLROOT ?>/dashboard/newInvestment/<?php echo $gig['gigId'] ?>" class="[ button__primary ]">Invest More</a>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                        <?php
                        if (!isset($investments)) {
                            require(COMPONENTS . "dashboard/noDataFound.php");
                        } else {
                        ?>
                            <div class="[ requests__wrapper ]">
                                <div class="[ grid__table ]" style="
                                        --xl-cols: 2fr 1fr 1fr 1fr;
                                        --lg-cols: 1fr 1fr 1fr;
                                        --md-cols: 1fr 1fr 1fr;
                                        --sm-cols: 1fr 1fr 1fr;
                                    ">
                                    <div class="[ head stick_to_top ]">

                                        <!-- <form class="[ filters ]" action="<?php echo URLROOT . '/dashboard/gig/' . $igId ?>" method="POST">
                                            <div class="[ options ]">
                                                <div class="[ input__control ]">
                                                    <label for="fromDate">From</label>
                                                    <input id="fromDate" name="fromDate" tag="fromDate" type="date">
                                                </div>
                                                <div class="[ input__control ]">
                                                    <label for="toDate">To</label>
                                                    <input id="toDate" name="toDate" tag="toDate" type="date">
                                                </div>
                                                <div class="[ input__control ]">
                                                    <button type="submit" name="submit" class="button__primary">Apply</button>
                                                </div>
                                            </div>
                                        </form> -->

                                        <div class="[ row ]">
                                            <div class="[ data ]">
                                                <p>Description</p>
                                            </div>
                                            <div class="[ data ]">
                                                <p>Amount</p>
                                            </div>
                                            <div class="[ data ]">
                                                <p>Date</p>
                                            </div>
                                            <div class="[ data ]" hideIn="md">
                                                <p>Time</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="[ body ]">
                                        <?php
                                        foreach ($investments as $investment) {
                                        ?>
                                            <div class="[ row ]">
                                                <div class="[ data ]" hideIn="md">
                                                    <p><?php echo $investment['description'] ?></p>
                                                </div>
                                                <div class="[ data ]" hideIn="md">
                                                    <p class="[ LKR ]"><?php echo number_format($investment['amount'], 2, '.', ',') ?></p>
                                                </div>
                                                <div class="[ data ]" hideIn="md">
                                                    <p><?php echo $investment['date'] ?></p>
                                                </div>
                                                <div class="[ data ]" hideIn="md">
                                                    <p><?php echo $investment['time'] ?></p>
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
                    <div class="[ about__gig_container ]">
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
    <script src="<?php echo JS ?>/main.js"></script>
    <script src="<?php echo JS ?>/tabs.js"></script>
    <script src="<?php echo JS ?>/gridTable.js"></script>
    <script src="<?php echo JS ?>/filter/toDateFromDate.js"></script>
    <script>
        function openConfirmModal() {
            const confirmModal = document.getElementById("confirmModal")
            confirmModal.showModal()
        }

        function closeConfirmModal() {
            const confirmModal = document.getElementById("confirmModal")
            confirmModal.close()
        }
    </script>
</body>

</html>