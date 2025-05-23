<?php
session_start();

require_once __DIR__ . "/../../controller/Empoyeecontroller.php";
require_once __DIR__ . "/../../controller/Productcontroller.php";
$employee = new EmployeeController();
$id = $_GET['id'];
$item = $employee->GetEmployeeOne($id);
include "../pages/header.php";
?>
<div class="container py-4">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-4 text-center mb-3 mb-md-0">
                    <img src="../admin/images/<?php echo $item['emp_image']; ?>" alt="<?php echo $item['emp_image']; ?>"
                        class="item-image img-fluid rounded">
                </div>
                <div class="col-md-8">
                    <div class="table-responsive">
                        <table class="table table-borderless">
                            <tr>
                                <th style="width: 150px;">ID:</th>
                                <td><?php echo $item['Emp_ID']; ?></td>
                            </tr>
                            <tr>

                                <th class="card-title">First Name :
                                <td><?php echo $item['emp_firstname']; ?></td>
                                </th>
                            </tr>

                            <tr>
                                <th>Last Name :
                                <td> <?php echo $item['emp_lastname']; ?></td>
                                </th>

                                <td class="card-title"></td>
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
                </div>
            </div>
        </div>
    </div>
</div>
<!-- </div>
    </div>
</div> -->

<?php include "../pages/footer.php";
?>
<style>
    .item-image {
        max-height: 300px;
        object-fit: contain;
    }
</style>