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
            </div>
            <div class="[ flex-col center-x ][ balance ]">
                <h3>
                    <?php echo date('F') ?> Income
                </h3>
                <div class="[ amount ]">
                    <span class="[ LKRBadge ]"></span>
                    <h1>
                        <?php
                        if ($agrologistMonthlyIncome == null) {
                            echo "0";
                        } else if ($agrologistMonthlyIncome[0]['total_income'] >= 0) {
                            echo number_format($agrologistMonthlyIncome[0]['total_income']);
                        } else {
                            echo "0";
                        }
                        ?>
                    </h1>
                </div>
            </div>
        </div>

        <div class="[ grid ][ cards ]" md="2" lg="4">
            <div class="[ card ]">
                <h3>No. of Farmers</h3>
                <div class="[ amount ]">


                    <?php
                    echo "<h1>" . $farmerCount[0]['farmerCount'] . "</h1>";
                    $farmer_diff = $farmerCount[0]['farmerCount'] - $farmerCountLastMonh[0]['farmerCount'];
                    if ($farmerCountLastMonh[0]['farmerCount'] == 0) {
                        echo "<h4> No farmers last month </h4>";
                    } elseif ($farmer_diff > 0) {
                        echo "<h4>" . $farmer_diff / $farmerCountLastMonh[0]['farmerCount'] * 100 . "% <i class='fa-solid fa-arrow-up'></i></h4>" . "<br>" .
                            "<p>Compared to (" . $farmerCountLastMonh[0]['farmerCount'] . " last month)</p>";
                    } else {
                        echo "<h4>" . $farmer_diff / $farmerCountLastMonh[0]['farmerCount'] * 100 . "% <i class='fa-solid fa-arrow-down'></i></h4>" . "<br>" .
                            "<p>Compared to (" . $farmerCountLastMonh[0]['farmerCount'] . " last month)</p>";
                    }
                    ?>


                </div>
            </div>

            <div class="[ card ]">
                <h3>No. of Gigs</h3>
                <div class="[ amount ]">

                    <?php
                    if ($gigCount[0]['gigCount'] > 0) {
                        echo "<h1>" . $gigCount[0]['gigCount'] . "</h1>";
                        $gig_diff = $gigCount[0]['gigCount'] - $gigCountLastMonth[0]['gigCount'];
                        if ($gigCountLastMonth[0]['gigCount'] == 0) {
                            echo "<h4> No gigs last month </h4>";
                        } elseif ($gig_diff > 0) {
                            echo "<h4>" . $gig_diff / $gigCountLastMonth[0]['gigCount'] * 100 . "% <i class='fa-solid fa-arrow-up'></i></h4>" . "<br>" .
                                "<p>Compared to (" . $gigCountLastMonth[0]['gigCount'] . " last month)</p>";
                        } else {
                            echo "<h4>" . $gig_diff / $gigCountLastMonth[0]['gigCount'] * 100 . "% <i class='fa-solid fa-arrow-down'></i></h4>" . "<br>" .
                                "<p>Compared to (" . $gigCountLastMonth[0]['gigCount'] . " last month)</p>";
                        }
                    } else {
                        echo "<h1>0</h1>";
                    }
                    ?>

                </div>
            </div>

            <div class="[ card ]">
                <h3>No. of Field Visits</h3>
                <div class="[ amount ]">

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

                </div>
            </div>

            <div class="[ card ]">
                <h3>Total Income</h3>
                <div class="[ amount ]">
                    <span class="[ LKRBadge ]"></span>
                    <h1>
                        <?php if($agrologistTotalIncome == null){
                            echo "0";
                        }
                        else{
                            echo number_format($agrologistTotalIncome[0]['total_income']);

                        }
                        ?>
                    </h1>
                </div>
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


        
        <div class="[ grid ][ profit__widthdrawal ]" gap="2" md="2">
            <div class="[ block Profits ]">
                <div class="[ heading ]">
                    <h4>Income</h4>
                    <a href="<?php echo URLROOT . "/agrologist/withdrawals" ?>">View All</a href="">
                </div>
                <?php
                if ($incomeLimit == null) {
                    require(COMPONENTS . "dashboard/noDataFound.php");
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
                            foreach ($incomeLimit as $income) {

                                ?>

                                <tr>
                                    <td>
                                        <?php echo date('Y-m-d', strtotime($income['paidDate'])) ?>
                                    </td>
                                    <td>
                                        <?php echo ucwords($income['fullName']) ?>
                                    </td>
                                    <td>
                                        <?php echo number_format($income['payment'], 2, '.', ',') ?>
                                    </td>
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
                    <a href="<?php echo URLROOT . "/agrologist/withdrawals" ?>">View All</a href="">
                </div>
                <?php
                if ($incomeLimit == null) {
                    require(COMPONENTS . "dashboard/noDataFound.php");
                } else {
                    ?>
                    <table class="[ ]">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($withdrawalsLimit as $withdraw) {

                                ?>

                                <tr>
                                    <td>
                                        <?php echo date('Y-m-d', strtotime($withdraw['withdrawalDate'])) ?>
                                    </td>
                                    <td>
                                        <?php echo number_format($withdraw['withdrawal'], 2, '.', ',') ?>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>

                        </tbody>
                        <?php
                }
                ?>
                </table>
            </div>
        </div>
    </div>
    <?php
    require_once("footer.php");
    ?>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="<?php echo JS ?>/agrologist/chart.js"></script>



    <script src="<?php echo JS ?>/app.js"></script>
    <script>
       
        const datadata = { name: 'John', age: 30 };

        fetch("<?php echo URLROOT . '/agrologist/' ?>", {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify(datadata)
        })
            .then((response) => response.json())
            .then((datadata) => console.log(datadata));
    </script>
    <script>

        const month = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];

        const d = new Date();
        let sixth = month[(d.getMonth() + 12) % 12];
        let fifth = month[(d.getMonth() - 1 + 12) % 12];
        let fouth = month[(d.getMonth() - 2 + 12) % 12];
        let third = month[(d.getMonth() - 3 + 12) % 12];
        let second = month[(d.getMonth() - 4 + 12) % 12];
        let first = month[(d.getMonth() - 5 + 12) % 12];

        const data = {
            labels: [first, second, third, fouth, fifth, sixth],
            datasets: [
                {
                    label: 'Gig count per month',
                    data: [<?php echo $gigCountFiveMonthsBefore[0]['gigCount'] ?>, <?php echo $gigCountFourMonthsBefore[0]['gigCount'] ?>, <?php echo $gigCountThreeMonthsBefore[0]['gigCount'] ?>, <?php echo $gigCountTwoMonthsBefore[0]['gigCount'] ?>, <?php echo $gigCountLastMonth[0]['gigCount'] ?>, <?php echo $gigCount[0]['gigCount'] ?>],
                    fill: false,
                    backgroundColor: 'rgb(255, 99, 132)',
                    tension: 0.1,
                    yAxisID: 'y'

                },
                {
                    label: 'No of Farmers per month',
                    data: [<?php echo $farmerCountFiveMonthsBefore[0]['farmerCount'] ?>, <?php echo $farmerCountFourMonthsBefore[0]['farmerCount'] ?>, <?php echo $farmerCountThreeMonthsBefore[0]['farmerCount'] ?>, <?php echo $farmerCountTwoMonthsBefore[0]['farmerCount'] ?>, <?php echo $farmerCountLastMonh[0]['farmerCount'] ?>, <?php echo $farmerCount[0]['farmerCount'] ?>],
                    fill: false,
                    backgroundColor: 'rgb(75, 192, 192)',
                    tension: 0.1,
                    yAxisID: 'y'

                }
            ],
        };

        const config = {
            type: 'bar',
            data: data,
            options: {
                responsive: true,
                interaction: {
                    mode: 'index',
                    intersect: false,
                },
                stacked: false,
                plugins: {
                    title: {
                        display: true,
                        text: 'Gig and Farmer count per month'
                    }
                },
                scales: {
                    y: {
                        type: 'linear',
                        display: true,
                        position: 'left',
                        text: 'Gig count',
                    },
                    
                }
            },
        };
        const ctx = document.getElementById('myChart');
        new Chart(ctx, config);


    </script>
    <script>
        const gigs = <?PHP echo json_encode($gigCountPerCategory) ?>;

        const category = gigs.map((item) => item.category);

        const gigCount = gigs.map((item) => item.gigCount);

        const pieProfitCrop = {
            labels: category,
            datasets: [
                {
                    label: 'gig count',
                    data: gigCount,
                    backgroundColor: ['rgb(255, 99, 132)', 'rgb(255, 159, 64)', 'rgb(255, 205, 86)', 'rgb(75, 192, 192)', 'rgb(54, 162, 235)'],
                }
            ]
        };

        const pieConfigProfitCrop = {
            type: 'pie',
            data: pieProfitCrop,
            options: {
                responsive: true,
                maintainAspectRatio: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    title: {
                        display: true,
                        text: 'Gigs per Category'
                    }
                }
            },
        };




        const pieChart = document.getElementById('pieChart');
        new Chart(pieChart, pieConfigProfitCrop);



    </script>

</body>



</html>