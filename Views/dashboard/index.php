<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="<?php echo IMAGES ?>/favicon.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">

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

    <div class="[ container ][ dashboard ]" container-type="dashboard-section">
        <div class="[ header ]">
            <div class="[ flex-col center-x ][ title ]">
                <h3>Welcome Back,</h3>
                <h1><?php echo $currentUser->getFirstName() . " " . $currentUser->getLastName(); ?></h1>
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
                <h3 class="chart__title">Investments vs Profits</h3>
                <?php
                if (!isset($data)) {
                    echo '<canvas id="myChart"></canvas>';
                } else {
                ?>
                    <div class="chart__no_data">
                        <i class="bi bi-x-circle"></i>
                        <p>No data to display.</p>
                    </div>
                <?php
                }
                ?>
            </div>
            <div class="[ chart ]">
                <h3 class="chart__title">Gigs</h3>
                <?php
                if (!isset($data)) {
                    echo '<canvas id="pieChart"></canvas>';
                } else {
                ?>
                    <div class="chart__no_data">
                        <i class="bi bi-x-circle"></i>
                        <p>No data to display.</p>
                    </div>
                <?php
                }
                ?>
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
                ?>
                    <div class="table__data">
                        <div class="chart__no_data">
                            <i class="bi bi-x-circle"></i>
                            <p>No data to display.</p>
                        </div>
                    </div>
                <?php
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
                ?>
                    <div class="table__data">
                        <div class="chart__no_data">
                            <i class="bi bi-x-circle"></i>
                            <p>No data to display.</p>
                        </div>
                    </div>
                <?php
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
                ?>
                    <div class="table__data">
                        <div class="chart__no_data">
                            <i class="bi bi-x-circle"></i>
                            <p>No data to display.</p>
                        </div>
                    </div>
                <?php
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
    <script>
        const data = {
            labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
            datasets: [{
                    label: 'Investments',
                    data: [65, 59, 80, 81, 56, 55, 40],
                    fill: false,
                    borderColor: 'rgb(255, 99, 132)',
                    tension: 0.1,
                    yAxisID: 'y'

                },
                {
                    label: 'Gain',
                    data: [75, 20, 23, 31, 46, 95, 50],
                    fill: false,
                    borderColor: 'rgb(75, 192, 192)',
                    tension: 0.1,
                    yAxisID: 'y1'
                }
            ],
        };

        const config = {
            type: 'line',
            data: data,
            options: {
                responsive: true,
                interaction: {
                    mode: 'index',
                    intersect: false,
                },
                stacked: false,
                plugins: {},
                scales: {
                    y: {
                        type: 'linear',
                        display: true,
                        position: 'left',
                    },
                    y1: {
                        type: 'linear',
                        display: true,
                        position: 'right',
                        grid: {
                            drawOnChartArea: true,
                        },
                    },
                }
            },
        };

        const pieData = {
            labels: ['Fruits', 'Grains', 'Other', 'Vegetable', 'Spices'],
            datasets: [{
                label: 'Dataset 1',
                data: [300, 50, 100, 40, 120],
                backgroundColor: ['rgb(255, 99, 132)', 'rgb(255, 159, 64)', 'rgb(255, 205, 86)', 'rgb(75, 192, 192)', 'rgb(54, 162, 235)'],
            }]
        };

        const pieConfig = {
            type: 'pie',
            data: pieData,
            options: {
                responsive: true,
                maintainAspectRatio: true,
                plugins: {
                    legend: {
                        position: 'top',
                    }
                }
            },
        };

        const ctx = document.getElementById('myChart');
        const pieChart = document.getElementById('pieChart');

        new Chart(ctx, config);
        new Chart(pieChart, pieConfig);
    </script>
</body>

</html>