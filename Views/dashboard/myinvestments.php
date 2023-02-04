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
    $active = "myinvestments";
    $title = "My Investments";
    require_once("navigator.php");
    ?>

    <?php $name = "Janith"; ?>

    <div class="[ container ][ investments ]" container-type="dashboard-section">

        <?php

        if (isset($error)) {
            require_once(COMPONENTS . "dashboard/noDataFound.php");
        } else {
            if (empty($investments)) {
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
                    foreach ($investments as $investment) {
                    ?>
                        <div class="[ investment ]">
                            <h3><?php echo $investment['title'] ?></h3>
                            <p><?php echo $investment['amount'] ?></p>
                            <p><?php echo $investment['timestamp'] ?></p>
                            <p><?php echo $investment['category'] ?></p>
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