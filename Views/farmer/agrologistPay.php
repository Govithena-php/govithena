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
    <link rel="stylesheet" href="<?php echo CSS ?>/ui.css">
    
    <link rel="stylesheet" href="<?php echo CSS ?>/farmer/agrologistPay.css">

    <title>Dashboard | Technical Assistant</title>
</head>


<body class="bg-gray h-screen">

    <?php
    $active = "progress";
    $title = "Progress";
    require_once("navigator.php");
    ?>

    <div class="container" container-type="dashboard-section">



    <div class="namecol">
        <div class="agropic">
            <img src="<?php echo UPLOADS . '/profilePictures/' . $agrologist['image'] ?>" alt="">
        </div>
        <!-- <div class="name"> -->
            <h3><?php echo $agrologist['firstName'] . " " . $agrologist['lastName'] ?></h3>
            <h4><?php echo $agrologist['city'] ?></h4>
            <h4><?php echo $offer_agrologist['offer'] ?></h4>
        <!-- </div> -->
    </div>
    <div class="actions">
        <a href="<?php echo URLROOT . "/profile/" . $myagrologist['agrologistId'] ?>" class="button__primary">Pay</a>
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