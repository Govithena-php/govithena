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
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>/admin/categories.css">

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
        <div class="[ flex__header ]">
            <div class="[ caption ]">
                <h2>Categories</h2>
                <p>Keep your eyes on the prize by tracking progress with ease.</p>
            </div>
            <div class="[ add_new ]">
                <a href="<?php echo URLROOT ?>/admin/newCategory" class="[ button__primary ]">Add Category</a>
            </div>
        </div>
        <div class="[  ]">
            <div class="[ grid__table ]" style="
                                --xl-cols: 1fr 1fr 1fr 1fr 1fr 1fr 3fr;
                                --lg-cols: 4fr 1fr 1fr;
                                --md-cols: 5fr 1fr;
                                --sm-cols: 3fr 1fr;
                                ">
                <div class="[ head stick_to_top ]">
                    <div class="[ grid ][ filters ]" md="1" lg="2" gap="2">
                        <div class="[ grid ][ options ]" sm="1" md="6" lg="6" gap="1">
                            <div class="[ input__control ]">
                                <label for="location">Main Category</label>
                                <select id="location">
                                    <option value="vegetable">Vegetables</option>
                                    <option value="fruits">Fruits</option>
                                    <option value="grains">Grains</option>
                                    <option value="spices">Spices</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>
                            <div class="[ input__control ]">
                                <button type="button">Apply</button>
                            </div>

                        </div>
                        <div class="[ search ]">
                            <input type="text" placeholder="Search">
                            <button type="button">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                    <div class="[ row ]">
                        <div class="[ data ]">
                            <p>Category</p>
                        </div>
                        <div class="[ data ]" hideIn="md">
                            <p>Name</p>
                        </div>
                        <div class="[ data ]" hideIn="lg">
                            <p>Type</p>
                        </div>
                        <div class="[ data ]" hideIn="md">
                            <p>Slug</p>
                        </div>
                        <div class="[ data ]" hideIn="lg">
                            <p>Created By</p>
                        </div>
                        <div class="[ data ]" hideIn="lg">
                            <p>Create At</p>
                        </div>
                    </div>
                </div>
                <div class="[ body ]">
                    <?php
                    foreach ($subCategories as $subCategory) {
                    ?>
                        <div class="[ row ]">
                            <div class="[ data ]">
                                <div class="[ item__card ]">
                                    <img width="50" src="<?php echo UPLOADS . 'categories/' . $subCategory['thumbnail'] ?>" />
                                </div>
                            </div>
                            <div class="[ data ]" hideIn="md">
                                <p class="[ tag ]"><?php echo $subCategory['name'] ?></p>
                            </div>
                            <div class="[ data ]" hideIn="md">
                                <p class="[ tag ]"><?php echo $subCategory['type'] ?></p>
                            </div>
                            <div class="[ data ]" hideIn="md">
                                <p class="[ tag ]"><?php echo $subCategory['slug'] ?></p>
                            </div>
                            <div class="[ data ]" hideIn="md">
                                <p class="[ tag ]"><?php echo $subCategory['firstName'] . " " . $subCategory['lastName'] ?></p>
                            </div>
                            <div class="[ data ]" hideIn="md">
                                <p class="[ tag ]"><?php echo $subCategory['createdAt'] ?></p>
                            </div>

                            <div class="[ data flex-center ]">
                                <div class="[ actions ]">
                                    <a href="<?php echo URLROOT ?>/profile/<?php echo $subCategory['id'] ?>" class="button__primary">View More</a>
                                    <button onclick="openSuspendAlert('<?php echo $subCategory['id'] ?>')" class="button__danger">Delete</button>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>

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