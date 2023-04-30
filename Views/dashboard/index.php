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
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>/investor/index.css">

    <title>Dashboard | Investor</title>
</head>

<body>

    <?php
    $active = "dashboard";
    $title = "Dashboard";
    require_once("navigator.php");
    ?>

    <?php $name = "Janith"; ?>

    <div class="[ container ][ dashboard ]" container-type="dashboard-section">
        <div class="[ header ]">
            <div class="[ flex-col center-x ][ title ]">
                <h3>Welcome Back,</h3>
                <h1><?php echo $name; ?></h1>
                <p>Welcome to the Agriculture Investment Dashboard.</p>
            </div>
            <div class="[ flex-col center-x ][ balance ]">
                <h3>Balance</h3>
                <div class="[ amount ]">
                    <span class="[ LKRBadge ]"></span>
                    <h1><?php echo number_format($totalBalance, 2, '.', ',') ?></h1>
                </div>
            </div>
        </div>

        <div class="[ grid ][ cards ]" md="2" lg="4">
            <div class="[ card ]">
                <h3>Total Investments</h3>
                <div class="[ amount ]">
                    <span class="[ LKRBadge ]"></span>
                    <h1><?php echo number_format($totalInvestment, 2, '.', ',') ?></h1>
                    <h4>12% <i class="fa-solid fa-arrow-down"></i></h4>
                </div>
                <p>Compared to (LKR 21340 last month)</p>
            </div>

            <div class="[ card ]">
                <h3>Total Income</h3>
                <div class="[ amount ]">
                    <span class="[ LKRBadge ]"></span>
                    <h1><?php echo number_format($totalGain, 2, '.', ',') ?></h1>
                    <h4>12% <i class="fa-solid fa-arrow-up"></i></h4>
                </div>
                <p>Compared to (LKR 21340 last month)</p>
            </div>

            <div class="[ card ]">
                <h3>Profilt</h3>
                <div class="[ amount ]">
                    <span class="[ LKRBadge ]"></span>
                    <h1><?php echo number_format($totalProfit, 2, '.', ',') ?></h1>
                    <h4>12% <i class="fa-solid fa-arrow-down"></i></h4>
                </div>
                <p>Compared to (LKR 21340 last month)</p>
            </div>

            <div class="[ card ]">
                <h3>Widthdraw</h3>
                <div class="[ amount ]">
                    <span class="[ LKRBadge ]"></span>
                    <h1><?php echo number_format($totalWithdrawn, 2, '.', ',') ?></h1>
                    <h4>12% <i class="fa-solid fa-arrow-up"></i></h4>
                </div>
                <p>Compared to (LKR 21340 last month)</p>
            </div>

        </div>

        <div class="[ charts ]">
            <div class="[ chart ]">
                <canvas id="myChart"></canvas>
            </div>
            <div class="[ chart ]">
                <canvas id="pieChart"></canvas>
            </div>
        </div>


        <div class="[ progress__inestments ]">
            <div class="[ block progress ]">

                <div class="[ heading ]">
                    <h4>Progress</h4>
                    <a href="<?php echo URLROOT ?>/dashboard/gigs">View All</a>
                </div>

                <div class="[ card ]">
                    <div class="[ image ]">
                        <img src="<?php echo IMAGES ?>/temp/2.jpg" alt="">
                    </div>
                    <div class="[ details ]">
                        <div class="[ flex-row-space-between grow ]">
                            <div class="[ flex-col ]">
                                <h3>title</h3>
                                <h5>Farmer name</h5>
                            </div>
                            <div class="[ flex-col ]">
                                <h3>150000.00</h3>
                                <h5>3 months</h5>
                            </div>
                        </div>
                        <label>50%</label>
                        <progress value="50" max="100"></progress>
                        <div class="[ flex-row-end ]">
                            <button class="[ btn ]">View</button>
                            <button class="[ btn ]">View</button>
                        </div>
                    </div>
                </div>
                <div class="[ card ]">
                    <div class="[ image ]">
                        <img src="<?php echo IMAGES ?>/temp/2.jpg" alt="">
                    </div>
                    <div class="[ details ]">
                        <div class="[ flex-row-space-between grow ]">
                            <div class="[ flex-col ]">
                                <h3>title</h3>
                                <h5>Farmer name</h5>
                            </div>
                            <div class="[ flex-col ]">
                                <h3>150000.00</h3>
                                <h5>3 months</h5>
                            </div>
                        </div>
                        <label>50%</label>
                        <progress value="50" max="100"></progress>
                        <div class="[ flex-row-end ]">
                            <button class="[ btn ]">View</button>
                            <button class="[ btn ]">View</button>
                        </div>
                    </div>
                </div>

            </div>

            <div class="[ block investments ]">
                <div class="[ heading ]">
                    <h4>Investments</h4>
                    <a href="<?php echo URLROOT ?>/dashboard/myinvestments">View All</a>
                </div>
                <?php
                if (!isset($investments) || empty($investments)) {
                    echo '<h3>No data found</h3>';
                } else {
                ?>
                    <table class="[ ]">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Farmer name</th>
                                <th>Amount</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            $limit = 5;
                            foreach ($investments as $investment) {
                                if ($limit == 0) {
                                    break;
                                }
                                $limit--;
                            ?>
                                <tr>
                                    <td><?php echo $investment['title'] ?></td>
                                    <td class="[ LKR ]"><?php echo number_format($investment['amount'], 2, '.', ',') ?></td>
                                    <td><?php echo $investment['investedDate'] ?></td>
                                </tr>

                            <?php
                            }
                            ?>

                        </tbody>
                    </table>


                <?php



                } ?>
            </div>
        </div>


        <div class="[ grid ][ profit__widthdrawal ]" gap="2" md="2">
            <div class="[ block Profits ]">
                <div class="[ heading ]">
                    <h4>Profits</h4>
                    <a href="<?php echo URLROOT ?>/dashboard/profits">View All</a>
                </div>

                <?php
                if (!isset($profits) || empty($profits)) {
                    echo '<h3>No data found</h3>';
                } else {
                ?>
                    <table class="[ ]">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Farmer name</th>
                                <th>Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($profits as $profit) {
                            ?>
                                <tr>
                                    <td><?php echo $profit['wDate'] ?></td>
                                    <td><?php echo $profit['wTime'] ?></td>
                                    <td class="[ LKR ]"><?php echo number_format($profit['amount'], 2, '.', ',') ?></td>
                                </tr>

                            <?php
                            }
                            ?>

                        </tbody>
                    </table>
                <?php
                }

                ?>
            </div>
            <div class="[ block widthdrawal ]">
                <div class="[ heading ]">
                    <h4>Widthdrawal</h4>
                    <a href="<?php echo URLROOT ?>/dashboard/withdraw">View All</a>
                </div>
                <?php
                if (!isset($widthdrawals) || empty($widthdrawals)) {
                    echo '<h3>No data found</h3>';
                } else {
                ?>
                    <table class="[ ]">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Farmer name</th>
                                <th>Amount</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            foreach ($widthdrawals as $widthdrawal) {
                            ?>
                                <tr>
                                    <td><?php echo $widthdrawal['wDate'] ?></td>
                                    <td><?php echo $widthdrawal['wTime'] ?></td>
                                    <td class="[ LKR ]"><?php echo number_format($widthdrawal['amount'], 2, '.', ',') ?></td>
                                </tr>

                            <?php
                            }
                            ?>

                        </tbody>
                    </table>


                <?php



                } ?>

            </div>
        </div>
    </div>
    <?php
    require_once("footer.php");
    ?>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="<?php echo JS ?>/main.js"></script>
</body>

</html>