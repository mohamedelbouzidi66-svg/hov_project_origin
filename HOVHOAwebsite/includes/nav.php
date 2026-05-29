    <?php 
    session_start(); 
    $connect = false;
    if(isset($_SESSION['users'])){
        $connect = true;
    }
    ?>
    <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
        <div class="container-fluid"><a class="navbar-brand me-5 fw-bold fs-3" href="index.php"><img src="../assets/hov_logo6.PNG" style="height: 6rem;"></a><button
                class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span
                    class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link fw-light text-dark fs-5" href="men.php" target="_blank">MEN</a></li>
                    <li class="nav-item"><a class="nav-link fw-light text-dark fs-5" href="women.php" target="_blank">WOMEN</a></li>
                    <li class="nav-item"><a class="nav-link fw-light text-dark fs-5" href="accessories.php" target="_blank">ACCESSORIES</a></li>
                    <li class="nav-item"><a class="nav-link fw-light text-dark fs-5" href="sports.php" target="_blank">SPORTS</a></li>
                </ul>
                <form class="search-box d-flex align-items-center">
                    <input type="text" 
                    class="form-control shadow-none me-3"
                    placeholder="Search vintage clothes...">
                </form>
                <a href="bag.php" target="_blank"><i class="bi bi-bag fs-5 me-3 text-dark"></i></a>
                <a href="fav.php"><i class="bi bi-heart fs-5 me-3 text-dark"></i></a>
                <?php
                    if($connect){
                        ?>
                        <a href="dashboard.php" target='_blank' class="bz text-decoration-none"><i class="bi bi-person fs-4 me-0 text-dark"></i>
                        <a href="dashboard.php" class="bz text-dark fs-8 me-2 py-3 fw-bold text-uppercase text-decoration-none"><?= $_SESSION['users']['fullname']?></a>
                <?php
                    }else{
                ?>
                <a href="login.php" target='_blank' class="bz text-decoration-none"><i class="bi bi-person fs-3 me-0 text-dark"></i>
                <span class="bz text-dark fs-8 me-2 py-3 fw-bold text-uppercase"></span>
                <?php
                    }
                ?>
                </a>
            </div>
        </div>
    </nav>
<br>