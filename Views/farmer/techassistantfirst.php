<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="<?php echo IMAGES ?>/favicon.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>/base.css">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>/grid.css">
    <link rel="stylesheet" href="<?php echo CSS ?>/ui.css">
    <link rel="stylesheet" href="<?php echo CSS ?>/search.css">

    <link rel="stylesheet" href="<?php echo CSS ?>/farmer/agrologist.css">
    <link rel="stylesheet" href="<?php echo CSS ?>/farmer/farmerrequest.css">


    <title>Dashboard | Farmer</title>
</head>


<body class="h-screen">

    <?php
    $active = "techassistantfirst";
    $title = "Tech Assistants";
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
        <h1 class="page__heading">Search Technical Assistant</h1>

        <div class="cardspace">

            <select name="type" id="type" disabled>
                <option value="croptype">Crop Type</option>
            </select>

            <select name="type" id="type" disabled>
                <option value="landarea">Land Area</option>
            </select>

            <select name="type" id="type" disabled>
                <option value="budget">Budget</option>
            </select>

            <select name="type" id="type" disabled>
                <option value="location">Location</option>
            </select>


            <form class="[ fs-3 ][ search__form ]" action="<?php echo URLROOT . "/search/" ?>" method="get">
                <input class="" type="text" name="terms" placeholder="Search by: name / location" disabled>
                <button class="[ btn btn-primary ] [ search_button ]" type="submit" disabled>Search</button>
            </form>

        </div>

        <div class="[ grid ]" gap="1" sm="1" md="2" lg="3">
            <?php
            if (isset($techAssistants)) {
                foreach ($techAssistants as $techAssistant) {
            ?>

                    <!-- <div class="[ requestcard bg-light ]">
                        <div class="[ requestimg ]">
                            <img class="img" src="<?php echo UPLOADS . $techAssistant['image'] ?>" alt="profile">
                        </div>
                        <div class="flex flex-row ">
                            <div class="[ requestcont ]">
                                <a href="<?php echo URLROOT . "/profile/" . $techAssistant['uid'] ?>">
                                    <p><b><?php echo $techAssistant['firstName'] . " " . $techAssistant['lastName']; ?></b></p>
                                </a>
          
                            </div>
                        </div>
                        <div class=" flex-c-c">
                            <a class="request__btn" href="<?php echo URLROOT . "/farmer/request/" . $techAssistant['uid'] ?>">Send Request</a>
                        </div>

                    </div> -->
                    <div class="requestcardn">
                        <div class=" requestimg1 ">
                            <img class="img" src="<?php echo UPLOADS . $techAssistant['image'] ?>" alt=" profile">

                        </div>
                        <div class="flex flex-row ">
                            <div class=" requestlist ">
                                <a class="namebox" href="<?php echo URLROOT . "/profile/" . $techAssistant['uid'] ?>">
                                    <?php echo $techAssistant['firstName'] . " " . $techAssistant['lastName']; ?>
                                </a>
                                <!-- <p class="flex flex-row">
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                </p> -->
                            </div>
                        </div>
                        <div class=" flex-c-c">
                            <a class="requestbtn" href="<?php echo URLROOT . "/farmer/send/" . $techAssistant['uid'] ?>">Send Request</a>

                        </div>

                    </div>



            <?php
                }
            }


            ?>

            <!-- <div class="requestcardn">
                        <div class=" requestimg1 ">
                            <img class="img" src="<?php echo UPLOADS . $techAssistant['image'] ?>" alt=" profile">

                        </div>
                        <div class="flex flex-row ">
                            <div class=" requestlist ">
                                <a class="namebox" href="<?php echo URLROOT . "/profile/" . $techAssistant['uid'] ?>">
                                    <p><b><?php echo $techAssistant['firstName'] . " " . $techAssistant['lastName']; ?></b></p>
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
                            <a class="requestbtn" href="<?php echo URLROOT . "/farmer/send/" . $techAssistant['uid'] ?>">Send Request</a>

                        </div>

                 </div>
             -->

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