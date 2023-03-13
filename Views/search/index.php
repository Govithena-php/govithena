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
    <style>
        .flex {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-weight: 600;
        }

        .farmer__name {
            padding-inline: 0.5rem;
            justify-content: space-between;
        }

        .famer_page_btn {
            text-decoration: none;
            color: #fff;
        }
    </style>
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
                    $imageURL = UPLOADS . $result["thumbnail"];

                    // echo $imageURL;
                    // die();

            ?>

                    <div class="[ result__card ]">
                        <div class="[ card__img ]">

                            <img src="<?php echo $imageURL ?>" alt="test" />
                            <div class="[ farmer__name ]">
                                <a class="famer_page_btn" href="<?php echo URLROOT . "/profile/" . $result['farmerId'] ?>"><?php echo $result['firstName'] . " " . $result['lastName'] ?></a>
                                <p><?php echo $result['category'] ?></p>
                            </div>
                        </div>
                        <div class="[ card__content ]">
                            <div class="[ flex ]">
                                <a class="[ card__link text-dec-none mb-1 fs-5 text-dark fw-6 ]" href="<?php echo URLROOT . "/gig/" . $result['gigId'] ?>">
                                    <?php echo $result['title'] ?>
                                </a>
                                <p class="[ sub-heading ]">LKR <?php echo $result['capital'] ?></p>
                            </div>
                            <div class="[ flex ]">
                                <div>
                                    <small>Location :</small>
                                    <p><?php echo $result['location'] ?></p>
                                </div>
                                <div>
                                    <small>Time Period :</small>
                                    <p><?php echo $result['timePeriod'] ?> Months</p>
                                </div>
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