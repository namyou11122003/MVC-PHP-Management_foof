<?php
require_once __DIR__ . "/../config/database.php";

class productmodel extends database
{
    private $product_id;
    protected $product_name;
    protected $product_price;
    protected $product_image;
    protected $category;

    // Set product ID
    public function setId($id)
    {
        $this->product_id = $id;
    }

    // CREATE: Insert a new product

    public function AddProduct()
    {
        $insertProduct = "INSERT INTO `product` 
                          (`product_name`, `product_price`, `product_image`, `category`)
                          VALUES ('{$this->product_name}', '{$this->product_price}', '{$this->product_image}', '{$this->category}')";
        $result = mysqli_query($this->connection, $insertProduct);
        if (!$result) {
            die("Database Insert Failed: " . mysqli_error($this->connection));
        }
    }

    // READ: Retrieve all products
    public function getProduct()
    {
        $selectProduct = "SELECT * FROM product ORDER BY product_id DESC";
        $result_select = mysqli_query($this->connection, $selectProduct);
        $data = [];
        while ($row = mysqli_fetch_assoc($result_select)) {
            $data[] = [
                'product_id' => $row['product_id'],
                'product_name' => $row['product_name'],
                'product_price' => $row['product_price'],
                'product_image' => $row['product_image'],
                'category' => $row['category'],
            ];
        }
        return $data;
    }

    // READ: Retrieve single product details by product_id
    public function getProductById()
    {
        $selectProduct = "SELECT * FROM product WHERE product_id = '{$this->product_id}' LIMIT 1";
        $result = mysqli_query($this->connection, $selectProduct);
        return mysqli_fetch_assoc($result);
    }

    // UPDATE: Update existing product fields
    public function updateProductById()
    {
        $updateProduct = "UPDATE product SET 
            product_name = '{$this->product_name}', 
            product_price = '{$this->product_price}', 
            product_image = '{$this->product_image}', 
            category = '{$this->category}'
            WHERE product_id = '{$this->product_id}'";
        mysqli_query($this->connection, $updateProduct);
    }

    // DELETE: Remove product by product_id
    public function deleteProductbyId()
    {
        $deleteProduct = "DELETE FROM product WHERE product_id = '{$this->product_id}'";
        mysqli_query($this->connection, $deleteProduct);
    }
}
?>