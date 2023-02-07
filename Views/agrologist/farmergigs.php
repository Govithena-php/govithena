<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agrologist | Dashboard</title>
    <link rel="icon" type="image/x-icon" href="<?php echo IMAGES ?>/favicon.png">
    <link rel="stylesheet" type="text/css" href="../Webroot/css/sidebar.css">
    <link rel="stylesheet" href="../Webroot/css/ui.css">
    <link rel="stylesheet" href="../Webroot/css/dashHeader.css">
    <link rel="stylesheet" href="../Webroot/css/dashFooter.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
</head>

<body class="bg-gray h-screen">
    <?php include COMPONENTS . 'dashboard/header.php'; ?>

    <?php include 'sidebar.php'; ?>
    <div class="dashboard-container h-screen">
        <h1>Farmer Gigs</h1>
        <div class="[ result__card ]">
                        <div class="[ card__img ]">

                            <img src="<?php echo $imageURL ?>" alt="test" />

                            <!-- <img src="<?php echo IMAGES ?>/temp/17.jpg" alt="test"> -->
                            <div class="[ farmer__name ]">
                                <p><?php echo $result['firstName'] ?></p>
                                <p><?php echo $result['lastName'] ?></p>
                            </div>
                        </div>
                        <div class="[ card__content ]">
                            <a class="[ text-dec-none mb-1 fs-5 text-dark fw-6 ]" href="<?php echo URLROOT . "/gig/" . $result['gigId'] ?>">
                                <?php echo $result['title'] ?>
                            </a>
                            <p class="[ sub-heading ]"><?php echo $result['capital'] ?></p>
                            <p><?php echo $result['location'] ?></p>
                            <div class="[ mt-1 flex flex-sb-c ]">
                                <p><?php echo $result['category'] ?></p>
                                <p><?php echo $result['timePeriod'] ?></p>
                            </div>
                        </div>
                    </div>
    </div>


    <?php require COMPONENTS . "dashboard/footer.php"; ?>
    <script src="<?php echo JS ?>/app.js"></script>

</body>

</html>