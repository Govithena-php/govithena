<?php

$currentUser = Session::get('user');

function highlight($active, $link)
{
    if (isset($active)) {
        if ($active == $link) {
            echo "active";
        } else {
            echo "";
        }
    }
}

?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">

<link rel="stylesheet" href="<?php echo CSS ?>/dashboard/navigator.css" type="text/css">

<nav class="[ nav ]">
    <div class="[ container ]" container-type="dashboard-navbar">
        <div class="[ logo ]">
            <a href="<?php echo URLROOT ?>/">
                <img src="<?php echo IMAGES ?>/logo.svg" alt="logo">
                <p>Govithena</p>
            </a>
        </div>
        <div class="[ open__btn ]">
            <button onclick="openSidebar()">
                <i class="fa-solid fa-bars"></i>
            </button>
        </div>
        <?php
        if (isset($title)) {
        ?>
            <p class="[ page__title ]"><?php echo $title; ?></p>
        <?php
        }
        ?>

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
                            <img src="<?php echo UPLOADS . '/' . Session::get('user')->getImage(); ?>" alt="profile">
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
                                <i class="bi bi-columns-gap"></i>
                                Dashboard
                            </a></li>
                        <li><a onclick="toggleProfileMenu()" href="<?php echo URLROOT ?>/profile">
                                <i class="bi bi-person"></i>Profile</a></li>
                        <li><a onclick="toggleProfileMenu()" href="<?php echo URLROOT ?>/signout">
                                <i class="bi bi-gear-wide-connected"></i>Settings</a>
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

<aside class="[ sidebar ]">

    <div class="[ logo ]">
        <a href="<?php echo URLROOT ?>/">
            <img src="<?php echo IMAGES ?>/logo.svg" alt="logo">
        </a>
        <div class="[ action__btn ]">
            <button onclick="closeSidebar()">&times;</button>
        </div>
    </div>

    <div class="[ links ]">
        <ul>
            <li>
                <a href="<?php echo URLROOT ?>/tech/dashboard" class="<?php highlight($active, "dashboard") ?>">
                    <i class="bi bi-columns-gap"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li>
                <a href="<?php echo URLROOT ?>/tech/requests" class="<?php highlight($active, "requests") ?>">
                    <i class="bi bi-card-heading"></i>
                    <p>Requests</p>
                </a>
            </li>
            <li>
                <a href="<?php echo URLROOT ?>/tech/farmers" class="<?php highlight($active, "farmers") ?>">
                    <i class="bi bi-tree"></i>
                    <p>Farmers</p>
                </a>
            </li>
            <li>
                <a href="<?php echo URLROOT ?>/tech/earnings" class="<?php highlight($active, "earnings") ?>">
                    <i class="bi bi-currency-dollar"></i>
                    <p>Earnings</p>
                </a>
            </li>
            <li>
                <a href="<?php echo URLROOT ?>/tech/withdrawal" class="<?php highlight($active, "withdrawal") ?>">
                    <i class="bi bi-wallet"></i>
                    <p>Withdrawal</p>
                </a>
            </li>
        </ul>
        <div class="[ grow ]"></div>
        <ul>
            <li>
                <a href="<?php echo URLROOT ?>/account" class="<?php highlight($active, "myaccount") ?>">
                    <i class="bi bi-person"></i>
                    <p>My Account</p>
                </a>
            </li>
            <li>
                <a href="<?php echo URLROOT ?>/help" class="<?php highlight($active, "help") ?>">
                    <i class="bi bi-patch-question"></i>
                    <p>Help</p>
                </a>
            </li>
            <li>
                <a href="<?php echo URLROOT ?>/settings" class="<?php highlight($active, "settings") ?>">
                    <i class="bi bi-gear-wide-connected"></i>
                    <p>Settings</p>
                </a>
            </li>
        </ul>

    </div>
</aside>