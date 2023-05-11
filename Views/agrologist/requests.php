<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agrologist | Dashboard</title>
    <link rel="icon" type="image/x-icon" href="<?php echo IMAGES ?>/favicon.png">
    <link rel="stylesheet" href="../Webroot/css/ui.css">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>/base.css">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>/grid.css">
    <link rel="stylesheet" href="<?php echo CSS ?>/agrologist/requests.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
</head>

<body class="bg-gray h-screen">
    <?php
    $active = "requests";
    require_once("navigator.php");

    if (Session::has('farmer_request_alert')) {
        $alert = Session::pop('farmer_request_alert');
        $alert->show_default_alert();
    }

    ?>
    <div class="[ container ][ dashboard ]" container-type="dashboard-section">
        <h1 class="[ page-heading-1 ]">requests</h1>

        <div class="[ requests__continer ]">
            <?php
            if (!isset($ar) || empty($ar)) {
                ?>
                <div class="[ no_requests__card ]">
                    <p class=''>No Requests</p>
                </div>
                <?php
            } else {
                ?>
                <div class="[ requests__wrapper ]">
                    <?php
                    foreach ($ar as $request) {
                        ?>

                        <div class="[ request__card bg-light ]">
                            <div class="[ request__img ]">
                                <img src="<?php echo UPLOADS . '/' . $request['image'] ?>" alt="">
                            </div>
                            <form action="<?php echo URLROOT . '/agrologist/requests' ?>" method="POST">
                                <div class="flex flex-row " style="width: 600px">
                                    <div class="[ request__content ]">

                                        <h1>
                                            <a class="[ text-dec-none  text-dark  ]"
                                                href="<?php echo URLROOT . "/agrologist/requests/" . $request['requestId'] ?>">
                                                <?php echo ucwords($request['fullName']) ?>
                                            </a>
                                        </h1>
                                        <h4>
                                            <?php echo ucwords($request['city']) ?>
                                        </h4>

                                        <h4 class="fw-6 LKR">

                                            <?php echo number_format($request['offer']) ?>
                                        </h4>

                                        <h5>
                                            <?php echo ucwords($request['timePeriod']) ?> days
                                        </h5>
                                        <meter class="average-rating" min="0" max="5" value="5" title="4.3 out of 5 stars"
                                            style="--percent: calc(<?php echo $request['total'] / ($request['num'] * 3) ?>/5*100%)">4.3
                                            out of 5</meter>

                                    </div>
                                    <div class="flex flex-row flex-c-c">
                                        <a href="#" 
                                            class="btn btn-primary mr-2 mt-2" onclick="accept_model_open('<?php echo $request['requestId'] ?>')"
                                             name="accept_btn">Accept</a>
                                        <a href="#" class="btn btn-danger mt-2" onclick="decline_model_open('<?php echo $request['requestId'] ?>')"
                                            name="edit_details">Decline</a>
                                    </div>
                                </div>
                            </form>

                            <div id="decline_modal" class="modal">

                                <div class="modal-content">
                                    <span class="close close_decline_modal">&times;</span>
                                    <h3 class="fw-6">Decline Request</h3>
                                    <p class="pt-1">Are you sure you want to decline?</p>
                                    <form class="form pt-1" action="<?php echo URLROOT . '/agrologist/requests' ?>" method="post"
                                        enctype="multipart/form-data">
                                        <button type="submit" name="decline" id="decline" style="width:30%; margin-left: 250px;" class="btn uppercase">Decline</button>
                                    </form>
                                </div>

                            </div>

                            <div id="accept_modal" class="modal">

                                <div class="modal-content">
                                    <span class="close close_accept_modal">&times;</span>
                                    <h3 class="fw-6">Accept Request</h3>
                                    <p class="pt-1">Are you sure you want to accept?</p>
                                    <form class="form pt-1" action="<?php echo URLROOT . '/agrologist/requests' ?>" method="post"
                                        enctype="multipart/form-data">
                                        <button type="submit" name="accept" id="accept" style="width:30%; margin-left: 250px;" class="btn uppercase" >Accept</button>
                                    </form>
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
        </div>

    </div>


    <?php require "footer.php"; ?>
    <script src="<?php echo JS ?>/agrologist.js"></script>
    <script>

        function accept_model_open(requestId) {
            const accept_model =  document.getElementById("accept_modal"); 
            accept_model.style.display = "block";
            const accept_model_btn = document.getElementById("accept");
            console.log(accept_model_btn);
            accept_model_btn.value=requestId;
            const close_accept_modal = document.getElementsByClassName("close_accept_modal")[0];
            close_accept_modal.onclick = function() {
                accept_model.style.display = "none";
            }
        }

        function decline_model_open(requestId) {
            const decline_model =  document.getElementById("decline_modal"); 
            decline_model.style.display = "block";
            const decline_model_btn = document.getElementById("decline");
            console.log(decline_model_btn);
            decline_model_btn.value=requestId;
            const close_decline_modal = document.getElementsByClassName("close_decline_modal")[0];
            close_decline_modal.onclick = function() {
                decline_model.style.display = "none";
            }
        }




    </script>
</body>

</html>