<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="<?php echo IMAGES ?>/favicon.png">

    <!-- <link rel="stylesheet" href="<?php echo URLROOT ?>/Webroot/css/ui.css"> -->
    <!-- <link rel="stylesheet" href="<?php echo URLROOT ?>/Webroot/css/signin.css"> -->

    <link rel="stylesheet" href="<?php echo CSS ?>base.css">
    <link rel="stylesheet" href="<?php echo CSS ?>auth/signin.css">

    <title>Govithena | Sign In</title>
</head>

<body>
    <div class="[ login ]">
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
                    <h1>Welcome back!</h1>
                    <small>Sign In</small>
                </div>
                <form class="[ form ]" action="" method="POST">
                    <div class="[ alert ] <?php if ($error) echo "show"; ?>">
                        <p>Invalied email or password</p>
                    </div>
                    <input class="<?php if ($error) echo "error"; ?>" type="email" name="email" id="email" placeholder="Email or Phone Number" required>
                    <input class="<?php if ($error) echo "error"; ?>" type="password" name="password" id="password" placeholder="Password" required>
                    <div class="[ remember__me ]">
                        <div>
                            <input type="checkbox" name="remember_me" id="remember_me">
                            <label for="remember__me">Remember me</label>
                        </div>
                        <a href="#">Forgot Password?</a>
                    </div>
                    <input type="submit" signy value="Sign In" name="login_btn">
                </form>
            </div>
            <p>Not a member? <a href="<?php echo URLROOT ?>/auth/signup">Signup now</a></p>
        </div>
    </div>
</body>






<!-- 
<body>
    <div class="login__container">


        <div class="banner">
            <img src="<?php echo URLROOT ?>/Webroot/images/bg.jpg" alt="banner" />
        </div>
        <div class="content">

            <div class="logo">
                <img src="<?php echo IMAGES ?>/logo.svg" alt="logo" />
                <h2>Govithena</h2>
            </div>

            <div class="card">
                <?php
                if (isset($msg)) { ?>
                    <div class="alert">
                        <p><?php echo $msg ?></p>
                    </div>
                <?php
                }
                // echo $request->params;
                ?>
                <div class="card_header">
                    <h1>Sign In</h1>
                    <small>Welcome back!</small>
                </div>

                <form class="card_body" action="" method="POST">

                    <input class="text_input" type="email" name="email" id="email" placeholder="Email or Phone Number">
                    <input class="text_input" type="password" name="password" id="password" placeholder="Password">
                    <div class="remember_me">
                        <div>
                            <input type="checkbox" name="remember_me" id="remember_me">
                            <label for="remember_me">Remember me</label>
                        </div>
                        <a href="#">Forgot Password?</a>
                    </div>
                    <input class="btn" type="submit" signy value="Sign In" name="login_btn">
                    <p>Not a member? <a href="<?php echo URLROOT ?>/auth/signup">Signup now</a></p>
                </form>
            </div>
        </div>
    </div>



</body> -->

</html>