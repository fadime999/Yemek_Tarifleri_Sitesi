<?php
    if(isset($_GET['categoryId']) && is_numeric($_GET['categoryId'])){
        $selectedCategory=$_GET['categoryId'];
        $result = getCoursesByCategoryId($selectedCategory);
    }else if(isset($_GET["q"])){
        $result = getRecipesByKeyword($_GET["q"]);
    }else{
        getRecipes();
    }
?>

<?php if(mysqli_num_rows($res["data"]) > 0): ?>
        <?php while($recipes = mysqli_fetch_assoc($res['data'])): ?>
            <?php $recipes['recipe_name'] ?>
                    <div class="card mb-3">
                    <div class="row">
                        <div class="col-md-3">
                            <img src="img/<?php echo $recipes['image']?>" class="img-fluid rounded-start">
                        </div>
                        <div class="col-md-9">
                            <div class="card-body">
                                <h5 class="card-title">
                                    <a href="./recipes_detail.php?id=<?php echo $recipes['id'];?>">
                                        <?php echo $recipes['recipe_name']?>
                                    </a>
                                </h5>
                                <p>
                                <?php echo $recipes['ingredients']?>
                                </p>
                            </div>
                        </div>
                    </div>
            </div>
       <?php endwhile ?>
<?php endif ?>