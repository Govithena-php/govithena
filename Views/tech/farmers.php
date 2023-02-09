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
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>/table.css">
    <link rel="stylesheet" href="<?php echo CSS ?>/agrologist/requests.css">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>/tech/farmers.css">

    <title>Dashboard | Tech Assistant</title>
</head>

<body>
    <?php
    $active = "farmers";
    $title = "Farmers";
    require_once("navigator.php");
    ?>

    <div class="[ container ][ ]" container-type="dashboard-section">

        <h1 class="[ page-heading-1 ]">farmers</h1>

        <div class="[ requests__continer ]">
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

                        <div class="[ request__card bg-light ]">
                            <div class="[ request__img ]">
                                <img src="<?php echo IMAGES ?>/farmer.jpeg" alt="">
                            </div>
                            <form action="" method="POST">
                                <div class="flex flex-row " style="width: 600px">
                                    <div class="[ request__content ]">

                                        <h1>
                                            <a class="[ text-dec-none  text-dark  ]" href="<?php echo URLROOT . "/agrologist/farmers/" . $request['farmerId'] ?>">
                                                <?php echo ucwords($request['fullName']) ?>
                                            </a>
                                        </h1>
                                        <h4><?php echo ucwords($request['city']) ?></h4>
                                        <p class="flex flex-row">
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                        </p>

                                    </div>
                                    <!-- <div class="flex flex-row flex-c-c">
                            <button type="submit" value="<?php echo $request['requestId'] ?> "class="btn btn-primary mr-2 mt-2" name="accept">Accept</button>
                            <button class="btn btn-danger mt-2" name="decline">Decline</button>
                        </div> -->
                                </div>
                            </form>
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
    require_once("footer.php");
    ?>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="<?php echo JS ?>/dashboard/chart.js"></script>
    <script src="<?php echo JS ?>/dashboard/dashboard.js"></script>
</body>

</html>