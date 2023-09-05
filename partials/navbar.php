<?php
@include 'config.php';
?>

<?php require "libs/functions.php";?>

<?php
$categoryId = "";
if (isset($_GET["categoryId"]) && is_numeric($_GET["categoryId"])) {
      $categoryId = $_GET["categoryId"];
}
?>

<nav class="navbar navbar-expand " data-bs-theme="dark" style="background-color:  #FF7043; color: white;">
        <div class="logo"> 
                <img src="https://img.freepik.com/free-vector/doodle-kitchenware-equipment-vector_53876-170429.jpg?w=740&t=st=1693912239~exp=1693912839~hmac=44025c531dadd4233c8ac52ba66a796db624871fcd40632d89f402dcd888e7c4" alt="Logo" width="50" height="auto" style="position: relative; left: 20px;">
        </div>
        <div class="container">
            <a href="./homepage.php" class="navbar-brand">Yemek Tarifleri</a>
            <?php if(isset($_SESSION['admin_name'])): ?>
                <a class="nav-link" href="admin_categories.php">Admin Kategoriler</a>

                <a class="nav-link" href="admin_recipes.php">Admin Tarifler</a>
            <?php else: ?>   
                <?php  session_start();?> 
            <?php endif; ?> 

            <form action="recipes.php" class="d-flex ml-auto" role="search">
                <input class="form-control me-2" name="q" type="search" placeholder="Yemek Tarifi Ara..." aria-label="Search">
                <button class="btn btn-outline-light" type="submit">
                    <i class="fas fa-search"></i>
                </button>
            </form>

            <ul class="navbar-nav me-2">
            <?php if(isset($_SESSION['admin_name'])): ?>
                <li class="nav-item">
                    <a href="logout.php" class="nav-link">Logout</a>
                </li>
                <li class="nav-item">
                    <a href="admin_page.php" class="nav-link">Hoş geldiniz, <?php echo $_SESSION['admin_name']  ?></a>
                </li>
            <?php elseif(isset($_SESSION['user_name'])): ?>
                <li class="nav-item">
                    <a href="logout.php" class="nav-link">Logout</a>
                </li>
                <li class="nav-item">
                    <a href="user_page.php" class="nav-link">Hoş geldiniz, <?php echo $_SESSION['user_name']  ?></a>
                </li>
            
            <?php else: ?>   
                <ul class="navbar-nav ml-auto navbar-right">
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">
                            <button class="btn btn-outline-light">Login</button>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="registration.php">
                            <button class="btn btn-outline-light">Register</button>
                        </a>
                    </li>
            </ul>
            <?php endif; ?>   
            </ul>
        </div>
</nav>