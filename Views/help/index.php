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
    <link rel="stylesheet" href="<?php echo CSS ?>help/index.css">
</head>

<body>
    <?php require_once(COMPONENTS . 'navbar.php'); ?>

    <div class="[ container ][ help ]" container-type="section">
        <div class="hero">
            <h1>How Can I Help You?</h1>
            <p>Got a burning question? Let us help you put out the fire. Our team is ready and waiting to assist you.</p>
            <button class="button__primary"><i class="bi bi-plus"></i> Question</button>
        </div>
    </div>

    <?php require_once(COMPONENTS . 'footer.php'); ?>
    <script src="<?php echo JS ?>/navbar/navbar.js"></script>
</body>

</html>