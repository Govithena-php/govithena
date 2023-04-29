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
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>/gridTable.css">
    <link rel="stylesheet" href="<?php echo CSS ?>/ui.css">
    
    <!-- css file eka -->
    <link rel="stylesheet" href="<?php echo CSS ?>/farmer/investors.css">
    <link rel="stylesheet" href="<?php echo CSS ?>/farmer/farmerrequest.css">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>/tabs.css">

    <title>Dashboard | Investor</title>
<!-- 
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
    </style> -->


</head>

<body class="bg-gray h-screen">

    <?php
    $active = "investors";
    $title = "Investment Requests";
    require_once("navigator.php");
    ?>



    <div class="[ container ][ gigs ]" container-type="dashboard-section">
    
    <div class="[ tabs ][ gigTabs ]" tab="2">
        <div class="controls">
            <button class="control" for="1">Pending Investment Requests</button>
            <button class="control" for="2">Accepted Investment Requests</button>
        </div>
        <div class="wrapper">
        <div class="tab" id="1" active="true">
            <!-- <h2 class="title">Pending Investment Requests</h2> -->
            <?php
            if (empty($investors)) {
                require(COMPONENTS . "dashboard/noDataFound.php");
            } else { ?>
                <div class="investors">
            
                        <!-- <div class="investor__card">
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

                        </div> -->
                        <div class="grid__table"
                            style="
                                    --xl-cols: 0.8fr 1.1fr 0.6fr 0.7fr 0.9fr 1.7fr 1.4fr;
                                "
                            >
                            <div class="head">
                                <div class="row">
                                    <div class="data">
                                        <p></p>
                                    </div>
                                    <div class="data remove-border">
                                        <p>Investor Name</p>
                                    </div>
                                    <div class="data">
                                        <p>Title</p>
                                    </div>
                                    <div class="data">
                                        <p>Offer</p>
                                    </div>
                                    <div class="data">
                                        <p>Location</p>
                                    </div>
                                    <div class="data">
                                        <p>Message</p>
                                    </div>
                                </div>
                            </div>
                            <div class="body">
                                <?php
                                foreach($investors as $investor){
                                    ?>
                                <div class="row">
                                    <div class="data farmer__">
                                        <div class="investorimg">
                                        <img src="<?php echo UPLOADS . "/" . $investor['thumbnail']; ?>" alt="">
                                            <!-- <img src="<?php echo UPLOADS . '/profilePictures/' . $investor['thumbnail']?>" alt="Picture"> -->
                                        </div>
                                    </div>
                                    <div class="data">
                                        <div class="namecol">
                                            <h1><p><?php echo $investor['firstName'] ?></p></h1>
                                            <h3><p><?php echo $investor['lastName']?></p></h3>
                                        </div>
                                    </div>
                                    <!-- <div class="data">
                                        <p> LKR <?php echo $investor['offer'] ?></p>
                                        <p class="LKR"><?php echo number_format($investor['capital'], 2, '.', ',')?></p>
                                    </div> -->
                                    <div class="data">
                                        <p><?php echo $investor['title'] ?></p>
                                    </div>
                                    <div class="data">
                                        <p> LKR <?php echo $investor['offer']?></p>
                                    </div>
                                    <div class="data">
                                        <p><?php echo $investor['city']?></p>
                                    </div>
                                    <div class="data">
                                        <p><?php echo $investor['message']?></p>
                                    </div>
                                    <div class="data">
                                        <div class="actions">
                                            <!-- <a href="#" class="btn btn-primary">Edit</a> -->
                                            <button onclick="openAcceptModal('<?php echo $investor['requestId']?>')" class="button__primary">Accept</button>
                                            <button onclick="openRejectModal('<?php echo $investor['requestId']?>')" class="button__danger">Reject</button>
                                            <!-- <a href="<?php echo URLROOT . "/farmer/deleteGig/" . $investor['gigId'] ?>" class="btn btn-danger">Delete</a> -->
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
                ?>
            </div>


            <div class="tab" id="2">
                <?php
                if (empty($reqinvestors)) {
                    require(COMPONENTS . "dashboard/noDataFound.php");
                } else { ?>
                    <div class="investors">
                            <div class="grid__table"
                                style="
                                       --xl-cols: 0.7fr 1fr 0.5fr 0.5fr 0.9fr 1.8fr;
                                        --lg-cols: 1.5fr 1fr 1fr 1fr 0.3fr;
                                        --md-cols: 2fr 1fr 0.3fr;
                                        --sm-cols: 3fr 0.3fr;
                                    "
                                >
                                <div class="head">
                                    <div class="row">
                                    <div class="data">
                                            <p></p>
                                        </div>
                                        <div class="data remove-border">
                                            <p>Investor Name</p>
                                        </div>
                                        <div class="data">
                                            <p>Title</p>
                                        </div>
                                        <div class="data">
                                            <p>Offer</p>
                                        </div>
                                        <div class="data">
                                            <p>Location</p>
                                        </div>
                                        <div class="data">
                                            <p>Message</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="body">
                                    <?php
                                    foreach($reqinvestors as $reqinvestor){
                                        ?>
                                    <div class="row">
                                        <div class="data farmer__">
                                            <div class="investorimg">
                                            <img src="<?php echo UPLOADS . "/" . $reqinvestor['thumbnail']; ?>" alt="">
                                                <!-- <img src="<?php echo UPLOADS . '/profilePictures/' . $reqinvestor['thumbnail']?>" alt="Picture"> -->
                                            </div>
                                        </div>
                                        <div class="data">
                                            <div class="namecol">
                                                <h1><p><?php echo $reqinvestor['firstName'] ?></p></h1>
                                                <h3><p><?php echo $reqinvestor['lastName']?></p></h3>
                                            </div>
                                        </div>
                                        <!-- <div class="data">
                                            <p> LKR <?php echo $reqinvestor['offer'] ?></p>
                                            <p class="LKR"><?php echo number_format($reqinvestor['capital'], 2, '.', ',')?></p>
                                        </div> -->
                                        <div class="data">
                                            <p><?php echo $reqinvestor['title'] ?></p>
                                        </div>
                                        <div class="data">
                                            <p> LKR <?php echo $reqinvestor['offer']?></p>
                                        </div>
                                        <div class="data">
                                            <p><?php echo $reqinvestor['city']?></p>
                                        </div>
                                        <div class="data">
                                            <p><?php echo $reqinvestor['message']?></p>
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
                ?>
            </div>
        </div>

    </div> 
    <!-- ----------------------------------------------------------- -->
        <br>

        
        <?php
        // if (empty($   )) {
        //     require(COMPONENTS . "dashboard/noDataFound.php");
        // } else { ?>

        <?php
        // }
        ?>
        <br>








        

    </div>
    <?php
    require_once("footer.php");
    ?>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="<?php echo JS ?>/dashboard/chart.js"></script>
    <script src="<?php echo JS ?>/dashboard/dashboard.js"></script>
    <script>
        const controls = document.querySelectorAll(".controls>button");
        const tabs = document.querySelectorAll(".tab");

        Array.from(controls).forEach(control => {
            control.addEventListener("click", () => {
                let For = control.getAttribute("for")
                Array.from(tabs).forEach(tab => {
                    if (tab.id == For) {
                        tab.setAttribute("active", true)
                        control.toggleAttribute("active")
                    } else {
                        tab.setAttribute("active", false)
                    }
                })
            })
        })
    </script>
</body>

</html>
