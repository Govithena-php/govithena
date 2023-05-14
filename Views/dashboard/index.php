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
            <div class="[ flex-col center-x top__svg ]">
                <img class="" src="<?php echo IMAGES ?>/svg/nature.svg" />
            </div>
        </div>

        <div class="[ grid ][ cards ]" md="2" lg="4">
            <div class="[ card ]">
                <h3>Total Investments</h3>
                <div class="[ amount ]">
                    <span class="[ LKRBadge ]"></span>
                    <h1><?php echo number_format($totalInvestment, 2, '.', ',') ?></h1>
                </div>
            </div>

            <div class="[ card ]">
                <h3>Total Earnings</h3>
                <div class="[ amount ]">
                    <span class="[ LKRBadge ]"></span>
                    <h1><?php echo number_format($totalEarnings, 2, '.', ',') ?></h1>
                </div>
            </div>

            <div class="[ card ]">
                <h3>Total Widthdrawal</h3>
                <div class="[ amount ]">
                    <span class="[ LKRBadge ]"></span>
                    <h1><?php echo number_format($totalWithdrawn, 2, '.', ',') ?></h1>
                </div>
            </div>

            <div class="[ card ]">
                <h3>Withdrawable Balance</h3>
                <div class="[ amount ]">
                    <span class="[ LKRBadge ]"></span>
                    <h1><?php echo number_format($withdrawableBalance['balance'], 2, '.', ',') ?></h1>
                </div>
            </div>

        </div>

        <div class="[ charts charts-mb-3 ]">
            <div class="[ chart ]">
                <?php
                if (!isset($data)) {
                    echo '<canvas id="lineChart"></canvas>';
                } else {
                ?>
                    <div class="chart__no_data">
                        <h3 class="chart__title">Investments vs Earnings</h3>
                        <i class="bi bi-x-circle"></i>
                        <p>No data to display.</p>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
        <div class="[ grid charts-mb-3 ]" lg="3" gap="2">
            <div class="[ chart ]">
                <?php
                if (!isset($data)) {
                    echo '<canvas id="categoryVsGigsChart"></canvas>';
                } else {
                ?>
                    <div class="chart__no_data">
                        <h3 class="chart__title">Category vs Gigs</h3>
                        <i class="bi bi-x-circle"></i>
                        <p>No data to display.</p>
                    </div>
                <?php
                }
                ?>
            </div>
            <div class="[ chart ]">
                <?php
                if (!isset($data)) {
                    echo '<canvas id="categoryVsInvestment"></canvas>';
                } else {
                ?>
                    <div class="chart__no_data">
                        <h3 class="chart__title">Category VS Investments</h3>
                        <i class="bi bi-x-circle"></i>
                        <p>No data to display.</p>
                    </div>
                <?php
                }
                ?>
            </div>
            <div class="[ chart ]">
                <?php
                if (!isset($data)) {
                    echo '<canvas id="categoryVsEarnings"></canvas>';
                } else {
                ?>
                    <div class="chart__no_data">
                        <h3 class="chart__title">Category VS Earnings</h3>
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
                    <h4>Active Gigs</h4>
                    <a href="<?php echo URLROOT ?>/dashboard/gigs">View All</a>
                </div>
                <?php
                if (!isset($reservedGigs) || empty($reservedGigs)) {
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
                    <div class="progress__wrapper">
                        <?php
                        foreach ($reservedGigs as $reservedGig) {
                        ?>
                            <div class="[ card ]">
                                <div class="[ image ]">
                                    <img src="<?php echo UPLOADS . $reservedGig['thumbnail'] ?>" alt="">
                                </div>
                                <div class="[ details ]">
                                    <div class="[ flex-column-space-between ]">
                                        <div class="">
                                            <h1 class="limit-text-2"><?php echo $reservedGig['title'] ?></h1>
                                            <h5><?php echo $reservedGig['firstName'] . " " . $reservedGig['lastName'] ?></h5>
                                        </div>
                                    </div>
                                    <div class="[ flex-row-space-between align-items-end ]">
                                        <h3 class="tag"><?php echo str_replace("_", " ", $reservedGig['status']) ?></h3>
                                        <a href="<?php echo URLROOT ?>/dashboard/gig/<?php echo $reservedGig['gigId'] ?>" class="[ button__primary ]">View</a>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                <?php
                }
                ?>
            </div>

            <div class="[ block investments ]">
                <div class="[ heading ]">
                    <h4>Investments</h4>
                    <a href="<?php echo URLROOT ?>/dashboard/investments">View All</a>
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
                                <th>Gig</th>
                                <th>Amount</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($investments as $investment) {
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
                    <h4>Earnings</h4>
                    <a href="<?php echo URLROOT ?>/dashboard/earnings">View All</a>
                </div>

                <?php
                if (!isset($earnings) || empty($earnings)) {
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
                                <th>Gig</th>
                                <th>Amount</th>
                                <th>Date</th>
                                <th>status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($earnings as $earning) {
                            ?>
                                <tr>
                                    <td><?php echo $earning['title'] ?></td>
                                    <td class="[ LKR ]"><?php echo number_format($earning['amount'], 2, '.', ',') ?></td>
                                    <td><?php echo $earning['eDate'] ?></td>
                                    <td><?php echo $earning['status'] ?></td>
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
                                <th>Bank</th>
                                <th>Amount</th>
                                <th>Date</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            foreach ($widthdrawals as $widthdrawal) {
                            ?>
                                <tr>
                                    <td><?php echo BANK[$widthdrawal['bank']] ?></td>
                                    <td class="[ LKR ]"><?php echo number_format($widthdrawal['amount'], 2, '.', ',') ?></td>
                                    <td><?php echo $widthdrawal['wDate'] ?></td>
                                    <td><?php echo $widthdrawal['status'] ?></td>
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
        fetch('<?php echo URLROOT ?>/api/investmentsVsEarningsLineChart')
            .then(response => response.json())
            .then(result => {
                const lineChart = new Chart(document.getElementById('lineChart'), {
                    type: 'bar',
                    data: result,
                    options: {
                        plugins: {
                            title: {
                                display: true,
                                text: 'Investments vs Earnings (LKR)'
                            }
                        },
                        scales: {
                            x: {
                                title: {
                                    display: true,
                                    text: 'Month'
                                }
                            },
                            y: {
                                title: {
                                    display: true,
                                    text: 'Investments & Earnings (LKR)'
                                }
                            }
                        }
                    }
                })
            })
    </script>

    <script>
        fetch('<?php echo URLROOT ?>/api/categoryVsGigsChart')
            .then(response => response.json())
            .then($result => {
                const color = Chart.defaults.parsing
                const categoryVsGigsChart = new Chart(document.getElementById('categoryVsGigsChart'), {
                    type: 'pie',
                    data: {
                        labels: $result.labels,
                        datasets: [{
                            label: 'Category vs Gig',
                            data: $result.data,
                            borderWidth: 1,
                            // backgroundColor: ['#1d9a5f', '#3464d3', 'rgb(255, 140, 0)', 'rgb(0, 77, 255)', 'rgb(117, 7, 135)', 'rgb(0, 128, 38)'],
                        }]
                    },
                    options: {
                        plugins: {
                            title: {
                                display: true,
                                text: 'Category vs Gig'
                            }
                        }
                    }

                })
            })
    </script>
    <script>
        fetch('<?php echo URLROOT ?>/api/categoryVsInvestments')
            .then(response => response.json())
            .then($result => {
                const categoryVsInvestment = new Chart(document.getElementById('categoryVsInvestment'), {
                    type: 'pie',
                    data: {
                        labels: $result.labels,
                        datasets: [{
                            label: 'Category vs Investments (LKR)',
                            data: $result.data,
                            borderWidth: 1,
                            // backgroundColor: ['#1d9a5f', '#3464d3', 'rgb(255, 140, 0)', 'rgb(0, 77, 255)', 'rgb(117, 7, 135)', 'rgb(0, 128, 38)'],
                        }]
                    },

                    options: {
                        plugins: {
                            title: {
                                display: true,
                                text: 'Category vs Investments (LKR)'
                            }
                        }
                    }

                })
            })
    </script>
    <script>
        fetch('<?php echo URLROOT ?>/api/categoryVsEarnings')
            .then(response => response.json())
            .then($result => {
                const categoryVsEarnings = new Chart(document.getElementById('categoryVsEarnings'), {
                    type: 'pie',
                    data: {
                        labels: $result.labels,
                        datasets: [{
                            label: 'Category vs Eearnings (LKR)',
                            data: $result.data,
                            borderWidth: 1,
                            // backgroundColor: ['#1d9a5f', '#3464d3', 'rgb(255, 140, 0)', 'rgb(0, 77, 255)', 'rgb(117, 7, 135)', 'rgb(0, 128, 38)'],
                        }]
                    },

                    options: {
                        plugins: {
                            title: {
                                display: true,
                                text: 'Category vs Earnings (LKR)'
                            }
                        }
                    }

                })
            })
    </script>
</body>

</html>