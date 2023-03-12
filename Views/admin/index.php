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
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>/admin/index.css">

    <title>Dashboard | Admin</title>
</head>

<body>

    <?php
    $active = "dashboard";
    $title = "Dashboard";
    require_once("navigator.php");
    ?>

    <?php $name = "Janith"; ?>

    <div class="[ container ][ dashboard ]" container-type="dashboard-section">
        <!-- <div class="[ header ]">
            <div class="[ flex-col center-x ][ title ]">
                <h3>Welcome Back,</h3>
                <h1><?php echo $name; ?></h1>
                <p>Welcome to the Agriculture Investment Dashboard.</p>
            </div>
            <div class="[ flex-col center-x ][ balance ]">
                <h3>Balance</h3>
                <div class="[ amount ]">
                    <span class="[ LKRBadge ]"></span>
                    <h1>191,500.00</h1>
                </div>
            </div>
        </div> -->

        <div class="[ grid ][ cards ]" md="2" lg="4">
            <div class="[ card ]">
                <h3>Users</h3>
                <div class="[ amount ]">
                    <h1>1250</h1>
                    <h4>12% <i class="fa-solid fa-arrow-down"></i></h4>
                </div>
                <!-- <p>Compared to (LKR 21340 last month)</p> -->
            </div>

            <div class="[ card ]">
                <h3>New Users</h3>
                <div class="[ amount ]">
                    <h1>220</h1>
                    <h4>12% <i class="fa-solid fa-arrow-up"></i></h4>
                </div>
                <!-- <p>Compared to (LKR 21340 last month)</p> -->
            </div>

            <div class="[ card ]">
                <h3>Categories</h3>
                <div class="[ amount ]">
                    <!-- <span class="[ LKRBadge ]"></span> -->
                    <h1>10</h1>
                    <h4>12% <i class="fa-solid fa-arrow-down"></i></h4>
                </div>
                <p>10 new categories added.</p>
            </div>

            <div class="[ card ]">
                <h3>Active Complains</h3>
                <div class="[ amount ]">
                    <!-- <span class="[ LKRBadge ]"></span> -->
                    <h1>20</h1>
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
                    <a href="">View All</a href="">
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
                    <a href="">View All</a href="">
                </div>
                <table class="[  ]">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Farmer name</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>20/02/2022</td>
                            <td>Farmer nameFarmer name</td>
                            <td>150000.00</td>
                        </tr>
                        <tr>
                            <td>20/02/2022</td>
                            <td>Farmer name</td>
                            <td>150000.00</td>
                        </tr>
                        <tr>
                            <td>20/02/2022</td>
                            <td>Farmer name</td>
                            <td>150000.00</td>
                        </tr>
                        <tr>
                            <td>20/02/2022</td>
                            <td>Farmer nameFarmer name</td>
                            <td>150000.00</td>
                        </tr>
                        <tr>
                            <td>20/02/2022</td>
                            <td>Farmer name</td>
                            <td>150000.00</td>
                        </tr>
                        <tr>
                            <td>20/02/2022</td>
                            <td>Farmer name</td>
                            <td>150000.00</td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>


        <div class="[ grid ][ profit__widthdrawal ]" gap="2" md="2">
            <div class="[ block Profits ]">
                <div class="[ heading ]">
                    <h4>Profits</h4>
                    <a href="">View All</a href="">
                </div>
                <table class="[ ]">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Farmer name</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>20/02/2022</td>
                            <td>Farmer nameFarmer name</td>
                            <td>150000.00</td>
                        </tr>
                        <tr>
                            <td>20/02/2022</td>
                            <td>Farmer name</td>
                            <td>150000.00</td>
                        </tr>
                        <tr>
                            <td>20/02/2022</td>
                            <td>Farmer name</td>
                            <td>150000.00</td>
                        </tr>
                        <tr>
                            <td>20/02/2022</td>
                            <td>Farmer nameFarmer name</td>
                            <td>150000.00</td>
                        </tr>
                        <tr>
                            <td>20/02/2022</td>
                            <td>Farmer name</td>
                            <td>150000.00</td>
                        </tr>
                        <tr>
                            <td>20/02/2022</td>
                            <td>Farmer name</td>
                            <td>150000.00</td>
                        </tr>

                    </tbody>
                </table>
            </div>
            <div class="[ block widthdrawal ]">
                <div class="[ heading ]">
                    <h4>Widthdrawal</h4>
                    <a href="">View All</a href="">
                </div>
                <table class="[ ]">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Farmer name</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>20/02/2022</td>
                            <td>Farmer nameFarmer name</td>
                            <td>150000.00</td>
                        </tr>
                        <tr>
                            <td>20/02/2022</td>
                            <td>Farmer name</td>
                            <td>150000.00</td>
                        </tr>
                        <tr>
                            <td>20/02/2022</td>
                            <td>Farmer name</td>
                            <td>150000.00</td>
                        </tr>
                        <tr>
                            <td>20/02/2022</td>
                            <td>Farmer nameFarmer name</td>
                            <td>150000.00</td>
                        </tr>
                        <tr>
                            <td>20/02/2022</td>
                            <td>Farmer name</td>
                            <td>150000.00</td>
                        </tr>
                        <tr>
                            <td>20/02/2022</td>
                            <td>Farmer name</td>
                            <td>150000.00</td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php
    require_once("footer.php");
    ?>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="<?php echo JS ?>/dashboard/chart.js"></script>
    <script src="<?php echo JS ?>/dashboard/dashboard.js"></script>
</body>

</html>