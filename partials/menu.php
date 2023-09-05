<?php

    if(isset($_GET[$categoryId]) && is_numeric($_GET[$categoryId]))
        $selected_category=$_GET[$categoryId];

?>

<div class="list-group">
    <?php
        $result=mysqli_query($connection,"SELECT * FROM categories");
        while($category=mysqli_fetch_assoc($result)):?>

            
    
    
        <?php endwhile ?>
</div>