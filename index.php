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
            --primary-color: #3fa958;
            --secondary-color: #6b9161;
            --accent-color: #d8d4ce;
            --text-color: #ffffff;

            --round-radius: 100px;
            --lg-radius: 25px;
            --md-radius: 15px;
            --sm-radius: 10px;

            --text-normal: 1.8rem;
            --text-lg: 5rem;
            --text-mdlg: 3.5rem;
            --text-md: 2.3rem;
            --text-sm: 1.5rem;
        }

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
            border-radius: var(--round-radius);
            color: black;
            font-size: 1rem;
            cursor: pointer;
        }

        .btn-container>button:focus {
            background-color: rgba(39, 230, 255, 0.9);
            box-shadow: 0 0 15px 0px rgb(235, 235, 235);
        }

        .store-item {
            width: 30%;
            height: 100%;
            overflow: scroll;
            position: fixed;
            top: 0;
            right: -30%;
            background-color: white;
            z-index: 1000;
            transition: all 0.5s cubic-bezier(0.075, 0.82, 0.165, 1);
        }

        .store-item.add {
            right: 0;
        }

        .card-footer {
            /* position: fixed; */
            position: absolute;
            bottom: 10px;
            right: 0;
            width: 100%;
            padding: 0 1.3rem;
        }

        .card-body {
            padding: 10px;
        }

        .card-body>.items>img {
            width: 50px;
            height: 50px;
            object-fit: cover;
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
    <nav class="navbar navbar-expand-lg navbar-light sticky-top z-2">
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
                    <button class="btn  nav-action-btn" type="button">
                        <i class="bi bi-cart3 icon-add"></i>
                        <span id="cartCount" class="badge bg-danger cart-badge">0</span>
                    </button>

                    <!-- end add to card  -->
                </div>
            </div>
        </div>
    </nav>
    <!-- container card  -->
    <div class="container py-5">
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
                        <button class="btn add-to-cart-btn text-white mt-auto w-100"
                            onclick="addToCart('Breakfast Burrito', 10.50)">
                            Add to Cart
                        </button>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
    <div class="store-item">
        <div class="card-header p-1">
            <h3 class="text-center">Your Card</h3>
        </div>
        <hr>
        <div class="card-body">
            <div class="items d-flex align-items-center justify-content-between">
                <img src="./promo-3.png" alt="">
                <p>prommotion</p>
                <p>$33</p>
                <button class="btn btn-danger btn-sm"> <i class="bi bi-trash icon-remove"></i>
                </button>
            </div>
        </div>
        <div class="card-footer d-flex flex-column justify-content-between ">

            <div class="payment">
                <h5 class="">Total : $<span>15</span></h5>
            </div>
            <div class="d-flex justify-content-between align-items-center w-100">
                <button class="btn btn-danger    btn-md">Close</button>
                <button class="btn btn-warning btn-md">Checkout</button>
            </div>
        </div>

    </div>
    <!-- start footer  -->
    <div class="container-footer">
        <!-- Main Content Section -->
        <div class="content-section">
            <!-- Left Section - Logo and About -->
            <div class="left-section">
                <!-- <div class="logo">Foodie<span>.</span></div> -->
                <!-- <p class="description">
                    Financial experts support or help you to to find out which way you
                    can raise your funds more.
                </p> -->

            </div>

            <!-- Middle Section - Contact Info -->
            <div class="middle-section">
                <h3 class="section-title">Contact Info</h3>
                <p class="contact-info">0964563693</p>
                <p class="contact-info">namyou854@gmail.com</p>
                <p class="contact-info">st 1982 sensok , PP</p>
                <div class="social-icons">
                    <a href="#" class="social-icon"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social-icon"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="social-icon"><i class="fab fa-pinterest"></i></a>
                </div>
            </div>

            <!-- Right Section - Opening Hours -->
            <div class="right-section">
                <h3 class="section-title">Opening Hours</h3>
                <p class="hours-info">Monday-Friday: 08:00-22:00</p>
                <p class="hours-info">Tuesday 4PM: Till Mid Night</p>
                <p class="hours-info">Saturday: 10:00-16:00</p>
            </div>
        </div>

        <!-- Booking Form -->
        <form class="booking-form" method="post">
            <h3 class="form-title">Book a Table</h3>
            <div class="form-row">
                <input type="text" class="form-control" required placeholder="Your Name" name="customer_booking" />
                <input type="email" class="form-control" required placeholder="Email" name="email_customer" />
            </div>
            <div class="form-row">
                <select class="form-control" required name="person">
                    <option>Person</option>
                    <option>1 Person</option>
                    <option>2 Persons</option>
                    <option>3 Persons</option>
                    <option>4 Persons</option>
                </select>
                <input type="date" class="form-control" name="date" />
            </div>
            <div class="form-row">
                <textarea class="form-control" required placeholder="Message" name="message"></textarea>
            </div>
            <button class="btn-book" type="submit" name="booking_table">Book a Table</button>
        </form>
        <div class="delivery">
            <img src="./delivery-boy.svg" alt="delivery" />
        </div>

        <!-- Copyright -->
        <div class="copyright">©2025 coding with Group 1 All Rights Reserved</div>
    </div>
    <!-- end footer -->
    <script src="./script.js">
    </script>
    <script>
        const card = document.querySelector(".icon-add");
        const storeItem = document.querySelector(".store-item");
        card.addEventListener("click", () => {
            storeItem.classList.toggle('add');
        })


    </script>
</body>

</html>
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