!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agrologist | Dashboard</title>
    <link rel="icon" type="image/x-icon" href="<?php echo IMAGES ?>/favicon.png">
    <link rel="stylesheet" href="<?php echo CSS; ?>/ui.css">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>/base.css">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>/grid.css">
    <link rel="stylesheet" href="../Webroot/css/agrologist/myaccount.css">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>/agrologist/payments.css">
    <link rel="stylesheet" href="<?php echo CSS ?>/investor/myinvestments.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
</head>

<body class="bg-gray h-screen">
    <?php
    $datadata = $notifications;
    $active = "farmers";
    $sum=0;
    require_once("navigator.php");
    ?>
    <div class="[ container ][ dashboard ]" container-type="dashboard-section">
        <h1>Tharasara Darshaka</h1>
        <hr>
        <div class="content ff-poppins  mt-2"
            style="background-color: white; margin-bottom: 100px; border-radius: 0.5rem;">
            <div class="pl-2 pr-2 pt-1">
                <h2>Working Summary</h2>
                <hr>

                <div class="fw-5 pt-2">Total no. of days: <span style="color: gray">
                        <?php echo $timePeriod[0]['timePeriod'] ?>
                    </span></div>
                <?php
                $origin = date_create($timePeriod[0]['statusChangeDate']);
                $target = date_create(date("Y-m-d", time()));
                $d = date_diff($origin, $target);
                $days = $d->format('%a');
                $remainingdays = $timePeriod[0]['timePeriod'] - $days;
                ?>

                <?php
                if ($remainingdays >= 0) {
                    echo "<div class='fw-5 pt-1'> Days Remaining: <span style='color: gray'>" . $remainingdays . "days</span> </div>";
                } else {
                    echo "<div class='fw-5 pt-1'> Days Exceeding: <span style='color: gray'>" . $remainingdays * -1 . "days</span> </div>";
                }

                ?>

                <div class="fw-5 pt-1">No. of feild visits: <span style="color: gray"> <?php echo $timePeriod[0]['numvisits'] ?></span></div>
                <div class="fw-5 pt-1">Monthly payment: <span style="color: gray" class="LKR"><?php  echo number_format($timePeriod[0]['offer']) ?></span></div>

                <h2 class="pt-2">Payment Summary</h2>
                <hr>
                <div class="payment_container ">
                    <div class="payment_heading">
                        <h3>Date</h3>
                        <h3>Amount ( <span class="LKR"> )</span></h3>
                    </div>

                    
                    
                
                <?php 
                    foreach($paymentDetails as $paymentDetail){
                        $sum = $sum + (int)$paymentDetail['payment'];
                        ?>
                        <div class="payment">
                        <p><?php echo date('Y-m-d', strtotime($paymentDetail['paidDate'])) ?></p>
                        <p><?php echo number_format($paymentDetail['payment']) ?></p>
                    </div>


                   <?php     
                    }
                ?>
                <div class="payment">
                        <p></p>
                        <p><?php echo number_format($sum) ?></p>
                    </div>
                </div>

            </div>

        </div>

    </div>
    </div>


    <?php require "footer.php"; ?>
    <script src="<?php echo JS ?>/app.js"></script>

</body>

</html>