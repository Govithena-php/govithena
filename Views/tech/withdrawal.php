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
    <link rel="stylesheet" href="<?php echo CSS ?>/tech/withdrawal.css">

    <title>Dashboard | Tech</title>
</head>

<body>

    <?php
    $active = "withdrawal";
    $title = "Withdrawal";
    require_once("navigator.php");
    ?>

    <?php $name = "Janith"; ?>

    <div class="[ container ][ investments ]" container-type="dashboard-section">
        <div class="[ caption ]">
            <h3>Track all your withdrawal in one place!</h3>
            <p>Your earnings are just a click away! Use our withdrawal page to quickly and securely request your funds, and watch your investment pay off.</p>
        </div>
        <div class="inv__cards">
            <div class="inv__card">
                <div class="inv__card__header">
                    <h3>Total Withdrawals</h3>
                </div>
                <div class="inv__card__body">
                    <h1 class="[ LKR ]">
                        <?php
                        if (isset($totalWithdrawals)) echo number_format($totalWithdrawals, 2, '.', ',');
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
                        if (isset($thisMonthTotalWithdrawals)) echo number_format($thisMonthTotalWithdrawals, 2, '.', ',');
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
                <button class="[ button__primary ]">Withdraw</button>
            </div>
        </div>
        <?php

        if (!isset($techWithdrawal) || empty($techWithdrawal)) {
            require(COMPONENTS . "dashboard/noDataFound.php");
        } else {
        ?>
            <div class="[ grid__table ]" style="
                --xl-cols: 1fr 1fr 1fr 1fr 1fr 1fr;
                --lg-cols: 1fr 1fr 1fr 1fr;
                --md-cols: 1fr 1fr;
                --sm-cols: 1fr;
                 ">
                <div class="[ head stick_to_top ]">
                    <div class="[ row ]">
                        <div class="[ data ]">
                            <h3>Date</h3>
                        </div>
                        <div class="[ data ]">
                            <h3>Time</h3>
                        </div>
                        <div class="[ data ]">
                            <h3>Amount</h3>
                        </div>
                        <div class="[ data ]">
                            <h3>Account Number</h3>
                        </div>
                        <div class="[ data ]">
                            <h3>Bank</h3>
                        </div>
                        <div class="[ data ]">
                            <h3>Status</h3>
                        </div>
                    </div>
                </div>
                <div class="[ body ]">
                    <?php
                    foreach ($techWithdrawal as $withdrawl) {
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
                                <p class="[ LKR ]"><?php echo number_format($withdrawl['amount'], 2, '.', ',') ?></p>
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
        ?>

    </div>
    <?php
    require_once("footer.php");
    ?>
    <script src="<?php echo JS ?>/dashboard/dashboard.js"></script>
</body>

</html>