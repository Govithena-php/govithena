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
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>/gridTable.css">
    <link rel="stylesheet" href="<?php echo CSS ?>/ui.css">

    <link rel="stylesheet" href="<?php echo CSS ?>/farmer/gigs.css">

    <title>Dashboard | Farmer</title>
</head>

<body>

    <?php
    $datadata = $notifications;
    $active = "progress";
    $title = "Progress";
    require_once("navigator.php");
    ?>


    <div class="[ container ][ gigs ]" container-type="dashboard-section">
        <div class="btn_wrapper">
            <h2>Active Gigs</h2>
            <!-- <a class="btn btn-primary" href="<?php echo URLROOT ?>/farmer/createGig">Add New</a> -->
        </div>
        <!-- <div class="gig_wrapper">

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
                    $imageURL = UPLOADS . $p["thumbnail"];
                ?>
                    <div class="card">
                        <div class="img_wrapper">
                            <img width="100" alt="test" src="<?php echo $imageURL ?>" />
                        </div>
                        <div class="card_content">
                            <h1><?php echo ucwords($p['title']) ?></h1>
                            <h4><?php echo ucwords($p['category']) ?></h4>
                            <div style="color: grey">Initial Investment</div>
                            <h2 class="LKR"><?php echo $p['capital'] ?></h2>
                            <div style="color: grey">Location</div>
                            <p><?php echo ucwords($p['city']) ?></p>
                            <div style="color: grey">Land Area</div>
                            <p><?php echo $p['landArea'] ?> Hectare</p>
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
        </div> -->






        <div class="grid__table" style="
                                --xl-cols: 0.7fr 1.6fr 1fr 0.9fr 0.9fr 0.5fr 2.1fr 0.7fr;
                            ">
            <div class="head">
                <div class="row">
                    <div class="data">
                        <p></p>
                    </div>
                    <div class="data remove-border">
                        <p>Title</p>
                    </div>
                    <div class="data remove-border">
                        <p>Investor Name</p>
                    </div>
                    <div class="data">
                        <p>Initial Investment</p>
                    </div>
                    <div class="data">
                        <p>Location</p>
                    </div>
                    <!-- <div class="data">
                                    <p>Status</p>
                                </div> -->
                    <div class="data">
                        <p>Land Area</p>
                    </div>
                    <div class="data">
                        <p>Description</p>
                    </div>
                </div>
            </div>
            <div class="body">
                <?php
                foreach ($products as $p) {
                ?>
                    <div class="row">
                        <div class="data farmer__">
                            <div class="farmerimg">
                                <img src="<?php echo UPLOADS . '/' . $p['thumbnail'] ?>" alt="Picture">
                            </div>
                        </div>
                        <div class="data ">
                            <div class="namecol">
                                <h1>
                                    <p><?php echo $p['title'] ?></p>
                                </h1>
                                <p><?php echo $p['category'] ?></p>
                            </div>
                        </div>
                        <div class="data">
                            <p><?php echo $p['fName'] . " " . $p['lName'] ?></p>
                        </div>
                        <div class="data">
                            <p class="LKR"><?php echo number_format($p['capital'], 2, '.', ',') ?></p>
                        </div>
                        <div class="data">
                            <p><?php echo $p['city'] ?></p>
                        </div>
                        <!-- <div class="data">
                                    <p><?php echo $p['status'] ?></p>
                                </div> -->
                        <div class="data">
                            <p><?php echo $p['landArea'] ?></p>
                        </div>
                        <div class="data">
                            <p class="limit-text-3"><?php echo $p['description'] ?></p>
                        </div>
                        <div class="data flex-right">
                            <div class="actions">
                                <a class="btn btn-primary" href="<?php echo URLROOT ?>/farmer/progressUpdate/<?php echo $p['gigId'] ?>">View</a>
                                <!-- <button onclick="openAcceptModal('<?php echo $p['gigId'] ?>')" class="button__primary">Accept</button> -->
                                <!-- <button onclick="openRejectModal('<?php echo $p['gigId'] ?>')" class="button__danger">Reject</button> -->
                                <!-- <a href="<?php echo URLROOT . "/farmer/deleteGig/" . $p['gigId'] ?>" class="btn btn-danger">Delete</a> -->
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
    require_once("footer.php");
    ?>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="<?php echo JS ?>/dashboard/chart.js"></script>
    <script src="<?php echo JS ?>/dashboard/dashboard.js"></script>
</body>

</html>