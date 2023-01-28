<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>govithena | dashboard</title>
    <link rel="stylesheet" type="text/css" href="<?php echo CSS ?>/sidebar.css">
    <link rel="stylesheet" href="<?php echo CSS ?>/ui.css">
    <link rel="stylesheet" href="<?php echo CSS ?>/dashHeader.css">
    <!-- <link rel="stylesheet" href="<?php echo CSS ?>/dashFooter.css"> -->
    <link rel="stylesheet" href="<?php echo CSS ?>/gigs.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
</head>
<style>


</style>

<body class="bg-gray">
    <?php include COMPONENTS . 'dashboard/header.php'; ?>
    <?php include 'sidebar.php'; ?>
    <div class="container">

        <div class="mt-4">
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
                        $imageURL = UPLOADS . $p["image"];
                    ?>
                        <div class="card">
                            <div class="img_wrapper">
                                <img width="100" alt="test" src="<?php echo $imageURL ?>" />
                            </div>
                            <div class="card_content">
                                <h1><?php echo $p['title'] ?></h1>
                                <h4><?php echo $p['category'] ?></h4>
                                <h2><?php echo $p['capital'] ?></h2>
                                <p><?php echo $p['location'] ?></p>
                                <p><?php echo $p['landArea'] ?></p>
                                <p><?php echo $p['description'] ?></p>
                                <div class="actions">
                                    <a href="#" class="btn btn-primary">Edit</a>
                                    <a href="#" class="btn btn-danger">delete</a>
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



    <!-- <script src="https://kit.fontawesome.com/b8084a92f1.js" crossorigin="anonymous"></script> -->
</body>

</html>