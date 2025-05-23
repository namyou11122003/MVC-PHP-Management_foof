<!-- Promo Bar -->
<div class="promo-bar text-center ">
    <div class="container">
        <i class="bi bi-truck me-2"></i> Free delivery on orders over $50 &nbsp;|&nbsp; <i
            class="bi bi-clock-history me-2"></i> Order before 6 PM for same-day delivery
    </div>
</div>
<!-- Main Navigation -->
<nav class="navbar navbar-expand-lg navbar-light sticky-top z-10">
    <div class="container">
        <!-- Logo -->
        <a class="navbar-brand d-flex align-items-center" href="#">
            <i class="bi bi-flower1 me-2" style="color: var(--primary); font-size: 1.8rem;"></i>
            Fresh<span class="brand-highlight">Harvest</span>
        </a>
        <!-- Mobile Toggle Button -->
        <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarContent">
            <span class="toggler-icon"></span>
            <span class="toggler-icon"></span>
            <span class="toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarContent">
            <!-- Main Menu -->
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link " href="./index.php">Home</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="./shop.php">
                        Shop
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./about.php">About Us</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">Contact</a>
                </li>
            </ul>

            <!-- Right Side - Search and Icons -->
            <div class="d-flex align-items-center gap-2">


                <p class="m-2"><?php echo isset($_SESSION['crs_name']) ? $_SESSION['crs_name'] : ""; ?></p>

                <button class="btn btn-outline-success btn-sm  "> <a
                        class="btn text-decoration-none" href="./login.php">LOGIN</a></button>
                <button class="btn btn-outline-success btn-sm "> <a class="btn text-decoration-none"
                        href="./register.php">Register</a></button>
                <!-- add to card  -->
                <button class="btn  nav-action-btn icon-add" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                    <i class="bi bi-cart3 "></i>
                    <span id="cartCount" class="badge bg-danger cart-badge number-cart">0</span>
                </button>

                <!-- end add to card  -->
            </div>
        </div>
    </div>
</nav>