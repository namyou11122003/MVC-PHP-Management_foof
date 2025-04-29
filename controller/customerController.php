<?php
require_once __DIR__ . "/../models/customer_register.php";
class CustomerController extends Customer_register
{
    public function customer_register($name, $email, $phone, $password ,$register_date)
    {
        $this->csr_name = $name;
        $this->csr_email = $email;
        $this->csr_phone = $phone;
        $this->csr_password = $password;
        $this->register_date = $register_date;
        $this->InsertCustomer();
    }
    public function customer_select()
    {
        return $this->SelectCustomer();
    }
    public function customer_selectById($id)
    {
        $this->setId($id);
        return $this->selectCustomerById();
    }
    // public function customer_update($id, $name, $email, $phone, $password)
    // {
    //     $this->setId($id);
    //     $this->csr_name = $name;
    //     $this->csr_email = $email;
    //     $this->csr_phone = $phone;
    //     $this->csr_password = $password;
    //     return $this->updateCustomer();
    // }
    // public function customer_delete($id)
    // {
    //     $this->setId($id);
    //     return $this->deleteCustomer();
    // }

    public function customer_count()
    {
        return $this->CountCustomerRegister();
    }
    // customerController.php
    public function getMonthlyRegistrations()
    {
        return $this->Registerinonemonth();

    }




}


?>