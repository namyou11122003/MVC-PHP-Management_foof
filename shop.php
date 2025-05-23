<?php include "./include/header.php";
include "./include/navbar.php";

?>
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
<?php include "./include/bottom.php"; ?>

<?php
include "./include/footer.php";

?>