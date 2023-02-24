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
    <link rel="stylesheet" href="<?php echo CSS ?>/investor/mywithdraw.css">

    <title>Dashboard | Investor</title>
</head>

<body>

    <?php
    $active = "mywithdraw";
    $title = "Withdrawl";
    require_once("navigator.php");
    ?>

    <?php $name = "Janith"; ?>

    <div class="[ container ][ investments ]" container-type="dashboard-section">
        <div class="[ caption ]">
            <h3>Track all your withdrawal in one place!</h3>
            <p>Your earnings are just a click away! Use our withdrawal page to quickly and securely request your funds, and watch your investment pay off.</p>
        </div>
        <div class="[ filters ]">
            <div class="[ options ]">
                <div class="[ input__control ]">
                    <label for="from">From :</label>
                    <input id="from" type="date">
                </div>
                <div class="[ input__control ]">
                    <label for="to">To :</label>
                    <input id="to" type="date">
                </div>
                <div class="[ input__control ]">
                    <label for="location">Location :</label>
                    <select id="location">
                        <option value="all">All</option>
                        <option value="colombo">Colombo</option>
                        <option value="galle">Galle</option>
                        <option value="kandy">Kandy</option>
                        <option value="matara">Matara</option>
                        <option value="nuwaraeliya">Nuwara Eliya</option>
                        <option value="trincomalee">Trincomalee</option>
                    </select>
                </div>
                <div class="[ input__control ]">
                    <label for="category">Category :</label>
                    <select id="category">
                        <option value="all">All</option>
                        <option value="vegetable">Vegetable</option>
                        <option value="fruit">Fruit</option>
                        <option value="grains">Grains</option>
                        <option value="spices">Spices</option>
                    </select>
                </div>
                <div class="[ input__control ]">
                    <button type="button">Apply</button>
                </div>

            </div>
            <div class="[ search ]">
                <input type="text" placeholder="Search">
                <button type="button">
                    <i class="fas fa-search"></i>
                </button>
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