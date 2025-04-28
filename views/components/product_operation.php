<?php
ob_start(); // Start output buffering
include_once "../../handle/Redirect.php";
include "../pages/header.php";
?>
<div class="container-fluid">
    <div class="row">
        <?php include '../pages/navbar.php'; ?>
        <div class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <form method="post" enctype="multipart/form-data">
                <label for="product_id">ID</label>
                <input type="text" readonly class="form-control" name="product_id">
                <label for="product_name">Product Name</label>
                <input type="text" class="form-control" id="product_name" name="product_name" required>

                <label for="product_price">Price :</label>
                <input type="text" class="form-control" id="product_price" name="product_price" required>
                <label for="category_no">Category</label>
                <select name="category_no" class="form-control" id="category_no">
                    <option value="Select a Category">Select a Category</option>
                    <option value="Drinks">Drinks</option>
                    <option value="Food">Food</option>
                    <option value="SeaFood">Sea Food</option>
                    <option value="Steak">Steak</option>
                    <option value="Soup">Soup</option>
                    <option value="Bear">Bear</option>
                    <option value="Hot Pot">Hot Pot</option>
                    <option value="Shushi">ShuShi</option>
                </select>
                <label for="product_image">Image</label>
                <input type="file" class="form-control" id="imageInput" accept="image/*" name="product_image">
                <br>
                <img id="imagePreview" src="#" alt="Image Preview" style="display:none; max-width: 200px;" />

                <div class="modal-footer d-flex gap-2 mt-3">
                    <a class="btn btn-secondary text-decoration-none text-white" href="../admin/product.php">Cancel</a>
                    <button type="submit" class="btn btn-primary" name="save_product">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include "../pages/footer.php"; ?>
<?php
// require_once __DIR__ . "/../../controller/Productcontroller.php";
include_once __DIR__ . ("/../../controller/Productcontroller.php");
$controller = new Productcontroller();
if (isset($_POST['save_product'])) {
    $name = $_POST['product_name'];
    $price = $_POST['product_price'];
    $category = $_POST['category_no'];

    if ($_FILES['product_image']['error'] !== UPLOAD_ERR_OK) {
        echo "<script> alert('Image does not exist or failed to upload'); </script>";
    } else {
        $filename = $_FILES['product_image']['name'];
        $filesize = $_FILES['product_image']['size'];
        $tmpname = $_FILES['product_image']['tmp_name'];

        $validImageExtension = ['jpg', 'jpeg', 'png', 'webp'];
        $imageExtension = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
        if (!in_array($imageExtension, $validImageExtension)) {
            echo "<script> alert('Invalid image extension'); </script>";
        } elseif ($filesize > 1000000) {
            echo "<script> alert('Image size too large'); </script>";
        } else {
            $image = uniqid() . '.' . $imageExtension;
            move_uploaded_file($tmpname, 'product/' . $image);
            $controller->storeProduct($name, $price, $image, $category);
            echo "<script> alert('Successfully Added'); </script>";
            redirect("../admin/product.php");
        }
        // Save to DB

    }
}

?>