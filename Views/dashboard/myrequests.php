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
    <link rel="stylesheet" href="<?php echo CSS ?>/investor/myrequests.css">

    <title>Dashboard | Investor</title>
    <!-- <style>
        *{
            outline: 1px solid limegreen;
        }
    </style> -->
</head>

<body>

    <?php
    $active = "myrequests";
    require_once("navigator.php");
    ?>

    <?php $name = "Janith"; ?>

    <div class="[ container ][ ]" container-type="dashboard-section">
        <h1 class="[ page-heading-1 ]">my requests</h1>

        <div class="[ requests__continer ]">
            <h2>Accepted Requests</h2>
            <?php
            if (!isset($ar) || empty($ar)) {
            ?>
                <div class="[ no_requests__card ]">
                    <p class=''>No Requests</p>
                </div>
            <?php
            } else {
            ?>
                <div class="[ requests__wrapper ]">
                    <?php
                    foreach ($ar as $request) {
                    ?>
                        <div class="[ request__card ]">
                            <div class="[ request__img ]">
                                <img src="<?php echo UPLOADS . $request['image'] ?>" />
                            </div>
                            <div class="[ request__content ]">
                                <div class="[ request__content_header ]">
                                    <div>
                                        <h2><?php echo $request['title'] ?></h2>
                                        <div class="[ flex mb-1 ]">
                                            <p class="[ mr-1 ]">by</p>
                                            <p><?php echo $request['firstName'] . " " . $request['lastName'] ?></p>
                                        </div>
                                    </div>
                                    <div>
                                        <h4><?php echo $request['requestedDate'] ?></h4>
                                        <div class="[ tag ]">
                                            <p><?php echo $request['category'] ?></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="[ flex flex-sb-c ]">
                                    <div class="[ flex gap-2 ]">
                                        <div class="[ bottom_left ]">
                                            <span>offer :</span>
                                            <p><?php echo $request['offer'] ?></p>
                                        </div>
                                        <div class="[ bottom_left ]">
                                            <span>Time Period :</span>
                                            <p><?php echo $request['timePeriod'] ?></p>
                                        </div>
                                        <div class="[ bottom_left ]">
                                            <span>Location :</span>
                                            <p><?php echo $request['location'] ?></p>
                                        </div>
                                    </div>

                                    <div class="[ flex flex-c-c gap-1 ]">
                                        <a href="<?php echo URLROOT ?>/checkout/<?php echo $request['requestId'] ?>" class="btn btn-primary">pay</a>
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


        <div class="[ requests__continer ]">
            <h2>Pending Requests</h2>
            <?php
            if (!isset($pr) || empty($pr)) {
            ?>
                <div class="[ no_requests__card ]">
                    <p class=''>No Requests</p>
                </div>
            <?php
            } else {
            ?>
                <div class="[ requests__wrapper ]">
                    <?php
                    foreach ($pr as $request) {
                    ?>
                        <div class="[ request__card ]">
                            <div class="[ request__img ]">
                                <img src="<?php echo UPLOADS . $request['image'] ?>" />
                            </div>
                            <div class="[ request__content ]">
                                <div class="[ request__content_header ]">
                                    <div>
                                        <h2><?php echo $request['title'] ?></h2>
                                        <div class="[ flex mb-1 ]">
                                            <p class="[ mr-1 ]">by</p>
                                            <p><?php echo $request['firstName'] . " " . $request['lastName'] ?></p>
                                        </div>
                                    </div>
                                    <div>
                                        <h4><?php echo $request['requestedDate'] ?></h4>
                                        <div class="[ tag ]">
                                            <p><?php echo $request['category'] ?></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="[ flex flex-sb-c ]">
                                    <div class="[ flex gap-2 ]">
                                        <div class="[ bottom_left ]">
                                            <span>offer :</span>
                                            <p><?php echo $request['offer'] ?></p>
                                        </div>
                                        <div class="[ bottom_left ]">
                                            <span>Time Period :</span>
                                            <p><?php echo $request['timePeriod'] ?></p>
                                        </div>
                                        <div class="[ bottom_left ]">
                                            <span>Location :</span>
                                            <p><?php echo $request['location'] ?></p>
                                        </div>
                                    </div>

                                    <div class="[ flex flex-c-c gap-1 ]">
                                        <button class="btn btn-primary">edit</button>
                                        <button class="btn btn-primary">delete</button>
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

        <div class="[ requests__continer ]">
            <h2>Rejected Requests</h2>
            <?php
            if (!isset($rr) || empty($rr)) {
            ?>
                <div class="[ no_requests__card ]">
                    <p class=''>No Requests</p>
                </div>
            <?php
            } else {
            ?>
                <div class="[ requests__wrapper ]">
                    <?php
                    foreach ($rr as $request) {
                    ?>
                        <div class="[ request__card ]">
                            <div class="[ request__img ]">
                                <img src="<?php echo UPLOADS . $request['image'] ?>" />
                            </div>
                            <div class="[ request__content ]">
                                <div class="[ request__content_header ]">
                                    <div>
                                        <h2><?php echo $request['title'] ?></h2>
                                        <div class="[ flex mb-1 ]">
                                            <p class="[ mr-1 ]">by</p>
                                            <p><?php echo $request['firstName'] . " " . $request['lastName'] ?></p>
                                        </div>
                                    </div>
                                    <div>
                                        <h4><?php echo $request['requestedDate'] ?></h4>
                                        <div class="[ tag ]">
                                            <p><?php echo $request['category'] ?></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="[ flex flex-sb-c ]">
                                    <div class="[ flex gap-2 ]">
                                        <div class="[ bottom_left ]">
                                            <span>offer :</span>
                                            <p><?php echo $request['offer'] ?></p>
                                        </div>
                                        <div class="[ bottom_left ]">
                                            <span>Time Period :</span>
                                            <p><?php echo $request['timePeriod'] ?></p>
                                        </div>
                                        <div class="[ bottom_left ]">
                                            <span>Location :</span>
                                            <p><?php echo $request['location'] ?></p>
                                        </div>
                                    </div>

                                    <div class="[ flex flex-c-c gap-1 ]">
                                        <button class="btn btn-primary">resend</button>
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
    <script src="<?php echo JS ?>/navbar/navbar.js"></script>
    <script src="<?php echo JS ?>/dashboard/dashboard.js"></script>
</body>

</html>