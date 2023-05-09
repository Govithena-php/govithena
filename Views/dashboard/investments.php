<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="<?php echo IMAGES ?>/favicon.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="<?php echo CSS ?>/ui.css">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>/base.css">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>/grid.css">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>/gridTable.css">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>/filters.css">
    <link rel="stylesheet" href="<?php echo CSS ?>/investor/investments.css">

    <title>Dashboard | Investor</title>
</head>

<body>

    <?php
    $active = "investments";
    $title = "Investments";
    require_once("navigator.php");
    ?>

    <div class="[ container ][ investments ]" container-type="dashboard-section">
        <div class="[ caption ]">
            <h3>View all your investment activity in one place.</h3>
            <p>Easily track your investments and see how your portfolio has grown over time.</p>
        </div>
        <div class="inv__cards">
            <div class="inv__card">
                <div class="inv__card__header">
                    <h3>Total Investment</h3>
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
                    <h3>This Month Investment</h3>
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
                        if ($precentage > 0) echo "<p class='clr__primary'>" . $precentage . " % <i class='bi bi-arrow-up'></i></p>";
                        else echo "<p class='clr__danger'>" . $precentage . " % <i class='bi bi-arrow-down'></i></p>";
                    }
                    ?>
                </div>
            </div>

            <div class="inv__card">
                <div class="inv__card__header">
                    <h3>Total Gigs</h3>
                </div>
                <div class="inv__card__body">
                    <?php
                    if (isset($totalGigs)) echo "<h1>" . $totalGigs . "</h1>";
                    else echo "<h1>0</h1>";
                    ?>
                    <p>
                        <?php
                        if (isset($activeGigs)) {
                            echo $activeGigs;
                            if ($activeGigs > 1) echo " Active gigs";
                            else echo " Active gig";
                        } else echo "0 Active gigs";
                        ?>

                    </p>
                </div>
            </div>

            <div class="inv__new">
                <a href="<?php echo URLROOT ?>/dashboard/newInvestment" class="[ button__primary ]">Invest</a>
            </div>
        </div>
        <?php

        if (empty($investments)) {
        ?>

            <form class="[ filters pt-1 ]" action="<?php echo URLROOT ?>/dashboard/investments" method="POST">
                <div class="[ options ]">
                    <div class="[ input__control ]">
                        <label for="fromDate">From</label>
                        <input id="fromDate" name="fromDate" tag="fromDate" type="date">
                    </div>
                    <div class="[ input__control ]">
                        <label for="toDate">To</label>
                        <input id="toDate" name="toDate" tag="toDate" type="date">
                    </div>
                    <div class="[ input__control ]">
                        <label for="category">Category</label>
                        <select id="category" name="category">
                            <option value="all">All</option>
                            <option value="vegetable">Vegetable</option>
                            <option value="fruit">Fruit</option>
                            <option value="grains">Grains</option>
                            <option value="spices">Spices</option>
                        </select>
                    </div>
                    <div class="[ input__control ]">
                        <button type="submit" name="submit" class="button__primary">Apply</button>
                    </div>

                </div>
            </form>
            <hr>
            <br>

        <?php
            require(COMPONENTS . "dashboard/noDataFound.php");
        } else {
        ?>

            <div class="[ requests__wrapper ]">
                <div class="[ grid__table ]" style="
                                        --xl-cols:  2.5fr 1fr 1.5fr 1fr 2fr 1fr;
                                        --lg-cols: 1.5fr 0.5fr 0.5fr 1fr;
                                        --md-cols: 1fr 0.5fr;
                                        --sm-cols: 2fr;
                                    ">
                    <div class="[ head stick_to_top ]">
                        <form class="[ filters ]" action="<?php echo URLROOT ?>/dashboard/investments" method="POST">
                            <div class="[ options ]">
                                <div class="[ input__control ]">
                                    <label for="fromDate">From</label>
                                    <input id="fromDate" name="fromDate" tag="fromDate" type="date">
                                </div>
                                <div class="[ input__control ]">
                                    <label for="toDate">To</label>
                                    <input id="toDate" name="toDate" tag="toDate" type="date">
                                </div>
                                <div class="[ input__control ]">
                                    <label for="category">Category</label>
                                    <select id="category" name="category">
                                        <option value="all">All</option>
                                        <option value="vegetable">Vegetable</option>
                                        <option value="fruit">Fruit</option>
                                        <option value="grains">Grains</option>
                                        <option value="spices">Spices</option>
                                    </select>
                                </div>
                                <div class="[ input__control ]">
                                    <button type="submit" name="submit" class="button__primary">Apply</button>
                                </div>

                            </div>
                        </form>
                        <div class="[ row ]">
                            <div class="[ data ]">
                                <p>Gig</p>
                            </div>
                            <div class="[ data ]" hideIn="md">
                                <p>Category</p>
                            </div>
                            <div class="[ data ]" hideIn="md">
                                <p>Farmer</p>
                            </div>
                            <div class="[ data ]" hideIn="sm">
                                <p>Amount</p>
                            </div>
                            <div class="[ data ]" hideIn="lg">
                                <p>Description</p>
                            </div>
                            <div class="[ data ]" hideIn="md">
                                <p>Invested Date</p>
                            </div>
                        </div>
                    </div>
                    <div class="[ body ]">
                        <?php
                        foreach ($investments as $investment) {
                        ?>
                            <div class="[ row ]">
                                <div class="[ data ]">
                                    <div class="[ item__card ]">
                                        <div class="[ img ]">
                                            <img src="<?php echo UPLOADS . $investment['thumbnail'] ?>" />
                                        </div>
                                        <div class="[ content ]">
                                            <a href="<?php echo URLROOT . "/gig/" . $investment['gigId'] ?>">
                                                <h2 class="limit-text-2"><?php echo $investment['title'] ?></h2>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="[ data ]" hideIn="md">
                                    <p class="[ tag ]"><?php echo $investment['category'] ?></p>
                                </div>
                                <div class="[ data ]" hideIn="lg">
                                    <div class="table_farmer_image_and_name">
                                        <div class="img"><img src="<?php echo UPLOADS . "/profilePictures/" . $investment['image'] ?>" /></div>
                                        <p class="name limit-text-2"><?php echo $investment['firstName'] . " " . $investment['firstName'] ?></p>
                                    </div>
                                </div>
                                <div class="[ data ]" hideIn="sm">
                                    <p class="LKR"><?php echo number_format($investment['amount'], 2, '.', ',') ?></p>
                                </div>
                                <div class="[ data ]" hideIn="lg">
                                    <p class="limit-text-2"><?php echo $investment['description'] ?></p>
                                </div>
                                <div class="[ data ]" hideIn="md">
                                    <p><?php echo $investment['investedDate'] ?><br><?php echo $investment['investedTime'] ?></p>

                                    <p></p>
                                </div>

                                <div id="<?php echo $investment['id'] ?>" class="[ expand ]">

                                    <div class="[ data ]" showIn="md">
                                        <p class="[ tag ]"><?php echo $investment['category'] ?></p>
                                    </div>
                                    <div class="[ data ]" showIn="sm">
                                        <h4>Offer</h4>
                                        <p class="LKR"><?php echo number_format($investment['offer'], 2, '.', ',') ?></p>
                                    </div>
                                    <div class="[ data ]" showIn="lg">
                                        <h4>Description</h4>
                                        <p><?php echo $investment['description'] ?> Months</p>
                                    </div>
                                    <div class="[ data ]" showIn="lg">
                                        <h4>Invested Date</h4>
                                        <p><?php echo $investment['investedDate'] ?></p>
                                    </div>
                                    <div class="[ data ]" showIn="md">
                                        <h4>Invested Time</h4>
                                        <p><?php echo $investment['investedTime'] ?></p>
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
        }
        ?>

    </div>
    <?php
    require_once("footer.php");
    ?>
    <script src="<?php echo JS ?>/main.js"></script>
    <script src="<?php echo JS ?>/filter/toDateFromDate.js"></script>

</body>

</html>