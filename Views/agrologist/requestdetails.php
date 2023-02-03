<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agrologist | Dashboard</title>
    <link rel="icon" type="image/x-icon" href="<?php echo IMAGES ?>/favicon.png">   
    <link rel="stylesheet" href="<?php echo CSS ?>/ui.css">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>/base.css">
    <link rel="stylesheet" href="<?php echo CSS ?>/agrologist/requests.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
</head>

<body class="bg-gray h-screen">
    <?php
    $active = "requests";
    require_once("navigator.php");
    ?>
    <div class="[ container ][ dashboard ]" container-type="dashboard-section" >

        <div class="content ff-poppins" style="background-color: white; margin-bottom: 100px">
            <div class="p-2">
                <div class="fs-6">Request Details</div>
                <hr>
                <div class="flex flex-row">
                    <div class="requestdetails_img mt-3">
                        <img class="request_image" src="<?php echo IMAGES ?>/farmer.jpeg" alt="">
                    </div>
                    <div class="ml-2">
                        <h1 class="mt-3">Tharasara Darshaka</h1>
                        <p class="flex flex-row mt-1">
                            <span class="fa fa-star rating_checked"></span>
                            <span class="fa fa-star rating_checked"></span>
                            <span class="fa fa-star rating_checked"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                        </p>
                        <div style="color: grey" class="pt-1">Offer</div>
                        <div>LKR 10 000</div>
                        <div style="color: grey" class="pt-1">Time Period</div>
                        <div>3 months</div>
                        <div style="color: grey" class="pt-1">Location</div>
                        <div>Polonnaruwa</div>
                        <div class="flex flex-row ">
                            <button class="btn btn-primary mr-2 mt-2" name="accept">Accept</button>
                            <button class="btn btn-danger mt-2" name="decline">Decline</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="p-2">
                <div class="fs-5">Message: </div>

                <p style="color: grey">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                    et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                    aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
                    culpa qui officia deserunt mollit anim id est laborum.
                </p>
            </div>
            <div class="p-2">
                <div class="fs-6">Popular Gigs</div>
                <hr>
                <p style="color: grey">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                    et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                    aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
                    culpa qui officia deserunt mollit anim id est laborum.
                </p>
            </div>
            <div class="p-2">
                <div class="fs-6">Reviews</div>
                <hr>
                <p style="color: grey">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                    et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                    aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
                    culpa qui officia deserunt mollit anim id est laborum.
                </p>
            </div>


        </div>
        <script>
            var modal = document.getElementById("myModal");
            var edit_detials_modal = document.getElementById("edit_detials_modal");

            var edit_details_btn = document.getElementById("edit_details");

            var span1 = document.getElementsByClassName("close_modal1")[0];

            edit_details_btn.onclick = function () {
                edit_detials_modal.style.display = "block";
            }

            span1.onclick = function () {
                edit_detials_modal.style.display = "none";
            }

            window.onclick = function (event) {
                if (event.target == modal) {
                    edit_detials_modal.style.display = "none";
                }
            }

        </script>
    </div>


    <?php require "footer.php"; ?>
    <script src="<?php echo JS ?>/app.js"></script>

</body>

</html>