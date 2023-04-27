<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="<?php echo IMAGES ?>/favicon.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
    <link rel="stylesheet" href="<?php echo CSS ?>/ui.css">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>/base.css">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>/grid.css">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>/table.css">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>/tech/assignedGigs.css">

    <title>Dashboard | Tech Assistant</title>
</head>

<body>
    <?php
    $active = "farmers";
    $title = "Farmers";
    require_once("navigator.php");
    ?>

    <div class="[ container ][ ]" container-type="dashboard-section">

    <div class="[ caption ]">
        <h3>Assigned Gigs</h3>
        <p>Keep an eye on the status of your investments with our investor dashboard. Quickly see which requests are accepted, rejected, or still pending, and stay in the know about the progress of your investments.</p>  
    </div>

    <div class="gigs">
        <?php
        foreach($assignedGigs as $gig){
        ?>
           <div class="gig__card">
                <div class="left">
                    <div class="gig__img">
                        <img src="<?php echo UPLOADS . $gig['thumbnail']?>">
                    </div>
                    <div class="gig__content">
                        <h4><?php echo $gig['title'] ?></h4>
                        <p><?php echo $gig['category'] ?></p>
                    </div>
                </div>
                <div class="right">
                    <div class="buttons">
                        <a class="button__primary">Read more</a>
                        <a class="button__primary">Edit gig</a>
                        <a class="button__primary">Update progress</a>
                    </div>
                </div>
           </div>
        <?php
        }
        ?>
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