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
    <link rel="stylesheet" href="<?php echo CSS ?>/ui.css">
    
    <!-- css file eka -->
    <link rel="stylesheet" href="<?php echo CSS ?>/farmer/investors.css">
    <link rel="stylesheet" href="<?php echo CSS ?>/farmer/request.css">

    <title>Dashboard | Investor</title>
</head>

<body class="bg-gray h-screen">

    <?php
    $active = "investors";
    $title = "Investor";
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
        <p><h1>My Investors</h1></p> <hr>
        <div class="[ requests__continer ]">
           
    
           <div class="[ requests__wrapper ]">
              

                   <div class="[ request__card bg-light ]">
                      
                      <div class="[ request__img ]">
                           <img class="img" src="<?php echo IMAGES ?>/investor8.jpg" alt="profile">
                       </div>

                       <form action="<?php echo URLROOT . '/agrologist/requests' ?>" >
                           <div class="flex flex-row ">
                               <div class="[ request__content ]">

                                   
                                       <!-- <a class="[ text-dec-none  text-dark  ]" href="<?php echo URLROOT . "/agrologist/requests/" ?>"> -->
                                           
                                           <h1><p><b>Devin Yapa</b></p></h1> 
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
                                   <button type="button"   class="btn_accept" name="accept">View Profile</button> &emsp;
                                   
                               </div>
                                
                            </div>

                    </div>
            </div>


            <div class="[ requests__continer ]">
           
    
           <div class="[ requests__wrapper ]">
              

                   <div class="[ request__card bg-light ]">
                      
                      <div class="[ request__img ]">
                           <img class="img" src="<?php echo IMAGES ?>/investor7.jpg" alt="profile">
                       </div>

                       <form action="<?php echo URLROOT . '/agrologist/requests' ?>" >
                           <div class="flex flex-row ">
                               <div class="[ request__content ]">

                                   
                                       <!-- <a class="[ text-dec-none  text-dark  ]" href="<?php echo URLROOT . "/agrologist/requests/" ?>"> -->
                                           
                                           <h1><p><b>Dasuni Dewani</b></p></h1> 
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
                                   <button type="button"   class="btn_accept" name="accept">View Profile</button> &emsp;
                                
                               </div>
                                    
                                </div>

                        </div>
                </div>



                <div class="[ requests__continer ]">
           
    
           <div class="[ requests__wrapper ]">
              

                   <div class="[ request__card bg-light ]">
                      
                      <div class="[ request__img ]">
                           <img class="img" src="<?php echo IMAGES ?>/investor9.jpg" alt="profile">
                       </div>

                       <form action="<?php echo URLROOT . '/agrologist/requests' ?>" >
                           <div class="flex flex-row ">
                               <div class="[ request__content ]">

                                   
                                       <!-- <a class="[ text-dec-none  text-dark  ]" href="<?php echo URLROOT . "/agrologist/requests/" ?>"> -->
                                           
                                           <h1><p><b>Sasindu Udayanga</b></p></h1> 
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
                                   <button type="button"   class="btn_accept" name="accept">View Profile</button> &emsp;
                              
                               </div>
                      
                            </div>

                    </div>
            </div>
            <br>
            <p><h1>Requests</h1></p> <hr>









       <div class="[ requests__continer ]">
           
    
                <div class="[ requests__wrapper ]">
                   

                        <div class="[ request__card bg-light ]">
                           
                           <div class="[ request__img ]">
                                <img class="img" src="<?php echo IMAGES ?>/investor.jfif" alt="profile">
                            </div>

                            <form action="<?php echo URLROOT . '/agrologist/requests' ?>" >
                                <div class="flex flex-row ">
                                    <div class="[ request__content ]">

                                        
                                            <!-- <a class="[ text-dec-none  text-dark  ]" href="<?php echo URLROOT . "/agrologist/requests/" ?>"> -->
                                                
                                                <h1><p><b>Amal Perera</b></p></h1> 
                                            <!-- </a> -->
                                                 <p>send you a request to you</p>
                                            
                                        
                                       
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
                                        <button type="button"   class="btn_accept" name="accept">Accept</button> &emsp;
                                        <button type="button" class="btn_decline" name="decline">Decline</button>
                                    </div>
                           
                        </div>
    
                </div>
        </div>










        <div class="[ requests__continer ]">
           
    
           <div class="[ requests__wrapper ]">
              

                   <div class="[ request__card bg-light ]">
                      
                      <div class="[ request__img ]">
                           <img class="img" src="<?php echo IMAGES ?>/investor2.jpg" alt="profile">
                       </div>

                       <form action="<?php echo URLROOT . '/agrologist/requests' ?>" >
                           <div class="flex flex-row ">
                               <div class="[ request__content ]">

                                   
                                       <!-- <a class="[ text-dec-none  text-dark  ]" href="<?php echo URLROOT . "/agrologist/requests/" ?>"> -->
                                           
                                           <h1><p><b>Nimal Maduranga</b></p></h1> 
                                       <!-- </a> -->
                                            <p>send you a request to you</p>
                                       
                                   
                                  
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
                                   <button type="button"   class="btn_accept" name="accept">Accept</button> &emsp;
                                   <button type="button" class="btn_decline" name="decline">Decline</button>
                               </div>
                      
                   </div>

           </div>
   </div>







   <div class="[ requests__continer ]">
           
    
           <div class="[ requests__wrapper ]">
              

                   <div class="[ request__card bg-light ]">
                      
                      <div class="[ request__img ]">
                           <img class="img" src="<?php echo IMAGES ?>/investor3.jfif" alt="profile">
                       </div>

                       <form action="<?php echo URLROOT . '/agrologist/requests' ?>" >
                           <div class="flex flex-row ">
                               <div class="[ request__content ]">

                                   
                                       <!-- <a class="[ text-dec-none  text-dark  ]" href="<?php echo URLROOT . "/agrologist/requests/" ?>"> -->
                                           
                                           <h1><p><b>Punsara Deshan</b></p></h1> 
                                       <!-- </a> -->
                                            <p>send you a request to you</p>
                                       
                                   
                                  
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
                                   <button type="button"   class="btn_accept" name="accept">Accept</button> &emsp;
                                   <button type="button" class="btn_decline" name="decline">Decline</button>
                               </div>
                      
                   </div>

           </div>
   </div>










   <div class="[ requests__continer ]">
           
    
           <div class="[ requests__wrapper ]">
              

                   <div class="[ request__card bg-light ]">
                      
                      <div class="[ request__img ]">
                           <img class="img" src="<?php echo IMAGES ?>/investor4.jfif" alt="profile">
                       </div>

                       <form action="<?php echo URLROOT . '/agrologist/requests' ?>" >
                           <div class="flex flex-row ">
                               <div class="[ request__content ]">

                                   
                                       <!-- <a class="[ text-dec-none  text-dark  ]" href="<?php echo URLROOT . "/agrologist/requests/" ?>"> -->
                                           
                                           <h1><p><b>Yeshan Pasindu</b></p></h1> 
                                       <!-- </a> -->
                                            <p>send you a request to you</p>
                                       
                                   
                                  
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
                                   <button type="button"   class="btn_accept" name="accept">Accept</button> &emsp;
                                   <button type="button" class="btn_decline" name="decline">Decline</button>
                               </div>
                      
                   </div>

           </div>
   </div>

    
    </div>
   
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="<?php echo JS ?>/dashboard/chart.js"></script>
    <script src="<?php echo JS ?>/dashboard/dashboard.js"></script>
</body>

</html>