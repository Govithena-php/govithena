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
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>/table.css">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>/tech/editGig.css">

    <title>Dashboard | Tech</title>
</head>

<body>

    <?php
    $active = "dashboard";
    $title = "Dashboard";
    require_once("navigator.php");
    ?>

    <?php $name = "Janith"; ?>

    <div class="[ container ][ dashboard ]" container-type="dashboard-section">
        <div class="gig_top">
            <div class="gig_left">
                <div class="gig__img">
                    <img src="<?php echo UPLOADS . $gig['thumbnail'] ?>">
                </div>
                <div class="slider">
                    <div class="slide_img">
                        <img src="<?php echo UPLOADS . $gig['thumbnail'] ?>">
                    </div>
                    <div class="slide_img">
                        <img src="<?php echo UPLOADS . $gig['thumbnail'] ?>">
                    </div>
                    <div class="slide_img">
                        <img src="<?php echo UPLOADS . $gig['thumbnail'] ?>">
                    </div>
                    <div class="slide_img">
                        <img src="<?php echo UPLOADS . $gig['thumbnail'] ?>">
                    </div>
                </div>
            </div>
            <div class="gig__right">
                <div class="gig__content">
                    <h2><?php echo $gig['title'] ?></h2>
                    <p><?php echo $gig['category'] ?></p>
                </div>
            </div>
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