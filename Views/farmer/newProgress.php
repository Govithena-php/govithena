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
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>/gridTable.css">
    <link rel="stylesheet" href="<?php echo CSS ?>/farmer/newProgress.css">

    <title>Dashboard | Farmer</title>
</head>


<body>

    <?php
    $active = "progress";
    $title = "New Progress";
    require_once("navigator.php");
    ?>



    <div class="container" container-type="dashboard-section">

        <div class="[ caption ]">
            <h3>Keep us updated on your farming progress.</h3>
            <p>From seed to harvest, let us know how it grows: Update your farming progress below.</p>
        </div>

        <div class="[ form__wrapper ]">
            <form method="POST" enctype="multipart/form-data">
                <div class="[ form__control ]">
                    <label>Subject</label>
                    <input type="text" name="subject">
                </div>
                <div class="[ form__control ]">
                    <label>Description</label>
                    <textarea name="description"></textarea>
                </div>
                <div class="[ form__control ]">
                    <label>Upload Image</label>
                    <input type="file" name="images[]" multiple required>
                </div>
                <div class="[ form__control ]">
                    <button type="submit" name="progress-save">Submit</button>
                </div>
            </form>
        </div>

    </div>
    <?php
    require_once("footer.php");
    ?>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="<?php echo JS ?>/dashboard/chart.js"></script>
    <script src="<?php echo JS ?>/dashboard/dashboard.js"></script>
</body>

</html>