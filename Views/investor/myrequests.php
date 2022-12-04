<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Investor | Dashboard</title>
    <link rel="stylesheet" type="text/css" href="<?php echo CSS ?>/sidebar.css">
    <link rel="stylesheet" href="<?php echo CSS ?>/ui.css">
    <link rel="stylesheet" href="<?php echo CSS ?>/dashHeader.css">
    <link rel="stylesheet" href="<?php echo CSS ?>/dashFooter.css">
    <link rel="stylesheet" href="<?php echo CSS ?>/investor/myrequests.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
</head>

<body>
    <?php include COMPONENTS . 'dashboard/header.php'; ?>

    <?php include 'sidebar.php'; ?>

    <div class="[ dashboard-container ]">
        <h1 class="[ page-heading-1 ]">my requests</h1>

        <div class="[ myrequests__container ]">
            <?php

            if (isset($requests)) {
                if (empty($requests)) {
            ?>
                    <p class=''>No Requests</p>
                    <?php
                } else {
                    foreach ($requests as $request) {
                    ?>
                        <div class="[ myrequests__card ]">
                            <h3><?php echo $request['requestId'] ?></h3>
                            <h4><?php echo $request['requestedDate'] ?></h4>
                            <h1><?php echo $request['offer'] ?></h1>
                            <p><?php echo $request['farmerId'] ?></p>
                            <p><?php echo $request['gigId'] ?></p>
                            <p><?php echo $request['message'] ?></p>
                        </div>
                <?php
                    }
                }
            }
            if (isset($error)) {
                ?>
                <p class=''>No Requests</p>
            <?php
            }

            ?>

        </div>

    </div>
    <?php require COMPONENTS . "dashboard/footer.php"; ?>



    <script src="<?php echo JS ?>/app.js"></script>

</body>

</html>