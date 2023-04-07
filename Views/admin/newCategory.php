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
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>/admin/newCategory.css">

    <title>Dashboard | Admin</title>
</head>

<body>

    <?php
    $active = "users";
    $title = "Users";
    require_once("navigator.php");
    ?>

    <?php $name = "Janith"; ?>

    <div class="[ container ][ dashboard ]" container-type="dashboard-section">
        <div class="[ caption ]">
            <h2>Create a new category</h2>
            <p>Keep your eyes on the prize by tracking progress with ease.</p>
        </div>
        <form class="[ new__category_form ]">
            <div class="[ grid ]" sm="1" lg="3" gap="1">
                <div class="[ input__control ]">
                    <label for="category">Category Name</label>
                    <input type="text" id="category" name="category" placeholder="Category Name">
                </div>
                <div class="[ input__control ]">
                    <label for="slug">Slug</label>
                    <input type="text" id="slug" name="slug" placeholder="Slug">
                </div>
                <div class="[ input__control ]">
                    <label for="mainCategory">Main Category</label>
                    <select id="mainCategory">
                        <option value="vegetable">Vegetables</option>
                        <option value="fruits">Fruits</option>
                        <option value="grains">Grains</option>
                        <option value="spices">Spices</option>
                        <option value="other">Other</option>
                    </select>
                </div>
            </div>
            <div class="[ input__control ]">
                <label for="description">Description</label>
                <textarea id="description" name="description" placeholder="Description"></textarea>
            </div>
            <div class="[ input__control image__uploader ]">
                <div class="[ title ]">
                    <p>Category Thumbnail</p>
                </div>

                <div class="[ text__box ]">
                    <div class="[ text__box_preview ]"></div>
                    <img class="[ upload__svg ]" src="<?php echo IMAGES ?>svg/upload.svg" />
                    <p>Darg and drop your image here<br>or</p>
                    <label class="[ browse__btn ]" for="image-uploader">Browse</label>
                    <input id="image-uploader" class="text__box_input" type="file" name="image">
                </div>
            </div>
            <div class="[ input__control ]">
                <button type="submit" class="[ button__primary button__submit ]">Create</button>
            </div>
        </form>
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