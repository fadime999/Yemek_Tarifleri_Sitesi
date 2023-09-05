<?php
    if(isset($_SESSION['admin_name'])) {
        header("Location: admin_page.php");
    }
    session_start();
?>

<?php include "partials/header.php" ?>
<?php include "partials/navbar.php" ?>

<div class="container my-3">
    <div class="row">
        <div class="col-12">
            <div class="border p-2 mb-2">
                <a href="category_create.php" class="btn btn-primary">Kategori Ekle</a>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th style="width:50px;">Id</th>
                        <th>Kategori Adı</th>
                        <th style="width:130px;"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $sonuc = getCategories(); while($category = mysqli_fetch_assoc($sonuc)): ?>
                        <tr>
                            <td><?php echo $category["id"]?></td>
                            <td><?php echo $category["category_name"]?></td>
                            <td>
                                <a href="category_edit.php?id=<?php echo $category["id"];?>" class="btn btn-primary btn-sm">Edit</a>
                                <a href="category_delete.php?id=<?php echo $category["id"];?>" class="btn btn-danger btn-sm">Delete</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>


    <?php include "partials/footer.php" ?>