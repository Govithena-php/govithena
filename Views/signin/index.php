<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="Webroot/css/signin.css">

    <title>Govithena | Sign In</title>
</head>

<body>
    <div class="container">
        <div class="banner">
            <img src="Webroot/images/bg.jpg" alt="banner" />
        </div>
        <div class="content">

            <?php
            // if (isset($signin)) print_R($signin);
            ?>

            <div class="card">
                <div class="card_header">
                    <h1>Sign In</h1>
                    <small>Welcome back!</small>
                </div>

                <form class="card_body" action="<?php echo URLROOT ?>/signin/test" method="POST">

                    <input class="text_input" type="text" name="username" id="email" placeholder="Email or Phone Number">
                    <input class="text_input" type="password" name="password" id="password" placeholder="Password">
                    <div class="remember_me">
                        <div>
                            <input type="checkbox" name="remember_me" id="remember_me">
                            <label for="remember_me">Remember me</label>
                        </div>
                        <a href="#">Forgot Password?</a>
                    </div>
                    <input class="btn" type="submit" signy value="Sign In" name="login_btn">
                    <p>Not a member? <a href="./signup">Signup now</a></p>
                </form>
            </div>
        </div>
    </div>



</body>

</html>