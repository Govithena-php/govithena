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
    
    <link rel="stylesheet" href="<?php echo CSS ?>/farmer/gigs.css">

    <title>Dashboard | Investor</title>
</head>

<body class="bg-gray h-screen">

    <?php
    $active = "gigs";
    $title = "Gigs";
    require_once("navigator.php");
    ?>

    <div class="[ container ][ gigs ]" container-type="dashboard-section">
        <div class="content">
            <h1>Create Gig</h1>
            <hr>

            <div class=" ff-poppins">
                <form class="form" action="" method="post" enctype="multipart/form-data">
                    <div class="row1">
                        <div>
                            <label>Title : </label>
                            <input type="text" name="title" placeholder="Title">
                        </div>
                        <div>
                            <label>Land Area (Hectare) : </label>
                            <input type="text" name="landArea" placeholder="Land Area">
                        </div>
                    </div>

                    <div class="row1">
                        <div>
                            <label>Amount (LKR): </label>
                            <input type="text" name="capital" placeholder="Amount">
                        </div>
                        <div>
                            <label>Time Period (Months) : </label>
                            <input type="text" name="timePeriod" placeholder="Time Period">
                        </div>
                    </div>
                    <div class="row1">
                        <div>
                            <label>Location : </label>
                            <input type="text" name="location" placeholder="Location">
                        </div>
                        <div>
                            <label>category : </label>
                            <select id="select-list" name="category" class="itemlst">
                                <option value=''>What are you growing?</option>
                                <option value='vegetable'>Vegetable</option>
                                <option value='fruits'>Fruits</option>
                                <option value='rice'>Rice</option>
                                <option value='spices'>Spices</option>
                            </select>
                        </div>
                    </div>


                    <div>
                        <label>Image : </label>
                        <input type="file" name="image" required placeholder="Gig thumbnail">
                    </div>
                    <div>
                        <label>Description : </label>
                        <textarea id="w3review" name="description" rows="4" cols="72" placeholder="Description..." style="background-color: rgba(189, 189, 189, 0.16);"></textarea>
                        <button name="createGig" class="submitbtn" type="submit"><i class="search__icon fa fa-submit">Submit</i></button>

                </form>
            </div>

        </div>
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