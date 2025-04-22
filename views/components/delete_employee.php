<?php
require_once __DIR__ . "/../../controller/Empoyeecontroller.php";
$deleteEmployee = new EmployeeController();
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $deleteEmployee->DeleteEmployee($id);
    header("location: ../admin/Employee.php");
}
?>