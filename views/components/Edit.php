<?php
include "../pages/header.php";
require_once __DIR__ . "/../../controller/Empoyeecontroller.php";
$EDITEMP = new EmployeeController();

// Fetch employee data if editing
$employee = [];
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $employee = $EDITEMP->editEmployeeById($id);
}
?>
<div class="container-fluid">
    <div class="row">
        <?php include '../pages/navbar.php'; ?>
        <div class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <form method="post">
                <label for="ID">ID</label>
                <input type="text" class="form-control" id="ID" name="ID"
                    value="<?php echo isset($employee['Emp_ID']) ? $employee['Emp_ID'] : ''; ?>" readonly>

                <label for="emp_firstname">First Name</label>
                <input type="text" class="form-control" id="emp_firstname" name="emp_firstname"
                    value="<?php echo isset($employee['emp_firstname']) ? $employee['emp_firstname'] : ''; ?>" required>

                <label for="emp_lastname">Last Name</label>
                <input type="text" class="form-control" id="emp_lastname" name="emp_lastname"
                    value="<?php echo isset($employee['emp_lastname']) ? $employee['emp_lastname'] : ''; ?>" required>

                <label for="emp_email">Email</label>
                <input type="email" class="form-control" id="emp_email" name="Emp_gmail"
                    value="<?php echo isset($employee['Emp_gmail']) ? $employee['Emp_gmail'] : ''; ?>" required>

                <label for="emp_role">Role</label>
                <input type="text" class="form-control" id="emp_role" name="emp_role"
                    value="<?php echo isset($employee['Emp_Role']) ? $employee['Emp_Role'] : ''; ?>" required>

                <label for="emp_password">Password</label>
                <input type="password" class="form-control" required id="emp_password" name="Emp_password" 
                    value="<?php echo isset($employee['Emp_password']) ? $employee['Emp_password'] : ''; ?>">
                <label for="`emp_image`">Photo Employee</label>
                <input type="file" class="form-control" id="imagePreview" width="100px" height="100px" name="emp_image"
                    required value="<?php echo isset($employee['emp_image']) ? $employee['emp_image'] : ''; ?>">
                <br>
                <img id="currentImage" src="./images/<?php echo $employee['emp_image']; ?>" alt="Current Image"
                    style="max-width: 200px;" />
                <div class="modal-footer mt-3">
                    <button type="reset" class="btn btn-secondary m-2">
                        <a href="../admin/employee.php" style="color: white; text-decoration: none;">Cancel</a>
                    </button>
                    <button type="submit" class="btn btn-primary" name="save_emp">Save</button>
                </div>
            </form>

            <?php
            if (isset($_POST['save_emp'])) {
                $id = $_POST['ID'];
                $firstname = $_POST['emp_firstname'];
                $lastname = $_POST['emp_lastname'];
                $email = $_POST['Emp_gmail'];
                $role = $_POST['emp_role'];
                $password = $_POST['Emp_password'];

                $EDITEMP->updateEmployee($id, $firstname, $lastname, $email, $role, $password);
            }
            ?>
        </div>
    </div>
</div>

<?php include "../pages/footer.php"; ?>