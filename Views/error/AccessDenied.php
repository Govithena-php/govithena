<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Govithena | 404</title>

    <link rel="icon" type="image/x-icon" href="<?php echo IMAGES ?>/favicon.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
    <link rel="stylesheet" href="<?php echo CSS ?>/base.css">
    <link rel="stylesheet" href="<?php echo CSS ?>error/pageNotFound.css">

</head>

<body>

    <div class="[ container ]">
        <div class="[ logo ]">
            <img src="<?php echo IMAGES ?>/logo.svg" alt="logo" />
            <h2>Govithena</h2>
        </div>
        <div class="[ row ]">
            <div class="[ img ]">
                <img src="<?php echo IMAGES; ?>/svg/warning.svg" alt="404">
            </div>
            <h1>Access Denied</h1>
            <div class="details">
                <p>We're sorry, but you don't have access to view this page. This could be for a number of reasons, including:
                    You haven't logged in yet, You don't have the necessary permissions or this page is restricted to a certain user group.</p><br>
            </div>
            <button onclick="history.back()">Go Back</button>
        </div>
    </div>
</body>

</html>