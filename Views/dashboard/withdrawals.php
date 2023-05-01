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
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>/gridTable.css">
    <link rel="stylesheet" href="<?php echo CSS ?>/investor/withdrawals.css">

    <title>Dashboard | Investor</title>
</head>

<body>

    <?php
    $active = "withdrawals";
    $title = "Withdrawals";
    require_once("navigator.php");
    ?>

    <div class="[ container ][ investments ]" container-type="dashboard-section">
        <div class="[ caption ]">
            <h3>Track all your withdrawal in one place!</h3>
            <p>Your earnings are just a click away! Use our withdrawal page to quickly and securely request your funds, and watch your investment pay off.</p>
        </div>
        <div class="inv__cards">
            <div class="inv__card">
                <div class="inv__card__header">
                    <h3>This Month Profit</h3>
                </div>
                <div class="inv__card__body">
                    <h1 class="[ LKR ]">
                        <?php
                        if (isset($totalInvestment)) echo number_format($totalInvestment, 2, '.', ',');
                        else echo "0.00";
                        ?></h1>

                    <?php
                    if (isset($monthSinceJoined)) {
                        echo "<p>Within " . $monthSinceJoined + 1;
                        if ($monthSinceJoined > 1) echo " months";
                        else echo " month";
                    }
                    ?>

                </div>
            </div>

            <div class="inv__card">
                <div class="inv__card__header">
                    <h3>This Month Withdrawals</h3>
                </div>
                <div class="inv__card__body">
                    <h1 class="[ LKR ]">
                        <?php
                        if (isset($thisMonthInvestment)) echo number_format($thisMonthInvestment, 2, '.', ',');
                        else echo "0.00";
                        ?>
                    </h1>
                    <?php
                    if (isset($precentage)) {
                        if ($precentage > 0) echo "<p class='clr__primary'>" . $precentage . " % <i class='fa fa-arrow-up'></i> </p>";
                        else echo "<p class='clr__danger'>" . $precentage . " % <i class='fa fa-arrow-down'></i></p>";
                    }
                    ?>
                </div>
            </div>

            <div class="inv__card">
                <div class="inv__card__header">
                    <h3>Balance</h3>
                </div>
                <div class="inv__card__body">
                    <h1 class="[ LKR ]">
                        <?php
                        if (isset($thisMonthInvestment)) echo number_format($thisMonthInvestment, 2, '.', ',');
                        else echo "0.00";
                        ?>
                    </h1>
                    <?php
                    if (isset($precentage)) {
                        if ($precentage > 0) echo "<p class='clr__primary'>" . $precentage . " % <i class='fa fa-arrow-up'></i> </p>";
                        else echo "<p class='clr__danger'>" . $precentage . " % <i class='fa fa-arrow-down'></i></p>";
                    }
                    ?>
                </div>
            </div>

            <div class="inv__new">
                <button class="[ button__primary ]">Invest More</button>
            </div>
        </div>
        <?php

        if (isset($error)) {
            require(COMPONENTS . "dashboard/noDataFound.php");
        } else {
            if (empty($withdrawls)) {
                require(COMPONENTS . "dashboard/noDataFound.php");
            } else {
        ?>

                <div class="[ grid__table ]" style="
                --xl-cols: 1fr 1fr 1fr 1fr;
                --lg-cols: 1fr 1fr 1fr 1fr;
                --md-cols: 1fr 1fr;
                --sm-cols: 1fr;
                 ">
                    <div class="[ head stick_to_top ]">
                        <div class="[ grid ][ filters ]" md="1" lg="2" gap="2">
                            <div class="[ grid ][ options ]" sm="1" md="6" lg="6" gap="1">
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
                        <div class="[ row ]">
                            <div class="[ data ]">
                                <p>Date</p>
                            </div>
                            <div class="[ data ]">
                                <p>Time</p>
                            </div>
                            <div class="[ data ]">
                                <p>Amount</p>
                            </div>
                            <div class="[ data ]">
                                <p>Status</p>
                            </div>
                        </div>
                    </div>
                    <div class="[ body ]">
                        <?php
                        foreach ($withdrawls as $withdrawl) {
                        ?>
                            <div class="[ row ]">
                                <div class="[ data ]">
                                    <p><?php echo $withdrawl['wDate'] ?></p>
                                </div>
                                <div class="[ data ]">
                                    <p><?php echo $withdrawl['wTime'] ?></p>
                                </div>
                                <div class="[ data ]">
                                    <p class="[ LKR ]"><?php echo number_format($withdrawl['amount'], 2, '.', ',') ?></p>
                                </div>
                                <div class="[ data ]">
                                    <p><?php echo $withdrawl['status'] ?></p>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>

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