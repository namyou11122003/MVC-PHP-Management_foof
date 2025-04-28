<main class="p-3">
    <h1 class="mb-4 mt-3">Dashboard Overview</h1>

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
                            <p class="text-muted mb-0">Revenue</p>
                            <h3 class="fw-bold mb-0">$24,500</h3>
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
                        <div>
                            <p class="text-muted mb-0">Orders</p>
                            <h3 class="fw-bold mb-0">1,250</h3>
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
                            <p class="text-muted mb-0">Growth</p>
                            <h3 class="fw-bold mb-0">18.2%</h3>
                            <small class="text-danger">-2% from last month</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</main>
<div class="chart-container">
    <div class="chart-card">
        <div class="chart-title">Monthly Performance</div>
        <canvas id="performanceChart"></canvas>
    </div>
</div>

<div class="chart-container">
    <div class="chart-card">
        <div class="chart-title">Revenue vs Orders</div>
        <canvas id="revenueOrdersChart"></canvas>
    </div>
</div>

<div class="chart-container">
    <div class="chart-card">
        <div class="chart-title">User Growth</div>
        <canvas id="userGrowthChart"></canvas>
    </div>
</div>