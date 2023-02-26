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
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>/tabs.css">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>/gridTable.css">
    <link rel="stylesheet" href="<?php echo CSS ?>/investor/review.css">

    <title>Dashboard | Investor</title>
</head>

<body>

    <?php
    $active = "gigs";
    $title = "Review";
    require_once("navigator.php");
    ?>

    <?php $name = "Janith"; ?>

    <div class="[ container ]" container-type="dashboard-section">

        <div class="[ caption ]">
            <h3>Let us know what you think!</h3>
            <p>Leave a review, help a fellow investors - share your experience and help others make the right choice</p>
        </div>

        <div class="[ gig__farmer ]">
            <div class="[ gig ]">
                <div class="[ gig__image ]">
                    <img src="<?php echo UPLOADS . $gig['image'] ?>" alt="" />
                </div>
                <div class="[ gig__info ]">
                    <div class="[ top ]">
                        <h3><?php echo $gig['title'] ?></h3>
                        <p><?php echo $gig['location'] ?></p>
                    </div>
                    <div class="[ bottom ]">
                        <div class="[  ]">
                            <p>LKR <strong>12500.00</strong> spended</p>
                            <p>LKR <strong>12500.00</strong> earned</p>
                        </div>
                        <h3>Completed within <strong>120 Days</strong></h3>
                    </div>
                </div>
            </div>
            <div class="[ farmer ]">
                <!-- <div class="[ farmer__card_heading ]">
                    <h3>Farmer</h3>
                </div> -->
                <div class="[ farmer__card_body ]">
                    <img src="<?php echo UPLOADS . $farmer['image'] ?>" alt="" />
                    <div class="[ farmer__info ]">
                        <a href="<?php echo URLROOT . '/profile/' . $farmer['uid'] ?>"><?php echo $farmer['firstName'] . " " . $farmer['lastName'] ?></a>
                        <p><?php echo $farmer['city'] ?></p>
                    </div>
                </div>

            </div>
        </div>

        <div class="[ review ]">
            <div class="[ caption ]">
                <h3>Answer the following questions about your experience</h3>
                <p>Please take a moment to answer the following questions about your experience with the farmer and their gig. Your feedback will help us determine your level of satisfaction and assist other investors in making informed decisions.</p>
            </div>
            <!-- <div class="[ review__heading ]">
                <h3>Give your answer for fallowing question.</h3>
            </div> -->
            <form method="post">
                <div class="[ question__wrapper ]">
                    <div class="[ counter ]"></div>
                    <div class="[ question ]">
                        <p>How satisfied were you with the overall performance of the farmer in completing the gig?</p>
                        <div class="[ answers ]">
                            <label q="one" class="[ rating__star ]" for="q1_a1"><i class="fa fa-star"></i></label>
                            <input class="[ start__checkbox ]" type="radio" name="q1" id="q1_a1" value="1"></input>
                            <label q="one" class="[ rating__star ]" for="q1_a2"><i class="fa fa-star"></i></label>
                            <input class="[ start__checkbox ]" type="radio" name="q1" id="q1_a2" value="2"></input>
                            <label q="one" class="[ rating__star ]" for="q1_a3"><i class="fa fa-star"></i></label>
                            <input class="[ start__checkbox ]" type="radio" name="q1" id="q1_a3" value="3"></input>
                            <label q="one" class="[ rating__star ]" for="q1_a4"><i class="fa fa-star"></i></label>
                            <input class="[ start__checkbox ]" type="radio" name="q1" id="q1_a4" value="4"></input>
                            <label q="one" class="[ rating__star ]" for="q1_a5"><i class="fa fa-star"></i></label>
                            <input class="[ start__checkbox ]" type="radio" name="q1" id="q1_a5" value="5"></input>
                        </div>
                    </div>
                </div>

                <div class="[ question__wrapper rating__question ]">
                    <div class="[ counter ]"></div>
                    <div class="[ question ]">
                        <p>How would you rate the quality of the work done by the farmer?</p>
                        <div class="[ answers ]">
                            <label q="two" class="[ rating__star ]" for="q2_a1"><i class="fa fa-star"></i></label>
                            <input class="[ start__checkbox ]" type="radio" name="q2" id="q2_a1" value="1"></input>
                            <label q="two" class="[ rating__star ]" for="q2_a2"><i class="fa fa-star"></i></label>
                            <input class="[ start__checkbox ]" type="radio" name="q2" id="q2_a2" value="2"></input>
                            <label q="two" class="[ rating__star ]" for="q3_a3"><i class="fa fa-star"></i></label>
                            <input class="[ start__checkbox ]" type="radio" name="q2" id="q3_a3" value="3"></input>
                            <label q="two" class="[ rating__star ]" for="q4_a4"><i class="fa fa-star"></i></label>
                            <input class="[ start__checkbox ]" type="radio" name="q2" id="q4_a4" value="4"></input>
                            <label q="two" class="[ rating__star ]" for="q5_a5"><i class="fa fa-star"></i></label>
                            <input class="[ start__checkbox ]" type="radio" name="q2" id="q5_a5" value="5"></input>
                        </div>
                    </div>
                </div>

                <div class="[ question__wrapper ]">
                    <div class="[ counter ]"></div>
                    <div class="[ question ]">
                        <p>Did the farmer meet the expectations set out in the gig description?</p>
                        <div class="[ answers ]">
                            <div class="[ answer ]">
                                <label class="[ yes ]" for="q3_a1">Yes <i class="fa-solid fa-check"></i></label>
                                <input type="radio" name="q3" id="q3_a1" value="1"></input>
                            </div>
                            <div class="[ answer ]">
                                <label class="[ no ]" for="q3_a2">No <i class="fa-solid fa-xmark"></i></label>
                                <input type="radio" name="q3" id="q3_a2" value="0"></input>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="[ question__wrapper ]">
                    <div class="[ counter ]"></div>
                    <div class="[ question ]">
                        <p>Was the farmer professional and easy to work with?</p>
                        <div class="[ answers ]">
                            <div class="[ answer ]">
                                <label class="[ yes ]" for="q4_a1">Yes <i class="fa-solid fa-check"></i></label>
                                <input type="radio" name="q4" id="q4_a1" value="1"></input>
                            </div>
                            <div class="[ answer ]">
                                <label class="[ no ]" for="q4_a2">No <i class="fa-solid fa-xmark"></i></label>
                                <input type="radio" name="q4" id="q4_a2" value="0"></input>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="[ question__wrapper ]">
                    <div class="[ counter ]"></div>
                    <div class="[ question ]">
                        <p>Did the farmer communicate effectively throughout the project?</p>
                        <div class="[ answers ]">
                            <div class="[ answer ]">
                                <label class="[ yes ]" for="q5_a1">Yes <i class="fa-solid fa-check"></i></label>
                                <input type="radio" name="q5" id="q5_a1" value="1"></input>
                            </div>
                            <div class="[ answer ]">
                                <label class="[ no ]" for="q5_a2">No <i class="fa-solid fa-xmark"></i></label>
                                <input type="radio" name="q5" id="q5_a2" value="0"></input>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="[ question__wrapper ]">
                    <div class="[ counter ]"></div>
                    <div class="[ question ]">
                        <p>Did the farmer follow all the instructions provided by you or as agreed upon in the gig?</p>
                        <div class="[ answers ]">
                            <div class="[ answer ]">
                                <label class="[ yes ]" for="q6_a1">Yes <i class="fa-solid fa-check"></i></label>
                                <input type="radio" name="q6" id="q6_a1" value="1"></input>
                            </div>
                            <div class="[ answer ]">
                                <label class="[ no ]" for="q6_a2">No <i class="fa-solid fa-xmark"></i></label>
                                <input type="radio" name="q6" id="q6_a2" value="0"></input>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="[ question__wrapper ]">
                    <div class="[ counter ]"></div>
                    <div class="[ question ]">
                        <p>Would you recommend this farmer for future gigs to other investors?</p>
                        <div class="[ answers ]">
                            <div class="[ answer ]">
                                <label class="[ yes ]" for="q7_a1">Yes <i class="fa-solid fa-check"></i></label>
                                <input type="radio" name="q7" id="q7_a1" value="1"></input>
                            </div>
                            <div class="[ answer ]">
                                <label class="[ no ]" for="q7_a2">No <i class="fa-solid fa-xmark"></i></label>
                                <input type="radio" name="q7" id="q7_a2" value="0"></input>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="[ feedbacks ]">
                    <div class="[ caption ]">
                        <h3>Share your honest review and feedback</h3>
                        <p>Please share your honest review and feedback about the farmer's gig here. Your comments will help the farmer to improve their services and assist other investors in making informed decisions.</p>
                    </div>
                    <!-- <div class="[ feedbacks__heading ]">
                        <h3>Give your answer for fallowing question.</h3>
                    </div> -->
                    <div class="[ feedback ]">
                        <label for="q8">What is your overall experience working with the farmer?</label>
                        <textarea id="q8" name="q8"></textarea>
                    </div>

                    <div class="[ feedback ]">
                        <label for="q9">Do you have any suggestions or feedback for the farmer to improve their work or services?</label>
                        <textarea id="q9" name="q9"></textarea>
                    </div>

                </div>

                <div class="[ submit__btn ]">
                    <button type="submit" name="submit_review">Submit</button>
                </div>
            </form>
        </div>



    </div>
    <?php
    require_once("footer.php");
    ?>
    <script src="<?php echo JS ?>/dashboard/dashboard.js"></script>
    <script>
        const q1 = document.querySelectorAll("input[name='q1']")
        const q1_stars = document.querySelectorAll("label[q='one']")
        light_stars(q1, q1_stars);

        const q2 = document.querySelectorAll("input[name='q2']")
        const q2_stars = document.querySelectorAll("label[q='two']")
        light_stars(q2, q2_stars);


        function light_stars(q, stars) {
            Array.from(q).forEach(starC => {
                starC.addEventListener('click', (e) => {
                    if (e.target.checked) {
                        for (i = 1; i <= stars.length; i++) {
                            if (i <= parseInt(starC.value)) {
                                stars[i - 1].classList.add('checked')
                            } else {
                                stars[i - 1].classList.remove('checked')
                            }
                        }

                    }
                })
            })
        }

        console.log(q1);
    </script>
</body>

</html>