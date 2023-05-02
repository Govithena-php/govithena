<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Govithena | Help</title>
    <link rel="icon" type="image/x-icon" href="<?php echo IMAGES ?>/favicon.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="<?php echo CSS ?>base.css">
    <link rel="stylesheet" href="<?php echo CSS ?>grid.css">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>/formModal.css">
    <link rel="stylesheet" href="<?php echo CSS ?>help/index.css">
</head>

<body>
    <dialog id="questionModal" class="[ modal ]">
        <div class="[ container ]">
            <div class="[ caption ]">
                <h3>Ask your Question</h3>
                <p>We will contact you through your email address as soon as possible.</p>
            </div>
            <form action="<?php echo URLROOT ?>/dashboard/resend_request" method="POST" class="[ content ]">
                <?php
                if (!Session::get('user')->isLoggedIn()) {
                ?>
                    <div class="[ input__control ]">
                        <label for="resendOffer">Email Address</label>
                        <input type="number" name="resendOffer" id="resendOffer" required></input>
                    </div>
                <?php
                }
                ?>
                <div class="[ input__control ]">
                    <label for="resendMessage">Your Question</label>
                    <textarea name="resendMessage" id="resendMessage" required></textarea>
                </div>
                <div class="[ buttons ]">
                    <button type="button" class="[ button__danger ]" onclick="closeQuestionModal()" data-dismiss="modal">Cancel</button>
                    <button type="submit" id="requestResendBtn" name="request-resend" class="[ button__primary ]">Ask</button>
                </div>
            </form>
    </dialog>

    <?php require_once(COMPONENTS . 'navbar.php'); ?>

    <div class="[ container ][ help ]" container-type="section">
        <div class="hero">
            <h1>How Can We Help You?</h1>
            <p>Got a burning question? Let us help you put out the fire. Our team is ready and waiting to assist you.</p>
            <img src="<?php echo IMAGES ?>/svg/donut_love.svg" alt="404">
            <button onclick="openQuestionModal()" class="button__primary"><i class="bi bi-question"></i>Ask A Question</button>
        </div>
        <div class="frequently__asked_qs">
            <div class="caption">
                <h2>Frequently Asked Questions</h2>
                <p>Here are some of the most common questions we get asked. If you can't find what you're looking for, please contact us.</p>
            </div>
            <div class="grid" sm='1' md="2" lg="3" gap="2">
                <div class="question">
                    <h3>How do I get started?</h3>
                    <p>Getting started is easy. Just sign up for an account and you're ready to go.</p>
                </div>
                <div class="question">
                    <h3>How do I get started?</h3>
                    <p>Getting started is easy. Just sign up for an account and you're ready to go.</p>
                </div>
                <div class="question">
                    <h3>How do I get started?</h3>
                    <p>Getting started is easy. Just sign up for an account and you're ready to go.</p>
                </div>
                <div class="question">
                    <h3>How do I get started?</h3>
                    <p>Getting started is easy. Just sign up for an account and you're ready to go.</p>
                </div>
                <div class="question">
                    <h3>How do I get started?</h3>
                    <p>Getting started is easy. Just sign up for an account and you're ready to go.</p>
                </div>
                <div class="question">
                    <h3>How do I get started?</h3>
                    <p>Getting started is easy. Just sign up for an account and you're ready to go.</p>
                </div>
                <div class="question">
                    <h3>How do I get started?</h3>
                    <p>Getting started is easy. Just sign up for an account and you're ready to go.</p>
                </div>
                <div class="question">
                    <h3>How do I get started?</h3>
                    <p>Getting started is easy. Just sign up for an account and you're ready to go.</p>
                </div>
                <div class="question">
                    <h3>How do I get started?</h3>
                    <p>Getting started is easy. Just sign up for an account and you're ready to go.</p>
                </div>
            </div>
        </div>
    </div>



    <?php require_once(COMPONENTS . 'footer.php'); ?>
    <script src="<?php echo JS ?>/navbar/navbar.js"></script>
    <script>
        function openQuestionModal() {
            const questionModal = document.getElementById("questionModal")
            questionModal.showModal()
        }

        function closeQuestionModal() {
            const questionModal = document.getElementById("questionModal")
            questionModal.close()
        }
    </script>
</body>

</html>