<div id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-dark ">
    <div class="d-flex justify-content-between align-items-center p-3 border-bottom ">
        <h4 class="sidebar-heading d-flex justify-content-between align-items-center mb-0 text-white">
            <span class="nav-text">Dashboard</span>
        </h4>
        <button id="toggleSidebar" class="btn btn-dark">
            <i class="bi bi-list"></i>
        </button>
    </div>
    <div class="position-sticky top-0 start-0 pt-3 ">
        <ul class="nav flex-column">
            <li class="nav-item active">
                <a class="nav-link " href="index.php">
                    <i class="bi bi-graph-up me-2 nav-icon"></i>Dashboard
                    <span class="nav-text"></span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="bi bi-bar-chart me-2 nav-icon"></i>
                    <span class="nav-text">Analytics</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./employee.php">
                    <i class="bi bi-people me-2 nav-icon"></i>
                    <span class="nav-text">Employee</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./product.php">
                    <i class="bi bi-list-ul me-2 nav-icon"></i>
                    <span class="nav-text">Products</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="bi bi-calendar me-2 nav-icon"></i>
                    <span class="nav-text">Calendar</span>
                </a>
            </li>
        </ul>

        <hr class="text-secondary">

        <ul class="nav flex-column ">
            <li class="nav-item ">
                <a class="nav-link" href="#">
                    <i class="bi bi-gear me-2 nav-icon"></i>
                    <span class="nav-text">Settings</span>
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="../../logout.php">
                    <i class="bi bi-box-arrow-left me-2 nav-icon"></i>
                    <span class="nav-text">logout</span>
                </a>
            </li>
        </ul>
    </div>
</div>

<style>
    .nav-item.active {
        background-color: dodgerblue;
        border-radius: 5px;
        color: white;
    }
</style>
<script>// This will attach the click handler to all nav links within the sidebar
    document.querySelectorAll('#sidebar .nav-link').forEach(link => {
        link.addEventListener('click', function () {
            // Remove 'active' from all nav items
            document.querySelectorAll('#sidebar .nav-item').forEach(item => item.classList.remove('active'));
            // Add 'active' on the clicked nav-item (assumes .nav-link is inside .nav-item)
            const navItem = this.closest('.nav-item');
            if (navItem) {
                navItem.classList.add('active');
            }
        });
    });</script>