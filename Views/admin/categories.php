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
                <button type="button" class="[ button__primary ]">Add Category</button>
            </div>
        </div>
        <div class="[  ]">
            <div class="[ grid__table ]" style="
                                --xl-cols: 2.5fr 1fr 1.5fr 3fr 1.5fr 1fr;
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
                            <p>Category Name</p>
                        </div>
                        <div class="[ data ]" hideIn="md">
                            <p>Type</p>
                        </div>
                        <div class="[ data ]" hideIn="lg">
                            <p>Created Date</p>
                        </div>
                        <div class="[ data ]" hideIn="md">
                            <p>Created By</p>
                        </div>
                        <div class="[ data ]" hideIn="lg">
                            <!-- <p>Email</p> -->
                        </div>
                    </div>
                </div>
                <div class="[ body ]">
                    <?php
                    foreach ($activeUsers as $activeUser) {
                    ?>
                        <div class="[ row ]">
                            <div class="[ data ]">
                                <div class="[ item__card ]">
                                    <img width="50" src="<?php echo UPLOADS . $activeUser['image'] ?>" />
                                </div>
                            </div>
                            <div class="[ data ]" hideIn="md">
                                <p class="[ tag ]"><?php echo $activeUser['firstName'] ?></p>
                            </div>
                            <div class="[ data ]" hideIn="md">
                                <p class="[ tag ]"><?php echo $activeUser['lastName'] ?></p>
                            </div>
                            <div class="[ data ]" hideIn="md">
                                <p class="[ tag ]"><?php echo $activeUser['userType'] ?></p>
                            </div>
                            <div class="[ data ]" hideIn="md">
                                <p class="[ tag ]"><?php echo $activeUser['username'] ?></p>
                            </div>

                            <div class="[ data flex-center ]">
                                <div class="[ actions ]">
                                    <a href="<?php echo URLROOT ?>/profile/<?php echo $activeUser['uid'] ?>" class="button__primary">View More</a>
                                    <button onclick="openSuspendAlert('<?php echo $activeUser['uid'] ?>')" class="button__danger">Suspend</button>
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