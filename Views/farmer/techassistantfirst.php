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
    
    <link rel="stylesheet" href="<?php echo CSS ?>/farmer/techassistantfirst.css">

    <title>Dashboard | Technical Assistant</title>
</head>


<body class="bg-gray h-screen">

    <?php
    $active = "techassistantfirst";
    $title = "Technical Assistant";
    require_once("navigator.php");
    ?>

    

    <div class="container" container-type="dashboard-section">
        <div class="cardspace">
             <select name="type" id="type">
                    <option value="croptype">Crop Type</option>                 
             </select>

             <select name="type" id="type">
                    <option value="landarea">Land Area</option>                 
             </select>

             <select name="type" id="type">
                    <option value="budget">Budget</option>                 
             </select>

             <select name="type" id="type">
                    <option value="location">LOcation</option>                 
             </select>
        </div>
        <div class="cardspace">
        <a class="[ text-dec-none  text-dark  ]" href="<?php echo URLROOT . "/farmer/techassistant/" ?>">


        <div class="cardpad">

         <div class="cardtechfst">
            <div class="cardimg">
                <img class="techimg" src="<?php echo IMAGES ?>/techassistant/techassistant1.jpg" alt="profile">
                <div class="cardbox">
                    <div class="techflex">
                       <p><i class="fa-solid fa-user"></i> Avishka Prabath </p>
                        <p><i class="fa-solid fa-location-dot"></i> Matara, Matara </p>
                     </div>
                </div>
            </div>

            <p> LKR 50,000 - 75,000</p>
            <p>This is gig tittle</p>

        
           
           
        </div>
        </div>
        </a>

        <a class="[ text-dec-none  text-dark  ]" href="<?php echo URLROOT . "/farmer/techassistant/" ?>">

        <div class="cardpad">

        <div class="cardtechfst">
          <div class="cardimg">
             <img class="techimg" src="<?php echo IMAGES ?>/techassistant/techassistant2.jpg" alt="profile">
                 <div class="cardbox">
                    <div class="techflex">
                      <p><i class="fa-solid fa-user"></i> Avishka Prabath </p>
                      <p><i class="fa-solid fa-location-dot"></i> Matara, Matara </p>
                   </div>
              </div>
          </div>

             <p> LKR 50,000 - 75,000</p>
             <p>This is gig tittle</p>
            </div>
        </div>         
        </a>     
    
        </div>





        <div class="cardspace">
        <a class="[ text-dec-none  text-dark  ]" href="<?php echo URLROOT . "/farmer/techassistant/" ?>">


            <div class="cardpad">

            <div class="cardtechfst">
                <div class="cardimg">
                    <img class="techimg" src="<?php echo IMAGES ?>/techassistant/techassistant3.jpg" alt="profile">
                    <div class="cardbox">
                        <div class="techflex">
                        <p><i class="fa-solid fa-user"></i> Avishka Prabath </p>
                            <p><i class="fa-solid fa-location-dot"></i> Matara, Matara </p>
                        </div>
                    </div>
                </div>

                <p> LKR 50,000 - 75,000</p>
                <p>This is gig tittle</p>


            
            
                 </div>
              </div>
             </a>

             <a class="[ text-dec-none  text-dark  ]" href="<?php echo URLROOT . "/farmer/techassistant/" ?>">

            <div class="cardpad">

            <div class="cardtechfst">
            <div class="cardimg">
                <img class="techimg" src="<?php echo IMAGES ?>/techassistant/techassistant4.jpg" alt="profile">
                    <div class="cardbox">
                        <div class="techflex">
                        <p><i class="fa-solid fa-user"></i> Avishka Prabath </p>
                        <p><i class="fa-solid fa-location-dot"></i> Matara, Matara </p>
                    </div>
                </div>
            </div>

                <p> LKR 50,000 - 75,000</p>
                <p>This is gig tittle</p>
                </div>
            </div>      
             </a>        
        </div>



    
    </div>
   
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="<?php echo JS ?>/dashboard/chart.js"></script>
    <script src="<?php echo JS ?>/dashboard/dashboard.js"></script>
</body>

</html>