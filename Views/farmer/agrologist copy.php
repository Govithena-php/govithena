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
    <link rel="stylesheet" href="<?php echo CSS ?>/tabs.css">

    <link rel="stylesheet" href="<?php echo CSS ?>/farmer/agrologist.css">
    <link rel="stylesheet" href="<?php echo CSS ?>/farmer/farmerrequest.css">


    <title>Dashboard | Farmer</title>
</head>


<body class="h-screen">

    <?php
    $active = "agrologist";
    $title = "Agrologists";
    require_once("navigator.php");
    ?>

    <?php

    if (Session::has('agrologist_request_alert')) {
        $alert = Session::pop('agrologist_request_alert');
        $alert->show_default_alert();
    }
    ?>

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

        <div class="[ tabs ]" tab="2">
            <div class="controls">
                <button class="control" for="1" active>My Agrologists</button>
                <button class="control" for="2">Pending Agrologist Requests</button>
                <button class="control" for="3">Rejected Agrologist Requests</button>
            </div>
            <div class="wrapper">
                <div class="tab" id="1" active="true">a
                </div>
                <div class="tab" id="2">b
                </div>
                <div class="tab" id="3">c
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
    <script>
        function openRequestModal(id) {
            document.getElementById('requestModal').showModal()
            document.getElementById('sendBtn').value = id
        }

        function closeRequestModal() {
            document.getElementById('requestModal').close()
        }
    </script>
</body>

</html>