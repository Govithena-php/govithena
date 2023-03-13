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
    <link rel="stylesheet" href="<?php echo CSS ?>/ui.css">

    <link rel="stylesheet" href="<?php echo CSS ?>/farmer/gigs.css">

    <title>Dashboard | Farmer</title>
</head>

<body>

    <?php
    $datadata = $notifications;
    $active = "gigs";
    $title = "Gigs";
    require_once("navigator.php");
    ?>

    <?php $name = "Janith"; ?>

    <div class="[ container ][ gigs ]" container-type="dashboard-section">
        <div class="btn_wrapper">
            <h2>My Gigs</h2>
            <a class="btn btn-primary" href="<?php echo URLROOT ?>/farmer/createGig">Add New</a>
        </div>
        <div class="gig_wrapper">

            <?php

            if (empty($products)) {
            ?>
                <div class="no_products">
                    <h1>No Products...</h1>
                    <h3>Click the <a href="<?php echo URLROOT ?>/farmer/createGig">here</a> to add new products.</h3>
                </div>
                <?php
            } else {
                foreach ($products as $p) {
                    $imageURL = UPLOADS . "/gigThumbnails/" . $p["thumbnail"];
                ?>
                    <div class="card">
                        <div class="img_wrapper">
                            <img width="100" alt="test" src="<?php echo $imageURL ?>" />
                        </div>
                        <div class="card_content">
                            <h1><?php echo ucwords($p['title']) ?></h1>
                            <h4><?php echo ucwords($p['category']) ?></h4>
                            <div style="color: grey">Capital(LKR)</div>
                            <h2><?php echo $p['capital'] ?></h2>
                            <div style="color: grey">Location</div>
                            <p><?php echo ucwords($p['location']) ?></p>
                            <div style="color: grey">Land Area(Hectare)</div>
                            <p><?php echo $p['landArea'] ?></p>
                            <p><?php echo $p['description'] ?></p>
                            <div class="actions">
                                <a href="#" class="btn btn-primary">Edit</a>
                                <a href="<?php echo URLROOT . "/farmer/deleteGig/" . $p['gigId'] ?>" class="btn btn-danger">Delete</a>
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
    <?php
    require_once("footer.php");
    ?>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="<?php echo JS ?>/dashboard/chart.js"></script>
    <script src="<?php echo JS ?>/dashboard/dashboard.js"></script>
</body>

</html>