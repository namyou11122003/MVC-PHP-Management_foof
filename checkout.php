<?php
require_once __DIR__ . "/controller/controllerOrder.php";
$insertOrder = new ControllerOrder();
// Set timezone once
date_default_timezone_set('Asia/Phnom_Penh');
$orderDate = date('Y-m-d H:i:s');

$aggregatedName = ""; // Join product names (you may adjust as needed)
$totalQuantity = 0;
$totalPrice = 0;
$price = 0;

if (isset($_POST['cartData']) && !empty($_POST['cartData'])) {
    $cartData = json_decode($_POST['cartData'], true);
    if (!$cartData) {
        echo "Error decoding cart data.";
        exit;
    }

    // Aggregate data from all cart items
    foreach ($cartData as $item) {
        $aggregatedName = $item['name'] . ", ";
        $totalQuantity += $item['quantity'];
        $price = $item['price'];
        $totalPrice += $item['price'] * $item['quantity'];
    }
    // Remove trailing comma and space
    $aggregatedName = rtrim($aggregatedName, ", ");
}

// If the customer submitted the order form
if (isset($_POST['order'])) {
    // Get customer-provided details from the order form
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    // These values (name, quantity, price, total) are expected to be pre-filled by the form
    $name = $_POST['name'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];
    $total = $_POST['total'];

    // Call your controller method. Adjusted to no arguments as per function definition.
    $result = $insertOrder->insertOrder($name, $quantity, $price, $total, $address, $email, $phone, $orderDate);
    header('Location: ./index.php');
    exit;

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Order Form</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            padding-top: 50px;
        }

        .form-container {
            max-width: 500px;
            margin: 0 auto;
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .form-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .form-header h2 {
            color: #3a3a3a;
            font-weight: 600;
        }

        .btn-primary {
            background-color: #4a6fdc;
            border: none;
            padding: 10px 20px;
            font-weight: 500;
        }

        .btn-primary:hover {
            background-color: #3a5fc7;
        }

        .form-floating {
            margin-bottom: 20px;
        }

        .form-control:focus {
            border-color: #4a6fdc;
            box-shadow: 0 0 0 0.25rem rgba(74, 111, 220, 0.25);
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="form-container">
            <div class="form-header">
                <h2>Customer Orders</h2>
                <p class="text-muted">Please fill in your information</p>
            </div>

            <form method="post">
                <div class="form-floating">
                    <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com"
                        required>
                    <label for="email">Email address</label>
                </div>
                <div class="form-floating">
                    <input type="tel" class="form-control" id="phone" name="phone" placeholder="Phone number" required>
                    <label for="phone">Phone number</label>
                </div>
                <div class="form-floating mb-4">
                    <textarea class="form-control" id="address" name="address" placeholder="Your address"
                        style="height: 100px" required></textarea>
                    <label for="address">Address</label>
                </div>
                <!-- Pre-filled order summary (read-only) -->
                <div class="form-floating">
                    <input type="text" class="form-control" name="name"
                        value="<?php echo isset($aggregatedName) ? $aggregatedName : ''; ?>" readonly>
                    <label for="name">Product(s)</label>
                </div>
                <div class="form-floating">
                    <input type="text" class="form-control" name="price"
                        value="<?php echo isset($price) ? $price : ''; ?>" readonly>
                    <label for="quantity">Price</label>
                </div>
                <div class="form-floating">
                    <input type="text" class="form-control" name="quantity"
                        value="<?php echo isset($totalQuantity) ? $totalQuantity : ''; ?>" readonly>
                    <label for="quantity">Total Quantity</label>
                </div>
                <div class="form-floating">
                    <input type="text" class="form-control" value="<?php echo isset($totalPrice) ? $totalPrice : ''; ?>"
                        readonly>
                    <label for="price">Total Price</label>
                </div>
                <div class="form-floating">
                    <input type="text" class="form-control" name="total"
                        value="<?php echo isset($totalPrice) ? $totalPrice : ''; ?>" readonly>
                    <label for="total">Total Payment</label>
                </div>

                <!-- Pass through the raw cart data if needed (as a hidden field) -->
                <?php if (isset($_POST['cartData'])): ?>
                    <input type="hidden" name="cartData" value="<?php echo htmlspecialchars($_POST['cartData']); ?>">
                <?php endif; ?>
                <div class="d-flex justify-content-between">
                    <button class="btn btn-danger">
                        <a class="text-decoration-none text-light" href="./index.php">Back Home</a>
                    </button>
                    <button class="btn btn-primary" name="order" type="submit">Order</button>
                </div>
            </form>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>

</html>