<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
    <link rel="stylesheet" href="<?php echo CSS ?>base.css">
    <link rel="stylesheet" href="<?php echo CSS ?>grid.css">
    <link rel="stylesheet" href="<?php echo CSS ?>/profile/index.css">
</head>

<body>
    <?php require_once(COMPONENTS . "navbar.php") ?>

    <div class="[ container ][ heading ]" container-type="section">

        <div class="[ heading__content ]">
            <div class="[ cover__img ]">
                <img src="<?php echo IMAGES; ?>temp/radish.jpg" alt="">
            </div>
            <div class="[ cover__content ]">
                <div class="[ profile__img ]">
                    <img src="<?php echo IMAGES; ?>21.jpg" alt="">
                </div>
                <div class="[ grid ]" sm="3" gap="1">
                    <span class="[ profile__back ]"></span>
                    <div class="[ user__details ]">
                        <h1>John Doe</h1>
                        <p>Farmer</p>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                        <p>vegetable</p>
                        <ul>
                            <li><i class="fa fa-phone"></li>
                            <li><i class="fa fa-phone"></li>
                        </ul>
                    </div>
                    <i class="fa fa-bookmark"></i>
                </div>
            </div>
        </div>

        <div class="[ additional__details ]">
            <h2>Additional Details</h2>
            <ul>
                <li>
                    <i class="fa fa-envelope"></i>
                    <div>
                        <p class="[ li__heading ]">Email</p>
                        <p>janithpm@gmail.com</p>
                    </div>
                </li>
                <li>
                    <i class="fa fa-map-marker"></i>
                    <div>
                        <p class="[ li__heading ]">Address</p>
                        <p>No 1, ABC road</p>
                    </div>
                </li>
                <li>
                    <i class="fa fa-building"></i>
                    <div>
                        <p class="[ li__heading ]">City</p>
                        <p>Matara</p>
                    </div>
                </li>
                <li>
                    <i class="fa fa-language"></i>
                    <div>
                        <p class="[ li__heading ]">Language</p>
                        <p>English</p>
                    </div>
                </li>
                <li>
                    <i class="fa fa-tree"></i>
                    <div>
                        <p class="[ li__heading ]">Work History</p>
                        <p>Vegetables, Fruits</p>
                    </div>
                </li>
                <li>
                    <i class="fa fa-calendar"></i>
                    <div>
                        <p class="[ li__heading ]">Join Date</p>
                        <p>2 months ago, on 12/15/2022</p>
                    </div>
                </li>
            </ul>
        </div>

    </div>


    <div class="[ container ]" type="section">
        <h2>Description</h2>
        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Non sapiente quis recusandae rerum, quo id molestias minima! Facilis molestiae facere optio natus beatae deserunt ratione et quo deleniti, consequatur assumenda.</p>
    </div>


    <script type="text/javascript" src="<?php echo JS ?>navbar/navbar.js"></script>
</body>

</html>