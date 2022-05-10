<?php 
    $url = $_SERVER['REQUEST_URI'];
    $url = explode('/', $url);
    $url = explode('.', $url[2]);
?>
<!-- navbar -->
<nav class="navbar navbar-expand-lg navbar-dark fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand my-1 logo-absolute mx-md-5" href="index.php"><img src="upload/logo1.jpg" class="" alt=""
                style="width:40px; height:40px;"> </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- menu -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item menu-custom mx-2">
                    <a class="nav-link text-white <?= $url[0] == '' || $url[0] == 'index' ? 'active-menu-custom' : '' ?> "
                        aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item menu-custom mx-2">
                    <a class="nav-link text-white <?= $url[0] == 'control' ? 'active-menu-custom' : '' ?>
            " href="control.php">Control</a>
                </li>
                <li class="nav-item menu-custom mx-2">
                    <div class="bg-white h-100" style="width:1px"></div>
                </li>
                <?php if(isset($_SESSION['username_id']) & !empty($_SESSION['username_id'])): ?>
                <li class="nav-item menu-custom mx-2">
                    
                    <div class="dropdown">
                        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <?=$_SESSION['username_login']?>
                        </a>

                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <li><a class="dropdown-item" href="?page=profile">Account</a></li>
                            <li><a class="dropdown-item" href="settings.html">Settings</a></li>
                            <li>
                                <hr class="dropdown-divider" />
                            </li>
                            <li><a class="dropdown-item" href="?page=logout">Log Out</a></li>
                        </ul>
                    </div>
                </li>
                <?php else : ?>
                <li class="nav-item menu-custom mx-2">
                    <a class="nav-link text-white <?= $url[0] == 'register' ? 'active-menu-custom' : '' ?> "
                        href="register.php">Register</a>
                </li>
                <li class="nav-item menu-custom mx-2">
                    <a class="nav-link text-white <?= $url[0] == 'login' ? 'active-menu-custom' : '' ?> "
                        href="login.php">Log in</a>
                </li>
                <?php endif; ?>
            </ul>
        </div>
        <!-- menu -->
    </div>
</nav>