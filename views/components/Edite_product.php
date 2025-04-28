<?php
ob_start(); // Start output buffering
include_once "../../handle/Redirect.php";
include "../pages/header.php";
include_once("../../controller/Productcontroller.php");

$controller = new Productcontroller();
$editeProduct = [];

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $editeProduct = $controller->editProductById($id);
}
?>

<div class="container-fluid">
    <div class="row">
        <?php include '../pages/navbar.php'; ?>
        <div class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <form method="post" enctype="multipart/form-data">
                <label for="product_id">ID</label>
                <input type="text" readonly class="form-control" name="product_id"
                    value="<?php echo isset($editeProduct['product_id']) ? $editeProduct['product_id'] : ''; ?>">

                <label for="product_name">Product Name</label>
                <input type="text" class="form-control" id="product_name" name="product_name"
                    value="<?php echo isset($editeProduct['product_name']) ? $editeProduct['product_name'] : ''; ?>"
                    required>

                <label for="product_price">Price</label>
                <input type="text" class="form-control" id="product_price" name="product_price"
                    value="<?php echo isset($editeProduct['product_price']) ? $editeProduct['product_price'] : ''; ?>"
                    required>

                <label for="category_no">Category</label>
                <select name="category_no" class="form-control" id="category_no" required>
                    <option disabled>Select a Category</option>
                    <?php
                    $categories = ['Drinks', 'Food', 'SeaFood', 'Steak', 'Soup', 'Bear', 'Hot Pot', 'Shushi'];
                    foreach ($categories as $cat) {
                        $selected = ($editeProduct['category'] ?? '') === $cat ? 'selected' : '';
                        echo "<option value='$cat' $selected>$cat</option>";
                    }
                    ?>
                </select>

                <label for="product_image">Image</label>
                <input type="file" class="form-control" id="imageInput" accept="image/*" name="product_image">

                <?php if (!empty($editeProduct['product_image'])): ?>
                    <br>
                    <img id="currentImage" src="./product/<?php echo $editeProduct['product_image']; ?>" alt="Current Image"
                        style="max-width: 200px;" />
                <?php endif; ?>

                <div class="modal-footer d-flex gap-2 mt-3">
                    <a class="btn btn-secondary text-decoration-none text-white" href="../admin/product.php">Cancel</a>
                    <button type="submit" class="btn btn-primary" name="save_product">Save</button>
                </div>

            </form>
        </div>
    </div>
</div>
<script>
   

</script>

<?php include "../pages/footer.php"; ?>

<?php
if (isset($_POST['save_product'])) {
    $id = $_POST['product_id'];
    $name = $_POST['product_name'];
    $price = $_POST['product_price'];
    $category = $_POST['category_no'];

    $image = '';

    // Check if image is uploaded
    if ($_FILES['product_image']['error'] === UPLOAD_ERR_NO_FILE) {
        // Keep existing image
        $oldProduct = $controller->editProductById($id);
        $image = $oldProduct['product_image'];
    } elseif ($_FILES['product_image']['error'] === UPLOAD_ERR_OK) {
        $filename = $_FILES['product_image']['name'];
        $filesize = $_FILES['product_image']['size'];
        $tmpname = $_FILES['product_image']['tmp_name'];
        $validImageExtension = ['jpg', 'jpeg', 'png'];
        $imageExtension = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

        if (!in_array($imageExtension, $validImageExtension)) {
            echo "<script>alert('Invalid image extension');</script>";
            exit;
        }

        if ($filesize > 1000000) {
            echo "<script>alert('Image size too large');</script>";
            exit;
        }

        $image = uniqid() . '.' . $imageExtension;
        move_uploaded_file($tmpname, 'product/' . $image);
    } else {
        echo "<script>alert('Image upload failed');</script>";
        exit;
    }

    $controller->updateProduct($id, $name, $price, $image, $category);
    echo "<script>alert('Product updated successfully');</script>";
    redirect("../admin/product.php");
}
?>