<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Govithena | Search</title>
    <link rel="icon" type="image/x-icon" href="<?php echo IMAGES ?>/favicon.png">
    <link rel="stylesheet" type="text/css" href="../Webroot/css/sidebar.css">
    <link rel="stylesheet" href="../Webroot/css/ui.css">
    <link rel="stylesheet" href="../Webroot/css/navbar.css">
    <link rel="stylesheet" href="../Webroot/css/search.css">
    <link rel="stylesheet" href="../Webroot/css/footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
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

    <div class="[ container mt-5 ]">

        <div class="[ fs-3 breadcrumbs ]">
            <a href="<?php echo URLROOT ?>">Govithena</a>
            <a href="<?php echo URLROOT ?>/search/">Search</a>
        </div>

        <form class="[ fs-3 ][ search__form ]" action="<?php echo URLROOT . "/search/" ?>" method="post">
            <input class="" type="text" name="search_text" placeholder="search here...">
            <button class="[ btn btn-primary ] [ search_button ]" type="submit" name="search">search</button>
        </form>
        <p class="[ fs-6 fw-700 my-1 ]">Search results for "<?php echo $_POST["search_text"] ?>"</p>
        <hr>

        <!-- <div class="[ my-0.5 fs-3 ] [ filters ]">
            <select name="location" class="search__filter_location">
                <option value="">Location</option>
                <option value="ambalanthota">Ambalanthota</option>
                <option value="kandy">Kandy</option>
                <option value="matara">Matara</option>
            </select>

            <select name="category" class="search__filter_category">
                <option value="">Category</option>
                <option value="fruit">Fruit</option>
                <option value="rice">Rice</option>
                <option value="spices">Spices</option>
                <option value="vegetable">Vegetable</option>
            </select>

            <select disabled name="price_range" class="search__filter_price">
                <option value="">Price Range</option>
                <option value="price1">1000 - 1500</option>
                <option value="price2">1500 - 2000</option>
                <option value="price3">2000 - 2500</option>
            </select>

            <select name="time_period" class="search__filter_time">
                <option value="">Time Period</option>
                <option value="time1">1 Month</option>
                <option value="time2">2 Month</option>
                <option value="time3">3 Month</option>
            </select>
        </div> -->

        <!-- 
        <div class="[ fs-2 ] [ result__heading ]">
            <p classs="">200 gigs available</p>
            <form class="[ my-05 mt-1 flex gap-1 ]">
                <p>Sort by :</p>
                <select class="[ b-none ]" name="sort_by" value="best match">
                    <option value="bestmatch">Best Matchig</option>
                    <option value="recommanded">Recommended</option>
                    <option value="latest">Latest</option>
                </select>
            </form>
        </div> -->

        <div class="[ my-2 ] [ result__grid ]">
            <?php

            if (isset($searchResult)) {
                // print_r($searchResult);
                foreach ($searchResult as $result) {
            ?>

                    <div class="[ result__card ]">
                        <div class="[ card__img ]">

                            <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($result['image']); ?>" alt="test" />

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

    <script src=" <?php echo JS ?>/app.js"></script>

</body>

</html>