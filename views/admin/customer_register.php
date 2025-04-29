<?php
require_once __DIR__ . "/../../controller/customerController.php";


session_start();
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
            <div class="card shadow">
                <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Customer Register </h5>
                    <div>
                        <input type="text" class="form-control d-inline-block me-2" placeholder="Search..."
                            style="width: 200px;">
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="bg-primary text-white">
                                <tr>
                                    <th>id</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Password</th>
                                    <th>Created </th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $customerRegisters = new CustomerController();
                                $customer_register = $customerRegisters->customer_select();
                                foreach ($customer_register as $customer) {
                                    ?>
                                    <tr>
                                        <td><?php echo $customer['csr_id'] ?></td>
                                        <td><?php echo $customer['csr_name'] ?></td>
                                        <td><?php echo $customer['csr_gmail'] ?></td>
                                        <td><?php echo $customer['csr_password'] ?></td>
                                        <td><?php echo $customer['register_date'] ?></td>
                                    </tr>



                                    <?php
                                }
                                ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include "../pages/footer.php";
?>