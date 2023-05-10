<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agrologist | Dashboard</title>
    <link rel="icon" type="image/x-icon" href="<?php echo IMAGES ?>/favicon.png">
    <link rel="stylesheet" href="<?php echo CSS; ?>/ui.css">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>/base.css">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>/grid.css">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>/tabs.css">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS ?>/agrologist/withdrawals.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
</head>

<body class="bg-gray h-screen">
    <?php
    // $datadata = $notifications;
    $active = "withdrawals";
    $sum = 0;
    require_once("navigator.php");

    if (Session::has('agrologist_withdraw_alert')) {
        $alert = Session::pop('agrologist_withdraw_alert');
        $alert->show_default_alert();
    }

    ?>
    <div class="[ container ][ dashboard ]" container-type="dashboard-section">
        <h1>Withdrawals</h1>
        <div class="withdraw_container">
            <div class="withdrawals__cards">

                <div class="withdrawals__card">
                    <div class="withdrawals__card__header">
                        <h3>This Month Withdrawals</h3>
                    </div>
                    <div class="withdrawals__card__body">
                        <h1 class="[ LKR ]">
                            <?php
                            if ($monthly_withdrawal == null) {
                                echo "0.00";
                            } else {
                                echo number_format($monthly_withdrawal[0]['total_withdrawal'], 2, '.', ',');
                            }

                            ?>
                        </h1>
                        <!-- <?php
                        if (isset($precentage)) {
                            if ($precentage > 0)
                                echo "<p class='clr__primary'>" . $precentage . " % <i class='fa fa-arrow-up'></i> </p>";
                            else
                                echo "<p class='clr__danger'>" . $precentage . " % <i class='fa fa-arrow-down'></i></p>";
                        }
                        ?> -->
                        <p class='clr__primary'>0.00 % <i class='fa fa-arrow-up'></i> </p>
                    </div>
                </div>

                <div class="withdrawals__card">
                    <div class="withdrawals__card__header">
                        <h3>Balance</h3>
                    </div>
                    <div class="withdrawals__card__body">
                        <h1 class="[ LKR ]">
                            <?php
                            if ($income == null) {
                                $balance = 0;
                                echo "0.00";
                            } else if ($withdrawal == null) {
                                $balance = $income[0]['total_income'];
                                echo number_format($income[0]['total_income'], 2, '.', ',');
                            } else {
                                $balance = $income[0]['total_income'] - $withdrawal[0]['total_withdrawal'];

                                if (isset($balance)) {
                                    echo number_format($balance, 2, '.', ',');
                                } else {
                                    echo "0.00";
                                }
                            }


                            ?>
                        </h1>
                        <!-- <?php
                        if (isset($precentage)) {
                            if ($precentage > 0)
                                echo "<p class='clr__primary'>" . $precentage . " % <i class='fa fa-arrow-up'></i> </p>";
                            else
                                echo "<p class='clr__danger'>" . $precentage . " % <i class='fa fa-arrow-down'></i></p>";
                        }
                        ?> -->
                        <p class='clr__primary'>0.00 % <i class='fa fa-arrow-up'></i> </p>
                    </div>
                </div>

            </div>
            <div class="withdraw__card">
                <?php
                if (!isset($account) || empty($account)) {
                    require(COMPONENTS . "dashboard/noDataFound.php");
                } else {
                    ?>
                    <form action="<?php echo URLROOT . '/agrologist/withdrawals' ?>" method='POST'>
                        <div class="pt-1 flex flex-row flex-sb-c">
                            <div> <i class=" fa fa-building-columns"></i> Account Number</div>
                            <div style="color: grey;" class='fw-6'>
                                <?php echo $account[0]['accountNumber'] ?>
                            </div>
                        </div>
                        <div class="pt-1 flex flex-row flex-sb-c">
                            <div> <i class="fa fa-building-columns"></i> Bank</div>
                            <div style="color: grey;" class='fw-6'>
                                <?php echo $account[0]['bank'] ?>
                            </div>
                        </div>
                        <div class="pt-1 flex flex-row flex-sb-c">
                            <div> <i class="fa fa-building-columns"></i> Branch</div>
                            <div style="color: grey;" class='fw-6'>
                                <?php echo $account[0]['branch'] ?>
                            </div>
                        </div>
                        <div class="pt-1 flex flex-row flex-sb-c">
                            <div> <i class="fa fa-building-columns"></i> Branch Code</div>
                            <div style="color: grey;" class='fw-6'>
                                <?php echo $account[0]['branchCode'] ?>
                            </div>
                        </div>
                        <div class="pt-2">
                            <label for="withdraw_amount" class="pb-1">Amount <span class="LKR"></span></label>
                            <input type="text" name="withdraw_amount" placeholder="Withdraw Amount"
                                value="<?php echo $balance ?>">
                            <button type="submit" name="transfer_confirm_btn"
                                class="btn btn-primary uppercase mt-2">Transfer</button>
                        </div>
                    </form>
                    <?php
                }
                ?>

                <!-- <div id="edit_detials_modal" class="modal">

                    <div class="modal-content">
                        <span class="close close_modal1">&times;</span>
                        <h3 class="fw-6">Transfer</h3>
                        <p class="pt-1">Are you sure you want to transfer?</p>
                        <form class="form pt-1"
                            action="<?php echo URLROOT . '/agrologist/withdrawals?withdraw=confirm' ?>" method="post"
                            enctype="multipart/form-data">
                            <button type="submit" name="transfer_confirm_btn" class="btn uppercase">Transfer</button>
                        </form>
                    </div>

                </div> -->
            </div>
        </div>

        <div class="tabs" tab="3">
            <div class="controls">
                <button class="control" for="1">Income</button>
                <button class="control" for="2">Withrawals</button>
            </div>
            <div class="wrapper">
                <div class="tab" id="1" active="true">
                    <div class="[ requests__continer ]"
                        style="background-color: white; margin-bottom: 100px; padding: 30px">

                        <div>
                            <h2>Income</h2>
                            <hr>
                        </div>
                        <?php if ($withdrawal_list == null) {
                            require(COMPONENTS . "dashboard/noDataFound.php");
                        } else {
                            ?>
                            <div class="withdrawals_container ">
                                <div class="withdrawals_heading">
                                    <!-- <h3>Title</h3> -->
                                    <h3>Date</h3>
                                    <h3>Farmer</h3>
                                    <h3>Amount ( <span class="LKR"> )</span></h3>
                                    <!-- <h3>Category</h3> -->
                                </div>
                                <?php
                                foreach ($income_list as $income_one) {

                                    ?>
                                    <div class="withdrawals">
                                        <!-- <h3>title</h3> -->
                                        <p>
                                            <?php echo date('Y-m-d', strtotime($income_one['paidDate'])) ?>
                                        </p>
                                        <p>
                                            <?php echo ucwords($income_one['fullName']) ?>
                                        </p>
                                        <p>
                                            <?php echo number_format($income_one['payment']) ?>
                                        </p>
                                        <!-- <p>category</p> -->
                                    </div>


                                    <?php
                                }
                                ?>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </div>

                <div class="tab" id="2">
                    <div class="[ requests__continer ]"
                        style="background-color: white; margin-bottom: 100px; padding: 30px">

                        <div>
                            <h2>Withdrawals</h2>
                            <hr>
                        </div>
                        <?php if ($withdrawal_list == null) {
                            require(COMPONENTS . "dashboard/noDataFound.php");
                        } else {
                            ?>
                            <div class="withdrawals_container ">
                                <div class="withdrawals_heading">
                                    <!-- <h3>Title</h3> -->
                                    <h3>Date</h3>
                                    <h3>Amount ( <span class="LKR"> )</span></h3>
                                    <!-- <h3>Category</h3> -->
                                </div>

                                <?php
                                foreach ($withdrawal_list as $withdraw_one) {

                                    ?>
                                    <div class="withdrawals">
                                        <!-- <h3>title</h3> -->
                                        <p>
                                            <?php echo date('Y-m-d', strtotime($withdraw_one['withdrawalDate'])) ?>
                                        </p>
                                        <p>
                                            <?php echo number_format($withdraw_one['withdrawal']) ?>
                                        </p>
                                        <!-- <p>category</p> -->
                                    </div>


                                    <?php
                                }
                                ?>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <?php require "footer.php"; ?>
    <script src="<?php echo JS ?>/app.js"></script>
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


        const expandBtns = document.querySelectorAll(".actions>button")
        const expands = document.querySelectorAll(".expand")
        const icons = document.querySelectorAll(".actions>button>i")
        Array.from(expandBtns).forEach(expandBtn => {

            expandBtn.addEventListener("click", () => {
                let id = expandBtn.getAttribute("for")

                Array.from(icons).forEach(icon => {
                    icon.removeAttribute("show")
                })

                Array.from(expands).forEach(expand => {
                    if (expand.id == id) {
                        expand.toggleAttribute("show")
                        if (expand.hasAttribute("show")) {
                            expandBtn.children[0].setAttribute("show", null)
                        }
                    } else {
                        expand.removeAttribute("show")
                    }
                })

            })
        })
    </script>
    <!-- <script>
        var edit_detials_modal = document.getElementById("edit_detials_modal");

        var edit_details_btn = document.getElementById("transfer_btn");

        var span1 = document.getElementsByClassName("close_modal1")[0];

        edit_details_btn.onclick = function () {
            edit_detials_modal.style.display = "block";
        }

        span1.onclick = function () {
            edit_detials_modal.style.display = "none";
        }

        window.onclick = function (event) {
            if (event.target == modal) {
                edit_detials_modal.style.display = "none";
            }
        }

    </script> -->


</body>

</html>