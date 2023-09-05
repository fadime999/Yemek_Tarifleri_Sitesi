<?php

@include 'config.php';

session_start();

if(isset($_POST['submit'])){

   $username = mysqli_real_escape_string($connection, $_POST['username']);
   $email = mysqli_real_escape_string($connection, $_POST['email']);
   $pass = md5($_POST['password']);
   $cpass = md5($_POST['cpassword']);
   $user_type = $_POST['user_type'];

   $select = " SELECT * FROM users WHERE email = '$email' && password = '$pass' ";

   $result = mysqli_query($connection, $select);

   if(mysqli_num_rows($result) > 0){

      $row = mysqli_fetch_array($result);
      setcookie("auth[username]", $row["username"], time() + (60 * 60 * 24));
      setcookie("auth[name]", $row["name"], time() + (60 * 60 * 24));
      $_SESSION["message"] = $username." ile hesaba giriş yapıldı";
      if($row['user_type'] == 'admin'){
         $_SESSION['admin_name'] = $row['username'];
         header('location:admin_page.php');
         
      }elseif($row['user_type'] == 'user'){

         $_SESSION['user_name'] = $row['username'];
         header('location:user_page.php');
      }
     
   }else{
      $error[] = 'incorrect email or password!';
   }

};
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Giriş Formu</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<div class="form-container">

   <form action="" method="post" style="border: 2px solid #FF7043; padding: 10px;" >
      <h3>GİRİŞ YAP</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <input type="email" name="email" required placeholder="E Posta Adresi">
      <input type="password" name="password" required placeholder="Şifre">
      <input type="submit" name="submit" value="GİRİŞ YAP" class="form-btn">
      <p>Hesabınız yok mu? <a href="registration.php">ÜYE OL</a></p>
   </form>

</div>

</body>
</html>