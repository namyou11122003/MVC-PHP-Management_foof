<?php
session_start();
include './handle/Checkinput.php';
// Create a new mysqli connection
$connection = new mysqli('localhost', 'root', '', 'mangement_food');
// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}
$error_message = "Incorrect email or password.";

if (isset($_POST['gmail']) && isset($_POST['password'])) {
    $gmail = $_POST['gmail'];
    $password = $_POST['password'];
    $employee_sql = "SELECT * FROM employee WHERE Emp_gmail = '$gmail' AND Emp_password = '$password'";
    $employee_result = $connection->query($employee_sql);

    if ($employee_result->num_rows > 0) {
        $row = $employee_result->fetch_assoc();
        if ($row['Emp_password']) {
            $_SESSION['gmail'] = $row['Emp_gmail'];
            $_SESSION['employee_photo'] = $row['emp_image'];
            $_SESSION['firstname'] = $row['emp_firstname'];
            $_SESSION['lasttname'] = $row['emp_lastname'];
            header('Location: ./views/admin/index.php');
            exit();

        }
    }

    // 2. Check in customer_register table
    $customer_sql = "SELECT * FROM customer_register WHERE csr_gmail = '$gmail' AND csr_password = '$password'";
    $customer_result = $connection->query($customer_sql);

    if ($customer_result->num_rows > 0) {
        $row = $customer_result->fetch_assoc();
        if ($row['csr_password']) {
            $_SESSION['gmail'] = $row['crs_gmai'];
            $_SESSION['crs_name'] = $row['csr_name'];
            header('Location: ./index.php');
            exit();
        }
    } else {
        $error_message = "Incorrect email or password.";

    }
}
?>


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
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }


        .auth-container {
            margin-top: 10rem;
            margin-bottom: 2rem;
        }

        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            color: white;
            border-radius: 10px 10px 0 0 !important;
            padding: 1.25rem;
            text-align: center;
            font-weight: bold;
        }

        .form-control:focus {
            border-color: #dc3545;
            box-shadow: 0 0 0 0.25rem rgba(220, 53, 69, 0.25);
        }

        @media (max-width: 767.98px) {
            #registerForm {
                display: none;
            }
        }
    </style>
</head>

<body class=" d-flex justify-content-center align-items-center h-100">


    <!-- Login & Registration Forms -->
    <div class="container auth-container">
        <div class="row justify-content-center">
            <!-- Toggle buttons for mobile -->
            <div class="col-12 d-md-none mb-4 text-center">
                <div class="btn-group" role="group">
                    <button type="button" class="btn btn-outline-danger active" id="mobileLoginBtn">Login</button>
                    <button type="button" class="btn btn-outline-danger" id="mobileRegisterBtn">Register</button>
                </div>
            </div>

            <!-- Login Form -->
            <div class="col-md-5 mb-4" id="loginForm">
                <div class="card">

                    <div class="card-header bg-primary">
                        <h4 class="mb-0">Login to Your Account</h4>
                    </div>
                    <div class="card-body p-4">
                        <form method="post">
                            <div class="mb-3">
                                <label for="loginEmail" class="form-label">Email Address</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                    <input type="email" class="form-control" name="gmail" id="loginEmail" required
                                        placeholder="Enter your email">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="loginPassword" class="form-label">Password</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                    <input type="password" class="form-control" name="password" id="loginPassword"
                                        required placeholder="Enter your password">
                                </div>
                            </div>
                            <div class="form-check mb-3">
                                <input type="checkbox" class="form-check-input" id="rememberMe">
                                <label class="form-check-label" for="rememberMe">Remember me</label>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <button class="btn btn-secondary"><a class="text-decoration-none text-light"
                                        href="./index.php">Back Home</a></button>
                                <button type="submit" class="btn btn-primary btn-lg">Login</button>
                            </div>
                            <div class="text-center mt-3">
                                <p><a href="#" class="">Forgot your password?</a></p>
                                <div class="d-flex justify-content-center mt-3">
                                    <p>Don't have Account ?</p>
                                    <a href="./register.php">Create Account now</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Registration Form -->

        </div>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
</body>

</html>