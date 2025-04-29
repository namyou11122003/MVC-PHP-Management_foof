<?php
session_start();
// Check if the user is logged in by verifying the session variable
if (!isset($_SESSION['gmail'])) {
    // Redirect to login page if not logged in
    header('Location: ../../index.php');
    exit();

}

include "../pages/header.php";
?>
<style>
    td {
        padding: 10px;
        font-size: 15px;
    }

    th {
        padding: 15px;
        color: gray;
    }
</style>
<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <?php include '../pages/navbar.php'; ?>
        <div class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="card p-3 shadow-sm">

                <table class="container">
                    <h2 class="text-center">Customer Order </h2>
                    <thead class="text-gray">
                        <tr>
                            <th>No</th>
                            <th>Product Name</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Total Payment</th>
                            <th>Order Date </th>
                            <th>Gmail</th>
                            <th>Phone </th>
                            <th colspan="2">Address</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require_once __DIR__ . "/../../controller/controllerOrder.php";
                        $getallOrders = new ControllerOrder();
                        $getallOrders = $getallOrders->getOderAll();
                        foreach ($getallOrders as $order) {
                            ?>
                            <tr class="border-top ">
                                <td><?PHP echo $order['id']; ?> </td>
                                <td><?PHP echo $order['name']; ?> </td>
                                <td><?PHP echo $order['qty']; ?> </td>
                                <td> <?PHP echo $order['price']; ?>​៛ </td>
                                <td><?PHP echo $order['total']; ?> ៛ </td>
                                <td><?PHP echo $order['date']; ?> </td>
                                <td><?PHP echo $order['gmail']; ?> </td>
                                <td>0<?PHP echo $order['phone']; ?> </td>
                                <td><?PHP echo $order['address']; ?> </td>
                            </tr>
                            <?PHP
                        }
                        ?>



                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php
include "../pages/footer.php";
?>