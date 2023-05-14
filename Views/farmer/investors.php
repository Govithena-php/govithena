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

        <div class="[ tabs ][ gigTabs ]" tab="3">
            <div class="controls">
                <button class="control" for="1" active>My Investors</button>
                <button class="control" for="2">Pending Investment Requests</button>
                <button class="control" for="3">Accepted Investment Requests</button>
            </div>
            <div class="wrapper">
                <div class="tab" id="1" active="true">
                    <!-- <h2 class="title">Pending Investment Requests</h2> -->
                    <?php
                    if (empty($investorlists)) {
                        require(COMPONENTS . "dashboard/noDataFound.php");
                    } else { ?>
                        <div class="investors">

   
                            <div class="grid__table" style="
                                    --xl-cols: 1.2fr 1.8fr 1fr;
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
                                            <p></p>
                                        </div>
      
                                    </div>
                                </div>
                                <div class="body">
                                <?php
                                    foreach ($investorlistAll as $investorlist) {
                                    ?>
                                        <div class="row">
                                            <div class="data farmer__">
                                                <div class="investorimgin">
                                                    <img src="<?php echo UPLOADS . "/profilePictures/" . $investorlist['image']; ?>" alt="">
                                                </div>
                                            </div>
                                            <div class="data">
                                                    <h2>
                                                        <p><?php echo $investorlist['firstName']. ' ' .$investorlist['lastName'] ?> </p>
                                                    </h2>
                                             
                                            </div>
                                            <div class="data">
                                                 <a class="btn btn-primary" href="<?php echo URLROOT ?>/farmer/gigList/">View Gigs</a>
       
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





                <div class="tab" id="2">
                    <?php
                    if (empty($investors)) {
                        require(COMPONENTS . "dashboard/noDataFound.php");
                    } else { ?>
                        <div class="investors">

                           
                            <div class="grid__table" style="
                                    --xl-cols: 0.8fr 1.2fr 0.8fr 0.7fr 1.2fr 1.7fr 1.4fr;
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
                                            <p>Offer</p>
                                        </div>
                                        <div class="data">
                                            <p>Location</p>
                                        </div>
                                        <div class="data">
                                            <p>Message</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="body">
                                    <?php
                                    foreach ($investors as $investor) {
                                        // print_r($investor);
                                    ?>
                                        <div class="row">
                                            <div class="data farmer__">
                                                <div class="investorimg">
                                                    <img src="<?php echo UPLOADS . "/profilePictures/" . $investor['image']; ?>" alt="">
                                                    <!-- <img src="<?php echo UPLOADS . '/profilePictures/' . $investor['image'] ?>" alt="Picture"> -->
                                                </div>
                                            </div>
                                            <div class="data">
                                                <div class="namecol">
                                                    <h1>
                                                        <p><?php echo $investor['firstName'] ?></p>
                                                    </h1>
                                                    <h3>
                                                        <p><?php echo $investor['lastName'] ?></p>
                                                    </h3>
                                                </div>
                                            </div>
                                            <!-- <div class="data">
                                        <p> LKR <?php echo $investor['offer'] ?></p>
                                        <p class="LKR"><?php echo number_format($investor['capital'], 2, '.', ',') ?></p>
                                    </div> -->
                                            <div class="data">
                                                <p><?php echo $investor['title'] ?></p>
                                            </div>
                                            <div class="data">
                                                <p> LKR <?php echo $investor['offer'] ?></p>
                                            </div>
                                            <div class="data">
                                                <p><?php echo $investor['city'] ?></p>
                                            </div>
                                            <div class="data">
                                                <p><?php echo $investor['message'] ?></p>
                                            </div>
                                            <div class="data">
                                                <!-- <a href="#" class="btn btn-primary">Edit</a> -->
                                                <!-- <form class="table_button_flex" action="<?php echo URLROOT . '/farmer/investors' ?>" method="POST">
                                                <button type="submit" name="form1" class="button__primary">Accept</button>
                                                <button class="button__danger">Reject</button>
                                            </form> -->
                                                <div class="table_button_flex">
                                                    <a href="<?php echo URLROOT . "/farmer/acceptInvestor/" . $investor['requestId'] ?>" class="btn btn-primary">Accept</a>
                                                    <a href="<?php echo URLROOT . "/farmer/declineInvestor/" . $investor['requestId'] ?>" class="btn btn-danger">Reject</a>
                                                </div>
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


                <div class="tab" id="3">
                    <?php
                    if (empty($reqinvestors)) {
                        require(COMPONENTS . "dashboard/noDataFound.php");
                    } else { ?>
                        <div class="investors">
                            <div class="grid__table" style="
                                       --xl-cols: 0.7fr 1fr 0.5fr 0.5fr 0.9fr 1.5fr 0.8fr;
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
                                            <p>Offer</p>
                                        </div>
                                        <div class="data">
                                            <p>Location</p>
                                        </div>
                                        <div class="data">
                                            <p>Message</p>
                                        </div>
                                        <div class="data">
                                            <p>Requested Date</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="body">
                                    <?php
                                    foreach ($reqinvestors as $reqinvestor) {
                                    ?>
                                        <div class="row">
                                            <div class="data farmer__">
                                                <div class="investorimg">
                                                    <img src="<?php echo UPLOADS . "/profilePictures/" . $reqinvestor['image']; ?>" alt="">
                                                    <!-- <img src="<?php echo UPLOADS . '/profilePictures/' . $reqinvestor['thumbnail'] ?>" alt="Picture"> -->
                                                </div>
                                            </div>
                                            <div class="data">
                                                <div class="namecol">
                                                    <h1>
                                                        <p><?php echo $reqinvestor['firstName'] ?></p>
                                                    </h1>
                                                    <h3>
                                                        <p><?php echo $reqinvestor['lastName'] ?></p>
                                                    </h3>
                                                </div>
                                            </div>
                                            <!-- <div class="data">
                                        <p> LKR <?php echo $reqinvestor['offer'] ?></p>
                                        <p class="LKR"><?php echo number_format($reqinvestor['capital'], 2, '.', ',') ?></p>
                                    </div> -->
                                            <div class="data">
                                                <p><?php echo $reqinvestor['title'] ?></p>
                                            </div>
                                            <div class="data">
                                                <p> LKR <?php echo $reqinvestor['offer'] ?></p>
                                            </div>
                                            <div class="data">
                                                <p><?php echo $reqinvestor['city'] ?></p>
                                            </div>
                                            <div class="data">
                                                <p><?php echo $reqinvestor['message'] ?></p>
                                            </div>
                                            <div class="data">
                                                <p><?php echo $reqinvestor['reqdate'] ?></p>
                                            </div>
                                            <!-- <div class="data">
                                                <div class="actions">
                                                    <a href="#" class="btn btn-primary">Edit</a>
                                                    <button onclick="openAcceptModal('<?php echo $reqinvestor['requestId'] ?>')" class="button__primary">Accept</button>
                                                    <button onclick="openRejectModal('<?php echo $reqinvestor['requestId'] ?>')" class="button__danger">Reject</button>
                                                    <a href="<?php echo URLROOT . "/farmer/deleteGig/" . $reqinvestor['gigId'] ?>" class="btn btn-danger">Delete</a>
                                                </div>
                                            </div> -->
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


            </div>

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



