<?php
$db = new DB();
$app = $db->getRows('tbl_application');
?>
<nav class="side-nav">
    <a href="index.php" >
    <?php foreach ($app as $row) { ?>
        <img src="application_imgs/<?php echo $row['logo']?>">
        <!-- <span class="hidden xl:block text-white text-lg ml-3"> ASSET MANAGER </span> -->
        <?php } ?>
    </a>
    <div class="side-nav__devider my-6"></div>
    <ul>
        <li>
            <a href="index.php" class="side-menu" id="dashboard">
                <div class="side-menu__icon"> <i data-lucide="home"></i> </div>
                <div class="side-menu__title">
                    DASHBOARD
                </div>
            </a>

        </li>
        <li>
            <a href="assets.php" class="side-menu " id="assets">
                <div class="side-menu__icon"> <i data-lucide="list"></i> </div>
                <div class="side-menu__title">
                    ASSETS
                </div>
            </a>

        </li>
        <li>
            <a href="components.php" class="side-menu " id="components">
                <div class="side-menu__icon"> <i data-lucide="layers"></i> </div>
                <div class="side-menu__title"> COMPONENTS </div>
            </a>
        </li>
        <li>
            <a href="maintenance.php" class="side-menu" id="maintenance">
                <div class="side-menu__icon"> <i data-lucide="sliders"></i> </div>
                <div class="side-menu__title"> MAINTENANCES </div>
            </a>
        </li>
        <li>
            <a href="asset-types.php" class="side-menu" id="asset-types">
                <div class="side-menu__icon"> <i data-lucide="tag"></i> </div>
                <div class="side-menu__title"> ASSET TYPES </div>
            </a>
        </li>
        <li>
            <a href="brand.php" class="side-menu" id="brand">
                <div class="side-menu__icon"> <i data-lucide="home"></i> </div>
                <div class="side-menu__title"> BRANDS </div>
            </a>
        </li>
        <li>
            <a href="supplier.php" class="side-menu" id="supplier">
                <div class="side-menu__icon"> <i data-lucide="shopping-cart"></i> </div>
                <div class="side-menu__title"> SUPPLIERS </div>
            </a>
        </li>
        <li>
            <a href="location.php" class="side-menu" id="location">
                <div class="side-menu__icon"> <i data-lucide="map-pin"></i> </div>
                <div class="side-menu__title"> LOCATIONS </div>
            </a>
        </li>
        <li>
            <a href="employee.php" class="side-menu" id="emp">
                <div class="side-menu__icon"> <i data-lucide="users"></i> </div>
                <div class="side-menu__title"> EMPLOYEES </div>
            </a>
        </li>
        <li>
            <a href="department.php" class="side-menu" id="dep">
                <div class="side-menu__icon"> <i data-lucide="flag"></i> </div>
                <div class="side-menu__title"> DEPARTMENTS </div>
            </a>
        </li>
        <li>
            <a href="report.php" class="side-menu" id="rep">
                <div class="side-menu__icon"> <i data-lucide="clipboard"></i> </div>
                <div class="side-menu__title"> REPORTS </div>
            </a>
        </li>
        <li>
            <a href="javascript:;" class="side-menu">
                <div class="menu__icon"> <i data-lucide="settings"></i> </div>
                <div class="side-menu__title"> SETTINGS <i data-lucide="chevron-down" class="menu__sub-icon "></i></div>
            </a>
            <ul>
                <li>
                    <a href="user.php" class="side-menu" id="user">
                        <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                        <div class="menu__title"> USER </div>
                    </a>
                </li>
                <li>
                    <a href="application.php" class="side-menu" id="application">
                        <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                        <div class="menu__title"> APPLICATION </div>
                    </a>
                </li>
            </ul>
        </li>





    </ul>
</nav>
<!-- END: Side Menu -->