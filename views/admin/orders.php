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
                    <thead class="text-gray">
                        <tr>
                            <th>No</th>
                            <th>Customers name</th>
                            <th>Item Name</th>
                            <th>OrderDate</th>
                            <th>Status</th>
                            <th>Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-top ">
                            <td class="p-3">1</td>
                            <td>Eren Yaeger</td>
                            <td>ឆ្អឹងជ្រូកបំពង</td>
                            <td>2023-10-01</td>
                            <td>Pending</td>
                            <td>$10.00</td>
                        </tr>
                        <tr class="border-top ">
                            <td class="p-3">1</td>
                            <td>Eren Yaeger</td>
                            <td>ឆ្អឹងជ្រូកបំពង</td>
                            <td>2023-10-01</td>
                            <td>Pending</td>
                            <td>$10.00</td>
                        </tr>
                        <tr class="border-top ">
                            <td class="p-3">1</td>
                            <td>Eren Yaeger</td>
                            <td>ឆ្អឹងជ្រូកបំពង</td>
                            <td>2023-10-01</td>
                            <td>Pending</td>
                            <td>$10.00</td>
                        </tr>
                        <tr class="border-top ">
                            <td class="p-3">1</td>
                            <td>Eren Yaeger</td>
                            <td>ឆ្អឹងជ្រូកបំពង</td>
                            <td>2023-10-01</td>
                            <td>Pending</td>
                            <td>$10.00</td>
                        </tr>
                        <tr class="border-top ">
                            <td class="p-3">1</td>
                            <td>Eren Yaeger</td>
                            <td>ឆ្អឹងជ្រូកបំពង</td>
                            <td>2023-10-01</td>
                            <td>Pending</td>
                            <td>$10.00</td>
                        </tr>
                        <tr class="border-top ">
                            <td class="p-3">1</td>
                            <td>Eren Yaeger</td>
                            <td>ឆ្អឹងជ្រូកបំពង</td>
                            <td>2023-10-01</td>
                            <td>Pending</td>
                            <td>$10.00</td>
                        </tr>
                        <tr class="border-top ">
                            <td class="p-3">1</td>
                            <td>Eren Yaeger</td>
                            <td>ឆ្អឹងជ្រូកបំពង</td>
                            <td>2023-10-01</td>
                            <td>Pending</td>
                            <td>$10.00</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php
include "../pages/footer.php";
?>