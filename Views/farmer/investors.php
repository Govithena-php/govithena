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
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>/table.css">
    <link rel="stylesheet" href="<?php echo CSS ?>/ui.css">

    <!-- css file eka -->
    <link rel="stylesheet" href="<?php echo CSS ?>/farmer/investors.css">
    <link rel="stylesheet" href="<?php echo CSS ?>/farmer/farmerrequest.css">

    <title>Dashboard | Investor</title>

    <style>
        .investors {
            display: flex;
            gap: 1rem;
            margin-bottom: 1rem;
        }

        .investor__card {
            min-height: 300px;
            border-radius: 1rem;
            display: grid;
            grid-template-columns: 1fr 2fr;
            gap: 1rem;
            border: 1px solid #ccc;
        }

        .card__img {
            height: 100%;
            width: 100%;
            overflow: hidden;
        }

        .card__img>img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 1rem 0 0 1rem;
        }

        .card__content {
            padding: 1rem;
            display: flex;
            flex-direction: column;
            /* width: 100%; */
            flex-grow: 1;
            margin-right: 2rem;
        }

        .card__content h3 {
            font-size: 2rem;
            font-weight: 600;
        }


        .card__heading {
            padding-right: 2rem;
            width: 100%;
            display: flex;
            justify-content: space-between;
            text-transform: capitalize;

        }

        .card__action {
            display: flex;
            justify-content: flex-end;
            align-items: flex-end;
            flex-grow: 1;
            gap: 2rem;
            margin-block: 1rem;

        }


        .card__farmer_name {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 0.75rem;
            text-transform: capitalize;
        }

        .card__action a {
            text-decoration: none;
            color: #fff;
            padding: 0.5rem 1rem;
            border-radius: 0.5rem;
        }

        .card__action a.accept {
            background-color: var(--clr-primary);
        }

        .card__action a.decline {
            background-color: var(--clr-danger);
        }

        .card__action a:hover {
            text-decoration: none;
            color: #fff;
        }

        .title {
            padding-bottom: 0.5rem;
            margin-top: 0.5rem;
            margin-bottom: 2rem;
            border-bottom: 1px solid #ccc;
            font-size: 1.5rem;
            font-weight: 600;
        }

        small {
            font-size: 1rem;
            font-weight: 600;
            margin-bottom: 0.75rem;
        }

        .farmer {
            margin-bottom: 1rem;
        }
    </style>


</head>

<body class="bg-gray h-screen">

    <?php
    $active = "investors";
    $title = "Investment Requests";
    require_once("navigator.php");
    ?>



    <div class="[ container ][ gigs ]" container-type="dashboard-section">
        <h2 class="title">Pending Investment Requests</h2>
        <?php
        if (empty($investors)) {
            require(COMPONENTS . "dashboard/noDataFound.php");
        } else { ?>
            <div class="investors">
                <?php
                foreach ($investors as $investor) {
                    $imgURL = UPLOADS . "/" . $investor['thumbnail'];
                ?>
                    <div class="investor__card">
                        <div class="card__img">
                            <img src="<?php echo $imgURL ?>" alt="">
                        </div>
                        <div class="card__content">
                            <div class="card__heading">
                                <h3><?php echo $investor['title'] ?></h3>
                                <div>
                                    <small>Offer :</small>
                                    <h3>LKR <?php echo $investor['offer'] ?></h3>
                                </div>
                            </div>
                            <div>
                                <small>Location :</small>
                                <p class="farmer"><?php echo $investor['city'] ?></p>
                                <small>Farmer :</small>
                                <p class="card__farmer_name"><?php echo $investor['firstName'] . " " . $investor['lastName'] ?></p>
                            </div>
                            <div>
                                <small>Message :</small>
                                <p><?php echo $investor['message'] ?></p>
                            </div>
                            <div class="card__action">
                                <a href="<?php echo URLROOT . "/farmer/acceptInvestor/" . $investor['requestId'] ?>" class="accept">Accept</a>
                                <a href="<?php echo URLROOT . "/farmer/declineInvestor/" . $investor['requestId'] ?>" class="decline">Decline</a>
                            </div>
                        </div>

                    </div>
                <?php
                }
                ?>
            </div>
        <?php
        }
        ?>
        <br>

        <h2 class="title">Accepted Investment Requests</h2>
        <?php
        if (empty($activeInvestors)) {
            require(COMPONENTS . "dashboard/noDataFound.php");
        } else { ?>
            <!-- <div class="[ requests__cn ]">
            <div class="[ requests__wrap ]">
                <div class="[ requestcard bg-light ]">
                    <div class="[ requestimg ]">
                        <img class="img" src="<?php echo IMAGES ?>/investor8.jpg" alt="profile">
                    </div>
                    <form action="<?php echo URLROOT . '/agrologist/requests' ?>">
                        <div class="flex flex-row ">
                            <div class="[ requestcont ]">
                                <h1>
                                    <p><b>Devin Yapa</b></p>
                                </h1>
                                <p class="flex flex-row">
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                </p>
                            </div>
                        </div>
                    </form>

                    <div class=" flex-c-c">
                        <button type="button" class="btn_accept" name="accept">View Profile</button> &emsp;
                    </div>
                </div>
            </div>
        </div> -->
        <?php
        }
        ?>
        <br>

        <!-- <div class="[ requests__cn ]">


            <div class="[ requests__wrap ]">


                <div class="[ requestcard bg-light ]">

                    <div class="[ requestimg ]">
                        <img class="img" src="<?php echo IMAGES ?>/investor.jfif" alt="profile">
                    </div>
            </div>
            <br>
            <p><h1>Requests</h1></p> <hr>









       <div class="[ requests__cn ]">


                <div class="[ requests__wrap ]">


                        <div class="[ requestcard bg-light ]">

                           <div class="[ requestimg ]">
                                <img class="img" src="<?php echo IMAGES ?>/investor.jfif" alt="profile">
                            </div>

                    <form action="<?php echo URLROOT . '/agrologist/requests' ?>">
                        <div class="flex flex-row ">
                            <div class="[ requestcont ]">



                                <h1>
                                    <p><b>Amal Perera</b></p>
                                </h1>
                                <p>Sent you a request</p>



                                <p class="flex flex-row">
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                </p>

                            </div>

                        </div>
                    </form>

                    <div class=" flex-c-c">
                        <button type="button" class="btn_accept" name="accept">Accept</button> &emsp;
                        <button type="button" class="btn_decline" name="decline">Decline</button>
                    </div>

                </div>

            </div>
        </div> -->

    </div>
    <?php
    require_once("footer.php");
    ?>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="<?php echo JS ?>/dashboard/chart.js"></script>
    <script src="<?php echo JS ?>/dashboard/dashboard.js"></script>
</body>

</html>
