<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="<?php echo IMAGES ?>/favicon.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="<?php echo CSS ?>/ui.css">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>/base.css">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>/grid.css">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>/gridTable.css">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>/filters.css">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>/customSelect.css">
    <link rel="stylesheet" href="<?php echo CSS ?>/investor/newInvestments.css">

    <title>Dashboard | Investor</title>
</head>

<body>

    <?php
    $active = "investments";
    $title = "New Investments";
    require_once("navigator.php");
    ?>

    <div class="[ container ][ investments ]" container-type="dashboard-section">
        <div class="[ caption ]">
            <h3>Make New Investment</h3>
            <p>Please fill out the form below to make a new investment in your associated gig.</p>
        </div>

        <form action="<?php echo URLROOT ?>/dashboard/newInvestment" method="post">
            <div class="top">
                <div class="input__control">
                    <label for="gig">Select the gig you wish to make an investment</label>

                    <div class="custom__select">
                        <input type="hidden" name="gig" />
                        <button type="button">Select the gig</button>
                        <div class="custom__options">
                            <?php
                            foreach ($investmentGigs as $gig) {
                            ?>
                                <div class="custom__option" Value="<?php echo $gig['igId'] ?>" Label="<?php echo $gig['title'] ?>">
                                    <div class="select__data_box">
                                        <div class="img">
                                            <img width="30" src="<?php echo UPLOADS . $gig['thumbnail'] ?>" alt="">
                                        </div>
                                        <div>
                                            <h4><?php echo $gig['title'] ?></h4>
                                            <p><?php echo $gig['city'] ?></p>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                    <br>
                    <div class="input__control">
                        <label for="amount">Amount (LKR)</label>
                        <input type="number" name="amount" placeholder="">
                    </div>

                    <div class="input__control">
                        <label for="description">Description (optional)</label>
                        <textarea class="descrip" name="description" id="description"></textarea>
                    </div>

                    <br>
                    <button type="submit" class="button__primary">Next</button>

                </div>
            </div>
        </form>


    </div>
    <?php
    require_once("footer.php");
    ?>
    <script src="<?php echo JS ?>/main.js"></script>
    <script src="<?php echo JS ?>/customSelect.js"></script>
</body>

</html>