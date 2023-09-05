    
    <?php require_once('config.php')?>
    <?php include('partials/header.php')?>
    <?php include('partials/navbar.php')?>

    <?php
        $result_categories=mysqli_query($connection,"SELECT * FROM categories");

        $categories = mysqli_fetch_all($result_categories,MYSQLI_ASSOC);

        mysqli_close($connection);
    ?>

<div class="container my-3">
        <div class="row">
            <div class="col-3">
                <?php include('partials/categories.php') ?>

            </div>
            
            <div class="col-9">
            <main class="container mt-1">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                             <img src="img/brownie_resmi.jpg" class="img-fluid rounded-start">
                            <div class="card-body">
                                <h5 class="card-title">Brownie Tarifi</h5>
                                <p class="card-text">Yoğun çikolata lezzetinin ve pürüzsüz dokunun sırrını evde keşfetmeye hazır mısınız? İşte brownie tarifi!</p>
                                <a href="./recipes_detail.php?id=6" class="btn" style="background-color: #FF7043; color: #ffffff;">Tarifi Görüntüle</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <img src="img/mantı_resmi.jpg" class="card-img-top" alt="Yemek Resmi 2">
                            <div class="card-body">
                                <h5 class="card-title">Mantı Tarifi</h5>
                                <p class="card-text">Lezzetli bir Türk mutfağı klasiği olan mantının, ince hamuru ve iç harcıyla nasıl hazırlandığını öğrenmeye hazır mısınız?</p>
                                <a href="./recipes_detail.php?id=10" class="btn" style="background-color: #FF7043; color: #ffffff;">Tarifi Görüntüle</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <img src="img/tantuni_resmi.jpg" class="card-img-top" alt="Yemek Resmi 3">
                            <div class="card-body">
                                <h5 class="card-title">Mersin Usulü : Tantuni Tarifi</h5>
                                <p class="card-text">Mersin'in eşsiz lezzeti Tantuni'nin sırrını evde keşfedin!</p>
                                <a href="./recipes_detail.php?id=11" class="btn" style="background-color: #FF7043; color: #ffffff;">Tarifi Görüntüle</a>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            </div>
        </div>
    </div>


