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

    <title>Dashboard | Farmer</title>
</head>

<body>

    <?php
    $active = "gigs";
    $title = "Create New Gig";
    require_once("navigator.php");
    ?>

    <div class="[ container ][ gigs ]" container-type="dashboard-section">
        <div class="content">
            <div class=" ff-poppins">
                <form class="form" action="<?php echo URLROOT ?>/farmer/updateGig" method="post" enctype="multipart/form-data">
                    <div class="row1">
                        <div class="form__control">
                            <label>Title : </label>
                            <input type="text" name="title" placeholder="Title" value="<?php echo $gig['title'] ?>">


                        </div>
                        <div class="form__control">
                            <label>Land Area (Hectare) : </label>
                            <input type="text" name="landArea" placeholder="Land Area" value="<?php echo $gig['landArea'] ?>">
                        </div>
                    </div>

                    <div class="row1">
                        <div class="form__control">
                            <label>Amount (LKR): </label>
                            <input type="number" name="capital" placeholder="Amount" value="<?php echo $gig['capital'] ?>">
                        </div>
                        <div class="form__control">
                            <label>Time Period (days) : </label>
                            <input type="number" name="timePeriod" placeholder="Time Period" value="<?php echo $gig['cropCycle'] ?>">
                        </div>
                    </div>
                    <div class="row1">
                        <div class="form__control">
                            <label>Profit Margin: </label>
                            <input type="number" name="profitMargin" placeholder="Profit Margin" value="<?php echo $gig['profitMargin'] ?>">
                        </div>
                        <div class="form__control">
                            <label>category : </label>
                            <select id="select-list" name="category" class="itemlst" value="<?php echo $gig['category'] ?>">
                                <option value='vegetable' <?php if($gig['category'] == 'vegetable') echo 'selected' ?> >Vegetable</option>
                                <option value='fruit' <?php if($gig['category'] == 'fruit') echo 'selected' ?> >Fruits</option>
                                <option value='grains' <?php if($gig['category'] == 'grains') echo 'selected' ?> >Grains</option>
                                <option value='spices' <?php if($gig['category'] == 'spices') echo 'selected' ?> >Spices</option>
                            </select>
                        </div>
                    </div>
                    <div class="row1">
                        <div class="form__control">
                            <label>Address 1 : </label>
                            <input type="text" name="addressLine1" placeholder="Address 1" value="<?php echo $gig['addressLine1'] ?>">
                        </div>
                        <div class="form__control">
                            <label>Address 2 : </label>
                            <input type="text" name="addressLine2" placeholder="Address 2" value="<?php echo $gig['addressLine2'] ?>">
                        </div>
                    </div>
                    <div class="row1">
                        <div class="form__control">
                            <label>City : </label>
                            <input type="text" name="city" placeholder="City" value="<?php echo $gig['city'] ?>">
                        </div>
                        <div class="form__control">
                            <label>District : </label>
                            <input type="text" name="district" placeholder="District" value="<?php echo $gig['district'] ?>">
                        </div>
                    </div>
                    <div>
                        <label>Description : </label>
                        <textarea id="w3review" name="description" rows="4" cols="72" placeholder="Description..." style="background-color: rgba(189, 189, 189, 0.16);"><?php echo $gig['description'] ?></textarea>
                    </div>
                    <!-- 
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
                    </div> -->
                    <button name="updateGig" class="submitbtn" type="submit" value="<?php echo $gig['gigId'] ?>">Save</button>

                </form>
            </div>

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