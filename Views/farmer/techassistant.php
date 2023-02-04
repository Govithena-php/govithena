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
    <!-- <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>/table.css"> -->
    <link rel="stylesheet" href="<?php echo CSS ?>/ui.css">
    
    <!-- css file eka -->
    <link rel="stylesheet" href="<?php echo CSS ?>/farmer/investors.css">
    <link rel="stylesheet" href="<?php echo CSS ?>/farmer/request.css">
    <link rel="stylesheet" href="<?php echo CSS ?>/farmer/techassistant.css">

    <title>Dashboard | Investor</title>
</head>


<body class="bg-gray h-screen">

    <?php
    $active = "techassistant";
    $title = "Technical Assistant";
    require_once("navigator.php");
    ?>

    

    <div class="[ container ][ gigs ]" container-type="dashboard-section">
        <!-- <div class="card">
           <img float="left" class="img" src="<?php echo IMAGES ?>/21.jpg" alt="profile" > 
           <h1><p><b>Amal Perera</b></p></h1>
           <p>send you a request to you</p>
           <button type="button" class="btn1">Accept</button>
           <button type="button" class="btn2">Decline</button>
        </div> -->
        <div class="[ requests__continer ]">
           
    
                <div class="[ requests__wrapper ]">
                   

                        <div class="[ request__card bg-light ]">
                           
                           <div class="[ request__img ]">
                                <img class="img" src="<?php echo IMAGES ?>/techassistant/techassistant1.jpg" alt="profile">
                            </div>

                            <form action="<?php echo URLROOT . '/agrologist/requests' ?>" >
                                <div class="flex flex-row ">
                                    <div class="[ request__content ]">

                                        
                                            <!-- <a class="[ text-dec-none  text-dark  ]" href="<?php echo URLROOT . "/agrologist/requests/" ?>"> -->
                                                
                                                <h1><p><b>Amal Perera</b></p></h1> 
                                            <!-- </a> -->
                                          
                                            
                                        
                                        <p class="flex flex-row">
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                        </p>

                                    </div>
                                    
                                </div>
                            </form>

                            <div class=" flex-c-c">
                            <!-- <form action="/action_page.php"> -->
                               <label for="type">Type : </label> &ensp;
                                <select name="type" id="type">
                                     <!-- <option value="volvo"></option> -->
                                     <option value="creategig">Create Gig</option>
                                     <option value="updateprogress">Update progress</option>
                                     
                                </select>&emsp; &emsp;
                                
                                <!-- <input type="submit" value="Submit"> -->
                                <button type="button"   class="btn_accept" name="accept">Add</button> 
                            <!-- </form> -->
                                        
                                        
                            </div>
                           
                        </div>
    
                </div>
        </div>

         <div class="cardtech">
         
           <h1><p>Personal Details</p></h1><hr>
           <div class="flex-c-c1 name">

                <p style="color: #666362;">First Name </p>  &emsp;
                <p style="color: #666362;">Last Name </p>
           </div>
            <div class="flex-c-c1 name">
                <p>Sanduni </p> 
                <p>Aaloka </p>
            </div>
            <hr>
            <p style="color: #666362;">Prices</p>
    
 
            <table style="width:100%" class="pricetable">
                <tr>
                    <td></td>
                    <td>Create Gig</td>
                    <td>Update Progress</td>
                    <td>Sell</td>
                </tr>
                <tr>
                    <td>Price</td>
                    <td>$2000.00</td>
                    <td>$3000.00</td>
                    <td>$2500.00</td>

                </tr>
            </table>
            <hr>

            <p>Email <br> <u>sanduniaaloka@gmail.com</u></p> <br>
            <p>Mobile Number <br> 070 1234567</p> <br> <br>
             <p><h2>Address</h2></p>
             <hr>

             <p>No 34,</p>
             <p>Meldor place,</p>
             <P>Nugegoda</P>
             <div class="space">
             <p>District:   Colombo</p>
             <p>PostalCode:   10250</p>
             </div>

            

            

           
           
           
        </div>




    
    </div>
   
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="<?php echo JS ?>/dashboard/chart.js"></script>
    <script src="<?php echo JS ?>/dashboard/dashboard.js"></script>
</body>

</html>