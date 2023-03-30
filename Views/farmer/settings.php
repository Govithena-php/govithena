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
    <link rel="stylesheet" href="<?php echo CSS ?>/search.css">
    
    <link rel="stylesheet" href="<?php echo CSS ?>/farmer/settings.css">

    <title>Dashboard | Technical Assistant</title>
</head>


<body class="bg-gray h-screen">

    <?php
    $active = "techassistantfirstcopy";
    $title = "Technical Assistant";
    require_once("navigator.php");
    ?>

    

    <div class="container" container-type="dashboard-section">
           <!-- <form class="[ fs-3 ][ search__form ]" action="<?php echo URLROOT . "/search/" ?>" method="get">
                <input class="" type="text" name="terms" placeholder="search by: name / location">
                <button class="[ btn btn-primary ] [ search_button ]" type="submit">search</button>
            </form> -->



         <div class="cardsettings">
            <div class=" profline">
            <div class="imgprof" >
                <img src="<?php echo IMAGES ?>/techassistant/techassistant1.jpg" alt="profile">
                
                    
                       
              </div>
              <h1>Punsara Deshan</h1> 
            </div>        
            <div class="edit">
                <p><i class="fa-regular fa-pen-to-square"></i> Edit profile </p>
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