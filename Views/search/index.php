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
    <link rel="stylesheet" href="<?php echo CSS ?>/search/index.css">
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


        <div class="[ filters__results ]">
            <div class="[ left ]">
                <div class="[ filter__by ]">
                    <div class="[ heading ]">
                        <h3>Filter by</h3>
                    </div>

                    <div class="[ filters ]">

                        <div class="[ filter__item ]">
                            <div class="[ filter__heading ]">
                                <h4>Category</h4>
                            </div>
                            <div class="[ filter__content ]">
                                <div class="[ filter__checkbox ]">
                                    <input type="checkbox" name="category" id="category1" value="VEGETABLE">
                                    <label for="category1">Vegetable</label>
                                </div>
                                <div class="[ filter__checkbox ]">
                                    <input type="checkbox" name="category" id="category2" value="FRUIT">
                                    <label for="category2">Fruit</label>
                                </div>
                                <div class="[ filter__checkbox ]">
                                    <input type="checkbox" name="category" id="category3" value="GRAINS">
                                    <label for="category3">Grains</label>
                                </div>
                                <div class="[ filter__checkbox ]">
                                    <input type="checkbox" name="category" id="category4" value="SPICES">
                                    <label for="category4">Spices</label>
                                </div>
                                <div class="[ filter__checkbox ]">
                                    <input type="checkbox" name="category" id="category5" value="FLOWER">
                                    <label for="category5">Flower</label>
                                </div>
                                <div class="[ filter__checkbox ]">
                                    <input type="checkbox" name="category" id="category6" value="OTHER">
                                    <label for="category6">Other</label>
                                </div>
                            </div>
                        </div>

                        <div class="[ filter__item ]">
                            <div class="[ filter__heading ]">
                                <h4>Investment</h4>
                            </div>
                            <div class="[ filter__content inline ]">
                                <div class="[ filter__text ]">
                                    <label for="min">Min</label>
                                    <input type="text" name="min" id="min">
                                </div>
                                <div class="[ filter__text ]">
                                    <label for="max">Max</label>
                                    <input type="text" name="max" id="max">
                                </div>

                            </div>
                        </div>

                        <div class="[ filter__item ]">
                            <div class="[ filter__heading ]">
                                <h4>Profit</h4>
                            </div>
                            <div class="[ filter__content ]">
                                <div class="[ filter__checkbox ]">
                                    <input type="checkbox" name="profitRate" id="l5" value="0">
                                    <label for="l5">less than 5%</label>
                                </div>
                                <div class="[ filter__checkbox ]">
                                    <input type="checkbox" name="profitRate" id="l10" value="1">
                                    <label for="l10">less than 10%</label>
                                </div>
                                <div class="[ filter__checkbox ]">
                                    <input type="checkbox" name="profitRate" id="l15" value="2">
                                    <label for="l15">less than 15%</label>
                                </div>
                                <div class="[ filter__checkbox ]">
                                    <input type="checkbox" name="profitRate" id="m15" value="3">
                                    <label for="m15">more than 15%</label>
                                </div>
                            </div>
                        </div>

                        <div class="[ filter__item ]">
                            <div class="[ filter__heading ]">
                                <h4>District</h4>
                            </div>
                            <div class="[ filter__content ]">
                                <div class="[ filter__selectbox ]">
                                    <select name="district">
                                        <?php
                                        foreach (DISTRICTS as $key => $value) {
                                            echo "<option value='$key'>$value</option>";
                                        }
                                        ?>
                                    </select>
                                </div>

                            </div>
                        </div>

                        <div class="[ filter__item ]">
                            <div class="[ filter__heading ]">
                                <h4>Time Period</h4>
                            </div>
                            <div class="[ filter__content ]">
                                <div class="[ filter__checkbox ]">
                                    <input type="checkbox" name="timePeriod" id="l1m" value="1">
                                    <label for="l1m">less than 1 Month</label>
                                </div>
                                <div class="[ filter__checkbox ]">
                                    <input type="checkbox" name="timePeriod" id="l3m" value="2">
                                    <label for="l3m">less than 3 Months</label>
                                </div>
                                <div class="[ filter__checkbox ]">
                                    <input type="checkbox" name="timePeriod" id="l6m" value="3">
                                    <label for="l6m">less than 6 Months</label>
                                </div>
                                <div class="[ filter__checkbox ]">
                                    <input type="checkbox" name="timePeriod" id="l10m" value="3">
                                    <label for="l10m">less than 10 Months</label>
                                </div>
                                <div class="[ filter__checkbox ]">
                                    <input type="checkbox" name="timePeriod" id="l1y" value="4">
                                    <label for="l1y">less than 1 Year</label>
                                </div>
                                <div class="[ filter__checkbox ]">
                                    <input type="checkbox" name="timePeriod" id="l5y" value="5">
                                    <label for="l5y">less than 5 Year</label>
                                </div>
                                <div class="[ filter__checkbox ]">
                                    <input type="checkbox" name="timePeriod" id="m5y" value="6">
                                    <label for="m5y">more than 5 Year</label>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>

            <div class="[ right ]">
                <p class="[ right__heading ]">Search results for "<?php echo $_GET["terms"] ?>"</p>
                <div class="[ grid ] [ search__results ]" gap="2" md="2" lg="3">
                    <?php
                    if (isset($searchResult)) {
                        foreach ($searchResult as $result) {
                            $imageURL = UPLOADS . $result["thumbnail"];
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
                                            <p class="limit-text-2">
                                                <?php echo $result['title'] ?>
                                            </p>
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
        </div>

    </div>


    <?php
    require COMPONENTS . "footer.php";
    ?>

    <script src=" <?php echo JS ?>/navbar/navbar.js"></script>
    <script src=" <?php echo JS ?>/app.js"></script>

</body>

</html>