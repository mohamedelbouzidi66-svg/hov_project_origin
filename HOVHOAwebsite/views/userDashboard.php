<?php 
    include '../includes/header.php';
    include '../includes/nav.php';

    $connect = false;
    if(isset($_SESSION['users'])){
        $connect = true;
    }
?>

    <title>User Dashboard Page</title>
    <style>
        body {
            font-family: 'AdihausDIN', "Helvetica Neue", Helvetica, Arial, sans-serif;
            background-color: #ffffff;
            color: #000000;
            font-size: 14px;
        }

        .dashboard-card {
            border: 1px solid #a9a9a9;
            border-radius: 0;
            margin-bottom: 24px;
            background: #fff;
        }
        .dashboard-card-header {
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-size: 20px;
            padding: 20px;
            border-bottom: 1px solid #ebedee;
        }
        .dashboard-card-body {
            padding: 20px;
        }
        .text-link {
            font-weight: 700;
            font-size: 12px;
            letter-spacing: 1px;
            text-decoration: underline;
            color: #000;
            text-transform: uppercase;
        }
        .text-link:hover {
            color: #444;
        }
        .info-value {
            font-size: 14px;
            margin-bottom: 8px;
            text-transform: uppercase;
        }
        .alert-grey {
            background-color: #f5f6f7;
            border: none;
            border-radius: 0;
            padding: 15px;
        }
        .loyalty-banner {
            height: 180px;
            background-image: url('../assets/background.webp');
            background-size: cover;
            background-position: center;
        }
    </style>
<body>
    <?php
        if($connect){
    ?>
    <br>
    <div class="container my-4 px-4">
        <div class="row g-2">
            <div class="col-12 col-md-7">
                <div class="dashboard-card">
                    <div class="dashboard-card-header">
                        Personal information
                        <div class="fw-normal text-transform-none text-muted lowercase mt-1" 
                            style="font-size: 13px; text-transform: none; letter-spacing: 0;">
                            You can edit your information below whenever you want.
                        </div>
                    </div>
                    
                    <div class="dashboard-card-body">
                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <h6 class="fw-bold text-uppercase tracking-wider m-0" 
                                style="font-size: 20px;">Information</h6>
                            <a href="modifyUser.php?id=<?php echo $_SESSION['users']['idUser'] ?>" 
                                class="text-link">To modify
                            </a>
                        </div>
                        
                        <div class="info-value">
                            <?php echo $_SESSION['users']['fullname'] ?>
                        </div>
                        <div class="info-value">
                            <?php echo $_SESSION['users']['email'] ?>
                        </div>
                    </div>
                </div>

                <div class="dashboard-card">
                    <div class="dashboard-card-body d-flex justify-content-between align-items-center py-3">
                        <h6 class="fw-bold text-uppercase m-0" style="font-size: 14px; letter-spacing: 1px;">
                            Data parameters
                        </h6>
                        <a href="#" class="text-link">To modify</a>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-5">
                <div class="dashboard-card overflow-hidden">
                    <div class="loyalty-banner"></div>
                    <div class="dashboard-card-body d-flex justify-content-between align-items-center py-3">
                        <h6 class="fw-bold text-uppercase m-0" style="font-size: 14px; letter-spacing: 1px;">Loyalty Program</h6>
                        <a href="#" class="text-link">Display</a>
                    </div>
                </div>

                <div class="dashboard-card">
                    <div class="dashboard-card-header py-3">
                        Wishlist
                    </div>
                    <div class="dashboard-card-body">
                            <div class="text-muted">This list is empty.</div>
                    </div>
                </div>

                <a href="userLogout.php" class="btn btn-danger w-75 mx-auto d-block mt-4 py-2" 
                    onclick="return confirm('You are about to log out. Continue?')">
                    <i class="bi bi-box-arrow-right"></i>Logout
                </a>

            </div>
        </div>
    </div>
    <?php include '../includes/footer.php' ?>
    <?php
        }else{
            header('location:userLogin.php');
    ?>
<br>
    <?php
        }
    ?>
</body>
</html>