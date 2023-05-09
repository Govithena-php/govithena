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

    <link rel="stylesheet" href="<?php echo CSS ?>/farmer/gigView.css">

    <title>Dashboard | Farmer</title>
</head>

<body>

    <?php
    $active = "gigs";
    $title = "Create New Gig";
    require_once("navigator.php");
    ?>

    <div class="[ container ][ gigs ]" container-type="dashboard-section">
            <!-- <div class=" ff-poppins">
                <form class="form" action="" method="post" enctype="multipart/form-data">
                    <div class="row1">
                        <div class="form__control">
                            <label>Title : </label>
                            <input type="text" name="title" placeholder="Title">
                        </div>
                        <div class="form__control">
                            <label>Land Area (Hectare) : </label>
                            <input type="text" name="landArea" placeholder="Land Area">
                        </div>
                    </div>

                    <div class="row1">
                        <div class="form__control">
                            <label>Amount (LKR): </label>
                            <input type="text" name="capital" placeholder="Amount">
                        </div>
                        <div class="form__control">
                            <label>Time Period (Months) : </label>
                            <input type="text" name="timePeriod" placeholder="Time Period">
                        </div>
                    </div>
                    <div class="row1">
                        <div class="form__control">
                            <label>Location : </label>
                            <input type="text" name="location" placeholder="Location">
                        </div>
                        <div class="form__control">
                            <label>category : </label>
                            <select id="select-list" name="category" class="itemlst">
                                <option value=''>What are you growing?</option>
                                <option value='vegetable'>Vegetable</option>
                                <option value='fruits'>Fruits</option>
                                <option value='grains'>Grains</option>
                                <option value='spices'>Spices</option>
                            </select>
                        </div>
                    </div>
                    <div class="row2">
                        <div class="form__control">
                            <label>Profit Margin: </label>
                            <input type="text" name="profitMargin" placeholder="Profit Margin">
                        </div>
                    </div>
                    <div>
                        <label>Description : </label>
                        <textarea id="w3review" name="description" rows="4" cols="72" placeholder="Description..." style="background-color: rgba(189, 189, 189, 0.16);"></textarea>
                    </div>

                    <div class="[ form__control image__uploader ]">
                        <div class="[ title ]">
                            <p>Upload Images <span>*</span></p>
                        </div>

                        <div class="[ text__box ]">
                            <div class="[ text__box_preview ]"></div>
                            <img class="[ upload__svg ]" src="<?php echo IMAGES ?>svg/upload.svg" />
                            <p>Darg and drop your images here<br>or</p>
                            <label class="[ browse__btn ]" for="image-uploader">Browse</label>
                            <input id="image-uploader" class="text__box_input" type="file" name="images[]" multiple>
                        </div>
                    </div>
                    <button name="createGig" class="submitbtn" type="submit">Create</button>

                </form>
            </div> -->
            <div class="card">
                <div class ="gigpic">
                    <img src="<?php echo UPLOADS . '/profilePictures/' . $p['thumbnail']?>" alt="Picture">
                </div>
                <div class="namecol">
                    <p>Title :</p>
                    <p><?php echo $p['status']?></p>

                    <p>Initial Investment :</p>
                    <p><?php echo $p['status']?></p>

                    <p>Location :</p>
                    <p><?php echo $p['status']?></p>

                    <p>Status :</p>
                    <p><?php echo $p['status']?></p>

                    <p>Land Area :</p>
                    <p><?php echo $p['status']?></p>

                </div>
                <p>Description :</p>
                    <p><?php echo $p['status']?></p>
            </div>

        
    </div>

    <?php
    require_once("footer.php");
    ?>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="<?php echo JS ?>/dashboard/chart.js"></script>
    <script src="<?php echo JS ?>/dashboard/dashboard.js"></script>
    <script src="<?php echo JS ?>/imageUploader.js"></script>
</body>

</html>