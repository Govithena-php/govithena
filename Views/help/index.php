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

    <?php
    if (Session::has('ask_question_alert')) {
        $alert = Session::pop('ask_question_alert');
        $alert->show_default_alert();
    }
    ?>

    <dialog id="questionModal" class="[ modal ]">
        <div class="[ container ]">
            <div class="[ caption ]">
                <h3>Ask your Question</h3>
                <p>We will contact you through your email address as soon as possible.</p>
            </div>
            <form action="<?php echo URLROOT ?>/help" method="POST" class="[ content ]">
                <?php
                if (!Session::has('user')) {
                ?>
                    <div class="[ input__control ]">
                        <label for="email">Email Address</label>
                        <input type="number" name="email" id="email" required></input>
                    </div>
                <?php
                }
                ?>
                <div class="[ input__control ]">
                    <label for="question">Your Question</label>
                    <textarea name="question" id="question" required></textarea>
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
                    <h3>How can I invest in farming through your platform?</h3>
                    <p>To invest in farming, you can sign up on our platform and browse the available farming projects. Once you find a project that aligns with your interests and investment goals, you can allocate funds and become a stakeholder in that project.</p>
                </div>
                <div class="question">
                    <h3>What kind of farming opportunities are available for investors?</h3>
                    <p>We offer a wide range of farming opportunities, including organic farming, aquaculture and sustainable agriculture. Our platform connects you with farmers and projects that match your investment preferences.</p>
                </div>
                <div class="question">
                    <h3>What are the risks associated with investing in farming?</h3>
                    <p>Investing in farming, like any investment, carries inherent risks. These risks may include fluctuations in crop yields, market volatility, weather conditions, and regulatory changes. We provide comprehensive project information and risk assessments to help you make informed investment decisions.</p>
                </div>
                <div class="question">
                    <h3>What is the expected return on investment (ROI) for farming investments?</h3>
                    <p>The expected return on investment can vary depending on several factors, such as the type of farming project, market conditions, and the specific risks associated with the project. We provide projected ROI ranges for each farming opportunity to give you an idea of the potential returns.</p>
                </div>
                <div class="question">
                    <h3>How can I post a gig and find investors for my farming project?</h3>
                    <p>To post a gig and attract investors for your farming project, you can create a detailed profile and project description on our platform. Highlight the unique aspects of your project, your experience, and the potential returns for investors.</p>
                </div>
                <div class="question">
                    <h3>How can I update the progress of my farming project on your platform?</h3>
                    <p>Once your project is live on our platform, you can regularly update its progress through your dashboard. Upload photos, videos, and written updates to showcase the development of your farming project. This allows investors to stay informed and engaged with your project's journey.</p>
                </div>
                <div class="question">
                    <h3>Are there any fees or charges for posting gigs or hiring additional help?</h3>
                    <p>Posting gigs on our platform is free for farmers. However, there may be a fee associated with hiring additional help, such as agrologists or tech assistants. The specific fee structure will be clearly communicated during the hiring process, ensuring transparency.</p>
                </div>
                <div class="question">
                    <h3>How and when do I get paid for my services?</h3>
                    <p>As an agrologist or tech assistant, you will receive payment for your services based on the agreed terms with the farmer. The payment process is facilitated through our platform, ensuring a secure and transparent transaction. The timing of payment will depend on the specific agreement between you and the farmer, which can vary from project to project.</p>
                </div>
                <div class="question">
                    <h3>Are there any qualifications or certifications required to join as an agrologist or tech assistant?</h3>
                    <p>While specific qualifications or certifications may not be mandatory, having relevant educational background, professional experience, or certifications in the field of agriculture or technology can enhance your profile and increase your chances of being hired.</p>
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