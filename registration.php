<?php

@include 'config.php';

if(isset($_POST['submit'])){

   $username = mysqli_real_escape_string($connection ,$_POST['username']);
   $email = mysqli_real_escape_string($connection, $_POST['email']);
   $pass = md5($_POST['password']);
   $cpass = md5($_POST['cpassword']);
   $user_type = "user";

   $select = " SELECT * FROM users WHERE email = '$email' && password = '$pass' ";

   $result = mysqli_query($connection, $select);

   if(mysqli_num_rows($result) > 0){

      $error[] = 'user already exist!';

   }else{

      if($pass != $cpass){
         $error[] = 'password not matched!';
      }else{
         $insert = "INSERT INTO users(username, email, password, user_type) VALUES('$username','$email','$pass','$user_type')";
         mysqli_query($connection, $insert);
         header('location:login.php');
      }
   }

};
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta username="viewport" content="width=device-width, initial-scale=1.0">
   <title>Kayıt Formu</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<div class="form-container">

   <form action="" method="post" style="border: 2px solid #FF7043; padding: 10px;">
      <h3>ÜYE OL</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <input type="text" name="username" required placeholder="Kullanıcı Adı">
      <input type="email" name="email" required placeholder="E Posta Adresi">
      <input type="password" name="password" required placeholder="Şifre">
      <input type="password" name="cpassword" required placeholder="Parolanızı Onaylayın">
      <input type="submit" name="submit" value="ÜYE OL" class="form-btn">
      <p>Zaten üyeliğiniz var mı? <a href="login.php">GİRİŞ YAP</a></p>
   </form>

</div>

</body>
</html>