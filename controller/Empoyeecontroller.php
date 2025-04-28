<?php
require_once __DIR__ . "/../models/employee.php";
include_once __DIR__ . ("/../handle/Redirect.php");
class EmployeeController extends Employee
{
    public function storeEmployee($emp_firstname, $emp_lastname, $emp_email, $emp_role, $emp_password, $emp_image, )
    {
        $this->emp_firstname = $emp_firstname;
        $this->emp_lastname = $emp_lastname;
        $this->emp_email = $emp_email;
        $this->emp_role = $emp_role;
        $this->emp_password = $emp_password;
        $this->emp_image = $emp_image;
        $this->addEmployee();
    }
    public function getEmployes()
    {
        $products = $this->SelectAllEmployee();
        return $products;
    }
    public function DeleteEmployee($id)
    {
        $this->setID($id);
        $this->deleteEmployeeById();

    }
    // edite and view detail employee
    public function editEmployeeById($id)
    {
        $this->setID($id);
        return $this->selectById($id);
    }

    // view detail employee
    public function GetEmployeeOne($id)
    {
        $this->setID($id);
        return $this->ViewDetailEmployee(); // Ensure this method exists in your productmodel
    }

    public function updateEmployee($id, $firstname, $lastname, $email, $role, $password)
    {
        $this->emp_firstname = $firstname;
        $this->emp_lastname = $lastname;
        $this->emp_role = $role;
        $this->emp_email = $email;
        $this->emp_password = $password;
        $this->setID($id);
        $this->updateEmployeeById();
        // Redirect after update
        header("Location: ../admin/employee.php");
        exit();
    }
}
?>