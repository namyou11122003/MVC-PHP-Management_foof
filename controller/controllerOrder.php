<?php
require_once __DIR__ . "/../models/orders.php";

class ControllerOrder extends OrdersDetail
{
    public function insertOrder($name, $qty, $price, $total, $address, $email, $phone, $orderDate)
    {
        $this->name = $name;
        $this->qty = $qty;
        $this->price = $price;
        $this->total = $total;
        $this->address = $address;
        $this->email = $email;
        $this->phone = $phone;
        $this->order_date = $orderDate;
        $this->Orders();

    }
    public function getOderAll()
    {
        $orders = $this->SelectOrderall();
        return $orders;
    }

    public function countOrderDetail()
    {
        return $this->CountOrder();
    }

    public function CountTotal()
    {
        return $this->CountTotalPayment();
    }

    // ControllerOrder.php
    public function getMonthlyOrders()
    {
        return $this->CountinOnemonth();
    }


}






?>