<?php
session_start();

// Check if the user is logged in by verifying the session variable
if (!isset($_SESSION['gmail'])) {
    // Redirect to login page if not logged in
    header('Location: ../../index.php');
    exit();
}

include "../pages/header.php";
?>

<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <?php include '../pages/navbar.php'; ?>
        <div class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <?php
            include '../pages/search.php';
            include '../pages/sidebar.php';
            ?>
        </div>
    </div>
</div>

<?php
include "../pages/footer.php";
?>