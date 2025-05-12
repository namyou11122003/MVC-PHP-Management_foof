<?php
require_once __DIR__ . "/../../controller/Empoyeecontroller.php";
require_once "../../handle/Checkinput.php";
require_once "../../handle/Redirect.php";
include "../pages/header.php";

//  delete from database 
?>
<!-- <div class="container-fluid">
    <div class="row">
        <?php
        ?> -->
<!-- <div class="col-md-9 ms-sm-auto col-lg-10 px-md-4"> -->
<form method="post" enctype="multipart/form-data">
    <label for="ID">ID</label>
    <span>ID : </span><input type="text" class="form-control" id="ID" name="ID" name="emp-id" readonly>
    <label for="emp_firstname">First Name</label>
    <input type="text" class="form-control" id="emp_firstname" name="emp_firstname" required>
    <label for="emp_lastname">Last Name</label>
    <input type="text" class="form-control" id="emp_lastname" name="emp_lastname" required>
    <label for="emp_email">Email</label>
    <input type="email" class="form-control" id="emp_email" name="emp_email" required>
    <!-- <label for="emp_role">Role</label>
    <input type="text" class="form-control" id="emp_role" name="emp_role" required> -->
    <select name="emp_role" class="form-control" required id="">
        <option value="">Select role</option>
        <option value="Admin">Admin</option>
        <option value="User">User</option>
        <option value="Sell">Sell</option>
        <option value="HRM">HRM</option>
        <option value="CEO">CEO</option>
    </select>


    <label for="emp_password">Password</label>
    <input type="password" class="form-control" id="emp_password" name="emp_password" required>
    <!-- <label for="`emp_image`">Photo Employee</label>
                <input type="file" class="form-control" id="preview" name="emp_image" required> -->
    <label for="product_image">Image</label>
    <input type="file" class="form-control" id="imageInput" accept="image/*" name="emp_image">
    <br><br>
    <img id="imagePreview" src="" alt="Image Preview" style="display:none; max-width: 200px;" />

    <div class="modal-footer d-flex gap-4">
        <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal"><a href="../admin/employee.php"
                class="text-light text-decoration-none ">Cancal</a></button>
        <button type="submit" class="btn btn-primary" id="saveProduct" name="save_emp">Save</button>
    </div>
</form>
<!-- </div> -->
<!-- </div>
</div> -->


<!-- edit -->

<?php require "../pages/footer.php";
// save employee or insert 
if (isset($_POST['save_emp'])) {
    $stroeEmp = new EmployeeController();
    $emp_firstname = $_POST['emp_firstname'];
    $emp_lastname = $_POST['emp_lastname'];
    $emp_email = $_POST['emp_email'];
    $emp_role = $_POST['emp_role'];
    $emp_password = $_POST['emp_password'];

    if ($_FILES['emp_image']['error'] === 200) {
        echo "<script> alert('Image does not exist'); </script>";
    } else {
        $filename = $_FILES['emp_image']['name'];
        $filesize = $_FILES['emp_image']['size'];
        $tmpname = $_FILES['emp_image']['tmp_name'];
        $validImageExtension = ['jpg', 'jpeg', 'png'];
        $imageExtension = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

        if (!in_array($imageExtension, $validImageExtension)) {
            echo "<script> alert('Invalid image extension'); </script>";
        } elseif ($filesize > 1000000) {
            echo "<script> alert('Image size too large'); </script>";
        } else {
            $newimageName = uniqid() . '.' . $imageExtension;
            move_uploaded_file($tmpname, 'images/' . $newimageName);
            $stroeEmp->storeEmployee($emp_firstname, $emp_lastname, $emp_email, $emp_role, $emp_password, $newimageName, );
            echo "<script> alert('Successfully Added'); </script>";
        }
        redirect("../admin/employee.php");
    }// get image templete 
}
?>