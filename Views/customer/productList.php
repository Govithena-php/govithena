<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="<?php echo IMAGES ?>/favicon.png">

    <title>govithena | dashboard</title>
    <link rel="stylesheet" type="text/css" href="../Webroot/css/productList.css">
    <link rel="stylesheet" href="../Webroot/css/ui.css">
    <link rel="stylesheet" href="../Webroot/css/dashHeader.css">
    <link rel="stylesheet" href="../Webroot/css/dashFooter.css">
    <link rel="stylesheet" href="../Webroot/css/dashCustomerOrders.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
</head>

<body class="bg-gray">
    <?php include COMPONENTS . 'dashboard/header.php'; ?>
   
    <script src="<?php echo JS ?>/app.js"></script>


    <div class="container mt-4">

        <div class="card">
            <div >
                <img src="<?php echo IMAGES ?>/productList/tomato.jpeg" alt="Brinjal" style="width:100%;height:210px">
                <div style="background-color: rgba(76, 175, 80, 0.3);padding-bottom:20px">hi</div>
            </div>
            <div class="container">
                <h4><b>John Doe</b></h4> 
                <div class="flex flex-column">
                    <div>100kg</div>
                    <div class="flex flex-row flex-sb-c">
                        <div>Rs.100</div>
                        <div>5 months</div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- <script src="https://kit.fontawesome.com/b8084a92f1.js" crossorigin="anonymous"></script> -->
    <script src="<?php echo JS ?>/customer.js"></script>

</body>

</html>