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
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>/tabs.css">

    <link rel="stylesheet" href="<?php echo CSS ?>/investor/myrequests.css">

    <title>Dashboard | Investor</title>
    <!-- <style>
        *{
            outline: 1px solid limegreen;
        }
    </style> -->
</head>

<body>

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
                <button class="control" for="1">Accepted Requests</button>
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
                            require_once(COMPONENTS . "dashboard/noDataFound.php");
                        } else {
                        ?>
                            <div class="[ filters ]">
                                <div class="[ options ]">
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
                                <div class="[ search ]">
                                    <input type="text" placeholder="Search">
                                    <button type="button">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="[ requests__wrapper ]">
                                <div class="[ grid__table ]" style="
                                        --xl-cols:  1.2fr 0.35fr 0.35fr 0.35fr 0.35fr 0.4fr 0.7fr;
                                        --lg-cols: 1.5fr 0.5fr 0.5fr 1fr 1fr;
                                        --md-cols: 1fr 0.5fr 0.5fr;
                                        --sm-cols: 2fr 1fr;
                                    ">
                                    <div class="[ head ]">
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
                                            <p>Time Period</p>
                                        </div>
                                        <div class="[ data ]" hideIn="lg">
                                            <p>Location</p>
                                        </div>
                                        <div class="[ data ]" hideIn="md">
                                            <p>Requested Date</p>
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
                                                            <img width="50" src="<?php echo UPLOADS . $request['image'] ?>" />
                                                        </div>
                                                        <div class="[ content ]">
                                                            <a href="<?php echo URLROOT . "/gig/" . $request['gigId'] ?>">
                                                                <h2><?php echo $request['title'] ?></h2>
                                                            </a>
                                                            <p><small>by </small> <a href="<?php echo URLROOT . "/profile/" . $request['uid'] ?>"><?php echo $request['firstName'] . " " . $request['lastName'] ?></p></a>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="[ data ]" hideIn="md">
                                                    <p class="[ tag ]"><?php echo $request['category'] ?></p>
                                                </div>
                                                <div class="[ data ]" hideIn="sm">
                                                    <h3>LKR <?php echo $request['offer'] ?></h3>
                                                </div>
                                                <div class="[ data ]" hideIn="lg">
                                                    <h3><?php echo $request['timePeriod'] ?> Months</h3>
                                                </div>
                                                <div class="[ data ]" hideIn="lg">
                                                    <h3><?php echo $request['location'] ?></h3>
                                                </div>
                                                <div class="[ data ]" hideIn="md">
                                                    <p><?php echo $request['requestedDate'] ?></p>
                                                </div>
                                                <div class="[ data ]">
                                                    <div class="[ actions ]">
                                                        <button for="<?php echo $request['requestId'] ?>"><i class="fa fa-chevron-circle-down"></i></button>
                                                        <a href="<?php echo URLROOT ?>/checkout/<?php echo $request['requestId'] ?>" class="btn btn-primary">Pay Now</a>
                                                    </div>
                                                </div>
                                                <div id="<?php echo $request['requestId'] ?>" class="[ expand ]">

                                                    <div class="[ data ]" showIn="md">
                                                        <p class="[ tag ]"><?php echo $request['category'] ?></p>
                                                    </div>
                                                    <div class="[ data ]" showIn="sm">
                                                        <h4>Offer :</h4>
                                                        <p>LKR <?php echo $request['offer'] ?></p>
                                                    </div>
                                                    <div class="[ data ]" showIn="lg">
                                                        <h4>Time Periold :</h4>
                                                        <p><?php echo $request['timePeriod'] ?> Months</p>
                                                    </div>
                                                    <div class="[ data ]" showIn="lg">
                                                        <h4>Location</h4>
                                                        <p><?php echo $request['location'] ?></p>
                                                    </div>
                                                    <div class="[ data ]" showIn="md">
                                                        <h4>Request Date</h4>
                                                        <p><?php echo $request['requestedDate'] ?></p>
                                                    </div>

                                                    <div class="[ data ]" always>
                                                        <h4>Your Message :</h4>
                                                        <p><?php echo $request['message'] ?></p>
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
                            <div class="[ filters ]">
                                <div class="[ options ]">
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
                                <div class="[ search ]">
                                    <input type="text" placeholder="Search">
                                    <button type="button">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="[ requests__wrapper ]">
                                <div class="[ grid__table ]" style="
                                        --xl-cols:  1.2fr 0.35fr 0.35fr 0.35fr 0.35fr 0.4fr 0.7fr;
                                        --lg-cols: 1.5fr 0.5fr 0.5fr 1fr 1fr;
                                        --md-cols: 1fr 0.5fr 0.5fr;
                                        --sm-cols: 2fr 1fr;
                                    ">
                                    <div class="[ head ]">
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
                                            <p>Time Period</p>
                                        </div>
                                        <div class="[ data ]" hideIn="lg">
                                            <p>Location</p>
                                        </div>
                                        <div class="[ data ]" hideIn="md">
                                            <p>Requested Date</p>
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
                                                            <img width="50" src="<?php echo UPLOADS . $request['image'] ?>" />
                                                        </div>
                                                        <div class="[ content ]">
                                                            <a href="<?php echo URLROOT . "/gig/" . $request['gigId'] ?>">
                                                                <h2><?php echo $request['title'] ?></h2>
                                                            </a>
                                                            <p><small>by </small> <a href="<?php echo URLROOT . "/profile/" . $request['uid'] ?>"><?php echo $request['firstName'] . " " . $request['lastName'] ?></p></a>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="[ data ]" hideIn="md">
                                                    <p class="[ tag ]"><?php echo $request['category'] ?></p>
                                                </div>
                                                <div class="[ data ]" hideIn="sm">
                                                    <h3>LKR <?php echo $request['offer'] ?></h3>
                                                </div>
                                                <div class="[ data ]" hideIn="lg">
                                                    <h3><?php echo $request['timePeriod'] ?> Months</h3>
                                                </div>
                                                <div class="[ data ]" hideIn="lg">
                                                    <h3><?php echo $request['location'] ?></h3>
                                                </div>
                                                <div class="[ data ]" hideIn="md">
                                                    <p><?php echo $request['requestedDate'] ?></p>
                                                </div>
                                                <div class="[ data ]">
                                                    <div class="[ actions ]">
                                                        <button for="<?php echo $request['requestId'] ?>"><i class="fa fa-chevron-circle-down"></i></button>
                                                        <a href="<?php echo URLROOT ?>/checkout/<?php echo $request['requestId'] ?>" class="btn btn-primary">Cancel Request</a>
                                                    </div>
                                                </div>
                                                <div id="<?php echo $request['requestId'] ?>" class="[ expand ]">

                                                    <div class="[ data ]" showIn="md">
                                                        <p class="[ tag ]"><?php echo $request['category'] ?></p>
                                                    </div>
                                                    <div class="[ data ]" showIn="sm">
                                                        <h4>Offer :</h4>
                                                        <p>LKR <?php echo $request['offer'] ?></p>
                                                    </div>
                                                    <div class="[ data ]" showIn="lg">
                                                        <h4>Time Periold :</h4>
                                                        <p><?php echo $request['timePeriod'] ?> Months</p>
                                                    </div>
                                                    <div class="[ data ]" showIn="lg">
                                                        <h4>Location</h4>
                                                        <p><?php echo $request['location'] ?></p>
                                                    </div>
                                                    <div class="[ data ]" showIn="md">
                                                        <h4>Request Date</h4>
                                                        <p><?php echo $request['requestedDate'] ?></p>
                                                    </div>

                                                    <div class="[ data ]" always>
                                                        <h4>Your Message :</h4>
                                                        <p><?php echo $request['message'] ?></p>
                                                        <button class="btn btn-primary">Edit</button>
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
                            <div class="[ filters ]">
                                <div class="[ options ]">
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
                                <div class="[ search ]">
                                    <input type="text" placeholder="Search">
                                    <button type="button">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="[ requests__wrapper ]">
                                <div class="[ grid__table ]" style="
                                        --xl-cols:  1.2fr 0.35fr 0.35fr 0.35fr 0.35fr 0.4fr 0.7fr;
                                        --lg-cols: 1.5fr 0.5fr 0.5fr 1fr 1fr;
                                        --md-cols: 1fr 0.5fr 0.5fr;
                                        --sm-cols: 2fr 1fr;
                                    ">
                                    <div class="[ head ]">
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
                                            <p>Time Period</p>
                                        </div>
                                        <div class="[ data ]" hideIn="lg">
                                            <p>Location</p>
                                        </div>
                                        <div class="[ data ]" hideIn="md">
                                            <p>Requested Date</p>
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
                                                            <img width="50" src="<?php echo UPLOADS . $request['image'] ?>" />
                                                        </div>
                                                        <div class="[ content ]">
                                                            <a href="<?php echo URLROOT . "/gig/" . $request['gigId'] ?>">
                                                                <h2><?php echo $request['title'] ?></h2>
                                                            </a>
                                                            <p><small>by </small> <a href="<?php echo URLROOT . "/profile/" . $request['uid'] ?>"><?php echo $request['firstName'] . " " . $request['lastName'] ?></p></a>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="[ data ]" hideIn="md">
                                                    <p class="[ tag ]"><?php echo $request['category'] ?></p>
                                                </div>
                                                <div class="[ data ]" hideIn="sm">
                                                    <h3>LKR <?php echo $request['offer'] ?></h3>
                                                </div>
                                                <div class="[ data ]" hideIn="lg">
                                                    <h3><?php echo $request['timePeriod'] ?> Months</h3>
                                                </div>
                                                <div class="[ data ]" hideIn="lg">
                                                    <h3><?php echo $request['location'] ?></h3>
                                                </div>
                                                <div class="[ data ]" hideIn="md">
                                                    <p><?php echo $request['requestedDate'] ?></p>
                                                </div>
                                                <div class="[ data ]">
                                                    <div class="[ actions ]">
                                                        <button for="<?php echo $request['requestId'] ?>"><i class="fa fa-chevron-circle-down"></i></button>
                                                        <a href="<?php echo URLROOT ?>/checkout/<?php echo $request['requestId'] ?>" class="btn btn-primary">Resend</a>
                                                    </div>
                                                </div>
                                                <div id="<?php echo $request['requestId'] ?>" class="[ expand ]">

                                                    <div class="[ data ]" showIn="md">
                                                        <p class="[ tag ]"><?php echo $request['category'] ?></p>
                                                    </div>
                                                    <div class="[ data ]" showIn="sm">
                                                        <h4>Offer :</h4>
                                                        <p>LKR <?php echo $request['offer'] ?></p>
                                                    </div>
                                                    <div class="[ data ]" showIn="lg">
                                                        <h4>Time Periold :</h4>
                                                        <p><?php echo $request['timePeriod'] ?> Months</p>
                                                    </div>
                                                    <div class="[ data ]" showIn="lg">
                                                        <h4>Location</h4>
                                                        <p><?php echo $request['location'] ?></p>
                                                    </div>
                                                    <div class="[ data ]" showIn="md">
                                                        <h4>Request Date</h4>
                                                        <p><?php echo $request['requestedDate'] ?></p>
                                                    </div>

                                                    <div class="[ data ]" always>
                                                        <h4>Your Message :</h4>
                                                        <p><?php echo $request['message'] ?></p>
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