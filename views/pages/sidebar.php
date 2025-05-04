<main class="p-3">
    <?php
    require_once __DIR__ . "/../../controller/controllerOrder.php";
    $Customer_Order = new ControllerOrder();

    ?>
    <!-- Stats cards -->
    <div class="row g-4 mb-4">
        <div class="col-md-6 col-lg-3">
            <div class="card card-stats shadow-sm">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="icon-box bg-primary bg-opacity-25 text-primary me-3">
                            <i class="bi bi-currency-dollar fs-4"></i>
                        </div>
                        <div>

                            <p class="text-muted mb-0">TotalPayment</p>
                            <h3 class="fw-bold mb-0"><?php
                            $counTotalPayment = $Customer_Order->CountTotal();
                            echo $counTotalPayment;
                            ?></h3>
                            <small class="text-success">+12% last month</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        require_once __DIR__ . "/../../controller/customerController.php";
        $customer = new CustomerController();
        $customerCount = $customer->customer_count();
        ?>
        <div class="col-md-6 col-lg-3">
            <div class="card card-stats shadow-sm">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="icon-box bg-success bg-opacity-25 text-success me-3">
                            <i class="bi bi-people fs-4"></i>
                        </div>
                        <div>
                            <p class="text-muted mb-0">Customer Register </p>
                            <h3 class="fw-bold mb-0"><?php echo $customerCount; ?></h3>
                            <small class="text-success">+8% from last month</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="card card-stats shadow-sm">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="icon-box bg-info bg-opacity-25 text-info me-3">
                            <i class="bi bi-cart-check fs-4"></i>
                        </div>
                        <?php

                        $CountOrder = $Customer_Order->countOrderDetail();

                        ?>
                        <div>
                            <p class="text-muted mb-0">Orders</p>
                            <h3 class="fw-bold mb-0"><?php echo $CountOrder; ?></h3>
                            <small class="text-success">+5% from last month</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="card card-stats shadow-sm">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="icon-box bg-warning bg-opacity-25 text-warning me-3">
                            <i class="bi bi-graph-up fs-4"></i>
                        </div>
                        <div>
                            <!-- start growing -->
                            <?php
                            // Example data: replace these values with your actual monthly data.
                            $currentMonthOrders = 120;    // current month orders
                            $previousMonthOrders = 100;   // previous month orders
                            
                            // Ensure previous month is not zero
                            if ($previousMonthOrders > 0) {
                                $growthPercent = (($currentMonthOrders - $previousMonthOrders) / $previousMonthOrders) * 100;
                            } else {
                                $growthPercent = 0;
                            }

                            // Format the percentage for display (e.g., two decimals)
                            $growthFormatted = number_format($growthPercent, 2);
                            ?>
                            <!-- end of growing -->
                            <p class="text-muted mb-0">Growth</p>
                            <h3 class="fw-bold mb-0"><?php echo $growthFormatted; ?>%</h3>
                            <?php if ($growthPercent < 0): ?>
                                <small class="text-danger">Down <?php echo abs($growthFormatted); ?>% from last
                                    month</small>
                            <?php else: ?>
                                <small class="text-success">Up <?php echo $growthFormatted; ?>% from last month</small>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php
$monthlyOrders = $Customer_Order->getMonthlyOrders();
$monthlyRegs = $customer->getMonthlyRegistrations();
?>

<canvas id="orderChart" width="100%" height="40"></canvas>

<script>
    const orderData = <?php echo json_encode(array_values($monthlyOrders)); ?>;
    const registerData = <?php echo json_encode(array_values($monthlyRegs)); ?>;
    const months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
        'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

    const ctx = document.getElementById('orderChart').getContext('2d');
    new Chart(ctx, {
        type: 'line',
        data: {
            labels: months,
            datasets: [{
                label: 'Orders',
                data: orderData,
                borderColor: 'rgba(54, 162, 235, 1)',
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                tension: 0.3
            },
            {
                label: 'Registrations',
                data: registerData,
                borderColor: 'rgba(255, 206, 86, 1)',
                backgroundColor: 'rgba(255, 206, 86, 0.2)',
                tension: 0.3
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { position: 'top' },
                title: { display: true, text: 'Monthly Orders & Registrations' }
            }
        }
    });
</script>