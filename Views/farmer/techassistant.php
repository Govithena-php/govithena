<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="<?php echo IMAGES ?>/favicon.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>/base.css">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>/grid.css">
    <link rel="stylesheet" href="<?php echo CSS ?>/ui.css">
    <link rel="stylesheet" href="<?php echo CSS ?>/search.css">
    <link rel="stylesheet" href="<?php echo CSS ?>/filters.css">
    <link rel="stylesheet" href="<?php echo CSS ?>/formModal.css">
    <link rel="stylesheet" href="<?php echo CSS ?>/alertModal.css">
    <link rel="stylesheet" href="<?php echo CSS ?>/tabs.css">
    <link rel="stylesheet" href="<?php echo CSS ?>/gridTable.css">

    <link rel="stylesheet" href="<?php echo CSS ?>/farmer/agrologist.css">


    <title>Dashboard | Farmer</title>
</head>


<body class="h-screen">

    <?php
    $active = "techassistant";
    $title = "Tech Assistants";
    require_once("navigator.php");
    ?>

    <?php

    if (Session::has('techassitant_request_alert')) {
        $alert = Session::pop('techassitant_request_alert');
        $alert->show_default_alert();
    }
    if (Session::has('cancel_techassitant_request_alert')) {
        $alert = Session::pop('cancel_techassitant_request_alert');
        $alert->show_default_alert();
    }
    ?>

    <dialog id="cancelRequestModal" class="[ alertModal ]">
        <div class="[ container ]">
            <i class="bi bi-x-circle"></i>
            <div class="[ content ]">
                <h2>Are you sure?</h2>
                <p>Do you really want to cancel these request? This process cannot be undone.</p>
            </div>
            <form id="deleteForm" action="<?php echo URLROOT ?>/farmer/cancel_techassistant_request" method="POST" class="[ buttons ]">
                <button type="button" class="[ button__primary ]" onclick="closeCancelRequestModal()" data-dismiss="modal">No</button>
                <button id="requestId" name="requestId" type="submit" class="[ button__danger ]">Yes</button>
            </form>
        </div>
    </dialog>


    <dialog id="requestModal" class="[ modal ]">
        <div class="[ container ]">
            <div class="[ head ]">
                <h3>Send A Request</h3>
            </div>
            <form action="<?php echo URLROOT ?>/farmer/agrologist_request" method="POST" class="[ content ]">
                <div class="[ input__control ]">
                    <label for="offer">Offer (LKR)</label>
                    <input type="number" name="offer" id="offer" required></input>
                </div>
                <div class="[ input__control ]">
                    <label for="timePeriod">Time Period (Days)</label>
                    <input type="number" name="timePeriod" id="timePeriod" required></input>
                </div>
                <div class="[ input__control ]">
                    <label for="message">Description</label>
                    <textarea name="message" id="message" required></textarea>
                </div>
                <div class="[ buttons ]">
                    <button type="button" class="[ button__danger ]" onclick="closeRequestModal()" data-dismiss="modal">Cancel</button>
                    <button type="submit" id="sendBtn" name="agrologistId" class="[ button__primary ]">Send</button>
                </div>
            </form>
    </dialog>

    <div class="container" container-type="dashboard-section">
        <br>

        <div class="[ tabs ]" tab="3">
            <div class="controls">
                <button class="control" for="1" active>My Tech Assistants</button>
                <button class="control" for="2">Pending Tech Assistant Requests</button>
                <button class="control" for="3">Rejected Tech Assistant Requests</button>
            </div>
            <div class="wrapper">
                <div class="tab" id="1" active="true">
                    <div class="head_title">
                        <div class="caption">
                            <h3>My Technical Assistants</h3>
                        </div>
                        <div class="find_new">
                            <a href="<?php echo URLROOT ?>/farmer/techassistantfirst" class="button__primary">Find New Tech Assistant</a>
                        </div>
                    </div>
                    <div class="myagrologists">
                        <?php
                        if (!isset($myTech) || empty($myTech)) {
                            require(COMPONENTS . "dashboard/noDataFound.php");
                        } else {
                            foreach ($myTech as $myt) {
                        ?>
                                <div class="agro__card">

                                    <div class="image__name">
                                        <div class="agro__image">
                                            <img src="<?php echo UPLOADS . '/profilePictures/' . $myt['image'] ?>" alt="">
                                        </div>
                                        <div class="name">
                                            <h3><?php echo $myt['firstName'] . " " . $myt['lastName'] ?></h3>
                                            <h4><?php echo $myt['city'] ?></h4>
                                        </div>
                                    </div>
                                    <div class="actions">
                                        <a href="<?php echo URLROOT . "/profile/" . $myt['technicalAssistantId'] ?>" class="button__primary">View Profile</a>
                                        <a href="<?php echo URLROOT . "/profile/" . $myt['technicalAssistantId'] ?>" class="button__primary">Pay</a>
                                    </div>

                                </div>
                        <?php
                            }
                        }
                        ?>
                    </div>
                </div>
                <div class="tab" id="2">
                    <div class="caption">
                        <h3>Pending Agrologist Requests</h3>
                    </div>
                    <?php
                    if (!isset($pendingTech) || empty($pendingTech)) {
                        require(COMPONENTS . "dashboard/noDataFound.php");
                    } else {
                    ?>

                        <div class="grid__table" style="
                                    --xl-cols: 0.75fr 1.25fr 1fr 1fr 2fr 0.75fr;
                                ">
                            <div class="head">
                                <div class="row">
                                    <div class="data">
                                        <p>Agrologist</p>
                                    </div>
                                    <div class="data">
                                        <p>Agrologist Name</p>
                                    </div>
                                    <div class="data">
                                        <p>Offer</p>
                                    </div>

                                    <div class="data">
                                        <p>Location</p>
                                    </div>
                                    <div class="data">
                                        <p>Message</p>
                                    </div>
                                </div>
                            </div>
                            <div class="body">
                                <?php
                                foreach ($pendingTech as $tpr) {
                                ?>
                                    <div class="row">
                                        <div class="data">
                                            <div class="investorimg">
                                                <img src="<?php echo UPLOADS . "/profilePictures/" . $tpr['image']; ?>" alt="">
                                            </div>
                                        </div>
                                        <div class="data">
                                            <div class="namecol">
                                                <h3><?php echo $tpr['firstName'] . " " . $tpr['lastName'] ?></h3>
                                            </div>
                                        </div>
                                        <div class="data">
                                            <p class="LKR"><?php echo number_format($tpr['offer'], 2, '.', ',') ?></p>
                                        </div>
                                        <div class="data">
                                            <p><?php echo $tpr['city'] ?></p>
                                        </div>
                                        <div class="data">
                                            <p><?php echo $tpr['message'] ?></p>
                                        </div>
                                        <div class="data">
                                            <div class="actions">
                                                <button onclick="openCancelRequestModal('<?php echo $tpr['requestId'] ?>')" class="button__danger">Cancel</button>
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
                <div class="tab" id="3">
                    <div class="caption">
                        <h3>Declined Agrologist Requests</h3>
                    </div>
                    <?php
                    if (!isset($declinedTech) || empty($declinedTech)) {
                        require(COMPONENTS . "dashboard/noDataFound.php");
                    } else {
                    ?>

                        <div class="grid__table" style="
                                    --xl-cols: 0.75fr 1.25fr 1fr 1fr 2fr;
                                ">
                            <div class="head">
                                <div class="row">
                                    <div class="data">
                                        <p>Agrologist</p>
                                    </div>
                                    <div class="data">
                                        <p>Agrologist Name</p>
                                    </div>
                                    <div class="data">
                                        <p>Offer</p>
                                    </div>

                                    <div class="data">
                                        <p>Location</p>
                                    </div>
                                    <div class="data">
                                        <p>Message</p>
                                    </div>
                                </div>
                            </div>
                            <div class="body">
                                <?php
                                foreach ($declinedTech as $tdr) {
                                ?>
                                    <div class="row">
                                        <div class="data">
                                            <div class="investorimg">
                                                <img src="<?php echo UPLOADS . "/profilePictures/" . $tdr['image']; ?>" alt="">
                                            </div>
                                        </div>
                                        <div class="data">
                                            <div class="namecol">
                                                <h3><?php echo $tdr['firstName'] . " " . $tdr['lastName'] ?></h3>
                                            </div>
                                        </div>
                                        <div class="data">
                                            <p class="LKR"><?php echo number_format($tdr['offer'], 2, '.', ',') ?></p>
                                        </div>
                                        <div class="data">
                                            <p><?php echo $tdr['city'] ?></p>
                                        </div>
                                        <div class="data">
                                            <p><?php echo $tdr['message'] ?></p>
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
    <script src="<?php echo JS ?>/main.js"></script>
    <script src="<?php echo JS ?>/tabs.js"></script>
    <script src="<?php echo JS ?>/gridTable.js"></script>
    <script>
        function openRequestModal(id) {
            document.getElementById('requestModal').showModal()
            document.getElementById('sendBtn').value = id
        }

        function closeRequestModal() {
            document.getElementById('requestModal').close()
        }

        function openCancelRequestModal(id) {
            const cancelRequestModal = document.getElementById('cancelRequestModal')
            const requestId = document.getElementById('requestId')
            requestId.value = id
            cancelRequestModal.showModal()
        }

        function closeCancelRequestModal() {
            const cancelRequestModal = document.getElementById('cancelRequestModal')
            cancelRequestModal.close()
        }
    </script>
</body>

</html>