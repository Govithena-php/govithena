<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="<?php echo IMAGES ?>/favicon.png">

    <link rel="stylesheet" href="<?php echo CSS ?>base.css">
    <link rel="stylesheet" href="<?php echo CSS ?>auth/reset.css">

    <title>Govithena | Reset</title>
</head>


<body>
    <div class="[ signup ]">
        <div class="[ banner ]">
            <img src="<?php echo URLROOT ?>/Webroot/images/bg.jpg" alt="banner" />
            <div class="[ banner__content ]">
                <h1>Invest in the agreculture of Sri Lanka.</h1>
            </div>
        </div>
        <div class="[ content ]">
            <div class="[ logo ]">
                <img src="<?php echo IMAGES ?>/logo.svg" alt="logo" />
                <h2>Govithena</h2>
            </div>

            <div class="[ card ]">
                <div class="[ header ]">
                    <h3>Forgot your password?</h3>
                    <small>Enter the email address associated with your account.</small>
                </div>
                <form class="form" action="<?php echo URLROOT ?>/auth/reset" method="post">
                    <input type="email" name="resetEmail" class="" placeholder="Email">
                    <button type="submit" name="reset" class="button__primary nextBtn">Next</button>
                </form>
            </div>
            <p>Not a member? <a href="<?php echo URLROOT ?>/auth/signup">Sign up</a></p>
        </div>
    </div>
</body>

</html>