<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agrologist | Dashboard</title>
    <link rel="icon" type="image/x-icon" href="<?php echo IMAGES ?>/favicon.png">
    <link rel="stylesheet" type="text/css" href="../Webroot/css/sidebar.css">
    <link rel="stylesheet" href="../Webroot/css/ui.css">
    <link rel="stylesheet" href="../Webroot/css/agrologist/myaccount.css">
    <link rel="stylesheet" href="../Webroot/css/agrologist/farmerdetails.css">
    <link rel="stylesheet" href="../Webroot/css/dashHeader.css">
    <link rel="stylesheet" href="../Webroot/css/dashFooter.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
</head>

<body class="bg-gray h-screen">
    <?php include COMPONENTS . 'dashboard/header.php'; ?>

    <?php include 'sidebar.php'; ?>
    <div class="dashboard-container h-screen" style="margin-bottom: 900px">
        <div class="flex flex-row flex-sb-c">
            <h1>farmer details</h1>
            <form action="">
                <div class="" style="width: 200px;">
                    <a href="#" class="btn uppercase fs-4 btn-primary " id="edit_details">Edit Profile</a>
                </div>
            </form>
        </div>
        <hr>

        <!-- <?php print_r($fieldVisit) ?> -->
        <?php
        foreach ($fieldVisit as $week) {
            ?>
            <div class="content ff-poppins mt-1" style="background-color: white; ">
                <!-- <?php print_r($week) ?> -->
                <div class="p-2">
                    <div class="fs-6">
                        <?php echo "<div>" . ucwords($week['week']) . "</div>"; ?>
                    </div>
                    <hr>

                    <div style="color: grey" class="pt-1">Date</div>
                    <?php echo "<div>" . ucwords($week['visitDate']) . "</div>"; ?>
                    <div style="color: grey" class="pt-1">Description</div>
                    <?php echo "<div>" . ucwords($week['fieldVisitDetails']) . "</div>"; ?>
                    <!-- <?php
                    if (get_option($week['image']) != '') {
                        ?> -->
                        <div style="color: grey" class="pt-1">Images</div>

                        <!-- <?php echo "<div>" . ucwords($week['fieldVisitDetails']) . "</div>"; ?> -->
                        <div class="details_img">
                            <img src="<?php echo UPLOADS . $week['image']; ?>" alt="Hi" />
                        </div>
                        <!-- <?php
                    } else {
                        echo 'no image';
                    }
                    ?> -->
                </div>
            </div>

            <?php
        }
        ?>



        <div id="field_visit" class="modal">

            <div class="modal-content">
                <span class="close close_modal1">&times;</span>
                <h3>Edit Details</h3>
                <form class="form pt-1" action="<?php echo URLROOT ?>/agrologist/farmerdetails" method="post"
                    enctype="multipart/form-data">
                    <input type='text' name="week" placeholder='Week 01'><br />
                    <input type="date" name="date" id="date"><br />
                    <input type='file' name="update_img"><br />
                    <textarea name="description" value='Description'></textarea>
                    <button type="submit" name="update_details_btn" class="btn uppercase"
                        onclick="alert('Succesffully updated');">Add details</button>
                </form>
            </div>

        </div>
        <script>
            //var modal = document.getElementById("myModal");
            var field_visit = document.getElementById("field_visit");

            //var edit_details_btn = document.getElementById("edit_details");

            var span1 = document.getElementsByClassName("close_modal1")[0];

            edit_details.onclick = function () {
                field_visit.style.display = "block";
            }

            span1.onclick = function () {
                field_visit.style.display = "none";
            }

            // window.onclick = function (event) {
            //     if (event.target == modal) {
            //         field_visit.style.display = "none";
            //     }
            // }

        </script>


    </div>

    <?php require COMPONENTS . "dashboard/footer.php"; ?>
    <script src="<?php echo JS ?>/app.js"></script>

</body>

</html>