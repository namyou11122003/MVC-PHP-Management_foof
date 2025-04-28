<?php
session_start();

// Check if the user is logged in by verifying the session variable
if (!isset($_SESSION['gmail'])) {
    // Redirect to login page if not logged in
    header('Location: ../../index.php');
    exit();
}
require "../pages/header.php";
include("../../controller/Productcontroller.php");
$selectproduct = new Productcontroller();

?>
<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <?php include '../pages/navbar.php'; ?>
        <div class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <?php include '../pages/search.php'; ?>
            <div class="container mt-4">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h1>Products</h1>
                    <a class="btn btn-primary btn-lg " href="../components/product_operation.php">Add Product</a>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="bg-primary text-white">
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Image</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <?php
                            $products = $selectproduct->getProductall();
                            foreach ($products as $product) {
                                ?>
                                <tbody>
                                    <tr>
                                        <td><?php echo $product['product_id']; ?></td>
                                        <td><?php echo $product['product_name']; ?></td>
                                        <td><?php echo $product['product_price'] . "​ ​​៛"; ?> </td>
                                        <td>
                                            <img class="rounded-circle me-2 object-fit-cover" width="40" height="40"
                                                src="../components/product/<?php echo $product['product_image']; ?>" alt="">
                                        </td>
                                        <td>
                                            <a href="../components/viewsDetail.php?id=<?php echo $product['product_id']; ?>"
                                                class="btn btn-info btn-sm "><i class="bi bi-eye m-1"></i>view</a>
                                            <a class="btn btn-warning btn-sm "
                                                href="../components/Edite_product.php?id=<?php echo $product['product_id']; ?>"><i
                                                    class="bi bi-pencil m-1 "></i>Edit</a>
                                            <a onclick="return confirm('Are you sure to delete this product ?id=<?php echo $product['product_id']; ?>')"
                                                class="btn btn-danger text-decoration-none btn-sm"
                                                href="../components/delete_product.php?id=<?php echo $product['product_id']; ?>"><i
                                                    class="bi bi-trash3 m-1"></i> Delete</a>
                                        </td>
                                    </tr>
                                </tbody>


                                <?php
                            }
                            ?>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>