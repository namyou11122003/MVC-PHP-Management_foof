<?php
// filepath: c:\wamp64\www\MVC Mangement_food\views\components\viewDetailEmployee.php

require_once __DIR__ . "/../../controller/Empoyeecontroller.php";
require_once __DIR__ . "/../../controller/Productcontroller.php";

$employee = new EmployeeController();

// Check if an ID is provided
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $item = $employee->GetEmployeeOne($id); // Fetch employee details by ID
}

include "../pages/header.php";
?>

<div class="container-fluid">
    <div class="row">
        <?php include '../pages/navbar.php'; ?>
        <div class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="container py-4">
                <div class="row mb-3">
                    <div class="col-12">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="../../main.php">Menu Items</a></li>
                                <li class="breadcrumb-item active" aria-current="page">View Employee</li>
                            </ol>
                        </nav>
                        <h1 class="mb-4">Employee Details</h1>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4 text-center mb-3 mb-md-0">
                                <img src="./images/<?php echo $item['emp_image']; ?>"
                                    alt="<?php echo $item['emp_image']; ?>" class="item-image img-fluid rounded">
                            </div>
                            <div class="col-md-8">

                                <div class="table-responsive">
                                    <table class="table table-borderless">
                                        <tr>

                                            <th class="card-title">First Name :
                                            <td><?php echo $item['emp_firstname']; ?></td>
                                            </th>
                                        </tr>

                                        <tr>
                                            <th>Last Name :
                                            <td>Last Name : <?php echo $item['emp_lastname']; ?></td>
                                            </th>

                                            <td class="card-title"></td>
                                        </tr>
                                        <tr>
                                            <th style="width: 150px;">ID:</th>
                                            <td><?php echo $item['Emp_ID']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Gmail :</th>
                                            <td><?php echo $item['Emp_gmail']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Password :</th>
                                            <td><?php echo $item['Emp_password']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Role:</th>
                                            <td>
                                                <span class="badge bg-primary">
                                                    <?php echo $item['Emp_Role']; ?>
                                                </span>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="mt-3">
                                    <a href="../admin/employee.php" class="btn btn-info text-white">
                                        <i class="bi bi-arrow-left"></i> Back to List
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include "../pages/footer.php";
?>
<style>
    .item-image {
        max-height: 300px;
        object-fit: contain;
    }
</style>