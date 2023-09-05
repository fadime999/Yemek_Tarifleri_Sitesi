<?php
    
function getRecipesByKeyword($q) {
    include "config.php";

    $query = "SELECT * from recipes WHERE recipe_name LIKE '%$q%'";
    $sonuc = mysqli_query($connection,$query);
    mysqli_close($connection);
    return $sonuc;
}

function getRecipesByFilters($categoryId, $keyword, $page) {
    include "config.php";

    $pageCount = 4;
    $offset = ($page - 1) * $pageCount; 
    $query = "";
    if(!empty($categoryId)) {
        $query = "from categories c INNER JOIN recipes r on c.id=r.categoryID WHERE c.id=$categoryId";
    } else {
        $query = "from recipes";
    }

    if(!empty($keyword)) {
        $query.= " where recipe_name LIKE '%$keyword%'";
    }

    $total_sql = "SELECT COUNT(*) ".$query;
    $count_data = mysqli_query($connection,$total_sql);
    $count = mysqli_fetch_array($count_data)[0];
    $total_pages = ceil($count / $pageCount);

    $sql = "SELECT * ".$query." LIMIT $offset, $pageCount";
    $sonuc = mysqli_query($connection,$sql);
    mysqli_close($connection);
    
    return array(
        "total_pages" => $total_pages,
        "data" => $sonuc
    );
}


function getCoursesByCategoryId(int $id) {
    include "config.php";
    
    $query = "SELECT * from categories c INNER JOIN recipes r on c.id=r.categoryID WHERE c.id=$id";
    $result = mysqli_query($connection,$query);
    mysqli_close($connection);
    return $result;
}

function getRecipes() {
    include "config.php";

    $query = "SELECT * from recipes ";

    $sonuc = mysqli_query($connection,$query);
    mysqli_close($connection);
    return $sonuc;
}

function createRecipe(string $recipe_name, string $ingredients,string $preparation,int $categoryID, string $image) {
    include "config.php";

    $query = "INSERT INTO recipes(`recipe_name`, `ingredients`, `preparation`, `categoryID`, `image`) VALUES (?,?,?,?,?)";
    $stmt = mysqli_prepare($connection,$query);

    mysqli_stmt_bind_param($stmt, 'sssis', $recipe_name,$ingredients,$preparation,$categoryID,$image);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    return $stmt;
}

function deleteCourse(int $id) {
    include 'config.php';

    $query = "DELETE FROM recipes WHERE id=$id";
    $sonuc = mysqli_query($connection,$query);
    mysqli_close($connection);
    return $sonuc;
}

function editRecipe(int $id,string $recipe_name, string $ingredients,string $preparation,int $categoryID, string $image) {
    include "config.php";

    $query = "UPDATE recipes SET recipe_name='$recipe_name', ingredients='$ingredients',preparation='$preparation',categoryID='$categoryID',image='$image' WHERE id=$id";
    $sonuc = mysqli_query($connection,$query);
    mysqli_close($connection);
    return $sonuc;
}
function safe_html($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data ;
}

function uploadImage(array $file) {
    if(isset($file)) {
        $dest_path = "./img/";
        $filename = $file["name"];
        $fileSourcePath = $file["tmp_name"];
        $fileDestPath = $dest_path.$filename;

        move_uploaded_file($fileSourcePath,$fileDestPath);
    }
}

function getRecipeById(int $id) {
    include "config.php";
    
    $query = "SELECT * from recipes WHERE id=$id";
    $sonuc = mysqli_query($connection,$query);
    mysqli_close($connection);
    return $sonuc;
}

function getCategories() {
    include "config.php";

    $query = "SELECT * from categories";
    $sonuc = mysqli_query($connection,$query);
    mysqli_close($connection);
    return $sonuc;
}

function createCategory(string $category) {
    include "config.php";

    $query = "INSERT INTO categories(category_name) VALUES (?)";
    $stmt = mysqli_prepare($connection,$query);

    mysqli_stmt_bind_param($stmt, 's', $category);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    return $stmt;
}

function deleteCategory(int $id) {
    include 'config.php';

    $query = "DELETE FROM categories WHERE id=$id";
    $sonuc = mysqli_query($connection,$query);
    mysqli_close($connection);
    return $sonuc;
}

function editCategory(int $id, string $category) {
    include "config.php";

    $query = "UPDATE categories SET category_name='$category' WHERE id=$id";
    $sonuc = mysqli_query($connection,$query);
    mysqli_close($connection);
    return $sonuc;
}

function getCategoryById(int $id) {
    include "config.php";
    
    $query = "SELECT * from categories WHERE id=$id";
    $sonuc = mysqli_query($connection,$query);
    mysqli_close($connection);
    return $sonuc;
}

?>
