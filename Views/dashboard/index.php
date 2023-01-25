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
    require_once("navigator.php");
    ?>

    <?php $name = "Janith"; ?>

    <div class="[ container ][ dashboard ]" container-type="dashboard-section">
        <div class="[ header ]">
            <div class="[ flex-col center-x ][ title ]">
                <h3>Welcome Back,</h3>
                <h1><?php echo $name; ?></h1>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit.</p>
            </div>
            <div class="[ flex-col center-x ][ balance ]">
                <h3>Balance</h3>
                <div class="[ amount ]">
                    <span class="[ LKRBadge ]"></span>
                    <h1>1500000.00</h1>
                </div>
            </div>
        </div>

        <div class="[ grid ][ cards ]" md="2" lg="4">
            <div class="[ card ]">
                <h3>Investments</h3>
                <div class="[ amount ]">
                    <span class="[ LKRBadge ]"></span>
                    <h1>1500000.00</h1>
                    <h4>12% <i class="fa-solid fa-arrow-down"></i></h4>
                </div>
                <p>Compared to (LKR 21340 last month)</p>
            </div>

            <div class="[ card ]">
                <h3>Gain</h3>
                <div class="[ amount ]">
                    <span class="[ LKRBadge ]"></span>
                    <h1>1500000.00</h1>
                    <h4>12% <i class="fa-solid fa-arrow-up"></i></h4>
                </div>
                <p>Compared to (LKR 21340 last month)</p>
            </div>

            <div class="[ card ]">
                <h3>Profilt</h3>
                <div class="[ amount ]">
                    <span class="[ LKRBadge ]"></span>
                    <h1>1500000.00</h1>
                    <h4>12% <i class="fa-solid fa-arrow-down"></i></h4>
                </div>
                <p>Compared to (LKR 21340 last month)</p>
            </div>

            <div class="[ card ]">
                <h3>Widthdraw</h3>
                <div class="[ amount ]">
                    <span class="[ LKRBadge ]"></span>
                    <h1>15000.00</h1>
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
    <footer class="[ footer ]">
        <div class="[ container ]" container-type="dashboard-footer">
            <div class="[ grid ]" gap="2" md="3">
                <div class="[ box ]">
                    <h3>About</h3>
                    <ul>
                        <li><a href="<?php echo URLROOT ?>/">About us</a></li>
                        <li><a href="<?php echo URLROOT ?>/">Our services</a></li>
                        <li><a href="<?php echo URLROOT ?>/">Term and conditions</a></li>
                        <li><a href="<?php echo URLROOT ?>/">privacy and policies</a></li>
                    </ul>
                </div>
                <div class="[ box ]">
                    <h3>Support</h3>
                    <ul>
                        <li><a href="<?php echo URLROOT ?>/">Help center</a></li>
                        <li><a href="<?php echo URLROOT ?>/">Trust and safety</a></li>
                    </ul>
                </div>
                <div class="[ box ]">
                    <h3>Site Map</h3>
                    <ul>
                        <li><a href="<?php echo URLROOT ?>/">Dashboard</a></li>
                        <li><a href="<?php echo URLROOT ?>/">Search</a></li>
                        <li><a href="<?php echo URLROOT ?>/">About us</a></li>
                        <li><a href="<?php echo URLROOT ?>/">Our services</a></li>
                        <li><a href="<?php echo URLROOT ?>/">Contact us</a></li>
                    </ul>
                </div>

            </div>
            <div class="[ branding ]">
                <div class="[ header ]">
                    <a href="<?php echo URLROOT ?>">Govithena</a>
                    <p>&copy; <?php echo date("Y"); ?></p>
                </div>
                <div class="[ logo ]">
                    <a href="<?php echo URLROOT ?>">
                        <img src="<?php echo IMAGES ?>/logo.svg" alt="logo">
                    </a>
                </div>
            </div>
        </div>

    </footer>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="<?php echo JS ?>/navbar/navbar.js"></script>
    <!-- <script src="<?php echo JS ?>/chart/utils.js"></script> -->
    <script src="<?php echo JS ?>/dashboard/chart.js"></script>
    <script src="<?php echo JS ?>/dashboard/dashboard.js"></script>
</body>

</html>