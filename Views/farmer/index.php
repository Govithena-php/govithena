<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="<?php echo IMAGES ?>/favicon.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />

    <link rel="stylesheet" href="<?php echo CSS ?>/ui.css">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>/base.css">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>/grid.css">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>/table.css">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>/gridTable.css">
    <link rel="stylesheet" href="<?php echo CSS ?>/formModal.css">

    <link rel="stylesheet" href="<?php echo CSS ?>/farmer/gigs.css">

    <title>Dashboard | Farmer</title>
</head>

<body>

    <?php

    if (Session::has('compelete_gig_alert')) {
        $alert = Session::pop('compelete_gig_alert');
        $alert->show_default_alert();
    }

    ?>


    <dialog id="completeModal" class="[ modal ]">
        <div class="[ container ]">
            <div class="[ caption ]">
                <h3>Mark As Complete</h3>
                <p>Please confirm if you really want to mark this gig as completed.</p>
            </div>

            <div class="[ body ]">
                <p>Before proceeding, please ensure that the gig has been satisfactorily completed according to the agreed terms and deliverables. Once you mark the gig as completed, it will be considered ready for payment.</p>
                <p>Please wait until the investor also marks the gig as completed. The payment process will be initiated only when both parties have confirmed the completion. This ensures fairness and transparency in the transaction.</p>
            </div>



            <form action="<?php echo URLROOT ?>/farmer/complete_gig" method="POST" class="[ content ]">
                <div class="check">
                    <div class=""><input type="checkbox" name="confirm" id="confirm" required></div>
                    <label for="confirm">I confirm that the gig has been completed and I am ready to provide the necessary profit to the investor.</label>
                </div>
                <div class="[ buttons ]">
                    <button type="button" class="[ button__danger ]" onclick="closeCompleteModal()" data-dismiss="modal">Cancel</button>
                    <button type="submit" id="completeRequestBtn" name="gigId" class="[ button__primary ]">Complete</button>
                </div>
            </form>
    </dialog>

    <?php
    $datadata = $notifications;
    $active = "gigs";
    $title = "Gigs";
    require_once("navigator.php");
    ?>

    <div class="[ container ][ gigs ]" container-type="dashboard-section">
        <div class="btn_wrapper">
            <h2>My Gigs</h2>
            <a class="btn btn-primary" href="<?php echo URLROOT ?>/farmer/createGig">Add New</a>
        </div>
        <div class="grid__table" style="
                                --xl-cols: 0.7fr 1.2fr 0.9fr 0.75fr 0.5fr 0.5fr 1.8fr 1.25fr;
                                --lg-cols: 1.5fr 1fr 1fr 1fr 0.3fr;
                                --md-cols: 2fr 1fr 0.3fr;
                                --sm-cols: 3fr 0.3fr;
                            ">
            <div class="head">
                <div class="row">
                    <div class="data">
                        <p></p>
                    </div>
                    <div class="data remove-border">
                        <p>Farmer Name</p>
                    </div>
                    <div class="data">
                        <p>Initial Investment</p>
                    </div>
                    <div class="data">
                        <p>Location</p>
                    </div>
                    <div class="data">
                        <p>Status</p>
                    </div>
                    <div class="data">
                        <p>Land Area</p>
                    </div>
                    <div class="data">
                        <p>Description</p>
                    </div>
                </div>
            </div>
            <div class="body">
                <?php
                foreach ($products as $p) {
                ?>
                    <div class="row">
                        <div class="data farmer__">
                            <div class="farmerimg">
                                <img src="<?php echo UPLOADS . '/profilePictures/' . $p['thumbnail'] ?>" alt="Picture">
                            </div>
                        </div>
                        <div class="data ">
                            <div class="namecol">
                                <h1>
                                    <p><?php echo $p['title'] ?></p>
                                </h1>
                                <p><?php echo $p['category'] ?></p>
                            </div>
                        </div>
                        <div class="data">
                            <p class="LKR"><?php echo number_format($p['capital'], 2, '.', ',') ?></p>
                        </div>
                        <div class="data">
                            <p><?php echo $p['city'] ?></p>
                        </div>
                        <div class="data">
                            <p><?php echo $p['status'] ?></p>
                        </div>
                        <div class="data">
                            <p><?php echo $p['landArea'] ?></p>
                        </div>
                        <div class="data">
                            <p><?php echo $p['description'] ?></p>
                        </div>
                        <div class="data flex-right">
                            <div class="namecol">
                                <?php

                                if ($p['status'] == "RESERVED") {
                                ?>
                                    <button onclick="openCompleteModal('<?php echo $p['gigId'] ?>')" class="button__primary">Mark as Complete</button>
                                <?php
                                } else {
                                ?>
                                    <button onclick="openRejectModal('<?php echo $p['gigId'] ?>')" class="button__danger">Delete Gig</button>
                                    <a href="#" class="button__primary">Edit Gig</a>
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
    <?php
    require_once("footer.php");
    ?>
    <script src="<?php echo JS ?>/main.js"></script>
    <script>
        function openCompleteModal(id) {
            document.getElementById('completeModal').showModal()
            document.getElementById('completeRequestBtn').value = id
        }

        function closeCompleteModal() {
            location.reload()
            document.getElementById('completeModal').close()
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