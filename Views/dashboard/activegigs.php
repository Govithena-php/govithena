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
    <link rel="stylesheet" href="<?php echo CSS ?>/investor/myinvestments.css">

    <title>Dashboard | Investor</title>
</head>

<body>

    <?php
    $active = "activegigs";
    $title = "Active Gigs";
    require_once("navigator.php");
    ?>

    <?php $name = "Janith"; ?>

    <div class="[ container ][ activegigs ]" container-type="dashboard-section">

        <div class="[ investments__heading ]">
            <div class="[ investments__search ]">
                <h4>Filter</h4>
                <input type="text" placeholder="Search">
                <button type="button">
                    <i class="fas fa-search"></i>
                </button>
            </div>
            <div class="[ investments__add ]">
                <a href="<?php echo URLROOT ?>/dashboard/addinvestment">
                    withdraw
                </a>
            </div>
        </div>
        <?php

        if (isset($error)) {
            require_once(COMPONENTS . "dashboard/noDataFound.php");
        } else {
            if (empty($withdrawls)) {
                require_once(COMPONENTS . "dashboard/noDataFound.php");
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
    <script src="<?php echo JS ?>/dashboard/dashboard.js"></script>
</body>

</html>