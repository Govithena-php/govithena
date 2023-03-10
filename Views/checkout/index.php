<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>

    <link rel="icon" type="image/x-icon" href="<?php echo IMAGES ?>/favicon.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
    <link rel="stylesheet" href="<?php echo CSS ?>base.css">
    <link rel="stylesheet" href="<?php echo CSS ?>grid.css">
    <link rel="stylesheet" href="<?php echo CSS ?>checkout/index.css">
    <style>
        .logo {
            background-color: var(--clr-dark, #000);
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem 5em;
            color: var(--clr-light, #fff);
            font-size: 0.8rem;
        }
    </style>
</head>

<body>
    <div class="[ logo ]">
        <img src="<?php echo IMAGES ?>/logo.svg" alt="logo" />
        <h2>Govithena</h2>
    </div>
    <div class="[ container ]" container-type="section">
        <div class="[ title ]">
            <h2>Checkout</h2>
            <p>Ready to seal the deal? Click checkout!</p>
        </div>
        <div class="[ checkout ]">
            <div class="[ details ]">
                <h2>Bill Summary</h2>
                <div class="[ grid ]" gap="2" md="2">
                    <div class="[ image ]">
                        <img src="<?php echo IMAGES ?>/temp/2.jpg" alt="">
                    </div>
                    <div class="[ content ]">
                        <h2><?php echo $res['title'] ?></h2>
                        <!-- <h4>by<?php echo $res['firstName'] . ' ' . $res['lastName'] ?></h4> -->
                        <p><?php echo $res['description'] ?></p>
                        <div class="[ grid ]" md="3">
                            <p><small>Offer:</small><br>LKR <?php echo $res['offer'] ?></p>
                            <p><small>Time period:</small><br><?php echo $res['timePeriod'] ?> Months</p>
                            <p><small>Location:</small><br><?php echo $res['location'] ?></p>
                        </div>

                    </div>

                </div>
                <div class="[ grid ]" md="2">
                    <div class="[ farmer__details ]">
                        <h3>Farmer Details</h3>
                        <div class="[ grid ]" md="2">
                            <p><small>First Name:</small><br><?php echo $res['firstName'] ?></p>
                            <p><small>Last Name:</small><br><?php echo $res['lastName'] ?></p>
                            <p><small>Location:</small><br><?php echo $res['location'] ?></p>
                        </div>
                    </div>
                    <!-- <div class="[ shipping__address ]">
                        <h3>Shipping Address</h3>
                        <div class="[ grid ]" md="2">
                            <p>First Name: <br><?php echo $res['firstName'] ?></p>
                            <p>Last Name: <br><?php echo $res['lastName'] ?></p>
                            <p>Location: <br><?php echo $res['location'] ?></p>
                        </div>
                    </div> -->
                </div>
            </div>
            <div class="[ checkout__box ]">
                <h3>Payment Summary</h3>
                <div class="[ flex-row-space-between ]">
                    <p>From</p>
                    <p>02/02/2022</p>
                </div>
                <div class="[ flex-row-space-between ]">
                    <p>Till</p>
                    <p>02/01/2023</p>
                </div>
                <div class="[ flex-row-space-between ]">
                    <p>Ammount</p>
                    <p>LKR <?php echo $res['capital'] ?></p>
                </div>
                <div class="[ flex-row-space-between ]">
                    <p>Convention fee</p>
                    <p>LKR 1000</p>
                </div>
                <div class="[ flex-row-space-between ]">
                    <p>Discount</p>
                    <p>-</p>
                </div>
                <hr>
                <div class="[ flex-row-space-between ]">
                    <p>Total</p>
                    <p>LKR <?php echo $res['capital'] ?></p>
                </div>

                <div class="[ flex-row-center ]">
                    <p>I have read and agree to the website terms and conditions.</p>
                </div>
                <!-- <div class="[ flex-row-center ]">
                    <button id="pay" name="pay" value="<?php echo $res['requestId'] ?>" class="[ btn ]">Pay</button>
                </div> -->
                <form class="[ flex-row-center ]" action="<?php echo URLROOT; ?>/checkout/pay" method="post">
                    <button type="submit" name="pay" value="<?php echo $res['requestId'] ?>" class="[ btn ]">Pay</button>
                </form>
            </div>
        </div>
        <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>
        <script>
            const payment = <?php echo json_encode($payment) ?>;


            payhere.onCompleted = function onCompleted(orderId) {
                alert("Payment completed. OrderID:" + orderId);
            };
            payhere.onDismissed = function onDismissed() {
                alert("Payment dismissed");
            };

            payhere.onError = function onError(error) {
                alert("Error:" + error);
            };

            document.getElementById('pay').onclick = function(e) {
                console.log("test");
                payhere.startPayment(payment);
            };
        </script>
        <script src="<?php echo JS ?>navbar/navbar.js"></script>
</body>

</html>