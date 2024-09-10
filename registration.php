<!DOCTYPE html>
<html dir="rtl">
<head>
    <meta charset="utf-8"/>
    <title>حساب جديد</title>
      <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/login.css"/>

</head>
<body>
<?php
    require('conn/conn.php');
 
    if (isset($_POST['username'])) {
        // ازله الخطوط المائله
        $username = stripslashes($_POST['username']);
        $username = mysqli_real_escape_string($conn, $username);

        $email    = stripslashes($_POST['email']);
        $email    = mysqli_real_escape_string($conn, $email);

        $password = stripslashes($_POST['password']);
        $password = mysqli_real_escape_string($conn, $password);
        
        $create_datetime = date("Y-m-d H:i:s");
        
        
        $query = "SELECT `email` FROM `users` WHERE `email` = '$email'";
  $result = mysqli_query($conn,$query);
  if(mysqli_num_rows($result) > 0){
  
      echo '<div class="alert alert-danger" style="width:100%;height:100% ;
			text-align: center;">هذا البريد مستخدم من قبل
            <p class="link">اضغط هنا <a href="registration.php">هنـــــا</a>لاإعادة التسجبل </p>
            
            </div>';
    
    
}else{
    
        
        $query    = "INSERT into `users` (username, password, email, create_datetime)
                     VALUES ('$username', '" . md5($password) . "', '$email', '$create_datetime')";
        $result   = mysqli_query($conn, $query);
        if ($result) {
            echo "<div class='form alert alert-info'>
                  <h3 class='text-cnter'>تم التسجيل</h3><br/>
                  <p class='link text-cnter'>اضغط هنا <a href='st_login.php'>سجل الان</a></p>
                  </div>
                            <script>
                  setTimeout(function(){window.location.href='st_login.php';},4000)
                           </script>
                  ";
        } else {
            echo "<div class='form alert alert-info'>
                  <h3>الحقول غير موجوده</h3><br/>
                  <p class='link'>اضغط هنا <a href='registration.php'></a>اعد التسجبل </p>
                  </div>";
        }
    } }else {
?>

    
    
    
    
<main class="form-signin">
  <form class="form" method="post" action="">
    <img class="mb-4" src="admin.png" alt="" width="100" height="100">
    <h1 class="h3 mb-3 fw-normal">عضو جديد</h1>

    <div class="form-floating">
      <input type="text" class="form-control" name="username" placeholder="ادخل الاسم" required>
      <label for="floatingInput">ادخل الاسم</label>
    </div>
      
        <div class="form-floating">
      <input type="email" autofocus="autofocus"  name="email" id="login1" class="form-control" id="floatingPassword" placeholder="ادخل الايميل" required>
      <label>ادخل الايميل</label>
    </div>
      
      
    <div class="form-floating">
      <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="ادخل كلمه المرور">
      <label for="floatingPassword" required>كمله المرور</label>
    </div>

    <button class="w-100 btn btn-lg btn-primary"  name="submit"  type="submit">سجل الان</button>

      <p class="link">لديك بالفعل حساب؟ <a href="st_login.php">سجل الان</a></p>
    <p class="mt-5 mb-3 text-muted">&copy; 2022.2023</p>
  </form>
</main>

<?php
    }
?>
</body>
</html>
