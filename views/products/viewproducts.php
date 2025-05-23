<?php
session_start();

// require_once __DIR__ . "/../../controller/Empoyeecontroller.php";
require_once __DIR__ . "/../../controller/Productcontroller.php";
$products = new Productcontroller();
$products->getProductall();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $item = $products->GetProductOne($id);
    if (!$item) {
        echo "<script>alert('Product not found!'); window.location.href = '../admin/product.php';</script>";
        exit;
    }
}
?>
<style>
    .item-image {
        max-height: 300px;
        object-fit: contain;
    }
</style>

<?php
include "../pages/header.php";
?>

<div class="container-fluid">
    <div class="row">
        <?php include '../pages/navbar.php'; ?>
        <div class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
         
                   
                        <h1 class="mb-4">Item Details</h1>
                 

                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4 text-center mb-3 mb-md-0">
                                <img src="../admin/products/<?php echo $item['product_image']; ?>"
                                    alt="<?php echo $item['product_name']; ?>" class="item-image img-fluid rounded">
                            </div>

                            <div class="col-md-8">
                                <h2 class="card-title"><?php echo $item['product_name']; ?></h2>
                                <div class="table-responsive">
                                    <table class="table table-borderless">
                                        <tr>
                                            <th style="width: 150px;">ID:</th>
                                            <td><?php echo $item['product_id']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Price:</th>
                                            <td>៛<?php echo $item['product_price']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Category:</th>
                                            <td><span class="badge bg-primary"><?php echo $item['category']; ?></span>
                                            </td>
                                        </tr>

                                    </table>
                                </div>

                                <div class="mt-3">

                                    <a href="../admin/product.php" class="btn btn-info text-white">
                                        <i class="bi bi-arrow-left"></i> Back to List
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<?php include "../pages/footer.php"; ?>