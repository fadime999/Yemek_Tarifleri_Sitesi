<?php
    if(isset($_SESSION['admin_name'])) {
        header("Location: unauthorize.php");
    }
    session_start();
?>

<?php include "partials/header.php" ?>
<?php include "partials/navbar.php" ?>

<div class="container my-3">

<div class="row">
    <div class="col-12">
        <div class="border p-2 mb-2">
            <a href="recipe_create.php" class="btn btn-primary">Tarif Ekle</a>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th style="width: 175px;">Tarif Adı</th>
                    <th style="width: 150px;">Resim</th>
                    <th>İçindekiler</th>
                    <th style="width:130px;"></th>
                </tr>
            </thead>
            <tbody>
                <?php $sonuc = getRecipes(false,false); while($recipe = mysqli_fetch_assoc($sonuc)): ?>
                    <tr>
                        <td><?php echo $recipe["recipe_name"]?></td>
                        <td><img class="img-fluid" src="img/<?php echo $recipe["image"] ?>" alt=""></td>
                        <td><?php echo $recipe["ingredients"]?></td>

                        <td>
                            <a href="recipe_edit.php?id=<?php echo $recipe["id"];?>" class="btn btn-primary btn-sm">Edit</a>
                            <a href="recipe_delete.php?id=<?php echo $recipe["id"];?>" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>
<?php include "partials/footer.php" ?>