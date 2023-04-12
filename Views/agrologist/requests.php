<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agrologist | Dashboard</title>
    <link rel="icon" type="image/x-icon" href="<?php echo IMAGES ?>/favicon.png">
    <link rel="stylesheet" href="../Webroot/css/ui.css">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>/base.css">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>/grid.css">
    <link rel="stylesheet" href="<?php echo CSS ?>/agrologist/requests.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
</head>

<body class="bg-gray h-screen">
    <?php
    $active = "requests";
    require_once("navigator.php");
    ?>
    <div class="[ container ][ dashboard ]" container-type="dashboard-section">
        <h1 class="[ page-heading-1 ]">requests</h1>

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
                                <img src="<?php echo UPLOADS . '/' . $request['image'] ?>" alt="">
                            </div>
                            <form action="<?php echo URLROOT . '/agrologist/requests' ?>" method="POST">
                                <div class="flex flex-row " style="width: 600px">
                                    <div class="[ request__content ]">

                                        <h1>
                                            <a class="[ text-dec-none  text-dark  ]"
                                                href="<?php echo URLROOT . "/agrologist/requests/" . $request['requestId'] ?>">
                                                <?php echo ucwords($request['fullName']) ?>
                                            </a>
                                        </h1>
                                        <h4>
                                            <?php echo ucwords($request['city']) ?>
                                        </h4>

                                        <h4 class="fw-6">
                                            LKR
                                            <?php echo ucwords($request['offer']) ?>
                                        </h4>

                                        <h5>
                                            <?php echo ucwords($request['timePeriod']) ?> days
                                        </h5>
                                        <!-- <p>fcvjbhnj</p> -->
                                        <meter class="average-rating" min="0" max="5" value="5" title="4.3 out of 5 stars"
                                            style="--percent: calc(<?php echo $request['total'] / ($request['num'] * 3) ?>/5*100%)">4.3
                                            out of 5</meter>

                                        <!-- <p class="flex flex-row">
                                            <span class="fa fa-star rating_checked"></span>
                                            <span class="fa fa-star rating_checked"></span>
                                            <span class="fa fa-star rating_checked"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                        </p> -->

                                    </div>
                                    <div class="flex flex-row flex-c-c">
                                        <button type="submit" value="<?php echo $request['requestId'] ?> "
                                            class="btn btn-primary mr-2 mt-2" name="accept">Accept</button>
                                        <button type="submit" value="<?php echo $request['requestId'] ?> "
                                            class="btn btn-danger mt-2" name="decline">Decline</button>
                                    </div>
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


    <?php require "footer.php"; ?>
    <script src="<?php echo JS ?>/agrologist.js"></script>

</body>

</html>