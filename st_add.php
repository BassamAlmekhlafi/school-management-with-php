
<?php
require_once './conn/conn.php';
 include_once "header.php";  
session_start();
if(!isset($_SESSION["id"]) || $_SESSION["id"] == '') 
{
	header('location: index.php');
}

$id = $_GET['id'];
$sql = "SELECT * FROM  info_student WHERE id = '$id'";
$result = mysqli_query($conn,$sql);
while($row = mysqli_fetch_array($result)){
	$upfirstname = $row['firstname']; 
	$upfirst = $row['first_mark'];
	$upsecond = $row['second_mark']; 
	$upthird = $row['third_mark']; 
	$upfourth = $row['fourth_mark'];
}

if(empty($_POST['firstname']))
{
	echo "";
} else {

	$upfirstname = $_POST['firstname']; 
	$upfirst = $_POST['first']; 
	$upsecond = $_POST['second']; 
	$upthird = $_POST['third']; 
	$upfourth = $_POST['fourth']; 
	
			$query = "UPDATE  info_student SET firstname='$upfirstname',first_mark='$upfirst',second_mark='$upsecond',third_mark='$upthird',fourth_mark='$upfourth' where id='".$id."'";
    
			if(mysqli_query($conn,$query))
			{	
				echo "<script>alert('تم التحديث')</script>";
				echo '<script>windows: location="st_view.php"</script>';
			}else{
				echo "<script>alert('حدث خطا')</script>";
				echo '<script>windows: location="st_add.php?id='.$id.'"</script>';
			}
			

		
	
}
?>
<body>
	<center>
		
		<?php include('teacher_header.php');?>

    
    
    
    
    
    <div class="container">
      <form action="" method="post" enctype="multipart/form-data">


            <div class="form-group">
               <label for="Title" class="col-sm-2 control-label">الاسم الاول</label>
               <div class="col-sm-10">
                  <input type="text" class="form-control" name="firstname" placeholder="الاسم الاول" value="<?php echo $upfirstname;?>" readonly>
               </div>
            </div>


             
               <div class="form-group col-lg-12 col-sm-8">
               <label for="Author" class="col-sm-2 control-label">المادةالاولى</label>
               <div class="col-sm-10">
                  <input type="text" class="form-control" name="first" placeholder="المادةالاولى"  value="<?php echo $upfirst;?>" required>
               </div>
            </div>


              <div class="form-group col-lg-12 col-sm-8">
               <label for="Author" class="col-sm-2 control-label">المادةالثانية</label>
               <div class="col-sm-10">
                  <input type="text" class="form-control" name="second" placeholder="المادةالثانية" value="<?php echo $upsecond;?>"  required>
               </div>
            </div>
          
              <div class="form-group col-lg-12 col-sm-8">
               <label for="Author" class="col-sm-2 control-label">المادةالثالثة</label>
               <div class="col-sm-10">
                  <input type="text" class="form-control" name="third" placeholder="المادةالثالثة" value="<?php echo $upthird;?>" required>
               </div>
            </div>
              <div class="form-group col-lg-12 col-sm-8">
               <label for="Author" class="col-sm-2 control-label">المادةالرابعة</label>
               <div class="col-sm-10">
                  <input type="text" class="form-control" name="fourth" placeholder="المادةالرابعة"  value="<?php echo $upfourth;?>" required>
               </div>
            </div>
              
            <br>
            <div class="form-group">
               <div class="col-sm-offset-2 col-sm-10">
                  <button  name="update" class="btn btn-info col-lg-12" data-toggle="modal">
               إضافه
                  </button>
               </div>
             </div>
			 <br>
		

         </form>
		 
      </div>

    </center>
    
    
</body>
</html>