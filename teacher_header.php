<!DOCTYPE html>
<html dir="rtl">
<head>
	<title>ADMIN</title>
    <style>
    
        .btn1 button{
      width: 20%
        }
    span{color:#f80;font-size:20px;font-weight: bold}
    </style>
</head>
<body>
<?php
$id = $_SESSION['id'];

    
 $sql = "SELECT * FROM admin_accounts where id = '$id'";
            
    $query = mysqli_query($conn, $sql); 
          
    while ($row = mysqli_fetch_array($query)){
    
	
	$lastname = $row['lastname'];
	$firstname = $row['firstname'];
}
?>

    
    
    
    <center>
        <span><?php echo "$firstname $lastname ";?></span>
	<div class="btn1">
	<a href="st_view.php">
        <button type="button" 
        class="w-10 btn btn-lg btn-outline-primary 
        col-lg-3 col-md-4 col-sm-11 col-xs-11 button">
      جميع السجلات</button></a>
<!--
     
            
 	<a href="view_student.php">
        <button type="button" 
        class="w-10 btn btn-lg btn-primary col-lg-3 col-md-4 col-sm-11 col-xs-11 button">
      جميع السجلات</button></a>
-->
   
  <a href="st_create_account.php">
        <button type="button"
         class="w-20  btn btn-lg btn-outline-success 
         col-lg-3 col-md-4 col-sm-11 col-xs-11 button">إنشاء حساب لطلاب
      </button></a> 
        
<!--
             <a href="add_student_mark.php">
        <button type="button"
         class="w-20 btn btn-lg btn-outline-warning 
         col-lg-3 col-md-4 col-sm-11 col-xs-11 button">إضافه العلامات </button></a>  
-->
                   
        <a href="logout.php">
        <button type="button"
         class=" w-20  btn btn-lg btn-outline-danger 
         col-lg-3 col-md-4 col-sm-11 col-xs-11 button">خروج
      </button></a> 
        
  </div>
        </div>
    </center>
    <br>
</body>
</html>