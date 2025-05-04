<?php
require_once __DIR__ . "/../config/database.php";

class OrdersDetail extends database
{
    private $id;
    protected $name;
    protected $price;
    protected $qty;
    protected $email;
    protected $phone;
    protected $address;
    protected $order_date;
    protected $total;

    public function Orders()
    {
        $sql = "INSERT INTO `order_detail`( `gmail`, `phone`, `address`, `qty_oder`, `price`, `total`, `order_data`, `name`) 
        VALUES ('{$this->email}', 
        '{$this->phone}', 
        '{$this->address}', 
        '{$this->qty}', 
        '{$this->price}',
        '{$this->total}',
        '{$this->order_date}',
        '{$this->name}'
        )";
        mysqli_query($this->connection, $sql);
    }
    public function SelectOrderall()
    {
        $sql = "SELECT  *FROM `order_detail` ORDER BY id DESC";

        $select = mysqli_query($this->connection, $sql);
        $data = [];
        while ($row = mysqli_fetch_array($select)) {
            $data[] = [
                'id' => $row['id'],
                'name' => $row['name'],
                'gmail' => $row['gmail'],
                'address' => $row['address'],
                'phone' => $row['phone'],
                'price' => $row['price'],
                'qty' => $row['qty_oder'],
                'total' => $row['total'],
                'date' => $row['order_data'],
            ];
        }
        return $data;
    }
    public function CountOrder()
    {
        $count = "SELECT COUNT(*) as total FROM `order_detail`";
        $result = mysqli_query($this->connection, $count);
        if ($result) {
            $row = mysqli_fetch_assoc($result);
            return $row['total'];
        } else {
            return 0; // Return 0 if the query fails
        }
    }


    public function CountTotalPayment()
    {
        $totalPaymentSql = "SELECT SUM(total) as totalPayment FROM `order_detail`";
        $result = mysqli_query($this->connection, $totalPaymentSql);
        if ($result) {
            $row = mysqli_fetch_assoc($result);
            return $row['totalPayment'];
        } else {
            return 0;
        }
    }


    public function CountinOnemonth()
    {
        $sql = "SELECT MONTH(order_data) AS month, COUNT(*) AS count FROM order_detail GROUP BY month";
        $result = $this->connection->query($sql);

        $data = array_fill(1, 12, 0);
        while ($row = $result->fetch_assoc()) {
            $data[(int) $row['month']] = (int) $row['count'];
        }
        return $data;
    }








}


?>