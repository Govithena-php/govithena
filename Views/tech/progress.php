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
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>/gridTable.css">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>/tech/progress.css">

    <title>Dashboard | Tech</title>

    <style>
        .dashboard {
            min-height: 100dvh;
        }
    </style>
</head>

<body>

    <?php
    if (Session::has('progress_add_alert')) {
        $alert = Session::pop('progress_add_alert');
        $alert->show_default_alert();
    }
    ?>

    <?php
    $active = "dashboard";
    $title = "Dashboard";
    require_once("navigator.php");
    ?>

    <?php $name = "Janith"; ?>

    <div class="[ container ][ dashboard ]" container-type="dashboard-section">
        <div>
            <div class="[ requests__continer ]">
                <?php
                if (!isset($progress) || empty($progress)) {
                    require(COMPONENTS . "dashboard/noDataFound.php");
                } else {
                ?>

                    <div class="[ requests__wrapper ]">
                        <div class="[ grid__table ]" style="
                                        --xl-cols:  1.75fr 1.25fr 1fr 1fr 0.5fr;
                                        --lg-cols: 1.5fr 0.75fr 0.75fr 0.3fr;
                                        --md-cols: 2fr 0.5fr;
                                        --sm-cols: 2fr 1fr;
                                    ">
                            <div class="[ head stick_to_top pt-1 ]">

                                <div class="flex-space-between">
                                    <div class="[ caption ]">
                                        <h2>Gig Progress</h2>
                                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Alias reprehenderit qui, inventore iure est beatae maiores voluptas repellat corrupti unde perspiciatis.</p>
                                    </div>
                                    <a class="button__primary" href="<?php echo URLROOT . '/tech/newProgress/' . $gigId ?>">Add New</a>
                                </div>
                                <!-- <div class="[ grid ][ filters ]" md="1" lg="2" gap="2">
                                    <div class="[ grid ][ options ]" sm="1" md="6" lg="6" gap="1">
                                        <div class="[ input__control ]">
                                            <label for="from">Visit Date :</label>
                                            <input id="from" type="date">
                                        </div>
                                        <div class="[ input__control ]">
                                            <label for="to">Entry Date :</label>
                                            <input id="to" type="date">
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
                                </div> -->
                                <div class="[ row ]">
                                    <div class="[ data ]">
                                        <p>Progress</p>
                                    </div>
                                    <div class="[ data ]">
                                        <p>By</p>
                                    </div>
                                    <div class="[ data ]" hideIn="md">
                                        <p>Updated Date</p>
                                    </div>
                                    <div class="[ data ]" hideIn="md">
                                        <p>Updated Time</p>
                                    </div>
                                </div>
                            </div>
                            <div class="[ body ]">
                                <?php
                                foreach ($progress as $pr) {
                                ?>
                                    <div class="[ row ]">
                                        <div class="[ data ]">
                                            <p class="strong"><?php echo $pr['subject'] ?></p>
                                        </div>
                                        <div class="[ data ]" hideIn="md">
                                            <?php
                                            if ($pr['userId'] == Session::get('user')->getUid()) {
                                                echo "<h3>You</h3>";
                                            } else {
                                            ?>
                                                <div class="image_name">
                                                    <img src="<?php echo UPLOADS . "/profilePictures/" . $pr['image'] ?>" alt="">
                                                    <h3><?php echo $pr['firstName'] ?> <?php echo $pr['lastName'] ?></h3>
                                                </div>

                                            <?php
                                            }
                                            ?>
                                        </div>
                                        <div class="[ data ]" hideIn="md">
                                            <h3><?php echo $pr['progressDate'] ?></h3>
                                        </div>
                                        <div class="[ data ]" hideIn="md">
                                            <h3><?php echo $pr['progressTime'] ?></h3>
                                        </div>
                                        <div class="[ actions ]">
                                            <button for="<?php echo $pr['progressId'] ?>"><i class="fa fa-chevron-circle-down"></i></button>
                                            <!-- <a href="<?php echo URLROOT ?>/<?php echo $pr['progressId'] ?>" class="btn btn-primary">Cancel Request</a> -->
                                        </div>
                                        <div id="<?php echo $pr['progressId'] ?>" class="[ expand progress__more ]">

                                            <div class="[ data ]" showIn="md">
                                                <div class="[ progress__date_time ]">
                                                    <div class="[ date ]">
                                                        <h4>Updated Date :</h4>
                                                        <h3><?php echo $pr['date'] ?></h3>
                                                    </div>
                                                    <div class="[ time ]">
                                                        <h4>Updated Time :</h4>
                                                        <h3><?php echo $pr['time'] ?></h3>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="[ data ]" always>
                                                <div class="[ progress__content ]">
                                                    <h4>Description</h4>
                                                    <p><?php echo $pr['description'] ?></p>
                                                </div>
                                                <div class="[ progress__images ]">
                                                    <?php
                                                    foreach ($images[$pr['progressId']] as $i) {
                                                    ?>
                                                        <div class="[ img ]">
                                                            <img src="<?php echo UPLOADS . '/progress/' . $i ?>">
                                                        </div>
                                                    <?php
                                                    }
                                                    ?>
                                                </div>
                                                <div class="[ progress__actions ]">
                                                    <a href="<?php echo URLROOT ?>/<?php echo $pr['progressId'] ?>" class="[ feedback__btn ]">Give some feedback</a>
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
    </div>
    <?php
    require_once("footer.php");
    ?>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="<?php echo JS ?>/dashboard/chart.js"></script>
    <script src="<?php echo JS ?>/dashboard/dashboard.js"></script>
    <script>
        // const controls = document.querySelectorAll(".controls>button");
        // const tabs = document.querySelectorAll(".tab");

        // Array.from(controls).forEach(control => {
        //     control.addEventListener("click", () => {
        //         let For = control.getAttribute("for")
        //         Array.from(tabs).forEach(tab => {
        //             if (tab.id == For) {
        //                 tab.setAttribute("active", true)
        //                 control.toggleAttribute("active")
        //             } else {
        //                 tab.setAttribute("active", false)
        //             }
        //         })
        //     })
        // })


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