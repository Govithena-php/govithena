<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="<?php echo IMAGES ?>/favicon.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>/base.css">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>/grid.css">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>/table.css">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>/alertModal.css">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>/tech/editGig.css">

    <title>Dashboard | Tech</title>
</head>

<body>

    <?php
    if (Session::has('gig_update_details_alert')) {
        $alert = Session::pop('gig_update_details_alert');
        $alert->show_default_alert();
    }
    if (Session::has('gig_update_location_details_alert')) {
        $alert = Session::pop('gig_update_location_details_alert');
        $alert->show_default_alert();
    }
    if (Session::has('update_gig_description_details_alert')) {
        $alert = Session::pop('update_gig_description_details_alert');
        $alert->show_default_alert();
    }
    ?>

    <?php
    function printValue($value)
    {
        if (isset($value)) echo $value;
        else echo "-";
    }
    ?>

    <dialog id="editDetailsModal" class="[ Modal ]">
        <div class="[ container ]">
            <div class="[ caption ]">
                <h2>Basic Details</h2>
                <p>Update Basic Details of the gig.</p>
            </div>
            <form class="[ new__details_form ]" action="<?php echo URLROOT ?>/tech/update_gig_details" method="post">
                <div class="[ grid ]" lg="1">
                    <div class="[ input__control ]">
                        <label for="u-title">Title</label>
                        <input type="text" id="u-title" name="u-title" value="<?php printValue($gig['title']) ?>" placeholder="Title">
                    </div>
                </div>
                <div class="[ grid ]" sm="1" lg="2" gap="1">
                    <div class="[ input__control ]">
                        <label for="u-category">Category</label>
                        <!-- <input type="text" id="u-category" name="u-category" value="<?php printValue($gig['category']) ?>" placeholder="Category"> -->
                        <select id="u-categor" name="u-category" class="itemlst" value="<?php echo $gig['category'] ?>">
                            <option value='vegetable'>Vegetable</option>
                            <option value='fruits'>Fruits</option>
                            <option value='grains'>Grains</option>
                            <option value='spices'>Spices</option>
                        </select>
                    </div>
                    <div class=" [ input__control ]">
                        <label for="u-cropCycle">Crop Cycle<small> (Days)</small></label>
                        <input type="text" id="u-cropCycle" name="u-cropCycle" value="<?php printValue($gig['cropCycle']) ?>" placeholder="cropCycle">
                    </div>
                    <div class="[ input__control ]">
                        <label for="u-landArea">Land Area <small> (Hectares)</small></label>
                        <input type="text" id="u-landArea" name="u-landArea" value="<?php printValue($gig['landArea']) ?>" placeholder="Land Area">
                    </div>
                    <div class="[ input__control ]">
                        <label for="u-initialInvestment">Initial Investment <small> (LKR)</small></label>
                        <input type="text" id="u-initialInvestment" name="u-initialInvestment" value="<?php printValue($gig['capital']) ?>" placeholder="Initial Investment">
                    </div>
                    <div class="[ input__control ]">
                        <label for="u-profitMargin">Profit Margin <small> %</small></label>
                        <input type="text" id="u-profitMargin" name="u-profitMargin" value="<?php printValue($gig['profitMargin']) ?>" placeholder="Profit Margin">
                    </div>
                </div>

                <div class="[ control__buttons ]">
                    <button type="button" onclick="closeEditDetailsModal()" class="[ button__danger ]" data-dismiss="modal">Cancel</button>
                    <button type="submit" id="u-submitBtn" name="u-submitBtn" value="<?php echo $gig['gigId'] ?>" class="[ button__primary button__submit ]" data-dismiss="modal">Save</button>
                </div>
            </form>
        </div>
    </dialog>

    <dialog id="editLocationModal" class="[ Modal ]">
        <div class="[ container ]">
            <div class="[ caption ]">
                <h2>Location</h2>
                <p>Update address, city, district of the gig.</p>
            </div>
            <form class="[ new__details_form ]" action="<?php echo URLROOT ?>/tech/update_gig_location_details" method="post">
                <div class="[ grid ]" lg="1">
                    <div class="[ input__control ]">
                        <label for="u-addressLine1">Address Line 1</label>
                        <input type="text" id="u-addressLine1" name="u-addressLine1" value="<?php printValue($gig['addressLine1']) ?>" placeholder="Address Line 1">
                    </div>
                </div>
                <div class="[ grid ]" lg="1">
                    <div class="[ input__control ]">
                        <label for="u-addressLine2">Address Line 2</label>
                        <input type="text" id="u-addressLine2" name="u-addressLine2" value="<?php printValue($gig['addressLine2']) ?>" placeholder="Address Line 2">
                    </div>
                </div>
                <div class="[ grid ]" sm="1" lg="2" gap="1">
                    <div class="[ input__control ]">
                        <label for="u-city">City</label>
                        <input type="text" id="u-city" name="u-city" value="<?php printValue($gig['city']) ?>" placeholder="City">
                    </div>
                    <div class="[ input__control ]">
                        <label for="u-district">District</label>
                        <input type="text" id="u-district" name="u-district" value="<?php printValue($gig['district']) ?>" placeholder="District">
                    </div>
                </div>

                <div class="[ control__buttons ]">
                    <button type="button" onclick="closeEditDetailsModal()" class="[ button__danger ]" data-dismiss="modal">Cancel</button>
                    <button type="submit" id="u-submitBtn" name="u-submitBtn" value="<?php echo $gig['gigId'] ?>" class="[ button__primary button__submit ]" data-dismiss="modal">Save</button>
                </div>
            </form>
        </div>
    </dialog>

    <dialog id="editDescriptionModal" class="[ Modal ]">
        <div class="[ container ]">
            <div class="[ caption ]">
                <h2>Description</h2>
                <p>Update gig description.</p>
            </div>
            <form class="[ new__details_form ]" action="<?php echo URLROOT ?>/tech/update_gig_description_details" method="post">
                <div class="[ input__control ]">
                    <textarea class="" id="u-description" name="u-description"><?php printValue($gig['description']) ?></textarea>
                </div>
                <div class="[ control__buttons ]">
                    <button type="button" onclick="closeEditDetailsModal()" class="[ button__danger ]" data-dismiss="modal">Cancel</button>
                    <button type="submit" id="u-submitBtn" name="u-submitBtn" value="<?php echo $gig['gigId'] ?>" class="[ button__primary button__submit ]" data-dismiss="modal">Save</button>
                </div>
            </form>
        </div>
    </dialog>




    <?php
    $active = "dashboard";
    $title = "Dashboard";
    require_once("navigator.php");
    ?>

    <?php $name = "Janith"; ?>

    <div class="[ container ][ dashboard ]" container-type="dashboard-section">
        <div class="caption">
            <h2>Edit Gig Details</h2>
            <p>You can edit details of this gig.</p>
        </div>
        <div class="gig_row">
            <div class="gig_left">
                <div class="gig__img">
                    <img src="<?php echo UPLOADS . $gig['thumbnail'] ?>">
                </div>
                <div class="slider">
                    <div class="slide_img">
                        <img src="<?php echo UPLOADS . $gig['thumbnail'] ?>">
                    </div>
                    <div class="slide_img">
                        <img src="<?php echo UPLOADS . $gig['thumbnail'] ?>">
                    </div>
                    <div class="slide_img">
                        <img src="<?php echo UPLOADS . $gig['thumbnail'] ?>">
                    </div>
                    <div class="slide_img">
                        <img src="<?php echo UPLOADS . $gig['thumbnail'] ?>">
                    </div>
                </div>
                <button class="image__button fix-top"><i class="bi bi-camera"></i></button>
            </div>
            <div class="gig__right">
                <div class="gig__content">
                    <div class="row">
                        <div class="caption mt-0 mb-0">
                            <h2>Gig Details</h2>
                            <p>Basic gig details.</p>
                        </div>
                        <div class="buttons">
                            <button class="button__primary" onclick="openEditDetailsModal()">Edit Details</button>
                        </div>
                    </div>
                    <div class="row row-1">
                        <div class="field">
                            <small>Title</small>
                            <p><?php echo $gig['title'] ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="field">
                            <small>Category</small>
                            <p><?php echo $gig['category'] ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="field">
                            <small>Crop Cycle</small>
                            <p><?php echo $gig['cropCycle'] ?> Days</p>
                        </div>
                        <div class="field">
                            <small>Land Area</small>
                            <p><?php echo $gig['landArea'] ?> Hectares</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="field">
                            <small>Initial Investment</small>
                            <p class="LKR"><?php echo number_format($gig['capital'], 2, '.', ',') ?></p>
                        </div>
                        <div class="field">
                            <small>Profit Margin</small>
                            <p><?php echo $gig['profitMargin'] ?> %</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="gig__content ">
            <div class="row">
                <div class="caption mb-0">
                    <h2>Location</h2>
                    <p>Edit Address, City, District.</p>
                </div>
            </div>
            <div class="row">
                <div class="field">
                    <small>Address Line 1</small>
                    <p><?php echo $gig['addressLine1'] ?></p>
                </div>
                <div class="field">
                    <small>Address Line 2</small>
                    <p><?php echo $gig['addressLine2'] ?></p>
                </div>
            </div>
            <div class="row">
                <div class="field">
                    <small>City</small>
                    <p><?php echo $gig['city'] ?></p>
                </div>
                <div class="field">
                    <small>district</small>
                    <p><?php echo $gig['district'] ?></p>
                </div>
            </div>
            <button class="button__primary" onclick="openEditLocationModal()">Edit Location</button>
        </div>

        <div class="gig__content">
            <div class="row">
                <div class="caption mb-0">
                    <h2>Description</h2>
                </div>
            </div>
            <p class="description"><?php echo $gig['description'] ?></p>
        </div>
        <button class="button__primary" onclick="openEditDescriptionModal()">Edit Description</button>
    </div>
    </div>
    <?php
    require_once("footer.php");
    ?>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="<?php echo JS ?>/dashboard/chart.js"></script>
    <script src="<?php echo JS ?>/dashboard/dashboard.js"></script>
    <script>
        function openEditDetailsModal() {
            const editDetailsModal = document.getElementById("editDetailsModal")
            editDetailsModal.showModal()
        }

        function closeEditDetailsModal() {
            location.reload()
            const editDetailsModal = document.getElementById("editDetailsModal")
            editDetailsModal.close()
        }

        function openEditLocationModal() {
            const editLocationModal = document.getElementById("editLocationModal")
            editLocationModal.showModal()
        }

        function closeEditLocationModal() {
            location.reload()
            const editLocationModal = document.getElementById("editLocationModal")
            editLocationModal.close()
        }

        function openEditDescriptionModal() {
            const editDescriptionModal = document.getElementById("editDescriptionModal")
            editDescriptionModal.showModal()
        }

        function closeEditDescriptionModal() {
            location.reload()
            const editDescriptionModal = document.getElementById("editDescriptionModal")
            editDescriptionModal.close()
        }
    </script>
</body>

</html>