<?php
session_start();
if (isset($_SESSION['gmail']) && isset($_SESSION['password'])) {
    header("Location: ../../index.php");}
include "../pages/header.php";

?>
<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <?php include '../pages/navbar.php'; ?>
        <div class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

            <?php
            include '../pages/search.php';
            include '../pages/sidebar.php'; ?>
        </div>
    </div>
</div>
<?php include "../pages/footer.php"; ?>