<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="Webroot/css/signup.css">
    <title>Govithena | Sign Up</title>
</head>

<body>
    <div class="container">
        <form class="form" action="<?php echo URLROOT; ?>/signup" method="post">
            <input type="text" name="name" class="text_input" placeholder="Name" autocomplete="off">
            <input type="email" name="username" class="text_input" placeholder="Email Address" autocomplete="off">
            <input type="password" name="password" class="form-control" placeholder="Password">
            <button type="submit" name="register_btn" class="btn">Register Account</button>
        </form>
        <h5>Already Have an Account? <a class="register" href="./signin">Login Instead</a></h5>
    </div>
</body>

</html>