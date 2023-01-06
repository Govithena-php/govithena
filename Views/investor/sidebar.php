<link rel="stylesheet" href="<?php echo CSS ?>/dashboardNav/dashboardNav.css" type="text/css">

<!-- <?php if (isset($active)) echo $active; ?> -->
<nav class="[ nav ]">
    <div class="[ container ]" container-type="dashboard-section">
        <div class="[ open__btn ]">
            <button onclick="openSidebar()">
                <i class="fa-solid fa-bars"></i>
            </button>
        </div>

        <button onclick="toggleProfileMenu()">
            <div class="[ image ]">
                <img src="<?php echo IMAGES ?>/21.jpg" alt="profile">
            </div>
        </button>
    </div>
</nav>

<aside class="[ sidebar ]">


    <a class="[ logo ]" href="<?php echo URLROOT ?>">
        <img src="<?php echo IMAGES ?>/logo.svg" alt="logo">
        <!-- <p>Govithena</p> -->
        <div class="[ action__btn ]">
            <button onclick="closeSidebar()">&times;</button>
        </div>
    </a>

    <div class="[ links ]">
        <ul>
            <li>
                <a href="./" class="[ link ]">
                    <i class="fa-solid fa-gauge"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li>
                <a href="./myinvestments" class="[ link ]">
                    <i class="[ fa-solid fa-sack-dollar ]"></i>
                    <p>My Investments</p>
                </a>
            </li>
            <li>
                <a href="./myfarmers" class="[ link ]">
                    <i class="[ fa-solid fa-tractor ]"></i>
                    <p>Farmers</p>
                </a>
            </li>
            <li>
                <a href="./myrequests" class="[ link ]">
                    <i class="[ fa-solid fa-tractor ]"></i>
                    <p>My Request</p>
                </a>
            </li>
        </ul>
        <div class="[ grow ]"></div>
        <ul>
            <li>
                <a href="./" class="[ link ]">
                    <i class="[ fa-solid fa-user-tie ]"></i>
                    <p>My Account</p>
                </a>
            </li>
            <li>
                <a href="./myinvestments" class="[ link ]">
                    <i class="[ fa-solid fa-circle-question ]"></i>
                    <p>Help</p>
                </a>
            </li>
            <li>
                <a href="./myfarmers" class="[ link ]">
                    <i class="[ fa-solid fa-gear ]"></i>
                    <p>Settings</p>
                </a>
            </li>
        </ul>

    </div>
</aside>