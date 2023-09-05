<?php require_once('config.php')?>
<?php
        if(!isset($_GET['id'])){
           header("Location:recipes.php");  
        }

        $id=$_GET['id'];

        $result_receipe=mysqli_query($connection,"SELECT * FROM recipes WHERE id=".$id);

        $receipe = mysqli_fetch_assoc($result_receipe);

        mysqli_close($connection);
?>

<?php include "partials/header.php" ?>
<?php include "partials/navbar.php" ?>

<div class="container my-3">

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                <form method="POST">
                    <b><?php echo $receipe["recipe_name"]?></b> isimli tarifi silmek istiyor musunuz?
                    <button type="submit" class="btn btn-danger">Sil</button>
                </form>
                </div>
            </div>
        </div>
    </div>

</div>
<?php include "partials/footer.php" ?>