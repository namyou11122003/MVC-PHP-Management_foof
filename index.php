<?php
$host = "localhost";
$user = "root";
$password = "";
$dbname = "mangement_food";

$conn = new mysqli($host, $user, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM product";
$result = $conn->query($sql);
$data = [];
if ($result->num_rows > 0) {
    // Step 3: Convert to array
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
    // Step 4: Convert to JSON
    $jsonData = json_encode($data, JSON_PRETTY_PRINT);
    // Step 5: Write to JSON file
    file_put_contents('products.json', $jsonData);
} else {
    echo "No data found.";
} ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fresh Harvest - Organic Food Shop</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css"
        rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./assets/css/client.css">
    <link rel="stylesheet" href="./assets/css/index.css">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/footer.css">
    <style>
        :root {
            /* font-size: 62.5%; */
            --primary-color: rgb(77, 204, 106);
            --secondary-color: rgb(58, 175, 25);
        }

        /* start banner  */
        .hero {
            background-image: linear-gradient(rgba(0, 0, 0, 0.3),
                    rgba(0, 0, 0, 0.3)),
                url("./promo-3.png");
            background-size: cover;
            background-position: center;
            height: 300px;
            border-radius: 10px;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
            text-align: center;
            margin-bottom: 30px;
        }

        .hero {
            background-image: linear-gradient(rgba(0, 0, 0, 0.3),
                    rgba(0, 0, 0, 0.3)),
                url("./image copy.png");
            background-size: cover;
            background-position: center;
            height: 300px;
            border-radius: 10px;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
            text-align: center;
            margin-bottom: 30px;
        }

        .hero-content h2 {
            font-size: 36px;
            margin-bottom: 15px;
        }

        .hero-content p {
            font-size: 18px;
            margin-bottom: 20px;
        }

        .btn-green {
            background-color: var(--primary-color);
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 16px;
        }

        .btn-green:hover {
            background-color: var(--secondary-color);
        }

        /* end of banner  */
        /* menu plural  */
        .menu-modern {
            padding: 3rem;
            display: grid;
            justify-content: center;
            grid-template-columns: repeat(auto-fit, minmax(300px, 350px));
        }

        .promot {
            color: black;
            font-size: 2rem;
            z-index: 2;
        }

        .txt {
            margin-top: 1rem;
            z-index: 2;
            color: grey;
            font-size: 1rem;
        }

        .food-modern {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            padding: 0 2rem;
            width: 300px;
            height: 500px;
            box-shadow: 1px 1px 1px 1px rgb(185, 182, 182);
            position: relative;
        }

        .image {
            width: 200px;
            height: 200px;
            position: relative;
            z-index: 2;
            margin-top: 2rem;
        }

        .image>img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .food-modern::after {
            content: "";
            height: 100%;
            width: 100%;
            position: absolute;
            bottom: 0;
            left: 0;
            z-index: 0;
            background-color: rgb(236, 154, 12);
            clip-path: polygon(0 85%, 100% 55%, 100% 100%, 0% 100%);
            transition: clip-path 0.2s ease-in-out;
        }

        .food-modern:hover::after {
            clip-path: polygon(0 0, 100% 0, 100% 100%, 0% 100%);
        }

        .food-modern:hover>.promot,
        .food-modern:hover>p {
            color: white;
        }

        /* end of menu plural  */
        .menu-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            height: 100%;
        }

        .menu-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        .img {
            padding: 5px;
            margin: 0 auto;
            /* width: 230px; */
            height: 200px;
            object-fit: cover;
        }

        .price {
            color: #ff7700;
            font-weight: bold;
            font-size: 1.2rem;
        }

        .category-badge {
            background-color: #f8f9fa;
            color: #6c757d;
            font-size: 0.8rem;
            padding: 0.3rem 0.6rem;
            border-radius: 15px;
            display: inline-block;
            margin-bottom: 0.5rem;
        }

        .add-to-cart-btn {
            background-color: #3498db;
            border: none;
            transition: background-color 0.3s ease;
        }

        .add-to-cart-btn:hover {
            background-color: #2980b9;
        }

        @media (max-width: 767px) {
            .card-img-top {
                height: 150px;
            }
        }

        .btn-container {
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 0.5rem;
            overflow-x: auto;
            padding: 1rem;
        }

        /* Make sure the flex item (button) shows from beginning not centre */
        @media screen and (max-width: 900px) {
            .btn-container {
                justify-content: flex-start;
            }
        }

        /* Hide Scroll bar */
        .btn-container::-webkit-scrollbar {
            display: none;
        }

        .btn-container>button {
            flex: 0 0 auto;
            border: none;
            /* outline: none; */
            /* outline: 0.1px solid gray; */
            background-color: transparent;
            background-color: rgba(255, 255, 255, 0.5);
            padding: 0.5rem 2rem;
            border-radius: 10px;
            color: black;
            font-size: 1rem;
            cursor: pointer;
        }

        .btn-container>button:focus {
            background-color: var(--primary-color);
            box-shadow: 0 0 15px 0px rgb(235, 235, 235);
        }
    </style>
</head>

