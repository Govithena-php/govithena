!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agrologist | Dashboard</title>
    <link rel="icon" type="image/x-icon" href="<?php echo IMAGES ?>/favicon.png">
    <link rel="stylesheet" href="../Webroot/css/ui.css">
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
    require_once("navigator.php");
    ?>
    <div class="[ container ][ dashboard ]" container-type="dashboard-section">
        <!-- <h2>hi</h2> -->
        <h1 class="[ page-heading-1 ]">Payment Summary</h1>
        <div class="content ff-poppins" style="background-color: white; margin-bottom: 100px; border-radius: 0.5rem;">
            <div class="p-2">

                <div class="fw-5">Total no. of days: <span style="color: gray"> 60 days</span></div>
                <div class="fw-5 pt-1">Days Remaining: <span style="color: gray"> 20 days</span></div>
                <div class="fw-5 pt-1">No. of feild visits: <span style="color: gray"> 5</span></div>
                <div class="fw-5 pt-1">Total receivable: <span style="color: gray"> LKR 150000</span></div>
                <div class="fw-5 pt-1">Total withdrawn: <span style="color: gray"> LKR 50000</span></div>


                <div class="payment_container pt-2">
                    <div class="payment_heading">
                        <!-- <h3>Title</h3> -->
                        <h3>Timestamp</h3>
                        <h3>Amount</h3>
                        <!-- <h3>Category</h3> -->
                    </div>

                    <div class="payment">
                        <!-- <h3>title</h3> -->
                        <p>timestamp</p>
                        <p>amount</p>
                        <!-- <p>category</p> -->
                    </div>
                    <div class="payment">
                        <!-- <h3>title</h3> -->
                        <p></p>
                        <p>total recived</p>
                        <!-- <p>category</p> -->
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