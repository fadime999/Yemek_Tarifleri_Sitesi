    <?php require_once('config.php')?>
    <?php include('partials/header.php')?>
    <?php include('partials/navbar.php')?>

    <?php
        if(!isset($_GET['id'])){
           header("Location:homepage.php");  
        }

        $id=$_GET['id'];

        $result_categories=mysqli_query($connection,"SELECT * FROM categories");
        $result_receipe=mysqli_query($connection,"SELECT * FROM recipes WHERE id=".$id);

        $categories = mysqli_fetch_all($result_categories,MYSQLI_ASSOC);
        $receipe = mysqli_fetch_assoc($result_receipe);

        mysqli_close($connection);
    ?>

    <div class="container my-3">
        <div class="row">
            <div class="col-3">
            <?php include('partials/categories.php') ?>
                <?php if(isset($_SESSION['user_name'])): ?>
                <div class="list-group"  style="margin-top: 20px;">
                    <a href="<?php echo "recipe_create.php"?>" 
                    class="list-group-item list-group-item-action <?php if($categoryId == $category["id"]) echo "active"; ?>">
                     <?php echo "Add Recipe"?>
                    </a>
                </div>
                    <?php endif; ?>   
            </div>
            <div class="col-9">
                <?php include('partials/recipe_detail.php')?>
            </div>
        </div>
    </div>

    <?php include('partials/footer.php')?>