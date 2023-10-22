<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
    <link rel="stylesheet" href="Shomepage.css">

    <title>Homepage</title>
</head>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Fasthand&display=swap');

    .dropdown:hover .dropdown-menu {
        display: block;
    }
</style>

<body>
    <div class="container">
        <!-- navbar -->
        <nav class="navbar navbar-expand-lg" style="background-color: #102e44;">
            <div class="container-fluid">
                <a href="index.php" class="navbar-brand">
                    <img src="./img/ATN-logo.png" alt="..." width="70px">
                </a>

                <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navsup">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navsup">
                    <!--Left-->
                    <div class="navbar-nav">
                        <div class="dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"
                                style="color: #fff">Category</a>

                            <div class="dropdown-menu" style="background-color: #102E44;">
                                <a href="category.php?cid=1" class="dropdown-item" style="color: #fff">Lego</a>
                                <a href="category.php?cid=2" class="dropdown-item" style="color: #fff">Ribik</a>
                            </div>
                        </div>
                        <div class="dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"
                                style="color: #fff">Management</a>

                            <div class="dropdown-menu" style="background-color: #102E44;">
                                <a href="productadd.php" class="dropdown-item" style="color: #fff">Add product</a>
                                <!-- <a href="#" class="dropdown-item" style="color: #fff">Add customer</a> -->
                            </div>
                        </div>
                        <a href="search.php" class="nav-link" style="color: #fff;">Search</a>
                    </div>

                    <!--Right-->
                    <div class="navbar-nav ms-auto">
                        <?php
                        SESSION_START();
                        if (isset($_SESSION['account'])):
                            ?>
                            <a href="#" class="nav-link" style="color: white;">Welcome,
                                <?= $_SESSION['account'] ?>
                            </a>
                            <a href="logout.php" class="nav-link" style="color: white;">Logout</a>
                            <?php
                        else:
                            ?>
                            <a href="login.php" class="nav-link" style="color: #fff">Login</a>
                            <?php
                        endif;
                        ?>
                    </div>
                </div>
            </div>
        </nav>

        <div class="container-fluid">
            <img src="./img/slide.jpg" alt="..." class="mx-auto d-block">
        </div>
    </div>