<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="<?php echo IMAGES ?>/favicon.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />

    <link rel="stylesheet" href="<?php echo CSS ?>/ui.css">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>/base.css">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>/grid.css">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>/gridTable.css">
    <link rel="stylesheet" href="<?php echo CSS ?>/investor/myinvestments.css">

    <title>Dashboard | Investor</title>
</head>

<body>

    <?php
    $active = "myinvestments";
    $title = "My Investments";
    require_once("navigator.php");
    ?>

    <?php $name = "Janith"; ?>

    <div class="[ container ][ investments ]" container-type="dashboard-section">
        <div class="[ caption ]">
            <h3>View all your investment activity in one place.</h3>
            <p>Easily track your investments and see how your portfolio has grown over time.</p>
        </div>
        <div class="inv__cards">
            <div class="inv__card">
                <div class="inv__card__header">
                    <h3>Total Investment</h3>
                </div>
                <div class="inv__card__body">
                    <h1 class="[ LKR ]">
                        <?php
                        if (isset($totalInvestment)) echo number_format($totalInvestment, 2, '.', ',');
                        else echo "0.00";
                        ?></h1>
                    <p>Within 35 months</p>
                </div>
            </div>

            <div class="inv__card">
                <div class="inv__card__header">
                    <h3>This Month Investment</h3>
                </div>
                <div class="inv__card__body">
                    <h1 class="[ LKR ]">
                        <?php
                        if (isset($totalInvestment)) echo number_format($totalInvestment, 2, '.', ',');
                        else echo "0.00";
                        ?>
                    </h1>
                    <p>10% <i class="fa fa-arrow-up"></i></p>
                </div>
            </div>

            <div class="inv__card">
                <div class="inv__card__header">
                    <h3>Total Gigs</h3>
                </div>
                <div class="inv__card__body">
                    <h1>5</h1>
                    <p>Active 4</p>
                </div>
            </div>

            <div class="inv__new">
                <button class="[ button__primary ]">Invest More</button>
            </div>
        </div>
        <?php

        if (isset($error)) {
            require_once(COMPONENTS . "dashboard/noDataFound.php");
        } else {
            if (empty($investments)) {
                require_once(COMPONENTS . "dashboard/noDataFound.php");
            } else {
        ?>

                <div class="[ requests__wrapper ]">
                    <div class="[ grid__table ]" style="
                                        --xl-cols:  1.2fr 0.35fr 0.35fr 0.35fr 0.35fr 0.4fr;
                                        --lg-cols: 1.5fr 0.5fr 0.5fr 1fr;
                                        --md-cols: 1fr 0.5fr;
                                        --sm-cols: 2fr;
                                    ">
                        <div class="[ head stick_to_top ]">
                            <div class="[ investments__heading ]">
                                <div class="[ investments__add ]">
                                    <div class="[ input__control ]">
                                        <label for="from">From :</label>
                                        <input id="from" type="date">
                                    </div>
                                    <div class="[ input__control ]">
                                        <label for="to">To :</label>
                                        <input id="to" type="date">
                                    </div>
                                    <div class="[ input__control ]">
                                        <label for="location">Location :</label>
                                        <select id="location">
                                            <option value="all">All</option>
                                            <option value="colombo">Colombo</option>
                                            <option value="galle">Galle</option>
                                            <option value="kandy">Kandy</option>
                                            <option value="matara">Matara</option>
                                            <option value="nuwaraeliya">Nuwara Eliya</option>
                                            <option value="trincomalee">Trincomalee</option>
                                        </select>
                                    </div>
                                    <div class="[ input__control ]">
                                        <label for="category">Category :</label>
                                        <select id="category">
                                            <option value="all">All</option>
                                            <option value="vegetable">Vegetable</option>
                                            <option value="fruit">Fruit</option>
                                            <option value="grains">Grains</option>
                                            <option value="spices">Spices</option>
                                        </select>
                                    </div>
                                    <div class="[ input__control ]">
                                        <button type="button">Apply</button>
                                    </div>

                                </div>
                                <div class="[ investments__search ]">
                                    <input type="text" placeholder="Search">
                                    <button type="button">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="[ row ]">
                                <div class="[ data ]">
                                    <p>Gig</p>
                                </div>
                                <div class="[ data ]" hideIn="md">
                                    <p>Category</p>
                                </div>
                                <div class="[ data ]" hideIn="sm">
                                    <p>Amount</p>
                                </div>
                                <div class="[ data ]" hideIn="lg">
                                    <p>Time Period</p>
                                </div>
                                <div class="[ data ]" hideIn="lg">
                                    <p>Location</p>
                                </div>
                                <div class="[ data ]" hideIn="md">
                                    <p>Invested Date</p>
                                </div>
                            </div>
                        </div>
                        <div class="[ body ]">
                            <?php
                            foreach ($investments as $investment) {
                            ?>
                                <div class="[ row ]">
                                    <div class="[ data ]">
                                        <div class="[ item__card ]">
                                            <div class="[ img ]">
                                                <img width="50" src="<?php echo UPLOADS . $investment['thumbnail'] ?>" />
                                            </div>
                                            <div class="[ content ]">
                                                <a href="<?php echo URLROOT . "/gig/" . $investment['gigId'] ?>">
                                                    <h2><?php echo $investment['title'] ?></h2>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="[ data ]" hideIn="md">
                                        <p class="[ tag ]"><?php echo $investment['category'] ?></p>
                                    </div>
                                    <div class="[ data ]" hideIn="sm">
                                        <h3>LKR <?php echo number_format($investment['amount'], 2, '.', ',') ?></h3>
                                    </div>
                                    <div class="[ data ]" hideIn="lg">
                                        <h3><?php echo $investment['cropCycle'] ?> Days</h3>
                                    </div>
                                    <div class="[ data ]" hideIn="lg">
                                        <h3><?php echo $investment['city'] ?></h3>
                                    </div>
                                    <div class="[ data ]" hideIn="md">
                                        <p><?php echo $investment['investedDate'] ?></p>
                                    </div>
                                    <!-- <div class="[ data ]">
                                        <div class=" [ actions ]">
                                            <button for="<?php echo $investment['id'] ?>"><i class="fa fa-chevron-circle-down"></i></button>
                                        </div>
                                    </div> -->
                                    <div id="<?php echo $investment['id'] ?>" class="[ expand ]">

                                        <div class="[ data ]" showIn="md">
                                            <p class="[ tag ]"><?php echo $investment['category'] ?></p>
                                        </div>
                                        <div class="[ data ]" showIn="sm">
                                            <h4>Offer :</h4>
                                            <p>LKR <?php echo number_format($investment['offer'], 2, '.', ',') ?></p>
                                        </div>
                                        <div class="[ data ]" showIn="lg">
                                            <h4>Time Periold :</h4>
                                            <p><?php echo $investment['timePeriod'] ?> Months</p>
                                        </div>
                                        <div class="[ data ]" showIn="lg">
                                            <h4>Location</h4>
                                            <p><?php echo $investment['location'] ?></p>
                                        </div>
                                        <div class="[ data ]" showIn="md">
                                            <h4>Invested Date</h4>
                                            <p><?php echo $investment['investedDate'] ?></p>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>

                        </div>
                    </div>
                </div>
        <?php
            }
        }
        ?>

    </div>
    <?php
    require_once("footer.php");
    ?>
    <script src="<?php echo JS ?>/dashboard/dashboard.js"></script>
    <script>
        const expandBtns = document.querySelectorAll(".actions>button")
        const expands = document.querySelectorAll(".expand")
        const icons = document.querySelectorAll(".actions>button>i")
        Array.from(expandBtns).forEach(expandBtn => {

            expandBtn.addEventListener("click", () => {
                let id = expandBtn.getAttribute("for")
                Array.from(icons).forEach(icon => {
                    icon.removeAttribute("show")
                })

                Array.from(expands).forEach(expand => {
                    if (expand.id == id) {
                        expand.toggleAttribute("show")
                        if (expand.hasAttribute("show")) {
                            expandBtn.children[0].setAttribute("show", null)
                        }
                    } else {
                        expand.removeAttribute("show")
                    }
                })

            })
        })
    </script>
</body>

</html>