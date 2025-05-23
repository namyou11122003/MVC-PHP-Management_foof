<?php
session_start();



// // Check if the user is logged in by verifying the session variable
// if (!isset($_SESSION['gmail'])) {
//     // Redirect to login page if not logged in
//     header('Location: ../../index.php');
//     exit();
// }
include "../pages/header.php";
require_once __DIR__ . "/../../controller/Empoyeecontroller.php";
include_once("../../handle/Model.php");
?>
<style>
    label {
        color: black;
    }
</style>
<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <?php include '../pages/navbar.php'; ?>
        <div class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="card shadow">
                <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Employee List</h5>
                    <div>
                        <input type="text" class="form-control d-inline-block me-2" placeholder="Search..."
                            style="width: 200px;">
                        <!-- Button that triggers the modal -->

                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#addEmployeeModal">
                            <i class="bi bi-plus-lg"></i> Add New Staff
                        </button>

                        <!-- Modal structure -->
                        <div class="modal fade" id="addEmployeeModal" tabindex="-1"
                            aria-labelledby="addEmployeeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title text-dark" id="addEmployeeModalLabel">Add New Staff</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"> </button>

                                    </div>
                                    <div class="modal-body">
                                        <?php
                                        // Include the form file but remove header/footer if possible 
                                        // if already included on main page to avoid duplicate HTML tags 
                                        include "../Employees/addemployees.php";
                                        ?>

                                        <?php
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- end of add emp -->
                    </div>
                </div>
                <?php MOdalDelete(); ?>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="bg-primary text-white">
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $getEmployees = new EmployeeController();
                                $employees = $getEmployees->getEmployes();

                                foreach ($employees as $employee) {
                                    ?>
                                    <tr>
                                        <td><?php echo $employee['id']; ?></td>
                                        <td>
                                            <!-- <img class="rounded-circle me-2 object-fit-cover" width="40" height="40"
                                                src="./images/<?php echo $employee['image']; ?>" alt=""> -->
                                            <img class="rounded-circle me-2 object-fit-cover" width="40" height="40"
                                                src="./images/<?php echo $employee['image']; ?>" alt="">
                                            <?php echo $employee['firstname'] . " " . $employee['lastname']; ?>
                                        </td>
                                        <td><?php echo $employee['gmail']; ?></td>
                                        <td><?php echo $employee['role']; ?></td>
                                        <td>

                                            <!-- end of edite  -->

                                            <a href="../Employees/updateemployee.php?id=<?php echo $employee['id']; ?>"
                                                class="btn btn-info btn-sm">
                                                <i class="bi bi-pencil "></i>Update</a>
                                            <style>
                                                button>i,
                                                a>i {
                                                    margin-right: 7px;
                                                }
                                            </style>

                                            <a onclick="return confirm('Are you sure to delete this product ?');"
                                                href="../Employees/deleteemployee.php?id=<?php echo $employee['id']; ?>"
                                                class="btn btn-danger btn-sm">
                                                <i class="bi bi-trash3"></i>Delete</a>
                                            <!-- <a href="../Employees/deleteemployee.php"></a> -->

                                            <button class="btn btn-warning view-btn"
                                                data-id="<?php echo $employee['id']; ?>"><i
                                                    class="bi bi-eye"></i>View</button>
                                            <!-- View Modal -->
                                            <div class="modal fade" id="viewModal" tabindex="-1"
                                                aria-labelledby="viewModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="viewModalLabel">Employee Details
                                                            </h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body" id="modalContent">
                                                            <!-- AJAX-loaded content will appear here -->
                                                            Loading...
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end of view modal  -->


                                        </td>
                                    </tr>
                                    <?php
                                }
                                ?>
                                </tr>
                                <?php
                                if (isset($_POST['yes_employee'])) {
                                    $id = $_POST['Emp_ID'];
                                    $getEmployees->DeleteEmployee($id);
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>




        <?php include '../pages/footer.php'; ?>
        <!-- view details for employee  --