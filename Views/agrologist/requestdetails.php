<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agrologist | Dashboard</title>
    <link rel="icon" type="image/x-icon" href="<?php echo IMAGES ?>/favicon.png">
    <link rel="stylesheet" href="<?php echo CSS ?>/ui.css">
    <link rel="stylesheet" href="<?php echo CSS ?>/grid.css">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>/base.css">
    <link rel="stylesheet" href="<?php echo CSS ?>/agrologist/requestdetails.css">
    <link rel="stylesheet" href="<?php echo CSS ?>/agrologist/requests.css">
    <link rel="stylesheet" href="<?php echo CSS ?>/agrologist/requestdetails.css">
    <!-- <link rel="stylesheet" href="<?php echo CSS ?>/search.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
</head>

<body class="bg-gray h-screen">
    <?php
    $datadata = $notifications;
    $active = "requests";
    require_once("navigator.php");
    ?>
    <div class="[ container ][ dashboard ]" container-type="dashboard-section">

        <div class="content ff-poppins" style="background-color: white; margin-bottom: 100px">
            <div class="p-2">
                <div class="fs-6">Request Details</div>
                <hr>
                <div class="flex flex-row">
                    <div class="requestdetails_img mt-3">
                        <img class="request_image" src="<?php echo UPLOADS . '/profilePictures/' . $requestDetails[0]['image'] ?>"
                            alt="">
                    </div>
                    <!-- <div><?php echo json_encode($requestDetails) ?></div> -->
                    <form action="<?php echo URLROOT . '/agrologist/requests' ?>" method="POST">

                        <div class="ml-2">
                            <h1 class="mt-3">
                                <?php echo $requestDetails[0]['fullName'] ?>
                            </h1>

                            <!-- <p class="flex flex-row mt-1">
                            <span class="fa fa-star rating_checked"></span>
                            <span class="fa fa-star rating_checked"></span>
                            <span class="fa fa-star rating_checked"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                        </p> -->

                            <meter class="average-rating" min="0" max="5" value="5" title="4.3 out of 5 stars"
                                style="--percent: calc(<?php echo $requestDetails[0]['total'] / ($requestDetails[0]['num'] * 3) ?>/5*100%)">4.3
                                out of 5</meter>

                            <div style="color: grey" class="pt-1">Offer(per 30 days)</div>
                            <div>LKR
                                <?php echo $requestDetails[0]['offer'] ?>
                            </div>

                            <div style="color: grey" class="pt-1">Time Period</div>
                            <div>
                                <?php echo $requestDetails[0]['timePeriod'] ?> days
                            </div>

                            <div style="color: grey" class="pt-1">Location</div>
                            <!-- <div><?php echo $requestDetails[0]['addressLine1'] ?></div> -->
                            <div>
                                <?php echo $requestDetails[0]['place'] ?>
                            </div>

                            <div class="flex flex-row ">
                                <button type="submit" value="<?php echo $requestDetails[0]['requestId'] ?> "
                                    class="btn btn-primary mr-2 mt-2" name="accept">Accept</button>
                                <button type="submit" value="<?php echo $requestDetails[0]['requestId'] ?> "
                                    class="btn btn-danger mt-2" name="decline">Decline</button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
            <div class="p-2">
                <div class="fs-5">Message: </div>


                <!-- <?php echo "<p style='color: grey'>" . $requestDetails['message'] . "</p>"; ?> -->
                <p style="color: grey">
                    <?php echo $requestDetails[0]['message'] ?>
                </p>
            </div>
            <div class="p-2">
                <div class="fs-6">Active Gigs</div>
                <hr>

                <div class="[ my-2 ] [ grid ]" gap="1" md="2" lg="4">
                    <?php
                    // echo json_encode($gigDetails);
                    if (isset($gigDetails)) {
                        // print_r($searchResult);
                        foreach ($gigDetails as $gigDetail) {
                            $imageURL = UPLOADS . $gigDetail["thumbnail"];

                            // echo $imageURL;
                            // die();
                    
                            ?>
                            <div class="result__card">
                                <div class="card__img">

                                    <img src="<?php echo $imageURL ?>" alt="test" />

                                    <!-- <img src="<?php echo IMAGES ?>/temp/17.jpg" alt="test"> -->
                                    <div class="location_name">

                                        <p class="ml-1">
                                            <?php echo ucwords($gigDetail['city']) ?>
                                        </p>
                                    </div>
                                </div>
                                <div class="card__content">
                                    <a class="text-dec-none mb-1  text-dark fw-6 limit-text-2"
                                        href="">
                                        <?php echo ucwords($gigDetail['title']) ?>
                                    </a>
                                    <div class="mt-1 flex flex-sb-c">
                                        <p>
                                            <?php echo ucwords($gigDetail['category']) ?>
                                        </p>
                                        <p>
                                            <?php echo $gigDetail['cropCycle'] ?> days
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <?php
                        }
                    }
                    ?>
                </div>
          


    <!-- <p style="color: grey">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                    et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                    aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
                    culpa qui officia deserunt mollit anim id est laborum.
                </p> -->
    </div>
    <!-- <div class="p-2">
        <div class="fs-6">Reviews</div>
        <hr>
        <p style="color: grey">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
            et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
            aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
            culpa qui officia deserunt mollit anim id est laborum.
        </p>
    </div> -->


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