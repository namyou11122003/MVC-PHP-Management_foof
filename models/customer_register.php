<?php
require_once __DIR__ . "/../config/database.php";
class Customer_register extends database
{
    private $csr_id;
    protected $csr_name;
    protected $csr_email;
    protected $csr_password;
    protected $csr_phone;

    public function setId($id)
    {
        $this->csr_id = $id;
    }
    public function InsertCustomer()
    {
        $insert = "INSERT INTO `customer_register`( `csr_name`, `csr_gmail`, `csr_phone`, `csr_password`)
         VALUES ('{$this->csr_name}',
         '{$this->csr_email}',
         '{$this->csr_phone}',
         '{$this->csr_password}')";
        $result = mysqli_query($this->connection, $insert);
    }

    public function SelectCustomer()
    {
        $select = "SELECT * FROM `customer_register`";
        $result = mysqli_query($this->connection, $select);
        if (!$result) {
            return false; // Or handle the error as needed
        }

        $customers = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $customers[] = $row;
        }
        return $customers;
    }
    public function selectCustomerById()
    {
        $selectbyid = "SELECT * FROM `customer_register` WHERE csr_id = '{$this->csr_id}' LIMIT 1";
        mysqli_query($this->connection, $selectbyid);
    }

    public function updateCustomer()
    {
        $update = "UPDATE `customer_register` SET 
        `csr_name`='{$this->csr_name}'
        ,`csr_gmail`='{$this->csr_email}'
        ,`csr_phone`='{$this->csr_phone}'
        ,`csr_password`='{$this->csr_password}'
         WHERE csr_id = '{$this->csr_id}'";
        $result = mysqli_query($this->connection, $update);
    }
    public function deleteCustomer()
    {
        $delete = "DELETE FROM `customer_register` WHERE csr_id = '{$this->csr_id}'";
        $result = mysqli_query($this->connection, $delete);
    }
    public function CountCustomerRegister()
    {
        $count = "SELECT COUNT(*) as total FROM `customer_register`";
        $result = mysqli_query($this->connection, $count);
        if ($result) {
            $row = mysqli_fetch_assoc($result);
            return $row['total'];
        } else {
            return 0; // Return 0 if the query fails
        }
    }



}


?>