<body>
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
                        <a class="nav-link dropdown-toggle" href="#" id="shopDropdown" role="button"
                            data-bs-toggle="dropdown">
                            Shop
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About Us</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                </ul>

                <!-- Right Side - Search and Icons -->
                <div class="d-flex align-items-center">
                    <!-- Search bar -->
                    <div class="search-bar me-2">
                        <i class="bi bi-search search-icon"></i>
                        <input class="form-control search-input" type="search" placeholder="Search products..."
                            aria-label="Search" type="text" id="searchInput" placeholder="Search for food or drinks...">

                    </div>
                    <!-- User Account -->
                    <a href="./login.php" class="nav-action-btn"> <i class="bi bi-person"></i>
                    </a>
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
    <!-- banner  -->
    <section class="hero container mt-3 ">
        <div class="hero-content">
            <h2>Fresh Produce Delivered to Your Door</h2>
            <p>Farm-fresh vegetables and fruits with same-day delivery</p>
            <button class="btn-green">Shop Now</button>
        </div>
    </section>
    <!-- end of banner  -->
    <!-- menu plural -->
    <!-- container card  -->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title  " id="offcanvasRightLabel">Your Card</h5>
            <hr>
        </div>
        <div class="offcanvas-body d-flex flex-column justify-content-between ">
            <div class="offcanvas-content  " id="cardItem">
                <div class="card-item d-flex justify-content-between align-items-center mb-3">
                    <!-- <img src="./promo-3.png" alt="Product Image" class="img-fluid" style="width: 50px; height: 50px;">
                    <div class="product-details d-flex gap-5 alight-items-center mt-3">
                        <p class="product-name tex">coca</->
                        <p class="product-price">$10.50</p>
                    </div>
                    <div class="quantity d-flex align-items-center gap-2">
                        <button class="btn btn-secondary btn-sm" id="btn-decrease">
                            < </button>
                                <span class="quantity-value">1</span>
                                <button class="btn btn-secondary btn-sm" id="btn-increase">></button>
                                <button class="btn btn-danger remove-btn btn-sm" id="btn-remove">Remove</button>
                    </div> -->
                </div>

            </div>
            <div class="offcanvas-footer ">
                <h5 class="total-price" id="total">Total: ៛ <strong id="totalPayment">0</strong> </h5>
                <div class="d-flex justify-content-between align-items-center">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="offcanvas"
                        aria-label="Close">Close</button>

                    <button class="btn btn-primary checkout-btn" id="btncheckout"><a
                            class="text-decoration-none text-light" href="">Checkout</a></button>
                </div>

            </div>
        </div>
    </div>


    <div class="container py-2">
        <div class="btn-container">
            <button class="btn-category">All</button>
        </div>
        <div class="container-card row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
            <!-- <div class="col">
                <div class="card menu-card border-0 shadow-sm">
                    <img src="./image copy 2.png" class="img" alt="Breakfast Burrito" />
                    <div class="card-body">
                        <h5 class="card-title">Breakfast Burrito</h5>
                        <p class="price mb-1">$10.50</p>
                        <span class="category-badge mb-3">Breakfast</span>
                        <button class="btn add-to-cart-btn text-white mt-auto w-100">
                            Add to Cart
                        </button> -->

        </div>
    </div>
    <div class="hero-section ">
        <h3 class="text-center">Menu Popular</h3>
        <section class="menu-modern"></section>
    </div>
    </div>
    </div>
    </div>

    <!-- start footer  -->
    <!-- Responsive Footer Markup -->
    <div class="container-footer py-4" style="background-color: #f8f9fa;">
        <!-- Main Content Section -->
        <div class="content-section d-flex flex-wrap justify-content-between align-items-start mb-4">
            <!-- Left Section - Logo and About -->
            <div class="left-section mb-3" style="flex: 1 1 300px;">
                <!-- Add your logo or about content here -->
                <h3 class="section-title">About Us</h3>
                <p>We deliver fresh produce right to your doorstep. Learn more about our story and what makes us
                    special.</p>
            </div>

            <!-- Middle Section - Contact Info -->
            <div class="middle-section mb-3" style="flex: 1 1 300px;">
                <h3 class="section-title">Contact Info</h3>
                <p class="contact-info">0964563693</p>
                <p class="contact-info">namyou854@gmail.com</p>
                <p class="contact-info">st 1982 Sensok, PP</p>
                <div class="social-icons">
                    <a href="#" class="social-icon me-2"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social-icon me-2"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="social-icon me-2"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="social-icon"><i class="fab fa-pinterest"></i></a>
                </div>
            </div>

            <!-- Right Section - Opening Hours -->
            <div class="right-section mb-3" style="flex: 1 1 300px;">
                <h3 class="section-title">Opening Hours</h3>
                <p>Monday - Friday: 08:00 - 22:00</p>
                <p>Saturday: 10:00 - 16:00</p>
            </div>
        </div>

        <!-- Booking Form -->

        <!-- Delivery Image -->
        <div class="delivery text-center mb-3">
            <img src="./delivery-boy.svg" alt="delivery" class="img-fluid" style="max-width: 200px;">
        </div>

        <!-- Copyright -->
        <div class="copyright text-center">
            ©2025 Coding with Group 1. All Rights Reserved.
        </div>
    </div>

    <!-- end footer -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="./script.js">
    </script>

</body>

</html>


<script>

</script>