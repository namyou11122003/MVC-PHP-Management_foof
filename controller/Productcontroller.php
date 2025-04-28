<?php
require_once __DIR__ . "/../models/productmodel.php";

class Productcontroller extends productmodel
{
    // CREATE
    public function storeProduct($product_name, $product_price, $product_image, $category)
    {
        $this->product_name = $product_name;
        $this->product_price = $product_price;
        $this->product_image = $product_image;
        $this->category = $category;
        $this->AddProduct();
    }

    // READ - get all products
    public function getProductall()
    {
        $products = $this->getProduct();
        return $products;
    }

    // READ - get a single product by ID (requires a getProductById method in your model)
    public function editProductById($id)
    {
        $this->setId($id);
        return $this->getProductById();
    }
    
// get prodct by id like view page 
    public function GetProductOne($id)
    {
        $this->setId($id);
        return $this->getProductById(); // Ensure this method exists in your productmodel
    }
    // UPDATE
    public function updateProduct($product_id, $product_name, $product_price, $product_image, $category)
    {
        $this->setId($product_id);
        $this->product_name = $product_name;
        $this->product_price = $product_price;
        $this->product_image = $product_image;
        $this->category = $category;
        $this->updateProductById(); // Ensure you have this method in productmodel to update record in the database
    }

    // DELETE
    public function deleteProduct($id)
    {
        $this->setId($id);
        $this->deleteProductbyId();
    }
}
?>