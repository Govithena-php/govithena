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
    
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>/tech/farmers.css">

    <title>Dashboard | Tech Assistant</title>
</head>

<body>
    <?php
    $active = "farmers";
    $title = "Farmers";
    require_once("navigator.php");
    ?>

    <div class="[ container ][ ]" container-type="dashboard-section">

        <div class="result_grid">

            <div class="result_card">  
                <div class="profile_img">
                    <img src="<?php echo IMAGES?>/21.jpg" alt=""/>
                </div>
                <div class="card_content">
                    <h4>Farmer Name</h4>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut nemo expedita.</p>
                </div>
                <a href="" class="view_btn">view</a>
            </div>
            <div class="result_card">  
                <div class="profile_img">
                    <img src="<?php echo IMAGES?>/21.jpg" alt=""/>
                </div>
                <div class="card_content">
                    <h4>Farmer Name</h4>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut nemo expedita.</p>
                </div>
                <a href="" class="view_btn">view</a>
            </div>
            
            <div class="result_card">  
                
                <div class="profile_img">
                    <img src="<?php echo IMAGES?>/21.jpg" alt=""/>
                </div>
                
                <div class="card_content">
                    <h4>Farmer Name</h4>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut nemo expedita.</p>
                    <p>5:26 pm</p>
                </div>
                
                <div class="btn_group">
                    <a href="" class="view_btn">view</a>
                    <!--<a href="" class="view_btn">view</a>-->
                </div>

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