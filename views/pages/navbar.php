<style>
    .employee_logo {
        width: 100px;
        height: 100px;
        object-fit: cover;
        border-radius: 50%;


    }
</style>

<?php ob_start();
// global $_SESSION['employee_photo'];
// session_start()

?>
<div id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-dark ">
    <div class="d-flex flex-column justify-content-between align-items-center p-3 border-bottom ">
        <img class="employee_logo"
            src="./images/<?php echo isset($_SESSION['employee_photo']) ? $_SESSION['employee_photo'] : " "; ?>"
            alt="Photo Of Employee">
        <p><?php echo $_SESSION['firstname'] . " " . $_SESSION['lasttname'] ?></p>
    </div>
    <div class="position-sticky top-0 start-0 pt-3 ">
        <ul class="nav flex-column">
            <li class="nav-item ">
                <a class="nav-link active" href="index.php ">
                    <i class="bi bi-graph-up me-2 nav-icon"></i>Dashboard
                    <span class="nav-text"></span>
                </a>
            </li>
            <!--  -->
            <li class="nav-item">
                <a class="nav-link " href="./customer_register.php">
                    <!-- <i class="bi bi-bar-chart me-2 nav-icon"></i> -->
                    <i class="bi bi-person-circle me-2 nav-icon"></i>
                    <span class="nav-text">Customer Register</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./employee.php">
                    <i class="bi bi-people me-2 nav-icon"></i>
                    <span class="nav-text">Employee</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="./product.php"> <i class="bi bi-list-ul me-2 nav-icon"></i>
                    <span class="nav-text">Products</span></a>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./orders.php">
                    <i class="bi bi-chat-dots me-2 nav-icon"></i>
                    <span class="nav-text">Orders</span>
                </a>
            </li>
        </ul>

        <hr class="text-secondary">

        <ul class="nav flex-column  ">

            <li class="nav-item">
                <a class="nav-link" href="./logout.php">
                    <i class="bi bi-box-arrow-left me-2 nav-icon"></i>
                    <span class="nav-text">Sign Out</span>
                </a>
            </li>

        </ul>
    </div>
</div>


<style>
    .nav-item.active {
        background-color: dodgerblue;
        color: white;
    }
</style>