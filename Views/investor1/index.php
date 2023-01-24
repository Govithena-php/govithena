<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="<?php echo IMAGES ?>/favicon.png">
    <title>govithena | dashboard</title>
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>/sidebar.css">
    <link rel="stylesheet" href="<?php echo CSS; ?>/ui.css">
    <link rel="stylesheet" href="<?php echo CSS; ?>/base.css">
    <link rel="stylesheet" href="<?php echo CSS; ?>/grid.css">
    <link rel="stylesheet" href="<?php echo CSS; ?>/investor/dashboard.css">
    <link rel="stylesheet" href="<?php echo CSS; ?>/dashHeader.css">
    <link rel="stylesheet" href="<?php echo CSS; ?>/dashFooter.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
</head>

<body>
    <?php include COMPONENTS . 'dashboard/header.php'; ?>
    <?php include 'sidebar.php'; ?>

    <?php $name = "Janith"; ?>

    <div class="[ container ][ cards ]" continer-type="dashbord-section">
        <div class="[ header ]">
            <h1>Welcome Back, <?php echo $name; ?></h1>
        </div>
        <div class="[ grid ]" gap="2" md="2" lg="4">
            <div class="[ card ]">
                <h3>Profilt</h3>
                <div class="[ flex ]">
                    <h1>150000</h1>
                    <h4>12% <i class="fa-solid fa-arrow-up"></i></h4>
                </div>
                <p>Compared to (LKR 21340 last month)</p>
            </div>

            <div class="[ card ]">
                <h3>Profilt</h3>
                <div class="[ flex ]">
                    <h1>150000</h1>
                    <h4>12% <i class="fa-solid fa-arrow-up"></i></h4>
                </div>
                <p>Compared to (LKR 21340 last month)</p>
            </div>

            <div class="[ card ]">
                <h3>Profilt</h3>
                <div class="[ flex ]">
                    <h1>150000</h1>
                    <h4>12% <i class="fa-solid fa-arrow-up"></i></h4>
                </div>
                <p>Compared to (LKR 21340 last month)</p>
            </div>

            <div class="[ card ]">
                <h3>Profilt</h3>
                <div class="[ flex ]">
                    <h1>150000</h1>
                    <h4>12% <i class="fa-solid fa-arrow-up"></i></h4>
                </div>
                <p>Compared to (LKR 21340 last month)</p>
            </div>
        </div>
    </div>





















    <script src="<?php echo JS ?>/app.js"></script>

</body>

</html>