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
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>/tabs.css">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>/gridTable.css">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>/admin/users.css">

    <title>Dashboard | Admin</title>
</head>

<body>

    <?php

    $active = "users";
    $title = "Users";
    require_once("navigator.php");
    ?>

    <?php $name = "Janith"; ?>

    <div class="[ container ]" container-type="dashboard-section">

        <div class="[ tabs ][ gigTabs ]" tab="2">
            <div class="controls">
                <button class="control" for="1">Active Users</button>
                <button class="control" for="2">Suspended Users</button>
            </div>
            <div class="wrapper">
                <div class="tab" id="1" active="true">
                    <div class="[ requests__continer ]">
                        <div class="[ caption ]">
                            <h2>Active Users</h2>
                            <p>Keep your eyes on the prize by tracking progress with ease.</p>
                        </div>
                        <?php
                        if (!isset($activeUsers) || empty($activeUsers)) {
                            require(COMPONENTS . "dashboard/noDataFound.php");
                        } else {
                        ?>
                            <div class="[  ]">
                                <div class="[ grid ][ filters ]" md="1" lg="2" gap="2">
                                    <div class="[ grid ][ options ]" sm="1" md="6" lg="6" gap="1">
                                        <div class="[ input__control ]">
                                            <label for="from">From :</label>
                                            <input id="from" type="date">
                                        </div>
                                        <div class="[ input__control ]">
                                            <label for="to">To :</label>
                                            <input id="to" type="date">
                                        </div>
                                        <div class="[ input__control ]">
                                            <label for="location">Location :</label>
                                            <select id="location">
                                                <option value="all">All</option>
                                                <option value="colombo">Colombo</option>
                                                <option value="galle">Galle</option>
                                                <option value="kandy">Kandy</option>
                                                <option value="matara">Matara</option>
                                                <option value="nuwaraeliya">Nuwara Eliya</option>
                                                <option value="trincomalee">Trincomalee</option>
                                            </select>
                                        </div>
                                        <div class="[ input__control ]">
                                            <label for="category">Category :</label>
                                            <select id="category">
                                                <option value="all">All</option>
                                                <option value="vegetable">Vegetable</option>
                                                <option value="fruit">Fruit</option>
                                                <option value="grains">Grains</option>
                                                <option value="spices">Spices</option>
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


                                <div class="[ grid__table ]" style="
                                --xl-cols:  2fr 1fr 2fr 2fr 1fr;
                                --lg-cols: 4fr 1fr 1fr;
                                --md-cols: 5fr 1fr;
                                --sm-cols: 3fr 1fr;
                                ">
                                    <div class="[ head ]">
                                        <div class="[ data ]">
                                            <p>Gig</p>
                                        </div>
                                        <div class="[ data ]" hideIn="md">
                                            <p>Category</p>
                                        </div>
                                        <div class="[ data ]" hideIn="lg">
                                            <p>Prograss</p>
                                        </div>
                                    </div>
                                    <div class="[ body ]">
                                        <?php
                                        foreach ($activeUsers as $activeUser) {
                                        ?>
                                            <div class="[ row ]">
                                                <div class="[ data ]">
                                                    <div class="[ item__card ]">
                                                        <div class="[ img ]">
                                                            <img width="50" src="<?php echo UPLOADS . $activeUser['image'] ?>" />
                                                        </div>
                                                        <div class="[ content ]">
                                                            <h2><?php echo $activeUser['firstName'] . " " . $activeUser['lastName'] ?></h2>
                                                            <h3><?php echo $activeUser['city'] ?></h3>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="[ data ]" hideIn="md">
                                                    <p class="[ tag ]"><?php echo $activeUser['userType'] ?></p>
                                                </div>

                                                <div class="[ data ]">
                                                    <div class="[ actions ]">
                                                        <a href="<?php echo URLROOT ?>/profile/<?php echo $activeUser['uid'] ?>" class="btn btn-primary">View More</a>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php
                                        }
                                        ?>

                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
                <div class="tab" id="2">
                    <div class="[ requests__continer ]">
                        <div class="[ caption ]">
                            <h2>Suspended Users</h2>
                            <p>Get a complete overview of your completed gigs and track your progress with just a few clicks!</p>
                        </div>
                        <?php
                        if (!isset($suspendedUsers) || empty($suspendedUsers)) {
                            require(COMPONENTS . "dashboard/noDataFound.php");
                        } else {
                        ?>
                            <div class="[  ]">
                                <div class="[ grid ][ filters ]" md="1" lg="2" gap="2">
                                    <div class="[ grid ][ options ]" sm="1" md="6" lg="6" gap="1">
                                        <div class="[ input__control ]">
                                            <label for="from">From :</label>
                                            <input id="from" type="date">
                                        </div>
                                        <div class="[ input__control ]">
                                            <label for="to">To :</label>
                                            <input id="to" type="date">
                                        </div>
                                        <div class="[ input__control ]">
                                            <label for="location">Location :</label>
                                            <select id="location">
                                                <option value="all">All</option>
                                                <option value="colombo">Colombo</option>
                                                <option value="galle">Galle</option>
                                                <option value="kandy">Kandy</option>
                                                <option value="matara">Matara</option>
                                                <option value="nuwaraeliya">Nuwara Eliya</option>
                                                <option value="trincomalee">Trincomalee</option>
                                            </select>
                                        </div>
                                        <div class="[ input__control ]">
                                            <label for="category">Category :</label>
                                            <select id="category">
                                                <option value="all">All</option>
                                                <option value="vegetable">Vegetable</option>
                                                <option value="fruit">Fruit</option>
                                                <option value="grains">Grains</option>
                                                <option value="spices">Spices</option>
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


                                <div class="[ grid__table ]" style="
                                --xl-cols:  2fr 1fr 2fr 2fr 1fr;
                                --lg-cols: 4fr 1fr 1fr;
                                --md-cols: 5fr 1fr;
                                --sm-cols: 3fr 1fr;
                                ">
                                    <div class="[ head ]">
                                        <div class="[ data ]">
                                            <p>Gig</p>
                                        </div>
                                        <div class="[ data ]" hideIn="md">
                                            <p>Category</p>
                                        </div>
                                        <div class="[ data ]" hideIn="lg">
                                            <p>Prograss</p>
                                        </div>
                                    </div>
                                    <div class="[ body ]">
                                        <?php
                                        foreach ($suspendedUsers as $suspendedUser) {
                                        ?>
                                            <div class="[ row ]">
                                                <div class="[ data ]">
                                                    <div class="[ item__card ]">
                                                        <div class="[ img ]">
                                                            <img width="50" src="<?php echo UPLOADS . $suspendedUser['image'] ?>" />
                                                        </div>
                                                        <div class="[ content ]">
                                                            <h2><?php echo $suspendedUser['firstName'] . " " . $suspendedUser['lastName'] ?></h2>
                                                            <h3><?php echo $suspendedUser['city'] ?></h3>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="[ data ]" hideIn="md">
                                                    <p class="[ tag ]"><?php echo $suspendedUser['userType'] ?></p>
                                                </div>

                                                <div class="[ data ]">
                                                    <div class="[ actions ]">
                                                        <a href="<?php echo URLROOT ?>/profile/<?php echo $suspendedUser['uid'] ?>" class="btn btn-primary">View More</a>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php
                                        }
                                        ?>
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

    </div>
    <?php
    require_once("footer.php");
    ?>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="<?php echo JS ?>/dashboard/chart.js"></script>
    <script src="<?php echo JS ?>/dashboard/dashboard.js"></script>
    <script>
        const controls = document.querySelectorAll(".controls>button");
        const tabs = document.querySelectorAll(".tab");

        Array.from(controls).forEach(control => {
            control.addEventListener("click", () => {
                let For = control.getAttribute("for")
                Array.from(tabs).forEach(tab => {
                    if (tab.id == For) {
                        tab.setAttribute("active", true)
                        control.toggleAttribute("active")
                    } else {
                        tab.setAttribute("active", false)
                    }
                })
            })
        })
    </script>
</body>

</html>