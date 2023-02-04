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
    
    <link rel="stylesheet" href="<?php echo CSS ?>/farmer/progressform.css">

    <title>Dashboard | Technical Assistant</title>
</head>


<body class="bg-gray h-screen">

    <?php
    $active = "progress";
    $title = "Progress";
    require_once("navigator.php");
    ?>

    

    <div class="container" container-type="dashboard-section">
        <p>Add Progress</p><hr>
        <div class="cardform">
        <form action="<?php echo URLROOT . "/farmer/progress/" ?>">
            

            <div class="row">
                <div class="name">
                    <label class="labeltext" for="fname">First Name of Investor :</label> <br>
                </div>
                <div class="name">
                &emsp;<label class="labeltext" for="fname">Second Name of Investor :</label> <br>
                </div>
            </div>
           

            <div class="row">
                <div class="name">
                    <input placeholder="First Name" class="box" type="text" id="fname" name="fname"><br><br>
                </div>
                <div class="name">
                    <input placeholder="Last Name" class="box" type="text" id="lname" name="fname">
                </div>
            </div>
            

            <label class="labeltext" for="item">Item :</label> <br>
               <input placeholder="Item" class="boxitem" type="text" id="lname" name="lname"><br><br>
               <label class="labeltext" for="fname">Description :</label> <br>
               <textarea placeholder="Description..." row="10" col="30"></textarea><br>

            <div>
                <label>Image : </label> <br>
                <div class="boximg">
                    <input  type="file" name="image" required placeholder="Gig thumbnail">
                </div>
            </div>

               
            <a class="[ text-dec-none  text-dark  ]" href="<?php echo URLROOT . "/farmer/progress/" ?>">
                <input class="subbtn" type="submit" value="Submit"> 
            </a>
        </form>
        </div>



    </div>
   
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="<?php echo JS ?>/dashboard/chart.js"></script>
    <script src="<?php echo JS ?>/dashboard/dashboard.js"></script>
</body>

</html>