<?php include "partials/header.php" ?>
<?php include "partials/navbar.php" ?>

<?php
    //session_start();
    $recipe_nameErr = $recipe_name = "";
    $ingredientsErr = $ingredients = "";
    $preparationErr = $preparation = "";
    $categoryIDErr = $categoryID = "";
    $resimErr = $resim = "";

    if($_SERVER["REQUEST_METHOD"]=="POST") {

        if(empty($_POST["recipe_name"])) {
            $recipe_nameErr = "tarif adı gerekli alan.";
        } else {
            $recipe_name = safe_html($_POST["recipe_name"]);
        }

        if(empty($_POST["ingredients"])) {
            $ingredientsErr = "içindekiler gerekli alan.";
        } else {
            $ingredients = safe_html($_POST["ingredients"]);
        }

        if(empty($_POST["preparation"])) {
            $preparationErr = "aciklama gerekli alan.";
        } else {
            $preparation = safe_html($_POST["preparation"]);
        }

        if(empty($_POST["categoryID"])) {
            $categoryIDErr = "aciklama gerekli alan.";
        } else {
            $categoryID = safe_html($_POST["categoryID"]);
        }

        if(empty($_FILES["imageFile"]["name"])) {
            $resimErr = "resim seçiniz.";
        } else {
            uploadImage($_FILES["imageFile"]);
            $image = $_FILES["imageFile"]["name"];
        }

        

        if(empty($baslikErr) && empty($altBaslikErr) && empty($resimErr)) {
            $category = $_POST["category"];
            if ($category == "Ana Yemekler") {
                $categoryID = 1;
            } else if ($category == "Tatlılar") {
                $categoryID = 2;
            } else if ($category == "Kahvaltılıklar") {
                $categoryID = 3;
            }

            createRecipe($recipe_name,$ingredients,$preparation,$categoryID,$image);
            $_SESSION["message"] = $baslik." isimli kurs eklendi";
            $_SESSION["type"] = "success";
            header('Location: recipes.php');
        }
        
    }

?>

<div class="container my-3">
    <div class="row">
        <div class="col-12">
            <div class="card card-body">
                <form method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="recipe_name">Tarif Adı</label>
                        <input type="text" name="recipe_name" class="form-control" value="<?php echo $recipe_name;?>">
                        <div class="text-danger"><?php echo $recipe_nameErr; ?></div>
                    </div>
                    <div class="mb-3">
                        <label for="ingredients">İçindekiler</label>
                        <input name="ingredients" class="form-control" value="<?php echo $ingredients;?>">
                        <div class="text-danger"><?php echo $ingredientsErr; ?></div>
                    </div>
                    <div class="mb-3">
                        <label for="preparation">Hazırlanışı</label>
                        <textarea name="preparation" class="form-control"><?php echo $preparation;?></textarea>
                        <div class="text-danger"><?php echo $preparationErr; ?></div>
                    </div>
                    <div class="mb-3">
                        <label for="category">Kategori</label>
                        <select name="category" class="form-control">
                            <option value="Ana Yemekler">Ana Yemekler</option>
                            <option value="Kahvaltılıklar">Kahvaltılıklar</option>
                            <option value="Tatlılar">Tatlılar</option>
                        </select>
                    </div>
                    <div class="input-group mb-3">
                        <input type="file" name="imageFile" id="imageFile" class="form-control">
                        <label for="imageFile" class="input-group-text">Yükle</label>
                    </div>
                    <div class="text-danger"><?php echo $resimErr; ?></div>

                    <button type="submit" class="btn" style="background-color: #FF7043;">Kaydet</button>

                </form>
           </div>

        </div>
    </div>
</div>

<?php include "partials/footer.php" ?>