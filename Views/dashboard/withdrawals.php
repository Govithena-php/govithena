<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="<?php echo IMAGES ?>/favicon.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="<?php echo CSS ?>/ui.css">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>/base.css">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>/grid.css">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>/table.css">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>/gridTable.css">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>/formModal.css">
    <link rel="stylesheet" href="<?php echo CSS ?>/investor/withdrawals.css">

    <title>Dashboard | Investor</title>
</head>

<body>


    <dialog id="withdrawalModal" class="[ modal ]">
        <div class="[ container ]">
            <div class="[ head ]">
                <h3>Withdarw your earnings to your bank account.</h3>
            </div>
            <form class="[ new__details_form ]" action="<?php echo URLROOT ?>/dashboard/process_withdrawal" method="post">
                <div class="grid" sm="1" gap="1">
                    <div class="[ input__control ]">
                        <label for="amount">Amount you wish to withdraw <small>(LKR)</small></label>
                        <?php
                        if (isset($withdrawalBalance) && !empty($withdrawalBalance)) {
                        ?>
                            <small class="red_p">You can withdraw up to LKR <?php echo number_format($withdrawalBalance['balance'], 2, '.', ','); ?></small>
                        <?php
                        }
                        ?>
                        <input type="number" id="amount" name="amount" placeholder="LKR" max="<?php echo $withdrawalBalance['balance'] ?>">
                    </div>
                    <div class="[ input__control ]">
                        <label for="account">Account Number</label>
                        <select id="account" name="account">
                            <?php
                            if (isset($bankAccounts) && empty($bankAccounts)) {
                                echo "<option value=''>No bank accounts found</option>";
                            } else {
                                foreach ($bankAccounts as $bankAccount) {
                            ?>
                                    <option value='<?php echo $bankAccount['accountNumber'] ?>'><?php echo $bankAccount['accountNumber'] ?> - <?php echo BANK[$bankAccount['bank']] ?></option>
                            <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="[ foot ]">
                        <p>Please note that the withdrawal process may take up to 3 business days to complete. We appreciate your patience during this time and will notify you via email once your withdrawal has been processed.</p>
                    </div>
                    <div class="[ buttons ]">
                        <button type="button" onclick="closeWithdrawalModal()" class="[ button__danger ]" data-dismiss="modal">Cancel</button>
                        <button type="submit" id="u-submitBtn" name="u-submitBtn" value="<?php echo $gig['gigId'] ?>" class="[ button__primary button__submit ]" data-dismiss="modal">Withdraw</button>
                    </div>
                </div>
            </form>
    </dialog>

    <?php

    if (Session::has('withdrawal_request_alert')) {
        $alert = Session::pop('withdrawal_request_alert');
        $alert->show_default_alert();
    }

    ?>

    <?php
    $active = "withdrawals";
    $title = "Withdrawals";
    require_once("navigator.php");
    ?>

    <div class="[ container ][ investments ]" container-type="dashboard-section">
        <div class="[ caption ]">
            <h3>Track all your withdrawal in one place!</h3>
            <p>Your earnings are just a click away! Use our withdrawal page to quickly and securely request your funds, and watch your investment pay off.</p>
        </div>
        <div class="inv__cards">
            <div class="inv__card">
                <div class="inv__card__header">
                    <h3>Total withdrawals</h3>
                </div>
                <div class="inv__card__body">
                    <h1 class="[ LKR ]">
                        <?php
                        if (isset($totalWithdrawn)) echo number_format($totalWithdrawn, 2, '.', ',');
                        else echo "0.00";
                        ?>
                    </h1>
                </div>
            </div>

            <div class="inv__card">
                <div class="inv__card__header">
                    <h3>This Month Withdrawals</h3>
                </div>
                <div class="inv__card__body">
                    <h1 class="[ LKR ]">
                        <?php
                        if (isset($thisMonthTotalWithdrawn)) echo number_format($thisMonthTotalWithdrawn, 2, '.', ',');
                        else echo "0.00";
                        ?>
                    </h1>
                </div>
            </div>
            <div class="inv__card">
                <div class="inv__card__header">
                    <h3>Clearings</h3>
                </div>
                <div class="inv__card__body">
                    <h1 class="[ LKR ]">
                        <?php
                        if (isset($clearingWithdrawal)) echo number_format($clearingWithdrawal, 2, '.', ',');
                        else echo "0.00";
                        ?>
                    </h1>
                </div>
            </div>

            <div class="inv__card">
                <div class="inv__card__header">
                    <h3>Withdrawable balance</h3>
                </div>
                <div class="inv__card__body">
                    <?php
                    if (isset($withdrawalBalance)) {
                    ?>
                        <h1 class="LKR"><?php echo number_format($withdrawalBalance['balance'], 2, '.', ','); ?></h1>
                        <small>Last updated on</small>
                        <p><?php echo $withdrawalBalance['updatedDate'] ?> at <?php echo $withdrawalBalance['updatedTime'] ?></p>
                    <?php
                    } else {
                    ?>
                        <h1 class="LKR">0.00</h1>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
        <?php
        if (!isset($withdrawls) || empty($withdrawls)) {
        ?>
            <div class="[ grid ][ filters ]" md="1" lg="2" gap="2">
                <form method="POST" action="<?php echo URLROOT ?>/dashboard/withdrawals" class="[ grid ][ options ]" sm="1" md="6" lg="6" gap="1">
                    <div class="[ input__control ]">
                        <label for="fromDate">From</label>
                        <input id="fromDate" type="date" name="fromDate">
                    </div>
                    <div class="[ input__control ]">
                        <label for="toDate">To</label>
                        <input id="toDate" type="date" name="toDate">
                    </div>
                    <div class="[ input__control ]">
                        <label for="status">Status</label>
                        <select id="status" name="status">
                            <option value="">All</option>
                            <option value="CLEARING">clearing</option>
                            <option value="APPROVED">Approved</option>
                            <option value="DECLINED">Declined</option>
                        </select>
                    </div>
                    <div class="[ input__control ]">
                        <button type="submit" name="apply">Apply</button>
                    </div>
                </form>

                <div class="inv__new">
                    <button type="button" onclick="openWithdrawalModal()" class="[ button__danger ]">Withdraw</button>
                </div>
            </div>

        <?php
            require(COMPONENTS . "dashboard/noDataFound.php");
        } else {
        ?>

            <div class="[ grid__table ]" style="
                --xl-cols: 2fr 1.5fr 1fr 1fr 1fr 1.5fr 1fr;
                --lg-cols: 1fr 1fr 1fr 1fr;
                --md-cols: 1fr 1fr;
                --sm-cols: 1fr;
                 ">
                <div class="[ head stick_to_top ]">
                    <div class="[ grid ][ filters ]" md="1" lg="2" gap="2">
                        <form method="POST" action="<?php echo URLROOT ?>/dashboard/withdrawals" class="[ grid ][ options ]" sm="1" md="6" lg="6" gap="1">
                            <div class="[ input__control ]">
                                <label for="fromDate">From</label>
                                <input id="fromDate" type="date" name="fromDate">
                            </div>
                            <div class="[ input__control ]">
                                <label for="toDate">To</label>
                                <input id="toDate" type="date" name="toDate">
                            </div>
                            <div class="[ input__control ]">
                                <label for="status">Status</label>
                                <select id="status" name="status">
                                    <option value="">All</option>
                                    <option value="CLEARING">clearing</option>
                                    <option value="APPROVED">Approved</option>
                                    <option value="DECLINED">Declined</option>
                                </select>
                            </div>
                            <div class="[ input__control ]">
                                <button type="submit" name="apply">Apply</button>
                            </div>
                        </form>

                        <div class="inv__new">
                            <button type="button" onclick="openWithdrawalModal()" class="[ button__danger ]">Withdraw</button>
                        </div>
                    </div>
                    <div class="[ row ]">
                        <div class="[ data ]">
                            <p>Bank</p>
                        </div>
                        <div class="[ data ]">
                            <p>Account Number</p>
                        </div>
                        <div class="[ data ]">
                            <p>Branch</p>
                        </div>
                        <div class="[ data ]">
                            <p>Date</p>
                        </div>
                        <div class="[ data ]">
                            <p>Time</p>
                        </div>
                        <div class="[ data ]">
                            <p>Amount</p>
                        </div>
                        <div class="[ data ]">
                            <p>Status</p>
                        </div>
                    </div>
                </div>
                <div class="[ body ]">
                    <?php
                    foreach ($withdrawls as $withdrawal) {
                    ?>
                        <div class="[ row ]">
                            <div class="[ data ]">
                                <p><?php echo BANK[$withdrawal['bank']] ?></p>
                            </div>
                            <div class="[ data ]">
                                <p><?php echo $withdrawal['bankAccount'] ?></p>
                            </div>
                            <div class="[ data ]">
                                <p><?php echo $withdrawal['branch'] ?></p>
                            </div>
                            <div class="[ data ]">
                                <p><?php echo $withdrawal['wDate'] ?></p>
                            </div>
                            <div class="[ data ]">
                                <p><?php echo $withdrawal['wTime'] ?></p>
                            </div>
                            <div class="[ data ]">
                                <p class="[ LKR ]"><?php echo number_format($withdrawal['amount'], 2, '.', ',') ?></p>
                            </div>
                            <div class="[ data ]">
                                <p class="tag"><?php echo $withdrawal['status'] ?></p>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>

            </div>
        <?php
        }
        ?>

    </div>
    <?php
    require_once("footer.php");
    ?>
    <script src="<?php echo JS ?>/main.js"></script>
    <script src="<?php echo JS ?>/filter/toDateFromDate.js"></script>
    <script>
        function openWithdrawalModal() {
            const withdrawalModal = document.getElementById("withdrawalModal")
            withdrawalModal.showModal()
        }

        function closeWithdrawalModal() {
            location.reload()
            const withdrawalModal = document.getElementById("withdrawalModal")
            withdrawalModal.close()
        }
    </script>
</body>

</html>