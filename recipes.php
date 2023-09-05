    <?php require_once('config.php')?>
    <?php include('partials/header.php')?>
    <?php include('partials/navbar.php')?>

    <?php
        $categoryId="";
        $keyword="";
        $page=1;

        if(isset($_GET['categoryId']) && is_numeric($_GET['categoryId']))
            $categoryId=$_GET['categoryId'];

        if(isset($_GET["q"]))
            $keyword=$_GET["q"];

        if(isset($_GET[$page]) && is_numeric($_GET[$page]))
            $page=$_GET[$page];
        
        $res = getRecipesByFilters($categoryId, $keyword, $page);   

        $result_categories=mysqli_query($connection,"SELECT * FROM categories");

        $categories = mysqli_fetch_all($result_categories,MYSQLI_ASSOC);
        mysqli_close($connection);
    ?>


    <div class="container my-3">
        <div class="row">
            <div class="col-3">
                <?php include('partials/categories.php') ?>
                <?php if(isset($_SESSION['user_name'])): ?>
                <div class="list-group"  style="margin-top: 20px;">  
                    <a href="<?php echo "recipe_create.php"?>" 
                    class="list-group-item list-group-item<?php if($categoryId == $category["id"]) echo "active"; ?>">
                     <?php echo "Add Recipe"?>
                    </a>
                </div>
                <?php endif; ?>   
            </div>
            
            <div class="col-9">
            <?php include('partials/recipe.php') ?>
            </div>
        </div>
    </div>

    <?php include('partials/footer.php')?>