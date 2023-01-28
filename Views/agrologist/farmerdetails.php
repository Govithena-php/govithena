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
    <div class="dashboard-container h-screen">
        <h1>farmer details</h1>
        <form action="">
            <div class="flex flex-row flex-c-c" style="width: 200px;margin-top: 110px">
                <a href="#" class="btn uppercase fs-4 btn-primary " id="edit_details">Edit Profile</a>
            </div>
        </form>
        <div id="field_visit" class="modal">

            <div class="modal-content">
                <span class="close close_modal1">&times;</span>
                <h3>Edit Details</h3>
                <form class="form pt-1" action="" method="post">
                    <input type='text' value='Week'><br />
                    <input type="date" id="date"><br />
                    <input type='file'><br />
                    <textarea value='Description'></textarea>
                    <!-- <input type="text" name="firstName" class="" placeholder=""
                        value="<?php echo $agrologist[0]['firstName'] ?>"><br>
                    <input type="text" name="lastName" class="" placeholder=""
                        value="<?php echo $agrologist[0]['lastName'] ?>"><br>
                    <input type="text" name="city" class="" placeholder=""
                        value="<?php echo $agrologist[0]['city'] ?>"><br>
                    <input type="text" name="phoneNumber" class="" placeholder=""
                        value="<?php echo $agrologist[0]['phoneNumber'] ?>"><br> -->
                    <button type="submit" name="edit_details_btn" class="btn uppercase"
                        onclick="alert('Succesffully updated');">Edit details</button>
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