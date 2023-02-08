<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agrologist | Dashboard</title>
    <link rel="icon" type="image/x-icon" href="<?php echo IMAGES ?>/favicon.png">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>/base.css">
    <link rel="stylesheet" href="<?php echo CSS ?>/ui.css">
    <link rel="stylesheet" href="<?php echo CSS ?>/grid.css">
    <link rel="stylesheet" href="<?php echo CSS ?>/search.css">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
</head>

<body class="bg-gray h-screen">
<?php
    $active = "farmers";
    require_once("navigator.php");
    ?>
    <div class="[ container ][ dashboard ]" container-type="dashboard-section">
        <h1 class="[ page-heading-1 ]"><?php echo $gigDetails[0]['firstName'] . " " . $gigDetails[0]['lastName'] ?></h1>
        <!-- <?php print_r($gigDetails) ?> -->

        <div class="[ my-2 ] [ grid ]" gap="1" md="2" lg="4">
            <?php

            if (isset($gigDetails)) {
                // print_r($searchResult);
                foreach ($gigDetails as $gigDetail) {
                    //$imageURL = UPLOADS . $result["image"];
            
                    // echo $imageURL;
                    // die();
            
                    ?>
                    <div class="[ result__card ]">
                        <div class="[ card__img ]">

                            <!-- <img src="<?php echo $imageURL ?>" alt="test" /> -->

                            <!-- <img src="<?php echo IMAGES ?>/temp/17.jpg" alt="test"> -->
                            <div class="[ farmer__name ]">

                                <p class="ml-1">
                                    <?php echo ucwords($gigDetail['location']) ?>
                                </p>
                            </div>
                        </div>
                        <div class="[ card__content ]">
                            <a class="[ text-dec-none mb-1 fs-5 text-dark fw-6 ]" href="<?php echo URLROOT . "/agrologist/farmers/" . $gigDetail['farmerId'] . "/" . $gigDetail['gigId'] ?>">
                                <?php echo ucwords($gigDetail['title']) ?>
                            </a>
                            <div class="[ mt-1 flex flex-sb-c ]">
                                <p>
                                    <?php echo ucwords($gigDetail['category']) ?>
                                </p>
                                <p>
                                    <?php echo $gigDetail['timePeriod'] ?>
                                </p>
                            </div>
                        </div>
                    </div>

                    <?php
                }
            }
            ?>
        </div>
    </div>


    <?php require "footer.php"; ?>
    <script src="<?php echo JS ?>/app.js"></script>

</body>

</html>