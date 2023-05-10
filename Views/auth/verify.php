<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="<?php echo IMAGES ?>/favicon.png">

    <link rel="stylesheet" href="<?php echo CSS ?>base.css">
    <link rel="stylesheet" href="<?php echo CSS ?>auth/verify.css">

    <title>Govithena | Verify</title>
</head>


<body>
    <div class="[ signup ]">
        <div class="[ banner ]">
            <img src="<?php echo IMAGES ?>/temp/carrots.jpg" alt="banner" />
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
                    <h3>Verify who you are.</h3>
                    <p>Please enter the OTP that you have received in your email. The OTP is a 6-digit code that was sent to the email address you provided in last step.</p>
                </div>
                <form class="form" action="<?php echo URLROOT ?>/auth/verify" method="post">
                    <label for="otp">One Time Password</label>
                    <input id="otp" required type="number" name="otp" class="" placeholder="6-digit code">
                    <button type="submit" name="verify" class="button__primary nextBtn nextBtn2">Next</button>
                    <p id="countdown-timer">This is a one-time code and it will expires in : <strong>4m 59s</strong></p>
                </form>
            </div>
            <p>Not a member? <a href="<?php echo URLROOT ?>/auth/signup">Sign up</a></p>
        </div>
    </div>
</body>
<script>
    const timer = document.getElementById('countdown-timer');
    let time = 300;

    const countDown = setInterval(() => {
        if (time > 0) {
            time--;
            let minutes = Math.floor(time / 60);
            let seconds = time % 60;
            if (minutes > 0) {
                timer.innerHTML = "This is a one-time code and it will expires in : <strong>" + minutes + "m " + seconds + "s</storng>";
            } else {
                timer.innerHTML = "This is a one-time code and it will expires in : <strong>" + seconds + "s</storng>";
            }

        } else {
            clearInterval(countDown);
            timer.innerHTML = 'This is a one-time code and it will expired. <a class="register" href="<?php echo URLROOT ?>/auth/resend">Resend</a>';

        }
    }, 1000);
</script>

</html>