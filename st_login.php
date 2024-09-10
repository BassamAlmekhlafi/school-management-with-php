<?php
   session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>صفحه تسجيل الدخول</title>
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/login.css"/>
</head>
<body>
<?php
require_once './conn/conn.php';

    if (isset($_POST['username'])) {
        $username = stripslashes($_POST['username']); 
        $username = mysqli_real_escape_string($conn, $username);
        $password = stripslashes($_POST['password']);
        $password = mysqli_real_escape_string($conn, $password);

        $query    = "SELECT * FROM `users` WHERE username='$username'
                     AND password='" . md5($password) . "'";
        $result = mysqli_query($conn, $query) or die(mysql_error());
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
            $_SESSION['username'] = $username;
      
            header("Location: st_marks.php");
        } else {
            echo 
            
            "<div class='form alert alert-info'>
                  <h3>الاسم اوكلمه المرور غير صحيحه</h3><br/>
                  <p class='link'>اضغط هنا <a href='st_login.php'>سجل مره اخرى</a> </p>
                  </div>";
        }
    } else {
?>

  
<main class="form-signin">
  <form class="form" method="post" name="login">
    <img class="mb-4" src="logo/student.png" alt="" width="100" height="100">
    <h1 class="h3 mb-3 fw-normal">سجل دخولك</h1>

    <div class="form-floating">
      <input type="text" class="form-control" name="username" placeholder="ادخل الاسم">
      <label for="floatingInput" required>ادخل الاسم</label>
    </div>
    
    <div class="form-floating">
      <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="ادخل كلمه المرور">
      <label for="floatingPassword" required>كمله المرور</label>
    </div>

    <button class="w-100 btn btn-lg btn-primary"  name="submit" type="submit">سجل الان</button>

       <p class="link">لاامتلك حساب؟ <a href="registration.php">تسجيل عضو جديد</a>
    <p class="mt-5 mb-3 text-muted">&copy; 2024.2025</p>
  </form>

</main>
   
<?php
    }
?>
</body>
</html>
