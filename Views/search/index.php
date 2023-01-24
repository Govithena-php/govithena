<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Govithena | Search</title>
    <link rel="icon" type="image/x-icon" href="<?php echo IMAGES ?>/favicon.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

    <link rel="stylesheet" href="<?php echo CSS ?>/ui.css">
    <link rel="stylesheet" href="<?php echo CSS ?>/base.css">
    <link rel="stylesheet" href="<?php echo CSS ?>/grid.css">
    <link rel="stylesheet" href="<?php echo CSS ?>/search.css">
    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>
</head>

<body>
    <?php
    include COMPONENTS . 'navbar.php';
    ?>

    <div class="[ container ]" container-type="section">

        <div class="[ fs-3 breadcrumbs ]">
            <a href="<?php echo URLROOT ?>">Govithena</a>
            <a href="<?php echo URLROOT ?>/search/">Search</a>
        </div>

        <form class="[ fs-3 ][ search__form ]" action="<?php echo URLROOT . "/search/" ?>" method="get">
            <input class="" type="text" name="terms" placeholder="search by: name / category / location">
            <button class="[ btn btn-primary ] [ search_button ]" type="submit">search</button>
        </form>
        <p class="[ fs-6 fw-700 my-1 ]">Search results for "<?php echo $_GET["terms"] ?>"</p>
        <hr>

        <div class="[ my-2 ] [ grid ]" gap="1" md="2" lg="4">
            <?php

            if (isset($searchResult)) {
                // print_r($searchResult);
                foreach ($searchResult as $result) {
                    $imageURL = UPLOADS . $result["image"];

                    // echo $imageURL;
                    // die();

            ?>

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
            <?php
                }
            }
            ?>
        </div>

    </div>


    <?php
    require COMPONENTS . "footer.php";
    ?>

    <script src=" <?php echo JS ?>/navbar/navbar.js"></script>
    <script src=" <?php echo JS ?>/app.js"></script>

</body>

</html>