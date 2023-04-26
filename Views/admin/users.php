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
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>/alertModal.css">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>/admin/users.css">


    <title>Dashboard | Admin</title>
</head>

<body>

    <dialog id="conformationModal" class="[ alertModal ]">
        <div class="[ container ]">
            <i class="fa fa-circle-xmark" aria-hidden="true"></i>
            <div class="[ content ]">
                <h2>Are you sure?</h2>
                <p>Do you really want to Suspend this user ?</p>
            </div>
            <form id="suspendForm" action="<?php echo URLROOT ?>/admin/suspend_user" method="POST" class="[ buttons ]">
                <button type="button" class="[ button__primary ]" onclick="closeSuspendAlert()" data-dismiss="modal">No, Cancel</button>
                <button id="confirmSuspendBtn" name="suspend-confirm" type="submit" class="[ button__danger ]">Yes, Suspend</button>
            </form>
        </div>
    </dialog>

    <dialog id="reactivateConformationModal" class="[ alertModal ]">
        <div class="[ container ]">
            <i class="fa fa-circle-xmark" aria-hidden="true"></i>
            <div class="[ content ]">
                <h2>Are you sure?</h2>
                <p>Do you really want to Re-Activate this user ?</p>
            </div>
            <form id="reactivateForm" action="<?php echo URLROOT ?>/admin/reactivate_user" method="POST" class="[ buttons ]">
                <button type="button" class="[ button__primary ]" onclick="closeReactivateAlert()" data-dismiss="modal">No, Cancel</button>
                <button id="confirmReactivateBtn" name="reactivate-confirm" type="submit" class="[ button__danger ]">Yes, Re-Activate</button>
            </form>
        </div>
    </dialog>

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
                                <div class="[ grid__table ]" style="
                                --xl-cols:  0.75fr 1.5fr 1.5fr 1fr 1.5fr 3fr;
                                --lg-cols: 4fr 1fr 1fr;
                                --md-cols: 5fr 1fr;
                                --sm-cols: 3fr 1fr;
                                ">
                                    <div class="[ head stick_to_top ]">
                                        <div class="[ grid ][ filters ]" md="1" lg="2" gap="2">
                                            <div class="[ grid ][ options ]" sm="1" md="6" lg="6" gap="1">
                                                <div class="[ input__control ]">
                                                    <label for="from">Joined Date :</label>
                                                    <input id="from" type="date">
                                                </div>
                                                <div class="[ input__control ]">
                                                    <label for="location">User Type :</label>
                                                    <select id="location">
                                                        <option value="INVESTOR">Investor</option>
                                                        <option value="FARMER">Farmer</option>
                                                        <option value="AGROLOGIST">Agrologist</option>
                                                        <option value="TECH">Tech Assistant</option>
                                                        <option value="ADMIN">Staff</option>
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
                                                <p>User</p>
                                            </div>
                                            <div class="[ data ]" hideIn="md">
                                                <p>First Name</p>
                                            </div>
                                            <div class="[ data ]" hideIn="lg">
                                                <p>Last Name</p>
                                            </div>
                                            <div class="[ data ]" hideIn="md">
                                                <p>User Type</p>
                                            </div>
                                            <div class="[ data ]" hideIn="lg">
                                                <p>Email</p>
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
                                                        <img width="50" src="<?php echo UPLOADS . '/profilePictures/' . $activeUser['image'] ?>" />
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
                                <div class="[ grid__table ]" style="
                                --xl-cols:  0.75fr 1.5fr 1.5fr 1fr 1.5fr 3fr;
                                --lg-cols: 4fr 1fr 1fr;
                                --md-cols: 5fr 1fr;
                                --sm-cols: 3fr 1fr;
                                ">
                                    <div class="[ head stick_to_top ]">
                                        <div class="[ grid ][ filters ]" md="1" lg="2" gap="2">
                                            <div class="[ grid ][ options ]" sm="1" md="6" lg="6" gap="1">
                                                <div class="[ input__control ]">
                                                    <label for="from">Joined Date :</label>
                                                    <input id="from" type="date">
                                                </div>
                                                <div class="[ input__control ]">
                                                    <label for="location">User Type :</label>
                                                    <select id="location">
                                                        <option value="INVESTOR">Investor</option>
                                                        <option value="FARMER">Farmer</option>
                                                        <option value="AGROLOGIST">Agrologist</option>
                                                        <option value="TECH">Tech Assistant</option>
                                                        <option value="ADMIN">Staff</option>
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
                                                <p>User</p>
                                            </div>
                                            <div class="[ data ]" hideIn="md">
                                                <p>First Name</p>
                                            </div>
                                            <div class="[ data ]" hideIn="lg">
                                                <p>Last Name</p>
                                            </div>
                                            <div class="[ data ]" hideIn="md">
                                                <p>User Type</p>
                                            </div>
                                            <div class="[ data ]" hideIn="lg">
                                                <p>Email</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="[ body ]">
                                        <?php
                                        foreach ($suspendedUsers as $suspendedUser) {
                                        ?>
                                            <div class="[ row ]">
                                                <div class="[ data ]">
                                                    <div class="[ item__card ]">
                                                        <img width="50" src="<?php echo UPLOADS . $suspendedUser['image'] ?>" />
                                                    </div>
                                                </div>
                                                <div class="[ data ]" hideIn="md">
                                                    <p class="[ tag ]"><?php echo $suspendedUser['firstName'] ?></p>
                                                </div>
                                                <div class="[ data ]" hideIn="md">
                                                    <p class="[ tag ]"><?php echo $suspendedUser['lastName'] ?></p>
                                                </div>
                                                <div class="[ data ]" hideIn="md">
                                                    <p class="[ tag ]"><?php echo $suspendedUser['userType'] ?></p>
                                                </div>
                                                <div class="[ data ]" hideIn="md">
                                                    <p class="[ tag ]"><?php echo $suspendedUser['username'] ?></p>
                                                </div>

                                                <div class="[ data flex-center ]">
                                                    <div class="[ actions ]">
                                                        <a href="<?php echo URLROOT ?>/profile/<?php echo $suspendedUser['uid'] ?>" class="button__primary">View More</a>
                                                        <button onclick="openReactivateAlert('<?php echo $suspendedUser['uid'] ?>')" class="button__danger">Re-Activate</button>
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


        function openSuspendAlert(id) {
            const conformationModal = document.getElementById("conformationModal")
            const confirmSuspendBtn = document.getElementById("confirmSuspendBtn")
            confirmSuspendBtn.value = id
            conformationModal.showModal()
        }

        function closeSuspendAlert() {
            const conformationModal = document.getElementById("conformationModal")
            conformationModal.close()
        }

        function openReactivateAlert(id) {
            const reactivateConformationModal = document.getElementById("reactivateConformationModal")
            const confirmReactivateBtn = document.getElementById("confirmReactivateBtn")
            confirmReactivateBtn.value = id
            reactivateConformationModal.showModal()
        }

        function closeReactivateAlert() {
            const reactivateConformationModal = document.getElementById("reactivateConformationModal")
            reactivateConformationModal.close()
        }
    </script>
</body>

</html>