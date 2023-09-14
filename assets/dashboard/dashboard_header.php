<?php require_once("assets/header.php"); ?>
<?php include("./assets/autoload.php"); ?>

<?php 
    session_start();
    if(!isset($_SESSION['employee'])){
        header("location:./index.php");
    }

    $emp = new Employee();
    $data = $emp->employeeInfo($_SESSION['employee']);
?>

<!-- Banner -->
<a href="https://www.facebook.com/Shovon193" class="btn w-full btn-primary text-truncate rounded-0 py-2 border-0 position-relative" style="z-index: 1000;">
    <strong>Himsagor Kollan Somiti Website Developed by:</strong> Md Shovon →
</a>

<!-- Dashboard -->
<div class="d-flex flex-column flex-lg-row h-lg-full bg-surface-secondary">
    <!-- Vertical Navbar -->
    <nav class="navbar show navbar-vertical h-lg-screen navbar-expand-lg px-0 py-3 navbar-light bg-white border-bottom border-bottom-lg-0 border-end-lg" id="navbarVertical">
        <div class="container-fluid">
            <!-- Toggler -->
            <button class="navbar-toggler ms-n2" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarCollapse" aria-controls="sidebarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Brand -->
            <a class="navbar-brand py-lg-2 mb-lg-5 px-lg-6 me-0" href="<?php echo $_SERVER['PHP_SELF']; ?>">
                <img src="./images/favicon.ico" alt=""> <span class="align-middle">Himsagor Kollan Somiti</span>
            </a>
            <!-- User menu (mobile) -->
            <div class="navbar-user d-lg-none">
                <!-- Dropdown -->
                <div class="dropdown">
                    <!-- Toggle -->
                    <a href="#" id="sidebarAvatar" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="avatar-parent-child">
                            <img alt="Image Placeholder" src="./uploads/<?php echo $data->photo; ?>" class="avatar avatar- rounded-circle img-thumbnail">
                            <span class="avatar-child avatar-badge bg-success"></span>
                        </div>
                    </a>
                    <!-- Menu -->
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="sidebarAvatar">
                        <a href="../../banking_management_system/profile.php" class="dropdown-item">Profile</a>
                        <a href="../../banking_management_system/analytics.php" class="dropdown-item">Analytics</a>
                        <hr class="dropdown-divider">
                        <a href="./logout.php" class="dropdown-item">Logout</a>
                    </div>
                </div>
            </div>
            <!-- Collapse -->
            <div class="collapse navbar-collapse" id="sidebarCollapse">
                <!-- Navigation -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="../../banking_management_system/home.php">
                            <i class="bi bi-house"></i> Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../../banking_management_system/analytics.php">
                            <i class="bi bi-bar-chart"></i> Analitycs
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../../banking_management_system/profile.php">
                            <i class="bi bi-pencil"></i> Edit Profile
                        </a>
                    </li>
                </ul>
                <!-- Divider -->
                <hr class="navbar-divider my-5 opacity-20">
                <!-- Push content down -->
                <div class="mt-auto"></div>
                <!-- User (md) -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="./logout.php">
                            <i class="bi bi-box-arrow-left"></i> Logout
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Main content -->
    <div class="h-screen flex-grow-1 overflow-y-lg-auto">
        <!-- Main -->
        <main class="py-6 bg-surface-secondary">
            <div class="container-fluid">
                <!-- Card stats -->
                <div class="row g-6 mb-6">
                    <div class="col-xl-6 col-sm-6 col-12">
                        <div class="card shadow border-0">
                            <div class="card-body">
                                <canvas id="canvas1"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-sm-6 col-12">
                        <div class="card shadow border-0">
                            <div class="card-body">
                                <canvas id="canvas2"></canvas>
                            </div>
                        </div>
                    </div>
                </div>