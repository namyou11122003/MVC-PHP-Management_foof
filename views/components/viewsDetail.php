<?php
require_once __DIR__ . "/../../controller/Empoyeecontroller.php";
$connection = mysqli_connect('localhost', 'root', '', 'mangement_food');
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}        // Check if ID parameter exists
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    // Prepare and execute query to fetch item details
    $stmt = $connection->prepare("SELECT * FROM product  WHERE product_id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $item = $result->fetch_assoc();
    } else {
        echo "Item not found";
        exit;
    }
} else {
    echo "No item specified";
    exit;
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
            <div class="container py-4">
                <div class="row">
                    <div class="col-12">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="../../main.php">Menu Items</a></li>
                                <li class="breadcrumb-item active" aria-current="page">View Item</li>
                            </ol>
                        </nav>
                        <h1 class="mb-4">Item Details</h1>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4 text-center mb-3 mb-md-0">
                                <img src="./product/<?php echo $item['product_image']; ?>" alt="<?php echo $item['product_name']; ?>"
                                    class="item-image img-fluid rounded">
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
                                    <a href="edit_item.php?id=<?php echo $item['product_id']; ?>" class="btn btn-warning">
                                        <i class="bi bi-pencil"></i> Edit
                                    </a>
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