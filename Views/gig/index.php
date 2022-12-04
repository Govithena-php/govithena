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


    <div class="[ container pt-4 h-screen ]">

        <div class="[ fs-3 breadcrumbs ]">
            <a href="<?php echo URLROOT ?>">Govithena</a>
            <a href="<?php echo URLROOT ?>/search/">Search</a>
            <p>Gig</p>
            <p><?php echo $gig['category'] ?></p>
        </div>


        <div class="[ mt-2 ][ result__grid ]">
            <div class="[ result__images ]">
                <img src="<?php echo IMAGES ?>/temp/1.jpg" alt="">
            </div>
            <div class="[ result__content ]">
                <h1><?php echo $gig['title'] ?></h1>
                <p><?php echo $gig['description'] ?></p>
                <p><?php echo $gig['capital'] ?></p>
                <p><?php echo $gig['timePeriod'] ?></p>
                <p><?php echo $gig['landArea'] ?> Arces</p>
                <p><?php echo $gig['location'] ?></p>
                <hr />
                <br>
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