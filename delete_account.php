
<style>
		img{
width: 10%;

 height:120px;
		}
</style>

<?php
require_once './conn/conn.php';
 include_once "header.php";  

session_start();
if(!isset($_SESSION["id"]) || $_SESSION["id"] == '') 
{
	header('location: index.php');
}

$id = $_GET['id'];

if($id == 1){
	echo '<script>alert("غير مصرح لك بحذف هذا المستخدم لانه المشرف")</script>';
	echo '<script>windows: location="mang_accounts.php"</script>';
} 

$query = "SELECT * FROM admin_accounts where id = '$id' ";
$result = mysqli_query($conn,$query);
while ($row = mysqli_fetch_array($result))
{
	$delfirstname = $row['firstname']; 
	$dellastname = $row['lastname']; 
	$delusername = $row['username']; 
	$delpicture = $row['picture'];
}

if(isset($_POST['yes'])){
	$del = "DELETE from admin_accounts where id = '".$id."' ";
	mysqli_query($conn,$del);
?>
	<script>alert('تم الحذف')</script>
	<script>windows: location="mang_accounts.php"</script>
<?php
}

if(isset($_POST['no'])){
	echo '<script>windows: location="mang_accounts.php"</script>';
}
?>
<body>

		<?php include('admin_header.php');?>

					<form action="" method="post">
					<br>
					<center>					
	        <img src="images/<?php echo "$delpicture";?>" >
			<h3> <?php echo "$delfirstname $dellastname";?></h3>	
			<h3> <?php echo "$delusername";?></h3>
			<strong>هل انت متاكد من الحذف؟</strong>	
	    <br>
        <input type="submit" name="yes"  value="نعم"
        class="btn btn-lg btn-outline-danger col-lg-3 col-md-4 col-sm-11 col-xs-11 button">
      
       <br>
	   <br>
        <input type="submit" name="no"  value="لا"
        class="btn btn-lg btn-outline-primary col-lg-3 col-md-4 col-sm-11 col-xs-11 button">
      	
           
           
      
                        </center>
						
				
              

							
					</form>
				
			
	
</body>
</html>