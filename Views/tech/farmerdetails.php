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
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>/tech/farmerdetails.css">

    <title>Dashboard | Tech Assistant</title>
</head>

<body>

    <?php
    $active = "farmerdetails";
    $title = "Farmer Details";
    require_once("navigator.php");
    ?>

    <div class="[ container ][ ]" container-type="dashboard-section">
        <div class="farmer_result">
            <div class="farmer_card">
                <div class="profile_img">
                    <img src="<?php echo IMAGES?>/21.jpg" alt=""/>
                </div>

                <div class="farmer_name">
                    <h4>Farmer Name</h4>
                </div>

                <a href="" class="updategig_btn">Update Gig</a>

            </div>

            <div class="farmer_descrip">
                <p><b>Location : </b>Nuwara Eliya</P>
                <p><b>Cultivation : </b>Carrot</P>
                <p><b>Start Date : </b>DD/MM/YYYY</P>
                <p><b>Duration : </b>8 months</P>
                <p><b>Description : </b>hduddarorarqwqczdjdkseqionmxvdfyll</P>
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