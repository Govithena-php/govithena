<nav class="bg-dark text-light ff-poppins fixed nav">
    <div class="flex flex-sb-c nav__container">

        <div class="flex flex-c-c">
            <div class="flex flex-c-c nav__brand">
                <i class="fa fa-plant-wilt"></i>
                <a href="<?php echo URLROOT ?>" class="uppercase fs-5 text-light text-dec-none">govithena</a>
            </div>
            <!-- <ul class="flex flex-c-c nav__menu">
                <li class="nav__menu_item"><a href="#store" class="text-light">Store</a></li>
                <li class="nav__menu_item"><a href="<?php echo URLROOT ?>/customerDashboard/myorders" class="text-light">Customer Dashboard</a></li>
                <li class="nav__menu_item"><a href="#services" class="text-light">Services</a></li>
                <li class="nav__menu_item"><a href="#contact" class="text-light">Contact</a></li>
            </ul> -->
        </div>

        <?php
        if (isset($_SESSION['uid'])) {
        ?>
            <!-- ====================user======================== -->
            <div class="flex flex-c-c gap-2">
                <div class="flex flex-c-c gap-2">
                    <a href="<?php echo URLROOT ?>/signout">
                        <i class="fa fa-arrow-right-from-bracket"></i>
                    </a>
                    <i class="fa fa-bell navbar__i"></i>
                    <i class="fa fa-bag-shopping navbar__i"></i>
                </div>
                <p class="divider">|</p>
                <div class="flex flex-c-c relative nav__profile">
                    <span class="absolute bg-primary"></span>
                    <img src="https://xsgames.co/randomusers/avatar.php?g=male" alt="profile">
                </div>
            </div>
        <?php
        } else {
        ?>
            <!-- ====================guest======================== -->
            <div class="flex flex-c-c ">
                <a href="./signin" class="btn uppercase fs-3 btn-light btn__sign_in">Sign in</a>
                <a href="./signup" class="btn uppercase fs-3 btn-primary btn__sign_up">Sign up</a>
            </div>

        <?php
        }
        ?>
    </div>
</nav>