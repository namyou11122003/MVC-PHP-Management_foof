<?php
include "./include/header.php";
include "./include/navbar.php";
?>

<!-- banner  -->
<section class="hero container mt-3 ">
    <div class="hero-content">
        <h2>Fresh Produce Delivered to Your Door</h2>
        <p>Farm-fresh vegetables and fruits with same-day delivery</p>
        <button class="btn-green"><a class="btn text-decoration-none" href="./shop.php">Shop
                Now</a></button>
    </div>
</section>
<!-- end of banner  -->
<!-- menu plural -->
<div class="hero-section ">
    <h3 class="text-center">Menu Popular</h3>
    <section class="menu-modern"></section>
</div>
<!-- end of menu pural  -->
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

                <!-- Checkout Form -->
                <form id="checkoutForm" action="checkout.php" method="POST">
                    <!-- Hidden input to hold JSON cart data -->
                    <!-- <input type="hidden" name="cartData" id="cartData" value=""> -->
                    <button type="submit" class="btn btn-primary" name="cartData" id="cartData">Checkout</button>
                </form>
            </div>

        </div>
    </div>
</div>


<div class="container py-2">
    <div class="search-bar me-2 h-50">
        <i class="bi bi-search search-icon"></i>
        <input class="form-control search-input" type="search" placeholder="Search products..." aria-label="Search"
            type="text" id="searchInput" placeholder="Search for food or drinks...">
    </div>
    <div class="btn-container">
        <button class="btn-category">All</button>
    </div>




    <div class="container-card row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4" id="container">
        <!-- <div class="col">
            <div class="card menu-card border-0 shadow-sm">
                <img src="./views/admin/products/682c1bc32d52e.jpg" class="img" alt="Breakfast Burrito" />
                <div class="card-body">
                    <h5 class="card-title">Breakfast Burrito</h5>
                    <p class="price mb-1">$10.50</p>
                    <span class="category-badge mb-3">Breakfast</span>
                    <button class="btn add-to-cart-btn text-white mt-auto w-100">
                        Add to Cart
                    </button>
                </div>
            </div>
        </div> -->
    </div>
</div>
<!-- start page about  -->
<section class="py-5 story-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-4 mb-lg-0" data-aos="zoom-out-right">
                <img src="./img/pizza1.png" alt="Restaurant Interior" class="img-fluid  " />
            </div>
            <div class="col-lg-6">
                <h2 class="mb-4">How It All Began</h2>
                <p>
                    Founded in 2010 by Chef Reaksmey, FreshHarvest started as a
                    small family-owned café with a vision to serve honest, delicious
                    food made from locally-sourced ingredients.
                </p>
                <p>
                    What began as a 20-seat restaurant has now grown into a culinary
                    destination, but our core values remain unchanged: quality
                    ingredients, exceptional flavors, and a warm, welcoming
                    atmosphere.
                </p>
                <p>
                    Over the years, we've built strong relationships with local
                    farmers and producers, ensuring that every dish we serve captures
                    the essence of our region while supporting sustainable practices.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Our Values -->
<section class="py-5">
    <div class="container">
        <h2 class="text-center mb-5">Our Values</h2>
        <div class="row g-4">
            <div class="col-md-4 text-center" data-aos="fade-right" data-aos-anchor="#example-anchor"
                data-aos-offset="1000" data-aos-duration="1000">
                <div class="values-icon">
                    <i class="fas fa-leaf"></i>
                </div>
                <h4>Sustainability</h4>
                <p>
                    We're committed to environmentally conscious practices, from
                    sourcing ingredients to minimizing waste in our operations.
                </p>
            </div>
            <div class="col-md-4 text-center" data-aos="fade-up" data-aos-anchor-placement="center-center">
                <!-- <div data-aos="fade-right"></div> -->
                <div class="values-icon">
                    <i class="fas fa-users"></i>
                </div>
                <h4>Community</h4>
                <p>
                    We believe in creating meaningful connections with our customers,
                    staff, and the neighborhood we call home.
                </p>
            </div>
            <div class="col-md-4 text-center" data-aos="fade-left" data-aos-anchor="#example-anchor"
                data-aos-offset="1000" data-aos-duration="1000">
                <div class="values-icon">
                    <i class="fas fa-utensils"></i>
                </div>
                <h4>Culinary Excellence</h4>
                <p>
                    We never compromise on quality, continuously innovating while
                    honoring traditional techniques.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Meet the Team -->
<section class="py-5 bg-light">
    <div class="container">
        <h2 class="text-center mb-5">Meet Our Team</h2>
        <div class="row g-4">
            <div class="col-md-4 col-sm-6 text-center team-member" data-aos="fade-right"
                data-aos-anchor="#example-anchor" data-aos-offset="1000" data-aos-duration="1000">
                <img src="./img/chef1.png" alt="Chef Maria" class="mb-3 shadow" />
                <h4>Maria Rodriguez</h4>
                <p class="text-muted">Founder & Reaksmey</p>
                <p>
                    With over 20 years of culinary experience, Maria brings her
                    passion for fresh, seasonal cooking to every dish.
                </p>
            </div>
            <div class="col-md-4 col-sm-6 text-center team-member" data-aos="fade-up"
                data-aos-anchor-placement="center-center">
                <img src="./img/chef2.png" alt="Chef Thomas" class="mb-3 shadow" />
                <h4>Thomas Chen</h4>
                <p class="text-muted">Executive Chef</p>
                <p>
                    Thomas specializes in fusion cuisine, blending Eastern and Western
                    techniques to create unique flavor profiles.
                </p>
            </div>
            <div class="col-md-4 col-sm-6 text-center team-member" data-aos="fade-left"
                data-aos-anchor="#example-anchor" data-aos-offset="1000" data-aos-duration="1000">
                <img src="./img/chef3.png" alt="Sarah" class="mb-3 shadow" />
                <h4>Sarah Johnson</h4>
                <p class="text-muted">Pastry Chef</p>
                <p>
                    Sarah's innovative desserts combine classic techniques with modern
                    presentation for a perfect finish to any meal.
                </p>
            </div>
        </div>
    </div>
</section>
<section class="py-5">
    <div class="container">
        <h2 class="text-center mb-5">What Our Customers Say</h2>
        <div class="row g-4">
            <div class="col-lg-4 col-md-6" data-aos="zoom-out-up">
                <div class="p-4 testimonial-card h-100">
                    <p class="fst-italic mb-3">
                        "The farm-to-table experience at Fresh Harvest is unmatched. Every
                        dish tells a story of passion and craftsmanship."
                    </p>
                    <p class="fw-bold mb-0">— Khev Khem</p>
                    <small class="text-muted">Food Critic</small>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="zoom-out-up">
                <div class="p-4 testimonial-card h-100">
                    <p class="fst-italic mb-3">
                        "I've been a regular for five years, and the consistency and
                        quality never wavers. It's like coming home to family."
                    </p>
                    <p class="fw-bold mb-0">— Tat Srey nich</p>
                    <small class="text-muted">Local Customer</small>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="zoom-out-up">
                <div class="p-4 testimonial-card h-100">
                    <p class="fst-italic mb-3">
                        "Their commitment to sustainable practices is evident in every
                        aspect of the restaurant. The food is exceptional and the
                        service is impeccable."
                    </p>
                    <p class="fw-bold mb-0">— Meanrith Yurin</p>
                    <small class="text-muted">Environmental Advocate</small>
                </div>
            </div>
        </div>
    </div>
</section>

<style>

</style>
<?php include "./include/bottom.php";?>

<?php include "./include/footer.php"; ?>
