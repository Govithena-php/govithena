<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="<?php echo IMAGES ?>/favicon.png">
    <title>govithena | dashboard</title>
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>/base.css">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>/grid.css">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>/table.css">
    <link rel="stylesheet" href="<?php echo CSS ?>/ui.css">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>/agrologist/index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
</head>

<body class="bg-gray">
    <?php
    $datadata = $notifications;
    $active = "dashboard";
    require_once("navigator.php");
    ?>
    <?php $name = Session::get('user')->getFirstName(); ?>

    <div class="[ container ][ dashboard ]" container-type="dashboard-section">
        <div class="[ header ]">
            <div class="[ flex-col center-x ][ title ]">
                <h3>Welcome Back,</h3>
                <h1>
                    <?php echo $name; ?>
                </h1>
                <!-- <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit.</p> -->
            </div>
            <!-- <button onclick="sendData()">Send Data</button> -->
            <div class="[ flex-col center-x ][ balance ]">
                <h3>
                    <?php echo date('F') ?> Income
                </h3>
                <div class="[ amount ]">
                    <span class="[ LKRBadge ]"></span>
                    <h1>
                        <?php echo number_format($agrologistMonthlyIncome[0]['total_income']) ?>
                    </h1>
                </div>
            </div>
        </div>

        <div class="[ grid ][ cards ]" md="2" lg="4">
            <div class="[ card ]">
                <h3>No. of Farmers</h3>
                <div class="[ amount ]">
                    <!-- <span class="[ LKRBadge ]"></span> -->
                   

                    <?php
                       echo  "<h1>" . $farmerCount[0]['farmerCount'] . "</h1>";
                       $farmer_diff = $farmerCount[0]['farmerCount'] - $farmerCountLastMonh[0]['farmerCount'];
                          if($farmerCountLastMonh[0]['farmerCount'] == 0){
                            echo "<h4> No farmers last month </h4>";
                          }
                          elseif($farmer_diff > 0){
                            echo "<h4>" . $farmer_diff / $farmerCountLastMonh[0]['farmerCount'] * 100 . "% <i class='fa-solid fa-arrow-up'></i></h4>" . "<br>" .
                            "<p>Compared to (" . $farmerCountLastMonh[0]['farmerCount'] . " last month)</p>";
                          }
                          else{
                            echo "<h4>" . $farmer_diff / $farmerCountLastMonh[0]['farmerCount'] * 100 . "% <i class='fa-solid fa-arrow-down'></i></h4>" . "<br>" .
                            "<p>Compared to (" . $farmerCountLastMonh[0]['farmerCount'] . " last month)</p>";
                          }
                    ?>


                    <!-- <h4>54% <i class="fa-solid fa-arrow-down"></i></h4> -->
                </div>
                <!-- <p>Compared to (<?php echo $lastmonthFarmerCount ?> farmers last month)</p> -->
            </div>

            <div class="[ card ]">
                <h3>No. of Gigs</h3>
                <div class="[ amount ]">
                    <!-- <span class="[ LKRBadge ]"></span> -->

                    <?php
                    if ($gigCount[0]['gigCount'] > 0) {
                        echo "<h1>" . $gigCount[0]['gigCount'] . "</h1>";
                        $gig_diff = $gigCount[0]['gigCount'] - $gigCountLastMonth[0]['gigCount'];
                        if($gigCountLastMonth[0]['gigCount'] == 0){
                            echo "<h4> No gigs last month </h4>";
                        }
                        elseif($gig_diff > 0){
                            echo "<h4>" . $gig_diff / $gigCountLastMonth[0]['gigCount'] * 100 . "% <i class='fa-solid fa-arrow-up'></i></h4>" . "<br>" .
                            "<p>Compared to (" . $gigCountLastMonth[0]['gigCount'] . " last month)</p>";
                        }
                        else{
                            echo "<h4>" . $gig_diff / $gigCountLastMonth[0]['gigCount'] * 100 . "% <i class='fa-solid fa-arrow-down'></i></h4>" . "<br>" .
                            "<p>Compared to (" . $gigCountLastMonth[0]['gigCount'] . " last month)</p>";
                        }
                    }
                    else{
                        echo "<h1>0</h1>";
                    }
                    ?>

                    <!-- <h4>45% <i class="fa-solid fa-arrow-down"></i></h4> -->
                </div>
                <!-- <p>Compared to (<?php echo $gigCountLastMonth[0]['gigCount'] ?> last month)</p> -->
            </div>

            <div class="[ card ]">
                <h3>No. of Field Visits</h3>
                <div class="[ amount ]">

                    <!-- <span class="[ LKRBadge ]"></span> -->
                    <?php
                    if ($agrologistFieldVisits[0]['visit_count'] > 0) {
                        echo "<h1>" . $agrologistFieldVisits[0]['visit_count'] . "</h1>";
                        $visit_diff = $agrologistFieldVisits[0]['visit_count'] - $agrologistFieldVisitsLastMonth[0]['visit_count'];
                        if ($agrologistFieldVisitsLastMonth[0]['visit_count'] == 0) {
                            echo "<h4> No field visits last month </h4>";
                        } elseif ($visit_diff > 0) {
                            echo "<h4>" . $visit_diff / $agrologistFieldVisitsLastMonth[0]['visit_count'] * 100 . "% <i class='fa-solid fa-arrow-up'></i></h4>" . "<br>" .
                                "<p>Compared to (" . $agrologistFieldVisitsLastMonth[0]['visit_count'] . " last month)</p>";
                        } else {
                            echo "<h4>" . $visit_diff / $agrologistFieldVisitsLastMonth[0]['visit_count'] * 100 . "% <i class='fa-solid fa-arrow-down'></i></h4>" . "<br>" .
                                "<p>Compared to (" . $agrologistFieldVisitsLastMonth[0]['visit_count'] . " last month)</p>";
                            ;
                        }
                    } else {
                        echo "<h1>0</h1>";
                        $visit_diff = $agrologistFieldVisits[0]['visit_count'] - $agrologistFieldVisitsLastMonth[0]['visit_count'];
                        if ($agrologistFieldVisitsLastMonth[0]['visit_count'] == 0) {
                            echo "<h4> No field visits last month </h4>";
                        } elseif ($visit_diff > 0) {
                            echo "<h4>" . $visit_diff / $agrologistFieldVisitsLastMonth[0]['visit_count'] * 100 . "% <i class='fa-solid fa-arrow-up'></i></h4>" . "<br>" .
                                "<p>Compared to (" . $agrologistFieldVisitsLastMonth[0]['visit_count'] . " last month)</p>";
                        } else {
                            echo "<h4>" . $visit_diff / $agrologistFieldVisitsLastMonth[0]['visit_count'] * 100 . "% <i class='fa-solid fa-arrow-down'></i></h4>" . "<br>" .
                                "<p>Compared to (" . $agrologistFieldVisitsLastMonth[0]['visit_count'] . " last month)</p>";
                            ;
                        }
                    }
                    ?>

                    <!-- <h4>45% <i class="fa-solid fa-arrow-down"></i></h4> -->
                </div>
                <!-- <p>Compared to (<?php echo $agrologistFieldVisitsLastMonth[0]['visit_count'] ?> last month)</p> -->
            </div>

            <div class="[ card ]">
                <h3>Total Income</h3>
                <div class="[ amount ]">
                    <span class="[ LKRBadge ]"></span>
                    <h1>
                        <?php echo number_format($agrologistTotalIncome[0]['total_income']) ?>
                    </h1>
                    <!-- <h4>12% <i class="fa-solid fa-arrow-up"></i></h4> -->
                </div>
                <!-- <p>Compared to (LKR 21340 last month)</p> -->
            </div>

        </div>

        <!-- <div class="[ charts ]">
            <div class="[ chart ]">
                <canvas id="myChart"></canvas>
            </div>
            <div class="[ chart ]">
                <canvas id="pieChart"></canvas>
            </div>
        </div> -->

        <div class="[ chart-pie ]">
            <!-- <div class="[ chart ]">
                <canvas id="myChart1"></canvas>
            </div> -->
            <div class="[ chart ]">
                <canvas id="pieChart"></canvas>
            </div>
            <div class="[ chart ]">
                <canvas id="pieChart1"></canvas>
            </div>
            <div class="[ chart ]">
                <canvas id="pieChart2"></canvas>
            </div>
            <!-- <div class="[ chart ]">
                <canvas id="pieChart3"></canvas>
            </div> -->
        </div>


        <!-- ================================================================ -->

        <div class="[ progress__inestments ]">
            <div class="[ block progress ]">

                <div class="[ heading ]">
                    <h4>Progress Per Gig</h4>
                    <a href="">View All</a href="">
                </div>

                <div class="[ card ]">
                    <div class="[ image ]">
                        <img src="<?php echo IMAGES ?>/temp/2.jpg" alt="">
                    </div>
                    <div class="[ details ]">
                        <div class="[ flex-row-space-between grow ]">
                            <div class="[ flex-col ]">
                                <h3>Beans</h3>
                                <h5>Janith</h5>
                            </div>
                            <div class="[ flex-col ]">
                                <h3>15 000.00</h3>
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
                                <h3>Pumpkin</h3>
                                <h5>Tharasara</h5>
                            </div>
                            <div class="[ flex-col ]">
                                <h3>20 000.00</h3>
                                <h5>5 months</h5>
                            </div>
                        </div>
                        <label>60%</label>
                        <progress value="60" max="100"></progress>
                        <div class="[ flex-row-end ]">
                            <button class="[ btn ]">View</button>
                            <button class="[ btn ]">View</button>
                        </div>
                    </div>
                </div>

            </div>

            <div class="[ block investments ]">
                <div class="[ heading ]">
                    <h4>No. of field visits per farmer per gig</h4>
                    <a href="">View All</a href="">
                </div>
                <table class="[  ]">
                    <thead>
                        <tr>
                            <th>Farmer</th>
                            <th>Gig</th>
                            <th>Field Visit</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Tharasara</td>
                            <td>Pumpkin</td>
                            <td>5</td>
                        </tr>
                        <tr>
                            <td>Punsara</td>
                            <td>Pineapple</td>
                            <td>3</td>
                        </tr>
                        <tr>
                            <td>Devin</td>
                            <td>Papaya</td>
                            <td>1</td>
                        </tr>
                        <tr>
                            <td>Janith</td>
                            <td>Beans</td>
                            <td>7</td>
                        </tr>
                        <tr>
                            <td>Dhananga</td>
                            <td>Green gram</td>
                            <td>2</td>
                        </tr>
                        <tr>
                            <td>Janith</td>
                            <td>Beetroot</td>
                            <td>7</td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>


        <!-- <div class="[ grid ][ profit__widthdrawal ]" gap="2" md="2">
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
        </div> -->
    </div>
    <?php
    require_once("footer.php");
    ?>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="<?php echo JS ?>/agrologist/chart.js"></script>



    <script src="<?php echo JS ?>/app.js"></script>
    <script>
        //function sendData() {
        // Define the data to be sent
        const datadata = { name: 'John', age: 30 };

        // Send a POST request to the second PHP page
        fetch("<?php echo URLROOT . '/agrologist/' ?>", {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify(datadata)
        })
            .then((response) => response.json())
            .then((datadata) => console.log(datadata));
    //}
    </script>

</body>



</html>