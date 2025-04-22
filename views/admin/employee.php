<?php
session_start();
if (isset($_SESSION['gmail']) && isset($_SESSION['password'])) {
    header("Location: ../../index.php");}
include "../pages/header.php";
require_once __DIR__ . "/../../controller/Empoyeecontroller.php";
include_once("../../handle/Model.php");
?>
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
                            <a class="text-white text-decoration-none" href="../components/operationEmployee.php"><i
                                    class="bi bi-plus-lg"></i>Add
                                Employee</a>
                        </button>
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
                                            <img class="rounded-circle me-2 object-fit-cover" width="40" height="40"
                                                src="../components/images/<?php echo $employee['image']; ?>" alt="">
                                            <?php echo $employee['firstname'] . " " . $employee['lastname']; ?>
                                        </td>
                                        <td><?php echo $employee['gmail']; ?></td>
                                        <td><?php echo $employee['role']; ?></td>
                                        <td>
                                            <a href="../components/Edit.php?id=<?php echo $employee['id']; ?>"
                                                class="btn btn-warning btn-sm">Edit</a>
                                            <a href="../components/viewsDetail.php?<?php echo $employee['id']; ?>"
                                                class="btn btn-info btn-sm view-btn">View</a>
                                            <a onclick="return confirm('Are you sure to delete this product ?');"
                                                href="../components/delete_employee.php?id=<?php echo $employee['id']; ?>"
                                                class="btn btn-danger btn-sm">
                                                <i class="bi bi-trash3"></i>Delete</a>
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