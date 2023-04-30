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
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>/tabs.css">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>/alertModal.css">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>/formModal.css">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>/filters.css">

    <link rel="stylesheet" href="<?php echo CSS ?>/investor/myrequests.css">

    <title>Dashboard | Investor</title>
</head>


<body>

    <?php

    if (Session::has('myrequest_delete_alert')) {
        $alert = Session::pop('myrequest_delete_alert');
        $alert->show_default_alert();
    }

    if (Session::has('resend_request_alert')) {
        $alert = Session::pop('resend_request_alert');
        $alert->show_default_alert();
    }

    ?>

    <dialog id="deleteModal" class="[ alertModal ]">
        <div class="[ container ]">
            <i class="bi bi-x-circle"></i>
            <div class="[ content ]">
                <h2>Are you sure?</h2>
                <p>Do you really want to delete these records? This process cannot be undone.</p>
            </div>
            <form id="deleteForm" action="<?php echo URLROOT ?>/dashboard/myrequest_delete" method="POST" class="[ buttons ]">
                <button type="button" class="[ button__primary ]" onclick="closeDeleteAlert()" data-dismiss="modal">No, Cancel</button>
                <button id="confirmDeleteBtn" name="deleteRequest-confirm" type="submit" class="[ button__danger ]">Yes, Delete</button>
            </form>
        </div>
    </dialog>

    <dialog id="resendModal" class="[ modal ]">
        <div class="[ container ]">
            <div class="[ head ]">
                <h3>Resend Request</h3>
            </div>
            <form action="<?php echo URLROOT ?>/dashboard/resend_request" method="POST" class="[ content ]">
                <div class="[ input__control ]">
                    <label class="LKR" for="resendOffer">New Offer :</label>
                    <input name="resendOffer" id="resendOffer"></input>
                </div>
                <div class="[ input__control ]">
                    <label for="resendMessage">New Message :</label>
                    <textarea name="resendMessage" id="resendMessage"></textarea>
                </div>
                <div class="[ buttons ]">
                    <button type="button" class="[ button__danger ]" onclick="closeResendModal()" data-dismiss="modal">Cancel</button>
                    <button type="submit" id="requestResendBtn" name="request-resend" class="[ button__primary ]">Send</button>
                </div>
            </form>
    </dialog>

    <?php
    $active = "myrequests";
    $title = "My Requests";
    require_once("navigator.php");
    ?>
    <div class="[ container ]" container-type="dashboard-section">
        <div class="[ caption ]">
            <h3>Track all your investment requests in one place!</h3>
            <p>Keep an eye on the status of your investments with our investor dashboard. Quickly see which requests are accepted, rejected, or still pending, and stay in the know about the progress of your investments.</p>
        </div>
        <div class="tabs" tab="3">
            <div class="controls">
                <button class="control" for="1" active>Accepted Requests</button>
                <button class="control" for="2">Pending Requests</button>
                <button class="control" for="3">Rejected Requests</button>
            </div>
            <div class="wrapper">
                <div class="tab" id="1" active="true">
                    <div class="[ requests__continer ]">
                        <div class="[ caption ]">
                            <h2>Accepted Requests</h2>
                            <p>Track the progress of your investments with ease. See which projects have been accepted by farmers on our platform.</p>
                        </div>
                        <?php
                        if (empty($ar)) {
                            require(COMPONENTS . "dashboard/noDataFound.php");
                        } else {
                        ?>
                            <div class="[ requests__wrapper ]">
                                <div class="[ grid__table ]" style="
                                        --xl-cols: 2fr 1fr 1fr 1fr 1fr 1fr 0.3fr;
                                        --lg-cols: 1.5fr 1fr 1fr 1fr 0.3fr;
                                        --md-cols: 2fr 1fr 0.3fr;
                                        --sm-cols: 3fr 0.3fr;
                                    ">
                                    <div class="[ head stick_to_top ]">
                                        <!-- <form class="[ filters ]" action="<?php echo URLROOT ?>/dashboard/myrequests" method="POST">
                                            <div class="[ options ]">
                                                <div class="[ input__control ]">
                                                    <label for="fromDate">From</label>
                                                    <input id="fromDate" type="date" tag="fromDate" name="fromDate">
                                                </div>
                                                <div class="[ input__control ]">
                                                    <label for="toDate">To</label>
                                                    <input id="toDate" type="date" tag="toDate" name="toDate">
                                                </div>
                                                <div class="[ input__control ]">
                                                    <label for="district">District</label>
                                                    <select id="district" name="district">
                                                        <option value="all">All</option>
                                                        <?php
                                                        foreach (DISTRICTS as $key => $value) {
                                                        ?>
                                                            <option value="<?php echo $key ?>"><?php echo $value ?></option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="[ input__control ]">
                                                    <label for="category">Category</label>
                                                    <select id="category" name="category">
                                                        <option value="all">All</option>
                                                        <option value="vegetable">Vegetable</option>
                                                        <option value="fruit">Fruit</option>
                                                        <option value="grains">Grains</option>
                                                        <option value="spices">Spices</option>
                                                    </select>
                                                </div>
                                                <div class="[ input__control ]">
                                                    <button type="submit" name="submit" class="button__primary">Apply</button>
                                                </div>

                                            </div>
                                            <div class="[ search ]">
                                                <input type="text" placeholder="Search">
                                                <button type="button">
                                                    <i class="bi bi-search"></i>
                                                </button>
                                            </div> -->
                                        </form>

                                        <div class="[ row ]">
                                            <div class="[ data ]">
                                                <p>Gig</p>
                                            </div>
                                            <div class="[ data ]" hideIn="md">
                                                <p>Category</p>
                                            </div>
                                            <div class="[ data ]" hideIn="sm">
                                                <p>Offer</p>
                                            </div>
                                            <div class="[ data ]" hideIn="lg">
                                                <p>Crop Cycle</p>
                                            </div>
                                            <div class="[ data ]" hideIn="lg">
                                                <p>City</p>
                                            </div>
                                            <div class="[ data ]" hideIn="md">
                                                <p>Requested Date</p>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="[ body ]">
                                        <?php
                                        foreach ($ar as $request) {
                                        ?>
                                            <div class="[ row ]">
                                                <div class="[ data ]">
                                                    <div class="[ item__card ]">
                                                        <div class="[ img ]">
                                                            <img src="<?php echo UPLOADS . $request['thumbnail'] ?>" />
                                                        </div>
                                                        <div class="[ content ]">
                                                            <a href="<?php echo URLROOT . "/gig/" . $request['gigId'] ?>">
                                                                <h2 class="[ limit-text-2 ]"><?php echo $request['title'] ?></h2>
                                                            </a>
                                                            <p><small>by </small> <a href="<?php echo URLROOT . "/profile/" . $request['uid'] ?>"><?php echo $request['firstName'] . " " . $request['lastName'] ?></p></a>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="[ data ]" hideIn="md">
                                                    <p class="[ tag ]"><?php echo $request['category'] ?></p>
                                                </div>
                                                <div class="[ data ]" hideIn="sm">
                                                    <h3 class="LKR"><?php echo number_format($request['offer'], 2, '.', ',') ?></h3>
                                                </div>
                                                <div class="[ data ]" hideIn="lg">
                                                    <h3><?php echo $request['cropCycle'] ?> Days</h3>
                                                </div>
                                                <div class="[ data ]" hideIn="lg">
                                                    <h3><?php echo $request['city'] ?></h3>
                                                </div>
                                                <div class="[ data ]" hideIn="md">
                                                    <p><?php echo $request['requestedDate'] ?></p>
                                                </div>
                                                <div class="[ data ]">
                                                    <div class="[ actions ]">
                                                        <button for="<?php echo $request['requestId'] ?>"><i class="bi bi-three-dots-vertical"></i></button>
                                                    </div>
                                                </div>
                                                <div id="<?php echo $request['requestId'] ?>" class="[ expand ]">

                                                    <div class="[ data ]" showIn="md">
                                                        <p class="[ tag ]"><?php echo $request['category'] ?></p>
                                                    </div>
                                                    <div class="[ data ]" showIn="sm">
                                                        <h4>Offer :</h4>
                                                        <p class="LKR"><?php echo number_format($request['offer'], 2, '.', ',') ?></p>
                                                    </div>
                                                    <div class="[ data ]" showIn="lg">
                                                        <h4>Crop Cycle :</h4>
                                                        <p><?php echo $request['cropCycle'] ?> Months</p>
                                                    </div>
                                                    <div class="[ data ]" showIn="lg">
                                                        <h4>City</h4>
                                                        <p><?php echo $request['city'] ?></p>
                                                    </div>
                                                    <div class="[ data ]" showIn="md">
                                                        <h4>Request Date</h4>
                                                        <p><?php echo $request['requestedDate'] ?></p>
                                                    </div>

                                                    <div class="[ data ]" always>
                                                        <?php if (!empty($request['message'])) {
                                                        ?>
                                                            <h4>Your Message :</h4>
                                                            <p><?php echo $request['message'] ?></p>
                                                        <?php
                                                        } ?>
                                                        <br>
                                                        <a href="<?php echo URLROOT ?>/checkout/<?php echo $request['requestId'] ?>" class="[ button__primary ]">Pay Now</a>
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
                </div>
                <div class="tab" id="2">
                    <div class="[ requests__continer ]">
                        <div class="[ caption ]">
                            <h2>Pending Requests</h2>
                            <p>Stay informed about your pending investment requests. We'll let you know as soon as a farmer has accepted your request.</p>
                        </div>
                        <?php
                        if (empty($pr)) {
                            require(COMPONENTS . "dashboard/noDataFound.php");
                        } else {
                        ?>

                            <div class="[ requests__wrapper ]">

                                <div class="[ grid__table ]" style="
                                        --xl-cols: 2fr 1fr 1fr 1fr 1fr 1fr 0.3fr;
                                        --lg-cols: 1.5fr 1fr 1fr 1fr 0.3fr;
                                        --md-cols: 2fr 1fr 0.3fr;
                                        --sm-cols: 3fr 0.3fr;
                                    ">
                                    <div class="[ head stick_to_top ]">
                                        <!-- <form class="[ filters ]" action="<?php echo URLROOT ?>/dashboard/myrequests" method="POST">
                                            <div class="[ options ]">
                                                <div class="[ input__control ]">
                                                    <label for="fromDate">From</label>
                                                    <input id="fromDate" name="fromDate" tag="fromDate" type="date">
                                                </div>
                                                <div class="[ input__control ]">
                                                    <label for="toDate">To</label>
                                                    <input id="toDate" name="toDate" tag="toDate" type="date">
                                                </div>
                                                <div class="[ input__control ]">
                                                    <label for="district">District</label>
                                                    <select id="district" name="district">
                                                        <option value="all">All</option>
                                                        <?php
                                                        foreach (DISTRICTS as $key => $value) {
                                                        ?>
                                                            <option value="<?php echo $key ?>"><?php echo $value ?></option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="[ input__control ]">
                                                    <label for="category">Category</label>
                                                    <select id="category" name="category">
                                                        <option value="all">All</option>
                                                        <option value="vegetable">Vegetable</option>
                                                        <option value="fruit">Fruit</option>
                                                        <option value="grains">Grains</option>
                                                        <option value="spices">Spices</option>
                                                    </select>
                                                </div>
                                                <div class="[ input__control ]">
                                                    <button type="submit" name="submit" class="button__primary">Apply</button>
                                                </div>

                                            </div>
                                         <div class="[ search ]">
                                                <input type="text" placeholder="Search">
                                                <button type="button">
                                                    <i class="bi bi-search"></i>
                                                </button>
                                            </div> -->
                                        </form>
                                        <div class="[ row ]">
                                            <div class="[ data ]">
                                                <p>Gig</p>
                                            </div>
                                            <div class="[ data ]" hideIn="md">
                                                <p>Category</p>
                                            </div>
                                            <div class="[ data ]" hideIn="sm">
                                                <p>Offer</p>
                                            </div>
                                            <div class="[ data ]" hideIn="lg">
                                                <p>Crop Cycle</p>
                                            </div>
                                            <div class="[ data ]" hideIn="lg">
                                                <p>City</p>
                                            </div>
                                            <div class="[ data ]" hideIn="md">
                                                <p>Requested Date</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="[ body ]">
                                        <?php
                                        foreach ($pr as $request) {
                                        ?>
                                            <div class="[ row ]">
                                                <div class="[ data ]">
                                                    <div class="[ item__card ]">
                                                        <div class="[ img ]">
                                                            <img src="<?php echo UPLOADS . $request['thumbnail'] ?>" />
                                                        </div>
                                                        <div class="[ content ]">
                                                            <a href="<?php echo URLROOT . "/gig/" . $request['gigId'] ?>">
                                                                <h2 class="[ limit-text-2 ]"><?php echo $request['title'] ?></h2>
                                                            </a>
                                                            <p><small>by </small> <a href="<?php echo URLROOT . "/profile/" . $request['uid'] ?>"><?php echo $request['firstName'] . " " . $request['lastName'] ?></p></a>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="[ data ]" hideIn="md">
                                                    <p class="[ tag ]"><?php echo $request['category'] ?></p>
                                                </div>
                                                <div class="[ data ]" hideIn="sm">
                                                    <h3 class="LKR"><?php echo number_format($request['offer'], 2, '.', ',') ?></h3>
                                                </div>
                                                <div class="[ data ]" hideIn="lg">
                                                    <h3><?php echo $request['cropCycle'] ?> Days</h3>
                                                </div>
                                                <div class="[ data ]" hideIn="lg">
                                                    <h3><?php echo $request['city'] ?></h3>
                                                </div>
                                                <div class="[ data ]" hideIn="md">
                                                    <p><?php echo $request['requestedDate'] ?></p>
                                                </div>
                                                <div class="[ data ]">
                                                    <div class="[ actions ]">
                                                        <button for="<?php echo $request['requestId'] ?>"><i class="bi bi-three-dots-vertical"></i></button>
                                                    </div>
                                                </div>
                                                <div id="<?php echo $request['requestId'] ?>" class="[ expand ]">

                                                    <div class="[ data ]" showIn="md">
                                                        <p class="[ tag ]"><?php echo $request['category'] ?></p>
                                                    </div>
                                                    <div class="[ data ]" showIn="sm">
                                                        <h4>Offer :</h4>
                                                        <p class="LKR"><?php echo number_format($request['offer'], 2, '.', ',') ?></p>
                                                    </div>
                                                    <div class="[ data ]" showIn="lg">
                                                        <h4>Crop Cycle :</h4>
                                                        <p><?php echo $request['cropCycle'] ?> Months</p>
                                                    </div>
                                                    <div class="[ data ]" showIn="lg">
                                                        <h4>City</h4>
                                                        <p><?php echo $request['city'] ?></p>
                                                    </div>
                                                    <div class="[ data ]" showIn="md">
                                                        <h4>Request Date</h4>
                                                        <p><?php echo $request['requestedDate'] ?></p>
                                                    </div>

                                                    <div class="[ data ]" always>
                                                        <?php if (!empty($request['message'])) {
                                                        ?>
                                                            <h4>Your Message :</h4>
                                                            <p><?php echo $request['message'] ?></p>
                                                        <?php
                                                        } ?>
                                                        <br>
                                                        <div class="[ flex gap-1 mt-1 ]">
                                                            <button onclick="openDeleteAlert('<?php echo $request['requestId'] ?>')" class="[ button__danger ]">Delete Request</button>
                                                        </div>
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
                </div>
                <div class="tab" id="3">
                    <div class="[ requests__continer ]">
                        <div class="[ caption ]">
                            <h2>Rejected Requests</h2>
                            <p>Don't give up on your rejected investment requests! you can easily resend with a new request.</p>
                        </div>
                        <?php
                        if (empty($rr)) {
                            require(COMPONENTS . "dashboard/noDataFound.php");
                        } else {
                        ?>

                            <div class="[ requests__wrapper ]">
                                <div class="[ grid__table ]" style="
                                        --xl-cols: 2fr 1fr 1fr 1fr 1fr 1fr 0.3fr;
                                        --lg-cols: 1.5fr 1fr 1fr 1fr 0.3fr;
                                        --md-cols: 2fr 1fr 0.3fr;
                                        --sm-cols: 3fr 0.3fr;
                                    ">
                                    <div class="[ head stick_to_top ]">
                                        <!-- <form class="[ filters ]" action="<?php echo URLROOT ?>/dashboard/myrequests" method="POST">
                                            <div class="[ options ]">
                                                <div class="[ input__control ]">
                                                    <label for="fromDate">From</label>
                                                    <input id="fromDate" type="date" tag="fromDate" name="fromDate">
                                                </div>
                                                <div class="[ input__control ]">
                                                    <label for="toDate">To</label>
                                                    <input id="toDate" type="date" tag="toDate" name="toDate">
                                                </div>
                                                <div class="[ input__control ]">
                                                    <label for="district">District</label>
                                                    <select id="district" name="district">
                                                        <option value="all">All</option>
                                                        <?php
                                                        foreach (DISTRICTS as $key => $value) {
                                                        ?>
                                                            <option value="<?php echo $key ?>"><?php echo $value ?></option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="[ input__control ]">
                                                    <label for="category">Category</label>
                                                    <select id="category" name="category">
                                                        <option value="all">All</option>
                                                        <option value="vegetable">Vegetable</option>
                                                        <option value="fruit">Fruit</option>
                                                        <option value="grains">Grains</option>
                                                        <option value="spices">Spices</option>
                                                    </select>
                                                </div>
                                                <div class="[ input__control ]">
                                                    <button type="submit" name="submit" class="button__primary">Apply</button>
                                                </div>

                                            </div>
                                            <div class="[ search ]">
                                                <input type="text" name="searchRr" placeholder="Search">
                                                <button type="button">
                                                    <i class="bi bi-search"></i>
                                                </button>
                                            </div> -->
                                        </form>
                                        <div class="[ row ]">
                                            <div class="[ data ]">
                                                <p>Gig</p>
                                            </div>
                                            <div class="[ data ]" hideIn="md">
                                                <p>Category</p>
                                            </div>
                                            <div class="[ data ]" hideIn="sm">
                                                <p>Offer</p>
                                            </div>
                                            <div class="[ data ]" hideIn="lg">
                                                <p>Crop Cycle</p>
                                            </div>
                                            <div class="[ data ]" hideIn="lg">
                                                <p>City</p>
                                            </div>
                                            <div class="[ data ]" hideIn="md">
                                                <p>Requested Date</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="[ body ]">
                                        <?php
                                        foreach ($rr as $request) {
                                        ?>
                                            <div class="[ row ]">
                                                <div class="[ data ]">
                                                    <div class="[ item__card ]">
                                                        <div class="[ img ]">
                                                            <img width="50" src="<?php echo UPLOADS . $request['thumbnail'] ?>" />
                                                        </div>
                                                        <div class="[ content ]">
                                                            <a href="<?php echo URLROOT . "/gig/" . $request['gigId'] ?>">
                                                                <h2 class="[ limit-text-2 ]"><?php echo $request['title'] ?></h2>
                                                            </a>
                                                            <p><small>by </small> <a href="<?php echo URLROOT . "/profile/" . $request['uid'] ?>"><?php echo $request['firstName'] . " " . $request['lastName'] ?></p></a>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="[ data ]" hideIn="md">
                                                    <p class="[ tag ]"><?php echo $request['category'] ?></p>
                                                </div>
                                                <div class="[ data ]" hideIn="sm">
                                                    <h3 class="LKR"><?php echo number_format($request['offer'], 2, '.', ',') ?></h3>
                                                </div>
                                                <div class="[ data ]" hideIn="lg">
                                                    <h3><?php echo $request['cropCycle'] ?> Days</h3>
                                                </div>
                                                <div class="[ data ]" hideIn="lg">
                                                    <h3><?php echo $request['city'] ?></h3>
                                                </div>
                                                <div class="[ data ]" hideIn="md">
                                                    <p><?php echo $request['requestedDate'] ?></p>
                                                </div>
                                                <div class="[ data ]">
                                                    <div class="[ actions ]">
                                                        <button for="<?php echo $request['requestId'] ?>"><i class="bi bi-three-dots-vertical"></i></button>
                                                    </div>
                                                </div>
                                                <div id="<?php echo $request['requestId'] ?>" class="[ expand ]">

                                                    <div class="[ data ]" showIn="md">
                                                        <p class="[ tag ]"><?php echo $request['category'] ?></p>
                                                    </div>
                                                    <div class="[ data ]" showIn="sm">
                                                        <h4>Offer :</h4>
                                                        <p class="LKR"><?php echo number_format($request['offer'], 2, '.', ',') ?></p>
                                                    </div>
                                                    <div class="[ data ]" showIn="lg">
                                                        <h4>Crop Cycle :</h4>
                                                        <p><?php echo $request['cropCycle'] ?> Months</p>
                                                    </div>
                                                    <div class="[ data ]" showIn="lg">
                                                        <h4>City</h4>
                                                        <p><?php echo $request['city'] ?></p>
                                                    </div>
                                                    <div class="[ data ]" showIn="md">
                                                        <h4>Request Date</h4>
                                                        <p><?php echo $request['requestedDate'] ?></p>
                                                    </div>

                                                    <div class="[ data ]" always>
                                                        <?php if (!empty($request['message'])) {
                                                        ?>
                                                            <h4>Your Message :</h4>
                                                            <p><?php echo $request['message'] ?></p>
                                                        <?php
                                                        } ?>
                                                        <br>
                                                        <button onclick="openResendModal('<?php echo $request['requestId'] ?>')" class="[ button__primary ]">Resend Request</button>
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
                </div>
            </div>
        </div>
    </div>
    <?php
    require_once("footer.php");
    ?>
    <script src="<?php echo JS ?>/tabs.js"></script>
    <script src="<?php echo JS ?>/gridTable.js"></script>
    <script src="<?php echo JS ?>/filter/toDateFromDate-multiple.js"></script>

    <script>
        function openDeleteAlert(id) {
            const deleteModal = document.getElementById("deleteModal")
            const confirmDeleteBtn = document.getElementById("confirmDeleteBtn")
            confirmDeleteBtn.value = id
            deleteModal.showModal()
        }

        function closeDeleteAlert() {
            const deleteModal = document.getElementById("deleteModal")
            deleteModal.close()
        }

        function openResendModal(id) {
            const resendModal = document.getElementById("resendModal")
            const requestResendBtn = document.getElementById("requestResendBtn")
            requestResendBtn.value = id
            resendModal.showModal()
        }

        function closeResendModal() {
            const resendModal = document.getElementById("resendModal")
            resendModal.close()
        }
    </script>
</body>

</html>