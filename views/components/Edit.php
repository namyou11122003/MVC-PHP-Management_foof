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
            <!-- Note: To handle file upload, add enctype attribute -->
            <form method="post" enctype="multipart/form-data">
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
                <select name="emp_role" class="form-control" required id="emp_role">
                    <option value="">Select role</option>
                    <option value="Admin" <?php if (isset($employee['Emp_Role']) && $employee['Emp_Role'] == 'Admin')
                        echo 'selected'; ?>>Admin</option>
                    <option value="User" <?php if (isset($employee['Emp_Role']) && $employee['Emp_Role'] == 'User')
                        echo 'selected'; ?>>User</option>
                    <option value="Sell" <?php if (isset($employee['Emp_Role']) && $employee['Emp_Role'] == 'Sell')
                        echo 'selected'; ?>>Sell</option>
                    <option value="HRM" <?php if (isset($employee['Emp_Role']) && $employee['Emp_Role'] == 'HRM')
                        echo 'selected'; ?>>HRM</option>
                    <option value="CEO" <?php if (isset($employee['Emp_Role']) && $employee['Emp_Role'] == 'CEO')
                        echo 'selected'; ?>>CEO</option>
                </select>

                <label for="emp_password">Password</label>
                <input type="password" class="form-control" required id="emp_password" name="Emp_password"
                    value="<?php echo isset($employee['Emp_password']) ? $employee['Emp_password'] : ''; ?>">

                <label for="emp_image">Photo Employee</label>
                <!-- File inputs cannot prepopulate, so omit the value attribute -->
                <input type="file" class="form-control" id="emp_image" name="emp_image">
                <br>
                <!-- Display the current image -->
                <img id="currentImage" src="../admin/images/<?php echo $employee['emp_image']; ?>" alt="Current Image"
                    style="max-width: 200px;" />

                <div class="modal-footer mt-3">
                    <button type="reset" class="btn btn-secondary m-2">
                        <a href="../admin/employee.php" style="color: white; text-decoration: none;">Cancel</a>
                    </button>
                    <button type="submit" class="btn btn-primary" name="save_emp">Save</button>
                </div>
            </form>

            <?php
            // Process form submission for update
            if (isset($_POST['save_emp'])) {
                $id = $_POST['ID'];
                $firstname = $_POST['emp_firstname'];
                $lastname = $_POST['emp_lastname'];
                $email = $_POST['Emp_gmail'];
                $role = $_POST['emp_role'];
                $password = $_POST['Emp_password'];

                // Check if a new image is uploaded
                if (isset($_FILES['emp_image']) && $_FILES['emp_image']['error'] === UPLOAD_ERR_OK) {
                    $tmpName = $_FILES['emp_image']['tmp_name'];
                    $fileName = basename($_FILES['emp_image']['name']);
                    $fileExt = pathinfo($fileName, PATHINFO_EXTENSION);
                    // Create a unique filename
                    $newImageName = uniqid() . '.' . $fileExt;
                    // Define the destination folder (adjust the path as needed)
                    $destination = "../admin/images/" . $newImageName;
                    if (move_uploaded_file($tmpName, $destination)) {
                        // Pass the new image name to updateEmployee()
                        $EDITEMP->updateEmployee($id, $firstname, $lastname, $email, $role, $password, $newImageName);
                    } else {
                        echo 'Error moving uploaded file.';
                    }
                } else {
                    // No new file uploaded, update without changing the image value
                    $currentImage = $employee['emp_image'];
                    $EDITEMP->updateEmployee($id, $firstname, $lastname, $email, $role, $password, $currentImage);
                }
            }
            ?>
        </div>
    </div>
</div>
<?php include "../pages/footer.php"; ?>
<script>
    document.getElementById('emp_image').addEventListener('change', function (e) {
        var file = e.target.files[0];
        if (file) {
            var reader = new FileReader();
            reader.onload = function (event) {
                document.getElementById('currentImage').src = event.target.result;
            }
            reader.readAsDataURL(file);
        }
    });
</script>