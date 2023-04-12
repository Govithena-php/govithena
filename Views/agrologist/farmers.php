<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agrologist | Dashboard</title>
    <link rel="icon" type="image/x-icon" href="<?php echo IMAGES ?>/favicon.png">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>/base.css">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>/grid.css">
    <link rel="stylesheet" href="<?php echo CSS ?>/ui.css">
    <!-- <link rel="stylesheet" href="<?php echo CSS ?>/agrologist/requests.css"> -->
    <link rel="stylesheet" href="<?php echo CSS ?>/agrologist/farmers.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
</head>

<body class="bg-gray h-screen">
    <?php
    $active = "farmers";
    require_once("navigator.php");
    ?>
    <div class="[ container ][ dashboard ]" container-type="dashboard-section">
        <h1 class="[ page-heading-1 ]">farmers</h1>

        <div class="farmer_continer">
            <div class="search">
                <input type="text" placeholder="Search by: farmer name/ location" oninput="liveSearch()" id="searchbox">
                <button type="button">
                    <i class="fas fa-search"></i>
                </button>
            </div>
            <?php
            if (!isset($ar) || empty($ar)) {
                ?>
                <div class="no_farmers_card">
                    <p class=''>No Active Farmers</p>
                </div>
                <?php
            } else {
                ?>
                <div class="farmer_card_wrapper">
                    <?php
                    foreach ($ar as $request) {
                        ?>

                        <div class="farmer_card bg-light ">
                            <div class="farmer_img">
                                <img src="<?php echo UPLOADS . '/' . $request['image'] ?>" alt="">
                            </div>
                            <form action="" method="POST">
                                <div class="flex flex-row " style="width: 600px">
                                    <div class="farmer_card_content">

                                        <h1>
                                            <a class="text-dec-none  text-dark "
                                                href="<?php echo URLROOT . "/agrologist/farmers/" . $request['farmerId'] ?>">
                                                <?php echo ucwords($request['fullName']) ?>
                                            </a>
                                        </h1>
                                        <h4>
                                            <?php echo ucwords($request['city']) ?>
                                        </h4>

                                        <h4 class="fw-6">
                                            LKR <?php echo ucwords($request['offer']) ?>
                                        </h4>

                                        <!-- <?php echo $request['total'] / ($request['num'] * 3) ?>
                                        <?php echo $request['num'] ?> -->

                                        <meter class="average-rating" min="0" max="5" value="5" title="4.3 out of 5 stars" style="--percent: calc(<?php echo $request['total'] / ($request['num'] * 3) ?>/5*100%)">4.3 out of 5</meter>
                                        <!-- <p class="flex flex-row">
                                            <span class="fa fa-star rating_checked"></span>
                                            <span class="fa fa-star rating_checked"></span>
                                            <span class="fa fa-star rating_checked"></span>
                                            <span class="fa fa-star rating_checked"></span>
                                            <span class="fa fa-star"></span>
                                        </p> -->

                                    </div>
                                    <div class="flex flex-row flex-c-c">
                                        <!-- <i>class="message-icon fab fa-telegram-plane flex"></i> -->
                                        <!-- <a href="<?php echo URLROOT . '/agrologist/chat/' . $request['farmerId'] ?>"
                                            class="btn btn-primary mt-3 ml-2">Message</a> -->
                                            <a href="tel:720523034" class="btn btn-primary mt-3 ml-2">Call</a>
                                        <a href="<?php echo URLROOT . '/agrologist/reviews/' . $request['farmerId'] ?>"
                                            class="btn btn-primary mt-3 ml-2">Review</a>

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


    <?php require "footer.php"; ?>
    <script src="<?php echo JS ?>/app.js"></script>
    <script>

        function liveSearch() {
            let cards = document.querySelectorAll('.farmer_card')
            let search_query = document.getElementById("searchbox").value;
            for (var i = 0; i < cards.length; i++) {

                if (cards[i].innerText.toLowerCase()
                    .includes(search_query.toLowerCase())) {
                    cards[i].classList.remove("is-hidden");
                } else {
                    cards[i].classList.add("is-hidden");
                }
            }
        }

    </script>

</body>

</html>