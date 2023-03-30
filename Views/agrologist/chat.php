<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agrologist | Dashboard</title>
    <link rel="icon" type="image/x-icon" href="<?php echo IMAGES ?>/favicon.png">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>/base.css">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>/grid.css">
    <link rel="stylesheet" href="<?php echo CSS ?>/ui.css">
    <link rel="stylesheet" href="<?php echo CSS ?>/agrologist/chat.css">
    <link rel="stylesheet" href="<?php echo CSS ?>/agrologist/requests.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
</head>

<body class="bg-gray h-screen">
    <?php
    $active = "farmers";
    require_once("navigator.php");
    ?>
    <div class="[ container ][ dashboard ]" container-type="dashboard-section">
        <!-- <h1 class="[ page-heading-1 ]">Chat</h1> -->
        <section class="chat-area">
            <header>
                <!-- <?php echo $messages[0]['image'] ?> -->
                <a href="<?php echo URLROOT . '/agrologist/farmers' ?>" class="back-icon"><i class="fas fa-arrow-left"></i></a>
                <img src="<?php echo UPLOADS . '/' . $messages[0]['image'] ?>" alt="">
                <div class="details">
                    <span>
                    <?php echo $messages[0]['fullName'] ?>
                    </span>
                    <p>
                        Active
                    </p>
                </div>
            </header>
            <div class="chat-box">
                <div class="chat outgoing">
                    <div class="details">
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quae.
                        </p>
                    </div>
                </div>
                <div class="chat incoming">
                    <div class="details">
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quae.
                        </p>
                    </div>
                </div>
                <div class="chat outgoing">
                    <div class="details">
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quae.
                        </p>
                    </div>
                </div>
                <div class="chat incoming">
                    <div class="details">
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quae.
                        </p>
                    </div>
                </div>
                <div class="chat outgoing">
                    <div class="details">
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quae.
                        </p>
                    </div>
                </div>
                <div class="chat incoming">
                    <div class="details">
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quae.
                        </p>
                    </div>
                </div>
                <div class="chat outgoing">
                    <div class="details">
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quae.
                        </p>
                    </div>
                </div>
                <div class="chat incoming">
                    <div class="details">
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quae.
                        </p>
                    </div>
                </div>
                <div class="chat outgoing">
                    <div class="details">
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quae.
                        </p>
                    </div>
                </div>
                <div class="chat incoming">
                    <div class="details">
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quae.
                        </p>
                    </div>
                </div>
                <div class="chat outgoing">
                    <div class="details">
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quae.
                        </p>
                    </div>
                </div>
                <div class="chat incoming">
                    <div class="details">
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quae.
                        </p>
                    </div>
                </div>
            </div>
            <form action="#" class="typing-area">  
                <input type="text" class="input-field" placeholder="Type a message here...">
                <button><i class="fab fa-telegram-plane"></i></button>
            </form>
        </section>
        <?php require "footer.php"; ?>
        <script src="<?php echo JS ?>/agrologist/chat.js"></script>

</body>

</html>