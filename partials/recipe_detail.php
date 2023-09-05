<div class="card mb-3">
    <div class="row">
        <div class="col-md-3">
            <img src="img/<?php echo $receipe['image']?>" class="img-fluid rounded-start">
        </div>
        <div class="col-md-9">
            <div class="card-body">
                <h3 class="card-title">
                    <?php echo $receipe['recipe_name']?>
                </h3>
                <h5 class="Ingredients_title__KNT98">Tarif İçin Malzemeler </h5>
                <p>
                     <?php echo $receipe['ingredients']?>
                </p>
                <h5 class="ContentRecipe_title__gqard">Tarif Nasıl Yapılır?</h5>
                <p>
                     <?php echo $receipe['preparation']?>
                </p>
                <?php if(isset($_SESSION['user_name'])): ?>
                <!-- Edit ve Delete Butonları -->
                <div class="btn-group" role="group">
                    <a href="recipe_edit.php?id=<?php echo $receipe['id']; ?>" class="btn btn-primary">Edit</a>
                    <a href="recipe_delete.php?id=<?php echo $receipe['id']; ?>" class="btn btn-danger">Delete</a>
                </div>
                <?php endif; ?> 
             </div>
        </div>
    </div>
</div>
