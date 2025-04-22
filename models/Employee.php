<?php
require_once __DIR__ . "/../config/database.php";

class Employee extends database
{
    private $emp_id;
    protected $emp_firstname;
    protected $emp_lastname;
    protected $emp_email;
    protected $emp_role;
    protected $emp_password;
    protected $emp_image;
    public function setID($id)
    {
        $this->emp_id = $id;
    }
    public function addEmployee()
    {
        $sql = "INSERT INTO `employee` (`Emp_Role`, `Emp_gmail`, `Emp_password`, `emp_firstname`, `emp_lastname`, `emp_image`) 
        VALUES (
            '{$this->emp_role}', 
            '{$this->emp_email}', 
            '{$this->emp_password}', 
            '{$this->emp_firstname}', 
            '{$this->emp_lastname}', 
            '{$this->emp_image}'
        )";
        mysqli_query($this->connection, $sql);
    }
    public function SelectAllEmployee()
    {
        $sql = "SELECT * FROM `employee` ORDER BY Emp_ID DESC";
        $select = mysqli_query($this->connection, $sql);

        $data = [];
        while ($row = mysqli_fetch_array($select)) {
            $data[] = [
                'id' => $row['Emp_ID'],
                'firstname' => $row['emp_firstname'],
                'lastname' => $row['emp_lastname'],
                'gmail' => $row['Emp_gmail'],
                'role' => $row['Emp_Role'],
                'password' => $row['Emp_password'],
                'image' => $row['emp_image'],
            ];
        }

        return $data;
    }

    public function deleteEmployeeById()
    {
        $stmt = $this->connection->prepare("DELETE FROM `employee` WHERE `Emp_ID` = ?");
        $stmt->bind_param("i", $this->emp_id);
        $stmt->execute();
        $stmt->close();
    }
    public function selectById($id)
    {
        $sql = "SELECT * FROM employee WHERE Emp_ID = ?";
        $stmt = $this->connection->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $stmt->close();
        return $row;
    }

    public function updateEmployeeById()
    {
        $sql = "UPDATE employee 
                SET Emp_Role = ?, 
                    Emp_gmail = ?, 
                    Emp_password = ?, 
                    emp_firstname = ?, 
                    emp_lastname = ?,
                    emp_image = ?,
                    emp_date =?
                WHERE Emp_ID = ?";
        $stmt = $this->connection->prepare($sql);
        $stmt->bind_param(
            "sssssis",
            $this->emp_role,
            $this->emp_email,
            $this->emp_password,
            $this->emp_firstname,
            $this->emp_lastname,
            $this->emp_id
            ,
            $this->emp_image
        );
        $stmt->execute();
        $stmt->close();
    }
}
?>