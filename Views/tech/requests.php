<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="<?php echo IMAGES ?>/favicon.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
    <link rel="stylesheet" href="../Webroot/css/ui.css">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>/base.css">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>/grid.css">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>/table.css">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>/tabs.css">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>/gridTable.css">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>/alertModal.css">
    <link rel="stylesheet" href="<?php echo CSS ?>/agrologist/requests.css">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>/tech/myrequests.css">
    <title>Dashboard | Tech Assistant</title>
</head>

<body>

    <?php
    $active = "requests";
    $title = "Requests";
    require_once("navigator.php");

    ?>

    <dialog id="acceptModal" class="[ alertModal ]">
        <div class="[ container ]">
            <i class="fa fa-circle-xmark" aria-hidden="true"></i>
            <div class="[ content ]">
                <h2>Are you sure?</h2>
                <p>Do you really want to accept the request?</p>
            </div>
            <form id="acceptForm" action="<?php echo URLROOT ?>/tech/accept_farmer_request" method="POST" class="[ buttons ]">
                <button type="button" class="[ button__danger ]" onclick="closeAcceptModal()" data-dismiss="modal">Cancel</button>
                <button id="confirmAcceptRequest" name="acceptRequest-confirm" type="submit" class="[ button__primary ]">Accept</button>
            </form>
        </div>
    </dialog>

    <dialog id="rejectModal" class="[ alertModal ]">
        <div class="[ container ]">
            <i class="fa fa-circle-xmark" aria-hidden="true"></i>
            <div class="[ content ]">
                <h2>Are you sure?</h2>
                <p>Do you really want to reject the request.</p>
            </div>
            <form id="acceptForm" action="<?php echo URLROOT ?>/tech/reject_farmer_request" method="POST" class="[ buttons ]">
                <button type="button" class="[ button__primary ]" onclick="closeRejectModal()" data-dismiss="modal">Cancel</button>
                <button id="confirmRejectRequest" name="rejectRequest-confirm" type="submit" class="[ button__danger ]">Reject</button>
            </form>
        </div>
    </dialog>
    <div class="[ container ][ requests ]" container-type="dashboard-section">
        
        <div class="[ caption ]">
            <h3>Get to know by whom you have been accessed</h3>
            <p>Check and connect with the farmers at your interest</p>
        </div>

        <div class="tabs" tab="2">
            <div class="controls">
                <button class="control" for="1">Farmer Requests</button>
                <button class="control" for="2">Rejected Farmer Requests</button>
            </div>
            <div class="wrapper">
                <div class="tab" id="1" active="true">
                <div class="[ caption ]">
                    <h2>Farmer Requests</h2>
                    <p>Track the progress of your investments with ease. See which projects have been accepted by farmers on our platform.</p>
                </div>
                <?php
                if(!isset($farmerRequests) || empty($farmerRequests)){;
                    require(COMPONENTS . "dashboard/noDataFound.php");
                }else {
                ?>
                    <div class="grid__table"
                        style="
                                --xl-cols: 1fr 0.7fr 0.7fr 2fr 1fr;
                                --lg-cols: 1.5fr 1fr 1fr 1fr 0.3fr;
                                --md-cols: 2fr 1fr 0.3fr;
                                --sm-cols: 3fr 0.3fr;
                            "
                        >
                        <div class="head">
                            <div class="row">
                                <div class="data">
                                    <p>Farmer Name</p>
                                </div>
                                <div class="data">
                                    <p>Offer</p>
                                </div>
                                <div class="data">
                                    <p>RequestedDate</p>
                                </div>
                                <div class="data">
                                    <p>Message</p>
                                </div>
                            </div>
                        </div>
                        <div class="body">
                            <?php
                            foreach($farmerRequests as $row){
                                ?>
                            <div class="row">
                                <div class="data farmer__">
                                    <div class="farmer__image">
                                        <img src="<?php echo UPLOADS . '/profilePictures/' . $row['image']?>" alt="<?php echo $row['image']?>">
                                    </div>
                                    <p><?php echo $row['firstName'] . " " . $row['lastName']?></p>
                                </div>
                                <div class="data">
                                    <p class="LKR"><?php echo number_format($row['offer'], 2, '.', ',')?></p>
                                </div>
                                <div class="data">
                                    <p><?php echo $row['requestedDate']?></p>
                                </div>
                                <div class="data">
                                    <p><?php echo $row['message']?></p>
                                </div>
                                <div class="data flex-right">
                                    <div class="actions">
                                        <button onclick="openAcceptModal('<?php echo $row['requestId']?>')" class="button__primary">Accept</button>
                                        <button onclick="openRejectModal('<?php echo $row['requestId']?>')" class="button__danger">Reject</button>
                                    </div>
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
                <div class="tab" id="2">
                <div class="[ caption ]">
                    <h2>Rejected Farmer Requests</h2>
                    <p>Track the progress of your investments with ease. See which projects have been accepted by farmers on our platform.</p>
                </div>
                <?php
                if(!isset($rejectedFarmerRequests) || empty($rejectedFarmerRequests)){;
                    require(COMPONENTS . "dashboard/noDataFound.php");
                }else {
                    ?>
                    <div class="grid__table"
                        style="
                                --xl-cols: 1fr 0.7fr 0.7fr 2fr 1fr;
                                --lg-cols: 1.5fr 1fr 1fr 1fr 0.3fr;
                                --md-cols: 2fr 1fr 0.3fr;
                                --sm-cols: 3fr 0.3fr;
                            "
                        >
                        <div class="head">
                            <div class="row">
                                <div class="data">
                                    <p>Farmer Name</p>
                                </div>
                                <div class="data">
                                    <p>Offer</p>
                                </div>
                                <div class="data">
                                    <p>RequestedDate</p>
                                </div>
                                <div class="data">
                                    <p>Message</p>
                                </div>
                            </div>
                        </div>
                        <div class="body">
                            <?php
                            foreach($rejectedFarmerRequests as $row){
                                ?>
                            <div class="row">
                                <div class="data">
                                    <p><?php echo $row['firstName'] . " " . $row['lastName']?></p>
                                </div>
                                <div class="data">
                                    <p class="LKR"><?php echo number_format($row['offer'], 2, '.', ',')?></p>
                                </div>
                                <div class="data">
                                    <p><?php echo $row['requestedDate']?></p>
                                </div>
                                <div class="data">
                                    <p><?php echo $row['message']?></p>
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

        function openAcceptModal(id) {
            const acceptModal = document.getElementById("acceptModal")
            const confirmAcceptRequest = document.getElementById("confirmAcceptRequest")
            confirmAcceptRequest.value = id;
            acceptModal.showModal()
        }

        function closeAcceptModal() {
            const acceptModal = document.getElementById("acceptModal")
            acceptModal.close()
        }

        function openRejectModal(id) {
            const rejectModal = document.getElementById("rejectModal")
            const confirmRejectRequest = document.getElementById("confirmRejectRequest")
            confirmRejectRequest.value = id;
            rejectModal.showModal()
        }

        function closeRejectModal() {
            const rejectModal = document.getElementById("rejectModal")
            rejectModal.close()
        }
    </script>
</body>

</html>