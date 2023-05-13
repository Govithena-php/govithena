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

        <div class="[ caption ]">
            <h3>Farmers</h3>
            <p>Keep an eye on the status of your investments with our investor dashboard. Quickly see which requests are accepted, rejected, or still pending, and stay in the know about the progress of your investments.</p>
        </div>

        <div class="[ requests__container ]">
            <?php
            if (!isset($farmers) || empty($farmers)) {
            ?>
                <div class="[ no_requests__card ]">
                    <p class=''>No Requests</p>
                </div>
            <?php
            } else {
            ?>
                <div class="[ requests__wrapper ]">
                    <?php
                    foreach ($farmers as $request) {
                    ?>

                        <div class="[ request__card ]">
                            <div class="left">
                                <div class="[ request__img ]">
                                    <img src="<?php echo UPLOADS ?>/profilePictures/<?php echo $request['image'] ?>" alt="">
                                </div>
                                <div class="name">
                                    <h1> <?php echo ucwords($request['firstName'] . " " . $request['lastName']) ?></h1>
                                    <h5 style="color:rgba(26, 155, 11, 1);"><?php echo ucwords($request['city']) ?></h5>
                                </div>
                            </div>
                            <div class="right">
                                <a class="button__primary" href=" <?php echo URLROOT ?>/tech/assignedGigs">Assigned Gigs</a>
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
    require_once("footer.php");
    ?>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="<?php echo JS ?>/dashboard/chart.js"></script>
    <script src="<?php echo JS ?>/dashboard/dashboard.js"></script>
</body>

</html>