<?php
$categoryId = "";
if (isset($_GET["categoryId"]) && is_numeric($_GET["categoryId"])) {
      $categoryId = $_GET["categoryId"];
}
?>

<div class="list-group">
    <style>
        .list-group-item.active {
            background-color: #FF7043; /* veya istediğiniz renk */
            color: #ffffff; /* veya istediğiniz renk */
        }
    </style>
      <?php foreach($categories as $category):?>
         <a href="<?php echo "recipes.php?categoryId=".$category["id"]?>" 
               class="list-group-item list-group-item-action <?php if($categoryId == $category["id"]) echo "active"; ?>">
               <?php echo $category["category_name"]?>
         </a>
      <?php endforeach; ?>
</div>