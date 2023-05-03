<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="<?php echo IMAGES ?>/favicon.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>/base.css">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>/grid.css">
    <link rel="stylesheet" href="<?php echo CSS ?>/ui.css">
    <link rel="stylesheet" href="<?php echo CSS ?>/search.css">
    <link rel="stylesheet" href="<?php echo CSS ?>/filters.css">

    <link rel="stylesheet" href="<?php echo CSS ?>/farmer/agrologist.css">
    <link rel="stylesheet" href="<?php echo CSS ?>/farmer/farmerrequest.css">


    <title>Dashboard | Farmer</title>
</head>


<body class="h-screen">

    <?php
    $active = "agrologist";
    $title = "Agrologists";
    require_once("navigator.php");
    ?>

    <?php
    if (isset($message)) {
        if ($message == 'ok') {
    ?>

            <div class="[ alert alert-success ]">
                <i class="fas fa-check"></i>
                <div>
                    <h4>Success</h4>
                    <p>Your request has been sent to the Agrologist</p>
                </div>
            </div>

        <?php
        }
        if ($message == 'already') {
        ?>

            <div class="[ alert alert-error ]">
                <i class="fas fa-times"></i>
                <div>
                    <h4>Error</h4>
                    <p>Request alredy sent.</p>
                </div>
            </div>

        <?php
        }
        if ($message == 'error') {
        ?>

            <div class="[ alert alert-error ]">
                <i class="fas fa-times"></i>
                <div>
                    <h4>Error</h4>
                    <p>Something went wrong.</p>
                </div>
            </div>

    <?php
        }
    }

    ?>

    <div class="container" container-type="dashboard-section">
        <h1 class="page__heading">Search Agrologist</h1>

        <form class="[ filters ]" action="<?php echo URLROOT ?>/dashboard/investments" method="POST">
            <div class="[ options ]">
                <!-- <div class="[ input__control ]">
                    <label for="fromDate">From</label>
                    <input id="fromDate" name="fromDate" tag="fromDate" type="date">
                </div>
                <div class="[ input__control ]">
                    <label for="toDate">To</label>
                    <input id="toDate" name="toDate" tag="toDate" type="date">
                </div> -->
                <div class="[ input__control ]">
                    <label for="location">Location</label>
                    <select id="location" name="location">
                        <option value="all">All</option>
                        <?php
                        foreach (DISTRICTS as $key => $value) {
                            echo "<option value='$key'>$value</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="[ input__control ]">
                    <button type="submit" name="submit" class="button__primary">Apply</button>
                </div>
            </div>
            <div class="search">
                <input type="text" name="search" placeholder="Search">
                <button type="submit" name="submit" class="button__primary"><i class="bi bi-search"></i></button>
            </div>
        </form>

        <div class="[ grid ]" gap="1" sm="1" md="2" lg="3">
            <?php
            if (isset($agrologists)) {
                foreach ($agrologists as $agrologist) {
            ?>

                    <!-- <div class="[ requestcard bg-light ]">
                        <div class="[ requestimg ]">
                            <img class="img" src="<?php echo UPLOADS . $agrologist['image'] ?>" alt=" profile">
                        </div>
                        <div class="flex flex-row ">
                            <div class="[ requestcont ]">
                                <a href="<?php echo URLROOT . "/profile/" . $agrologist['uid'] ?>">
                                    <p><b><?php echo $agrologist['firstName'] . " " . $agrologist['lastName']; ?></b></p>
                                </a>
                                <p class="flex flex-row">
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                </p>
                            </div>
                        </div>
                        <div class=" flex-c-c">
                            <a class="request__btn" href="<?php echo URLROOT . "/farmer/send/" . $agrologist['uid'] ?>">Send Request</a>
                        </div>

                    </div> -->
                    <div class="requestcardn">
                        <div class=" requestimg1 ">
                            <img class="img" src="<?php echo UPLOADS . $agrologist['image'] ?>" alt=" profile">
                            <!-- <img class="img" src="<?php echo IMAGES ?>/21.jpg" alt=" profile"> -->

                        </div>
                        <div class="flex flex-row ">
                            <div class=" requestlist ">
                                <a class="namebox" href="<?php echo URLROOT . "/profile/" . $agrologist['uid'] ?>">
                                    <p><?php echo $agrologist['firstName'] . " " . $agrologist['lastName']; ?></p>
                                </a>

                            </div>
                        </div>
                        <div class=" flex-c-c">
                            <!-- <a class="request__btn" href="<?php echo URLROOT . "/farmer/send/" . $agrologist['uid'] ?>">Send Request</a> -->
                            <a class="requestbtn" href="<?php echo URLROOT . "/farmer/send/" . $agrologist['uid'] ?>">Send Request</a>

                        </div>

                    </div>

            <?php
                }
            }



            ?>
            <!-- <div class="requestcardn">
                        <div class="[ requestimg1 ]">
                            <img class="img" src="<?php echo UPLOADS . $agrologist['image'] ?>" alt=" profile">
                            <img class="img" src="<?php echo IMAGES ?>/21.jpg" alt=" profile">

                        </div>
                        <div class="flex flex-row ">
                            <div class=" requestlist ">
                                <a class="namebox" href="<?php echo URLROOT . "/profile/" . $agrologist['uid'] ?>">
                                    <p><b><?php echo $agrologist['firstName'] . " " . $agrologist['lastName']; ?></b></p>
                                </a>
                                <p class="flex flex-row">
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                </p>
                            </div>
                        </div>
                        <div class=" flex-c-c">
                            <a class="request__btn" href="<?php echo URLROOT . "/farmer/send/" . $agrologist['uid'] ?>">Send Request</a>
                            <a class="requestbtn" href="<?php echo URLROOT . "/farmer/send/" . $agrologist['uid'] ?>">Send Request</a>

                        </div>

                 </div> -->
        </div>




    </div>
    <?php
    require_once("footer.php");
    ?>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="<?php echo JS ?>/dashboard/chart.js"></script>
    <script src="<?php echo JS ?>/dashboard/dashboard.js"></script>

    <script>
        setTimeout(() => {
            document.querySelector(".alert").style.display = "none";
        }, 5000);
    </script>


</body>

</html>