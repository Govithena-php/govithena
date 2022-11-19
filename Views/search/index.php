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
    <link rel="stylesheet" href="../Webroot/css/dashHeader.css">
    <link rel="stylesheet" href="../Webroot/css/dashFooter.css">
    <link rel="stylesheet" href="../Webroot/css/search.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
</head>

<body class="bg-gray h-screen">
    <?php
    include COMPONENTS . 'navbar.php';
    ?>

    <div class="[ container pt-4 h-screen ]">

        <div class="[ ff-poppins fs-3 breadcrumbs ]">
            <a href="<?php echo URLROOT ?>">Govithena</a>
            <a href="<?php echo URLROOT ?>/search/">Search</a>
        </div>

        <div class="[  ] [ search ]">
            <form class="[ m-2 ] [ search__form ]" action="<?php echo URLROOT . "/search/" ?>" method="post">
                <input class="[ ]" type="text" name="search_text" placeholder="Search gig">
                <select name="location" value="location" class="search__filter_location">
                    <option value="">Location</option>
                    <option value="ambalanthota">Ambalanthota</option>
                    <option value="kandy">Kandy</option>
                    <option value="matara">Matara</option>
                </select>

                <select name="category" value="category" class="search__filter_category">
                    <option value="">Category</option>
                    <option value="fruit">Fruit</option>
                    <option value="rice">Rice</option>
                    <option value="spices">Spices</option>
                    <option value="vegetable">Vegetable</option>
                </select>

                <select disabled name="price_range" value="price" class="search__filter_price">
                    <option value="">Price Range</option>
                    <option value="price1">1000 - 1500</option>
                    <option value="price2">1500 - 2000</option>
                    <option value="price3">2000 - 2500</option>
                </select>
                <button type="submit">search</button>
            </form>
        </div>

        <div class="[ search__result_box ]">
            <div class="filters">filter</div>
            <div class="results">
                <?php

                if (isset($search)) { {
                        if (empty($search)) {
                            echo "No results found";
                        } else {
                            foreach ($search as $s) {
                ?>
                                <div class='result'>
                                    <div class='result__content'>
                                        <a href='<?php echo URLROOT ?>/search/a/?id=<?php echo $s['gigId'] ?>' class='result__content__title'><?php echo $s['title'] ?></a>
                                        <p class='result__content__description'><?php echo $s['description'] ?></p>
                                        <p class='result__content__location'><?php echo $s['location'] ?></p>
                                    </div>
                                </div>
                                <br>
                <?php
                            }
                        }
                    }
                } else {
                    echo "serach first";
                }
                ?>
            </div>
        </div>


    </div>


    <?php require COMPONENTS . "dashboard/footer.php"; ?>
    <script src=" <?php echo JS ?>/app.js"></script>

</body>

</html>