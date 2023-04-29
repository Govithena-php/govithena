<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agrologist | Dashboard</title>
    <link rel="icon" type="image/x-icon" href="<?php echo IMAGES ?>/favicon.png">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>/base.css">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>/grid.css">
    <link rel="stylesheet" href="<?php echo CSS ?>/ui.css">
    <link rel="stylesheet" href="<?php echo CSS ?>/agrologist/myaccount.css">
    <link rel="stylesheet" href="<?php echo CSS ?>/agrologist/farmerdetails.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
</head>

<body class="bg-gray h-screen">
    <?php
    $active = "farmers";
    require_once("navigator.php");
    ?>
    <div class="[ container ][ dashboard ]" container-type="dashboard-section">
        <div class="flex flex-row flex-sb-c">
            <h1>farmer details</h1>
            <form action="<?php echo URLROOT ?>/agrologist/farmer/ . <?php $fid ?> . / .  <?php $gid ?>" method="post">
                <div class="" style="width: 200px;">
                    <a href="#" class="btn uppercase fs-4 btn-primary " id="edit_details">Update Field Visit</a>
                </div>
            </form>
        </div>
        <hr>

        <?php print_r($fieldVisit) ?>
        <?php
        foreach ($fieldVisit as $week) {
            ?>
            <div class="content ff-poppins ">
                <!-- <?php print_r($week) ?> -->
                <!-- <div class="content" > -->
                <div class="accordian p-2">
                    <div class="accordian-heading fs-6">
                        <?php echo "<div>" . ucwords($week['week']) . "</div>"; ?>
                    </div>
                    <hr>
                    <div class="accordian-details">

                        <div style="color: grey" class="pt-1">Date</div>
                        <?php echo "<div>" . ucwords($week['visitDate']) . "</div>"; ?>
                        <div style="color: grey" class="pt-1">Description</div>
                        <?php echo "<div>" . ucwords($week['fieldVisitDetails']) . "</div>"; ?>


                        <div style="color: grey" class="pt-1">Images</div>

                        <!-- <?php echo "<div>" . ucwords($week['fieldVisitDetails']) . "</div>"; ?> -->
                        <div class="details_img">
                            <!-- <img src="<?php echo UPLOADS . $week['image']; ?>" alt="Hi" /> -->
                            <!-- <img src="<?php echo UPLOADS . $week['image[1]']; ?>" alt="Hi" /> -->
                            <img src="<?php echo UPLOADS . $week['thumbnail']; ?>" alt="Hi" />
                        </div>
                    </div>

                </div>
                <!-- </div> -->
            </div>

            <?php
        }
        ?>



        <div id="field_visit" class="modal pt-1">

            <div class="modal-content">
                <span class="close close_modal1">&times;</span>
                <h3>Edit Details</h3>
                <form class="form pt-1" action="<?php echo URLROOT . '/agrologist/farmers/' . $fid . '/' . $gid ?>"
                    method="post" enctype="multipart/form-data">
                    <input type='text' name="week" placeholder='Week 01'><br />
                    <input type="date" name="date" id="date"><br />
                    <!-- <input type='file' name="update_img"><br /> -->

                    <div class="[ form__control image__uploader ]">
                        <div class="[ title ]">
                            <p>Upload Images <span>*</span></p>
                        </div>

                        <div class="[ text__box ]">
                            <div class="[ text__box_preview ]"></div>
                            <img class="[ upload__svg ]" src="<?php echo IMAGES ?>svg/upload.svg" />
                            <p>Drag and drop your images here<br>or</p>
                            <label class="[ browse__btn ]" for="image-uploader">Browse</label>
                            <input id="image-uploader" class="text__box_input" type="file" name="images[]" multiple>
                        </div>
                    </div>

                    <textarea name="description" value='Description' placeholder='Description'></textarea>
                    <button type="submit" name="update_details_btn" class="btn uppercase"
                        onclick="alert('Succesffully updated');">Add details</button>
                </form>
            </div>

        </div>
        <script>
            //var modal = document.getElementById("myModal");
            var field_visit = document.getElementById("field_visit");

            var edit_details = document.getElementById("edit_details");

            var span1 = document.getElementsByClassName("close_modal1")[0];

            edit_details.onclick = function () {
                field_visit.style.display = "block";
            }

            span1.onclick = function () {
                field_visit.style.display = "none";
            }

            window.onclick = function (event) {
                if (event.target == field_visit) {
                    field_visit.style.display = "none";
                }
            }

        </script>


    </div>

    <?php require "footer.php"; ?>
    <script src="<?php echo JS ?>/agrologist/app.js"></script>
    <script src="<?php echo JS ?>/imageUploader.js"></script>

</body>

</html>