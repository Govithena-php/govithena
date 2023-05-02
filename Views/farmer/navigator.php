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
            <button onclick="toggleSidebar()">
                <i class="fa-solid fa-bars"></i>
            </button>
        </div>

        <?php
        if (isset($title)) {
        ?>
            <p class="[ page__title ]">
                <?php echo $title; ?>
            </p>
        <?php
        }
        ?>

        <div class="[ profile ]">
            <?php if (isset($currentUser)) { ?>
                <div class="[ buttons ]">
                    <div class="[ notification ]">
                        <button onclick="toggleNotificationMenu()">
                            <i class="bi bi-bell"></i>
                            <?php
                            $notificationCount = 4;
                            if (isset($notificationCount)) {
                            ?>
                                <span>
                                    <?php echo $notificationCount ?>
                                </span>
                            <?php
                            }
                            ?>
                        </button>
                    </div>

                    <span></span>

                    <button onclick="toggleProfileMenu()">
                        <div class="[ image ]">
                            <!-- locahost/webroot/Uploads/tharasara.png -->
                            <img src="<?php echo UPLOADS . '/' . Session::get('user')->getImage(); ?>" alt="profile">
                        </div>
                    </button>
                </div>


                <div id="notification_menu" open="false" class="menu notification_menu ">
                    <div class="[ notification_message ]">
                        <?php
                        foreach ($notifications as $notification) {
                        ?>
                            <a>
                                <?php echo $notification['message']; ?>

                            </a>
                            <hr>
                        <?php
                        }
                        ?>
                        <!-- <small>
                                <?php echo $currentUser->getType() ?>
                            </small> -->
                    </div>
                    <!-- <ul>
                            <li><a onclick="toggleNotificationMenu()" href="<?php echo URLROOT ?>/dashboard/">
                                    <i class="[ fa-solid fa-gauge ]"></i>Dashboard
                                </a></li>
                            <li><a onclick="toggleNotificationMenu()" href="<?php echo URLROOT ?>/profile">
                                    <i class="[ fa-solid fa-user-tie ]"></i>Profile</a></li>
                            <li><a onclick="toggleNotificationMenu()" href="<?php echo URLROOT ?>/signout">
                                    <i class="[ fa-solid fa-gear ]"></i>Settings</a>
                            </li>
                        </ul> -->
                    <!-- <a onclick="toggleNotificationMenu()" href="<?php echo URLROOT ?>/auth/signout">
                            <i class="fa-solid fa-right-from-bracket"></i>Sign Out</a> -->
                </div>




                <div id="profile_menu" open="false" class="[ menu ]">
                    <div class="[ profile__name ]">
                        <h3>
                            <?php echo $currentUser->getFirstName() ?>
                        </h3>
                        <small>
                            <?php echo $currentUser->getType() ?>
                        </small>
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

<aside class="[ sidebar ]">

    <div class="[ logo ]">
        <a href="<?php echo URLROOT ?>/">
            <h2>Govithena</h2>
            <img src="<?php echo IMAGES ?>/logo.svg" alt="logo">
        </a>
    </div>

    <div class="[ links ]">
        <ul>
            <li>
                <a href="<?php echo URLROOT ?>/farmer/" class="<?php highlight($active, "dashboard") ?>">
                    <i class="bi bi-columns-gap"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li>
                <a href="<?php echo URLROOT ?>/farmer/" class="<?php highlight($active, "gigs") ?>">
                    <i class="bi bi-egg-fried"></i>
                    <p>Gigs</p>
                </a>
            </li>
            <li>
                <a href="<?php echo URLROOT ?>/farmer/investors" class="<?php highlight($active, "investors") ?>">
                    <i class="bi bi-card-heading"></i>
                    <p>Investment Requests</p>
                </a>
            </li>
            <li>
                <a href="<?php echo URLROOT ?>/farmer/agrologist" class="<?php highlight($active, "agrologist") ?>">
                    <i class="bi bi-universal-access-circle"></i>
                    <p>Agrologists</p>
                </a>
            </li>

            <li>
                <a href="<?php echo URLROOT ?>/farmer/techassistantfirst" class="<?php highlight($active, "techassistantfirst") ?>">
                    <i class="bi bi-people"></i>
                    <p>Tech Assistants</p>
                </a>
            <li>
                <a href="<?php echo URLROOT ?>/farmer/gigprogress" class="<?php highlight($active, "progress") ?>">
                    <i class="bi bi-bar-chart"></i>
                    <p>Progress</p>
                </a>
            </li>
        </ul>
        <div class="[ grow ]"></div>
        <ul>
            <li>
                <a href="<?php echo URLROOT ?>/farmer/myaccount" class="<?php highlight($active, "myaccount") ?>">
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
                <a href="<?php echo URLROOT ?>/farmer/settings" class="<?php highlight($active, "settings") ?>">
                    <i class="bi bi-gear"></i>
                    <p>Settings</p>
                </a>
            </li>
        </ul>

    </div>
</aside>