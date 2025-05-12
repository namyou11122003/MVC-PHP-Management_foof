<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Account Portal</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">
    <style>
        #registerForm {
            margin-top: 8rem;
        }
    </style>

<body class="d-flex justify-content-center mt-5">


    <div class="col-md-5 mb-4 shadow" id="registerForm">
        <div class="card">
            <div class="card-header bg-primary">
                <h4 class="mb-0 text-center ">Create Your Account</h4>
            </div>
            <div class="card-body p-4">
                <form method="post">
                    <div class="mb-3">
                        <label for="registerName" class="form-label">Full Name</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                            <input type="text" class="form-control" id="registerName" required name="fullname"
                                placeholder="Enter your full name">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="registerEmail" class="form-label">Email Address</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                            <input type="email" class="form-control" id="registerEmail" required
                                placeholder="Enter your email" name="email">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="registerPhone" class="form-label">Phone Number</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                            <input type="tel" class="form-control" id="registerPhone" name="phonenumber" required
                                placeholder="Enter your phone number">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="registerPassword" class="form-label">Password</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-lock"></i></span>
                            <input type="password" class="form-control" id="registerPassword" required
                                placeholder="Create a password" name="password">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="registerConfirmPassword" class="form-label">Confirm Password</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-check-circle"></i></span>
                            <input type="password" class="form-control" id="registerConfirmPassword" required
                                placeholder="Confirm your password">
                        </div>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <button class="btn btn-secondary"><a class="text-decoration-none text-light"
                                href="./index.php">Back Home</a></button>
                        <button type="submit" class="btn btn-primary " name="createAcount">Create Acount</button>
                    </div>
                    <div class="text-center mt-3">
                        <p>Already have an Acount ? </p>
                        <a href="./login.php">Login now</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>

</body>


<!-- insert data to databae  -->
<?php
include "./controller/customerController.php";
$customer = new CustomerController();
if (isset($_POST['createAcount'])) {
    $name = $_POST['fullname'];
    $email = $_POST['email'];
    $phone = $_POST['phonenumber'];
    $password = $_POST['password'];
    date_default_timezone_set('Asia/Phnom_Penh');
    $register_date = date('Y-m-d H:i:s');

    // $password = password_hash($password, PASSWORD_DEFAULT);
    $customer->customer_register($name, $email, $phone, $password, $register_date);
    header("location: ./index.php");
}

?>