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
    <link rel="stylesheet" href="<?php echo CSS ?>/agrologist/requests.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
</head>

<body class="bg-gray h-screen">
    <?php include COMPONENTS . 'dashboard/header.php'; ?>

    <?php include 'sidebar.php'; ?>
    <div class="[ dashboard-container h-screen]">
        <h1 class="[ page-heading-1 ]">requests</h1>

        <div class="[ requests__continer ]">
            <?php
            if (!isset($ar) || empty($ar)) {
                ?>
                <div class="[ no_requests__card ]">
                    <p class=''>No Requests</p>
                </div>
                <?php
            } else {
                ?>
                <div class="[ requests__wrapper ]">
                    <?php
                    foreach ($ar as $request) {
                        ?>

                        <div class="[ request__card bg-light ]">
                            <div class="[ request__img ]">
                                <img src="<?php echo IMAGES ?>/farmer.jpeg" alt="">
                            </div>
                            <form action="<?php echo URLROOT . '/agrologist/requests/' . $request['requestId'] .'/' ?>" method="POST">
                                <div class="flex flex-row " style="width: 600px">
                                    <div class="[ request__content ]">

                                        <h1>
                                            <a class="[ text-dec-none  text-dark  ]" href="<?php echo URLROOT . "/agrologist/requests/" . $request['requestId'] ?>">
                                                <?php echo ucwords($request['fullName']) ?>    
                                            </a>
                                        </h1>
                                        <h4><?php echo ucwords($request['city']) ?></h4>
                                        <p class="flex flex-row">
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                        </p>

                                    </div>
                                    <div class="flex flex-row flex-c-c">
                                        <button class="btn btn-primary mr-2 mt-2" name="accept">Accept</button>
                                        <button class="btn btn-danger mt-2" name="decline">Decline</button>
                                    </div>
                                </div>
                            </form>
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


    <?php require COMPONENTS . "dashboard/footer.php"; ?>
    <script src="<?php echo JS ?>/agrologist.js"></script>

</body>

</html>