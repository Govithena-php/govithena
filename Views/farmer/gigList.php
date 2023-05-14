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
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>/gridTable.css">
    <link rel="stylesheet" href="<?php echo CSS ?>/ui.css">

    <!-- css file eka -->
    <link rel="stylesheet" href="<?php echo CSS ?>/farmer/investors.css">
    <link rel="stylesheet" href="<?php echo CSS ?>/farmer/farmerrequest.css">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>/tabs.css">

    <title>Dashboard | Farmer</title>
</head>

<body class="h-screen">

    <?php
    $active = "investors";
    $title = "Investment Requests";
    require_once("navigator.php");
    ?>



    <div class="[ container ][ gigs ]" container-type="dashboard-section">

           <div class="wrapper">
                    <?php
                    if (empty($investorlists)) {
                        require(COMPONENTS . "dashboard/noDataFound.php");
                    } else { ?>
                        <div class="investors">
                            <div class="grid__table" style="
                                    --xl-cols: 1.2fr 1.8fr 1.5fr 1.5fr;
                                ">
                                <div class="head">
                                    <div class="row">
                                        <div class="data">
                                            <p></p>
                                        </div>
                                        <div class="data remove-border">
                                            <p>Investor Name</p>
                                        </div>
                                        <div class="data">
                                            <p>Title</p>
                                        </div>
                      
                                        <div class="data">
                                            <p>Location</p>
                                        </div>
                        
                                    </div>
                                </div>
                                <div class="body">
                                    <?php
                                    foreach ($investorlists as $investorlist) {
                                        // print_r($investor);
                                    ?>
                                        <div class="row">
                                            <div class="data farmer__">
                                                <div class="investorimgin">
                                                    <img src="<?php echo UPLOADS . "/" . $investorlist['thumbnail']; ?>" alt="">
                                                </div>
                                            </div>
                                            <div class="data">
                                                <div class="namecol">
                                                    <h1>
                                                        <p><?php echo $investorlist['firstName'] ?></p>
                                                    </h1>
                                                    <h3>
                                                        <p><?php echo $investorlist['lastName'] ?></p>
                                                    </h3>
                                                </div>
                                            </div>
                                           
                                            <div class="data">
                                                <p><?php echo $investorlist['title'] ?></p>
                                            </div>
                                           
                                            <div class="data">
                                                <p><?php echo $investorlist['city'] ?></p>
                                            </div>
                                           
  
                                        </div>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
            






            </div>

        
        <!-- ----------------------------------------------------------- -->
        <br>


        <?php
        // if (empty($   )) {
        //     require(COMPONENTS . "dashboard/noDataFound.php");
        // } else {
        ?>

        <?php
        // }
        ?>
        <br>










    </div>
    <?php
    require_once("footer.php");
    ?>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="<?php echo JS ?>/main.js"></script>
    <script src="<?php echo JS ?>/tabs.js"></script>
</body>

</html>