

<?php
 include_once "header.php";  
$id = $_SESSION['id'];

 $sql = "SELECT * FROM admin_accounts where id = '".$id."'";
            
    $query = mysqli_query($conn, $sql); 
          
    while ($row = mysqli_fetch_array($query)){
	$picture = $row['picture'];
	$lastname = $row['lastname'];
	$firstname = $row['firstname'];
}
?>
<br>
	<center>
	<div class="btn1">
	<a href="mang_accounts.php">
        <button type="button" 
        class="btn btn-lg btn-primary col-lg-3 col-md-4 col-sm-11 col-xs-11 button">
        جميع المستخدمين</button></a>
            
		<a href="create_account.php">
        <button type="button"
         class="btn btn-lg btn-warning col-lg-3 col-md-4 col-sm-11 col-xs-11 button">معلم جديد
      </button></a>
        
     
        
	 <a href="logout.php">
        <button type="button"
         class="btn btn-lg btn-success col-lg-3 col-md-4 col-sm-11 col-xs-11 button">تسجيل خروج
      </button></a>   
 
</center>  
  
        </div>



</body>
</html>