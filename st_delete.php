
    <style>
 img{border-radius: 20px;
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

$query = "SELECT * FROM info_student WHERE id = '$id'";
$result = mysqli_query($conn,$query);
while($row = mysqli_fetch_array($result)){
	$upfirstname = $row['firstname']; 
	$uplastname = $row['lastname']; 
	$upfirst = $row['first_mark'];
	$upsecond = $row['second_mark']; 
	$upthird = $row['third_mark']; 
	$upfourth = $row['fourth_mark'];
	$uppicture= $row['picture'];
}

if(isset($_POST['yes'])){
	$query = "DELETE from info_student where id = '$id' ";
	mysqli_query($conn,$query);
?>
	<script>alert('تم الحذف')</script>
	<script>windows: location="st_view.php"</script>
<?php
}

if(isset($_POST['no'])){
	echo '<script>windows: location="st_view.php"</script>';
}
?>
<body>
	<center>
		<?php include('teacher_header.php');?>
		<br>
	
					<center>
					<form action="" method="post">
					
						
				<img src="images/<?php echo "$uppicture";?>"  style="width: 17%; height:">
						
						
            <h3 width="50%">الاسم </h3>
            <strong><?php echo "$uplastname , $upfirstname";?></strong>

							
              <br>
        <font style="font-size: 20px"><strong>متاكد من الحذف؟</strong></font>
						<br>
						
							                 
            <input type="submit" name="yes"  value="نعم"
        class="btn btn-lg btn-danger col-lg-3 col-md-4 col-sm-11 col-xs-11 button">
      
       <br>
	   <br>
        <input type="submit" name="no"  value="لا"
        class="btn btn-lg btn-primary col-lg-3 col-md-4 col-sm-11 col-xs-11 button">
      	
           
                        
           
      	
           
           
					
                        </form>
        </center>
    </center>

</body>
</html>