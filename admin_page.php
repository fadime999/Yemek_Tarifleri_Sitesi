<?php
@include 'config.php';
session_start();

if(!isset($_SESSION['admin_name'])){
   header('location:login.php');
}
?>

<?php include('partials/header.php')?>
<?php include('partials/navbar.php')?>

   
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel Kartı</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <div class="card text-center">
            <div class="card-header">
            <h2>Admin Paneli</h2>
            </div>
            <div class="card-body">
                <h5 class="card-title">Hoş Geldiniz,</h5>
                <p class="card-text">Bu admin paneline erişim sağladınız. Yönetici olarak çeşitli işlemleri gerçekleştirebilirsiniz.</p>
            </div>
        </div>

    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
