<?php
session_start();
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
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/footer.css">
    <link rel="stylesheet" href="./assets/css/index.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">


    <style>
        #registerForm {
            margin-top: 2rem;
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

        .team-member img {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border-radius: 50%;
        }

        .story-section {
            background-color: #f8f9fa;
        }

        .values-icon {
            font-size: 2.5rem;
            color: #198754;
            margin-bottom: 1rem;
        }



        .testimonial-card {
            background-color: #f8f9fa;
            border-left: 4px solid #198754;
        }

        .footer {
            background-color: #2c6b2f;
            color: #ffffff;
            padding: 3rem 0;
        }

        .footer a {
            color: #d4edda;
            text-decoration: none;
        }

        .footer a:hover {
            color: #ffffff;
            text-decoration: underline;
        }

        .footer-logo {
            max-width: 150px;
        }

        .social-icons i {
            font-size: 1.5rem;
            margin-right: 1rem;
        }
    </style>

</head>

<body>