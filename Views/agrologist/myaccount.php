<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agrologist | Dashboard</title>
    <link rel="icon" type="image/x-icon" href="<?php echo IMAGES ?>/favicon.png">
    <link rel="stylesheet" href="../Webroot/css/ui.css">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>/base.css">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>/grid.css">
    <link rel="stylesheet" href="../Webroot/css/agrologist/myaccount.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
</head>

<body class="bg-gray h-screen">
<?php
    $datadata = $notifications;
    $active = "myaccount";
    require_once("navigator.php");
    ?>
    <div class="[ container ][ dashboard ]" container-type="dashboard-section">
        <div class="[ profile_continer ]">

            <div class="[ profile_wrapper ]">


                <div class="[ profile_card bg-light ]">
                    <div class="[ profile_img ]">
                        <img src="<?php echo UPLOADS . '/' . $agrologist[0]['image'] ?>" alt="">
                    </div>
                    <form action="<?php echo URLROOT . '/agrologist/requests/' . $request['requestId'] . '/' ?>"
                        method="POST">
                        <div class="flex flex-row " style="width: 800px">
                            <div class="[ profile_content ]">


                                <?php echo "<h1>" . $agrologist[0]['firstName'] . " " . $agrologist[0]['lastName'] . "</h1>"; ?>

                                <?php echo "<h4>" . ucwords($agrologist[0]['userType']) . "</h4>"; ?>
                                <p class="flex flex-row">
                                    <span class="fa fa-star rating_checked"></span>
                                    <span class="fa fa-star rating_checked"></span>
                                    <span class="fa fa-star rating_checked"></span>
                                    <span class="fa fa-star rating_checked"></span>
                                    <span class="fa fa-star"></span>
                                </p>

                            </div>
                            <div class="flex flex-row flex-c-c" style="width: 200px;margin-top: 110px">
                                <a href="#" class="btn uppercase fs-4 btn-primary " id="edit_details">Edit Profile</a>
                            </div>
                            <!-- <div class="flex flex-row flex-c-c">
                                <button class="btn btn-primary mr-2" name="accept">Accept</button>
                            </div> -->
                        </div>
                    </form>
                </div>

            </div>

        </div>
        <div class="content ff-poppins" style="background-color: white; margin-bottom: 100px">
            <div class="p-2">
                <div class="fs-6">Personal Details</div>
                <hr>

                <div style="color: grey" class="pt-1">First Name</div>
                <?php echo "<div>" . ucwords($agrologist[0]['firstName']) . "</div>"; ?>
                <div style="color: grey" class="pt-1">Last Name</div>
                <?php echo "<div>" . ucwords($agrologist[0]['lastName']) . "</div>"; ?>
                <div style="color: grey" class="pt-1">Email</div>
                <?php echo "<div>" . strtolower($agrologist[0]['username']) . "</div>"; ?>
                <div style="color: grey" class="pt-1">NIC</div>
                <?php echo "<div>" . $agrologist[0]['NIC'] . "</div>"; ?>
                <div style="color: grey" class="pt-1">Mobile Number</div>
                <?php echo "<div>" . $agrologist[0]['phoneNumber'] . "</div>"; ?>
                <div style="color: grey" class="pt-1">NIC</div>
                <?php echo "<div>" . ucwords($agrologist[0]['NIC']) . "</div>"; ?>
                <div style="color: grey" class="pt-1">Address Line1</div>
                <?php echo "<div>" . ucwords($agrologist[0]['addressLine1']) . "</div>"; ?>
                <div style="color: grey" class="pt-1">Address Line2</div>
                <?php echo "<div>" . ucwords($agrologist[0]['addressLine2']) . "</div>"; ?>
                <div style="color: grey" class="pt-1">City</div>
                <?php echo "<div>" . ucwords($agrologist[0]['city']) . "</div>"; ?>
                <div style="color: grey" class="pt-1">District</div>
                <?php echo "<div>" . ucwords($agrologist[0]['district']) . "</div>"; ?>
                <div style="color: grey" class="pt-1">Postal Code</div>
                <?php echo "<div>" . ucwords($agrologist[0]['postalCode']) . "</div>"; ?>


                <div id="edit_detials_modal" class="modal">

                    <div class="modal-content">
                        <span class="close close_modal1">&times;</span>
                        <h3>Edit Details</h3>
                        <form class="form pt-1" action="<?php echo URLROOT ?>/agrologist/myaccount" method="post" enctype="multipart/form-data">

                            <input type="text" name="firstName" class="" placeholder="First Name"
                                value="<?php echo $agrologist[0]['firstName'] ?>"><br>
                            <input type="text" name="lastName" class="" placeholder="Last Name"
                                value="<?php echo $agrologist[0]['lastName'] ?>"><br>
                            <input type="text" name="phoneNumber" class="" placeholder="Mobile"
                                value="<?php echo $agrologist[0]['phoneNumber'] ?>"><br>
                            <input type="text" name="NIC" class="" placeholder="NIC"
                                value="<?php echo $agrologist[0]['NIC'] ?>"><br>
                            <input type="text" name="addressLine1" class="" placeholder="Address Line1"
                                value="<?php echo $agrologist[0]['addressLine1'] ?>"><br>
                            <input type="text" name="addressLine2" class="" placeholder="Address Line2"
                                value="<?php echo $agrologist[0]['addressLine2'] ?>"><br>
                            <input type="text" name="city" class="" placeholder="City"
                                value="<?php echo $agrologist[0]['city'] ?>"><br>
                            <input type="text" name="district" class="" placeholder="District"
                                value="<?php echo $agrologist[0]['district'] ?>"><br>
                            <input type="text" name="postalCode" class="" placeholder="Postal Code"
                                value="<?php echo $agrologist[0]['postalCode'] ?>"><br>
                            <input type='file' name="profile_img"><br />
                            <button type="submit" name="edit_details_btn" class="btn uppercase"
                                onclick="alert('Succesffully updated');">Edit details</button>
                        </form>
                    </div>

                </div>

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