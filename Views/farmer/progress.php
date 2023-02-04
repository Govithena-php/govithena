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
    
    <link rel="stylesheet" href="<?php echo CSS ?>/farmer/progress.css">

    <title>Dashboard | Technical Assistant</title>
</head>


<body class="bg-gray h-screen">

    <?php
    $active = "progress";
    $title = "Progress";
    require_once("navigator.php");
    ?>

    

    <div class="container" container-type="dashboard-section">
            <div class="itemlistfirst">  
                <p style="font-size: 24px;"> Progress of cabbage</p> 

                <a class="[ text-dec-none  text-dark  ]" href="<?php echo URLROOT . "/farmer/progressform/" ?>"> 
                   <button  class="btn" type="button">Add</button>
                </a>

            </div>
            <hr> 

            <div class="cardprogress">
                <br>
                <div class="itemlist">
                        <div class="left">
                            <p style="color: #666362;">Investor : </p>
                            <p>&nbsp; Punsara Deshan</p>
                        </div>
                       <div class="left">
                          <p style="color: #666362;">Item : </p>
                          <p>&nbsp; Cabbage</p>
                       </div>
                </div>    
                <div class="itemlist">
                    <div class="left">
                        <p style="color: #666362;">Date : </p>
                        <p>&nbsp; 2022/11/30</p>
                    </div>
                    <div class="left">
                        &emsp;&emsp;&emsp;&emsp;
                        <p style="color: #666362;">Time : </p>
                        <p>&nbsp; 10.30 am</p>
                    </div>
                </div>

                <div class="imgrow">
                    <img class="progressimg" src="<?php echo IMAGES ?>/grow/grow1.jpg" alt="profile">
                    <img class="progressimg" src="<?php echo IMAGES ?>/grow/grow2.jpg" alt="profile">
                    <img class="progressimg" src="<?php echo IMAGES ?>/grow/grow3.jpg" alt="profile">
                    <img class="progressimg" src="<?php echo IMAGES ?>/grow/grow4.jpg" alt="profile">
                </div>
                <div class="descript">

                    <p style="color: #666362;">Description</p>
                    <p class="imgrow">The next day was the harvesting day.
                        There was bustle and activity on all sides. 
                        The farmers with sickles and scythes in their hands set out to reap the ripe crop. 
                        They sang and danced to the beating of drums. They were mad with joy.They sat in a line at one end of the field. 
                        They reaped and reaped till it was noon. The drummers went on beating the drums. At noon they stopped. 
                        They rested for a while and had their lunch.
                        It consisted of chapaties with glassfuls of clarified butter and country-sugar.</p> 
                </div>
                <br><hr> <br>

        

                <div class="itemlist">
                        <div class="left">
                            <p style="color: #666362;">Investor : </p>
                            <p>&nbsp; Punsara Deshan</p>
                        </div>
                       <div class="left">
                          <p style="color: #666362;">Item : </p>
                          <p>&nbsp; Cabbage</p>
                       </div>
                </div>    
                <div class="itemlist">
                    <div class="left">
                        <p style="color: #666362;">Date : </p>
                        <p>&nbsp; 2023/01/26</p>
                    </div>
                    <div class="left">
                        &emsp;&emsp;&emsp;&emsp;
                        <p style="color: #666362;">Time : </p>
                        <p>&nbsp; 11.40 am</p>
                    </div>
                </div>

                <div class="imgrow">
                    <img class="progressimg" src="<?php echo IMAGES ?>/grow/grow5.webp" alt="profile">
                    <img class="progressimg" src="<?php echo IMAGES ?>/grow/grow6.png" alt="profile">
                    <img class="progressimg" src="<?php echo IMAGES ?>/grow/grow7.jpg" alt="profile">
                    <img class="progressimg" src="<?php echo IMAGES ?>/grow/grow8.jpg" alt="profile">
                </div>
                <div class="descript">

                <p style="color: #666362;">Description</p>
                <p class="imgrow">The next day was the harvesting day.
                    There was bustle and activity on all sides. 
                    The farmers with sickles and scythes in their hands set out to reap the ripe crop. 
                    They sang and danced to the beating of drums. They were mad with joy.They sat in a line at one end of the field. 
                    They reaped and reaped till it was noon. The drummers went on beating the drums. At noon they stopped. 
                    They rested for a while and had their lunch.
                    It consisted of chapaties with glassfuls of clarified butter and country-sugar.</p>
                </div> 
                <br> <hr>



            </div>

    </div>
   
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="<?php echo JS ?>/dashboard/chart.js"></script>
    <script src="<?php echo JS ?>/dashboard/dashboard.js"></script>
</body>

</html>