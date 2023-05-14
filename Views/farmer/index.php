<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="<?php echo IMAGES ?>/favicon.png">
    <link rel="stylesheet" href="<?php echo CSS ?>/ui.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />

    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>/base.css">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>/grid.css">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>/table.css">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>/gridTable.css">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>/alertModal.css">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>/formModal.css">

    <link rel="stylesheet" href="<?php echo CSS ?>/farmer/gigs.css">

    <title>Dashboard | Farmer</title>
</head>

<body>

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


<dialog id="depositeModal" class="[ modal ]">
        <div class="[ container ]">
            <div class="[ caption ]">
                <h3>Depost</h3>
            </div>

            <div class="[ body ]">
                <p>Payment gatway not atacched. Click OK button to simulate the deposte process.</p>
            </div>

            <form action="<?php echo URLROOT ?>/farmer/deposite_gig" method="POST" class="[ content ]">
                <div class="[ buttons gap-2 flex-row ]">
                    <button type="button" class="[ button__danger ]" onclick="closeDepositeModal()" data-dismiss="modal">Cancel</button>
                    <button type="submit" id="depositeConfirmBtn" name="gigId" class="[ button__primary ]">Ok</button>
                </div>
            </form>
    </dialog>


    <dialog id="deleteModal" class="[ alertModal ]">
        <div class="[ container ]">
            <i class="bi bi-x-circle"></i>
            <div class="[ content ]">
                <h2>Are you sure?</h2>
                <p>Do you really want to delete this gig? This process cannot be undone.</p>
            </div>
            <form id="deleteForm" action="<?php echo URLROOT ?>/farmer/deleteGig" method="POST" class="[ gap-2 flex-row-space-between ]">
                <button type="button" class="[ button__primary ]" onclick="closeDeleteAlert()" data-dismiss="modal">No, Cancel</button>
                <button id="confirmDeleteBtn" name="deletegig-confirm" type="submit" class="[ button__danger ]">Yes, Delete</button>
            </form>
        </div>
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
        <div class="grid__table"
                        style="
                                --xl-cols: 0.7fr 1.3fr 0.9fr 1.2fr 0.7fr 0.5fr 1.9fr 1.3fr;

                            "
                        >
                        <div class="head">
                            <div class="row">
                            <div class="data">
                                    <p></p>
                                </div>
                                <div class="data remove-border">
                                    <p>Title</p>
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
                            foreach($products as $p){
                                ?>
                            <div class="row">
                                
                                <div class="data farmer__">
                                    <div class="farmerimg">
                                    <a class="underlinetext" href="<?php echo URLROOT ?>/farmer/gigView/<?php echo $p['gigId']?>">
                                        <img src="<?php echo UPLOADS .'/' .$p['thumbnail']?>" alt="Picture">
                                    </a>
                                    </div>
                                </div>
                                <div class="data ">
                                    <div class="namecol">
                                    <a class="underlinetext" href="<?php echo URLROOT ?>/farmer/gigView/<?php echo $p['gigId']?>">
                                        <h1><p><?php echo $p['title'] ?></p></h1>
                                        <p><?php echo $p['category']?></p>
                                    </a>
                                    </div>
                                </div>
                                <div class="data">
                                    <p class="LKR"><?php echo number_format($p['capital'], 2, '.', ',')?></p>
                                </div>
                                <div class="data">
                                    <p><?php echo $p['city']?></p>
                                </div>
                                <div class="data">
                                    <p><?php echo $p['status']?></p>
                                </div>
                                <div class="data">
                                    <p><?php echo $p['landArea']?></p>
                                </div>
                                <div class="data">
                                    <p><?php echo $p['description']?></p>
                                </div>
                                <div class="data flex-right">
                                    <div class="actions">

                                        <?php   
                                        
                                        if($p['status'] == 'ACTIVE'){
                                            ?>
                                            <a href="<?php echo URLROOT . "/farmer/editGig/" . $p['gigId'] ?>" class="btn btn-primary">Edit</a>
                                            <button onclick="openDeleteAlert('<?php echo $p['gigId']?>')" class="button__danger">Delete</button> 
                                            <?php
                                        }
                                        else if($p['status'] == 'RESERVED'){
                                            ?>
                                            <button onclick="openCompleteModal('<?php echo $p['gigId']?>')" class="button__danger">Mark as complete</button>                                             
                                            <?php
                                        }
                                        else if($p['status'] == 'UNDER_COMPLETION'){
                                            ?>
                                            <button onclick="openDepositeModal('<?php echo $p['gigId']?>')" class="button__danger button__disabled" disabled>deposite</button>                                             
                                            <?php
                                        }
                                        else if($p['status'] == 'NOT_DEPOSITED'){
                                            ?>
                                            <button onclick="openDepositeModal('<?php echo $p['gigId']?>')" class="button__danger">deposite</button>                                             
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
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="<?php echo JS ?>/dashboard/chart.js"></script>
    <script src="<?php echo JS ?>/dashboard/dashboard.js"></script>
    <script>
        function openCompleteModal(id) {
            document.getElementById('completeModal').showModal()
            document.getElementById('completeRequestBtn').value = id
        }

        function closeCompleteModal() {
            location.reload()
            document.getElementById('completeModal').close()
        }
        function openDepositeModal(id) {
            document.getElementById('depositeModal').showModal()
            document.getElementById('depositeConfirmBtn').value = id
        }

        function closeDepositeModal() {
            location.reload()
            document.getElementById('depositeModal').close()
        }

        function openDeleteAlert(id) {
            const deleteModal = document.getElementById('deleteModal')
            const confirmDeleteBtn = document.getElementById('confirmDeleteBtn')
            confirmDeleteBtn.value = id
            deleteModal.showModal()
        }

        function closeDeleteAlert() {
            const deleteModal = document.getElementById('deleteModal')
            deleteModal.close()
        }

    </script>
    
</body>

</html>