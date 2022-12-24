<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Govithena | Search</title>
    <link rel="icon" type="image/x-icon" href="<?php echo IMAGES ?>/favicon.png">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS ?>/sidebar.css">
    <link rel="stylesheet" href="<?php echo CSS ?>/ui.css">
    <link rel="stylesheet" href="<?php echo CSS ?>/dashHeader.css">
    <link rel="stylesheet" href="<?php echo CSS ?>/dashFooter.css">
    <link rel="stylesheet" href="<?php echo CSS ?>/gig.css">
    <link rel="stylesheet" href="<?php echo CSS ?>/modal.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
</head>

<body>
    <?php
    include COMPONENTS . 'navbar.php';
    ?>
    <?php
    if (isset($state)) {
        if ($state == 'success') {
    ?>

            <div class="[ alert alert-success ]">
                <i class="fas fa-check"></i>
                <div>
                    <h4>Success</h4>
                    <p>Your request has been sent to the farmer</p>
                </div>
                <!-- <i class="fas fa-times"></i> -->
            </div>

        <?php
        }
        if ($state == 'error') {
        ?>

            <div class="[ alert alert-error ]">
                <i class="fas fa-times"></i>
                <div>
                    <h4>Error</h4>
                    <p>Something went wrong.</p>
                </div>
                <!-- <i class="fas fa-times"></i> -->
            </div>

    <?php
        }
    }

    ?>


    <div class="[ container mt-5 ]">

        <div class="[ fs-3 breadcrumbs ]">
            <a href="<?php echo URLROOT ?>">Govithena</a>
            <a href="<?php echo URLROOT ?>/search/">Search</a>
            <p>Gig</p>
            <p><?php echo $gig['category'] ?></p>
        </div>


        <div class="[ mt-2 ][ result__grid ]">
            <div class="[ result__images ]">
                <img src="<?php echo UPLOADS . $gig['image']; ?>" />
                <!-- <img src="<?php echo IMAGES ?>/temp/1.jpg" alt=""> -->
            </div>
            <div class="[ result__content ]">
                <h1 class="[ mb-1 ]"><?php echo $gig['title'] ?></h1>
                <p><?php echo $gig['description'] ?>.</p>
                <p class="[ my-1 ]"><?php echo $gig['location'] ?></p>
                <div class="[ flex flex-sb-c fs-5 fw-7 ]">
                    <p class="[ my-1 ]">LKR <?php echo $gig['capital'] ?></p>
                    <p><?php echo $gig['timePeriod'] ?></p>
                </div>
                <p><?php echo $gig['landArea'] ?> Arces</p>
                <hr />

                <div class="[  ]">
                    <h2>Farmer</h2>
                    <p><?php echo $farmer['firstName'] . " " . $farmer['lastName'] ?></p>
                    <?php
                    if (isset($state) && $state == 'success') {
                    ?>
                        <button class="[ mt-1 btn btn-primary ]">cancel request</button>
                    <?php
                    } else {
                    ?>
                        <button class="[ mt-1 btn btn-primary ]" onclick="openModal()">send request</button>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>

        <div class="[ rating__grid ]">
            <div class="[ rating__number ]">
                <h1>0.0</h1>
                <div class="[ stars ]">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                </div>
                <p>0 reviews</p>
            </div>
            <div class="[ rating__bars ]">
                <div class="[ bar ]">
                    <label for="5">5</label>
                    <progress id="5" value="1" max="100"></progress>
                </div>
                <div class="[ bar ]">
                    <label for="4">4</label>
                    <progress id="4" value="1" max="100"></progress>
                </div>
                <div class="[ bar ]">
                    <label for="3">3</label>
                    <progress id="3" value="1" max="100"></progress>
                </div>
                <div class="[ bar ]">
                    <label for="2">2</label>
                    <progress id="2" value="1" max="100"></progress>
                </div>
                <div class="[ bar ]">
                    <label for="1">1</label>
                    <progress id="1" value="1" max="100"></progress>
                </div>
            </div>
        </div>

        <div class="[ description ]">
            <h1><?php echo $gig['title'] ?></h1>
            <pre><?php echo $gig['description'] ?></pre>
        </div>


        <div class="[ reviews ]">
            <h1>Reviews</h1>
            <hr>
            <div class="[ reviews__wrapper ]">

                <div class="[ review ]">
                    <div class="[ review__header ]">
                        <img src="https://xsgames.co/randomusers/avatar.php?g=male" alt="profile">
                        <h3>Reviewer name</h3>
                    </div>
                    <p>
                        Occaecat occaecat et laborum exercitation eiusmod minim. Adipisicing consequat minim nostrud aliqua eu eu laborum officia. Deserunt ex qui consectetur Lorem excepteur culpa cillum culpa aute commodo velit est ex ut.
                    </p>
                    <div class="[ review__footer ]">
                        <p>12/12/2022</p>
                        <div class="[ stars ]">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                    </div>
                </div>
                <div class="[ review ]">
                    <div class="[ review__header ]">
                        <img src="https://xsgames.co/randomusers/avatar.php?g=male" alt="profile">
                        <h3>Reviewer name</h3>
                    </div>
                    <p>
                        Occaecat occaecat et laborum exercitation eiusmod minim. Adipisicing consequat minim nostrud aliqua eu eu laborum officia. Deserunt ex qui consectetur Lorem excepteur culpa cillum culpa aute commodo velit est ex ut.
                    </p>
                    <div class="[ review__footer ]">
                        <p>12/12/2022</p>
                        <div class="[ stars ]">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                    </div>
                </div>

            </div>
        </div>



    </div>

    <?php
    include COMPONENTS . 'dashboard/footer.php';
    ?>

    </div>


    <dialog id="modal">
        <div class="[ modal__container ]">
            <div class="[ modal__header ]">
                <h2>Make Your Offer</h2>
                <!-- <button onclick="closeModal()">&times;</button> -->
            </div>
            <div class="[ modal__body ]">
                <p class="[ fs-5 my-1 fw-5 ]"><?php echo $gig['title'] ?></p>
                <p><?php echo $farmer['firstName'] . " " . $farmer['lastName'] ?></p>
                <div class="[ flex flex-sb-c my-05 ]">
                    <p>LKR <?php echo $gig['capital'] ?></p>
                    <p><?php echo $gig['timePeriod'] ?></p>
                </div>
                <form class="[ modal__form ]" method="post" action="<?php echo URLROOT ?>/gig/request">
                    <h3>Your Offer</h3>
                    <div class="[ form__control ]">
                        <label for="offerAmount">Offer Amount</label>
                        <input type="text" name="offerAmount" id="offerAmount" placeholder="Offer Amount" value="<?php echo $gig['capital'] ?>" />
                    </div>
                    <div class="[ form__control ]">
                        <label for="message">Message (Optional)</label>
                        <textarea name="message" id="message"></textarea>
                    </div>
                    <div class="[ flex ]">
                        <button type="submit" name="submit_request" class="btn btn-primary">Send</button>
                        <button type="button" class="btn btn-primary" onclick="closeModal()">Cancel</button>
                    </div>
                </form>

            </div>
        </div>
    </dialog>



    <script src=" <?php echo JS ?>/app.js"></script>
    <script>
        function openModal() {
            document.getElementById("modal").showModal();
        }

        function closeModal() {
            document.getElementById("modal").close();
        }


        setTimeout(() => {
            document.querySelector(".alert").style.display = "none";
        }, 5000);
    </script>

</body>

</html>