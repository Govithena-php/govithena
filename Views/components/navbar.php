<?php
$currentUser = Session::get('user');
?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">

<link rel="stylesheet" href="<?php echo CSS ?>/navbar/navbar.css">

<nav>
    <div class="[ container navbar ]" continer-type="navbar">
        <div class="[ toggle__icon ]">
            <button onclick="openSidebar()">
                <i class="fas fa-bars"></i>
            </button>
        </div>

        <div class="[ logo ]">
            <a href="<?php echo URLROOT ?>">
                <img src="<?php echo IMAGES ?>/logo.svg" alt="logo">
            </a>
        </div>

        <div class="[ menu ]">
            <!-- <ul>
                <li><a href="<?php echo URLROOT ?>/home/about">About Us</a></li>
                <li><a href="<?php echo URLROOT ?>/home/services">Services</a></li>
                <li><a href="<?php echo URLROOT ?>/home/contact">Contact Us</a></li>
            </ul> -->
        </div>

        <div class="[ profile ]">
            <?php if (isset($currentUser)) { ?>
                <div class="[ buttons ]">
                    <div class="[ notification ]">
                        <button>
                            <i class="bi bi-bell"></i>
                            <?php
                            $notificationCount = 4;
                            if (isset($notificationCount)) {
                            ?>
                                <span><?php echo $notificationCount ?></span>
                            <?php
                            }
                            ?>
                        </button>
                    </div>

                    <span></span>

                    <button onclick="toggleProfileMenu()">
                        <div class="[ image ]">
                            <?php
                            ?>
                            <img src="<?php echo UPLOADS . 'profilePictures/' . Session::get('user')->getImage(); ?>" alt="profile">
                        </div>
                    </button>
                </div>

                <div id="profile_menu" open="false" class="[ menu ]">
                    <div class="[ profile__name ]">
                        <h3><?php echo $currentUser->getFirstName() ?></h3>
                        <small><?php echo $currentUser->getType() ?></small>
                    </div>
                    <ul>
                        <li><a onclick="toggleProfileMenu()" href="<?php echo URLROOT ?>/dashboard/">
                                <i class="bi bi-columns-gap"></i>Dashboard
                            </a></li>
                        <li><a onclick="toggleProfileMenu()" href="<?php echo URLROOT ?>/account">
                                <i class="bi bi-person"></i>My Account</a></li>
                        <li><a onclick="toggleProfileMenu()" href="<?php echo URLROOT ?>/settings">
                                <i class="bi bi-gear"></i>Settings</a>
                        </li>
                    </ul>
                    <a onclick="toggleProfileMenu()" href="<?php echo URLROOT ?>/auth/signout">
                        <i class="bi bi-box-arrow-right"></i>Sign Out</a>
                </div>

            <?php } else { ?>
                <div class="[ signin__join ]">
                    <ul>
                        <li><a class="[ signin_btn ]" href="<?php echo URLROOT ?>/auth/signin">Sign In</a></li>
                        <li><a class="[ join_btn ]" href="<?php echo URLROOT ?>/auth/signup">Sign Up</a></li>
                    </ul>
                </div>
            <?php } ?>
        </div>
    </div>
</nav>


<div open="false" class="[ mobile__sidebar ]">
    <div class="[ close__btn ]">
        <button onclick="closeSidebar()">
            <i class="fas fa-times"></i>
        </button>
    </div>
    <div class="[ menu ]">
        <ul>
            <li><a href="<?php echo URLROOT ?>/dashboard/">About Us</a></li>
            <li><a href="<?php echo URLROOT ?>/dashboard/">Services</a></li>
            <li><a href="<?php echo URLROOT ?>/dashboard/">Contact Us</a></li>
        </ul>
    </div>
    <div class="[ profile ]">
        <?php if (isset($currentUser)) { ?>
            <ul>
                <li><a class="[ join_btn ]" href="<?php echo URLROOT ?>/auth/signout">Sign Out</a></li>
            </ul>
        <?php } else { ?>
            <div class="[ signin__join ]">
                <ul>
                    <li><a class="[ signin_btn ]" href="<?php echo URLROOT ?>/auth/signin">Sign In</a></li>
                    <li><a class="[ join_btn ]" href="<?php echo URLROOT ?>/auth/signup">Join</a></li>
                </ul>
            </div>
        <?php } ?>
    </div>
</div>