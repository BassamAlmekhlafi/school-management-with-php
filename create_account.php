<?php
require_once './conn/conn.php';
 include_once "header.php";  
session_start();
if(!isset($_SESSION["id"]) || $_SESSION["id"] == '') 
{
	header('location: index.php');
}
if(!isset($_FILES['image']['tmp_name']))
{
	echo "";
} else {

	$firstname = $_POST['firstname']; 
	$lastname = $_POST['lastname']; 
	$username = $_POST['username']; 
	$password = $_POST['password']; 
	$usertype = "te";
	$dir = "images/";
	$target_file = $dir.basename($_FILES["image"]["name"]);
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	$file=$_FILES['image']['tmp_name'];
	$picture=$_FILES['image']['name'];
	if($picture == "")
	{
		echo "<script>alert('من فضلك اختر صورة')</script>";
	} else {

		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
	    	echo "<script>alert('PNG, JPG, and JPEG are allowed!')</script>";
		} else {

			$image= addslashes(file_get_contents($_FILES['image']['tmp_name']));
			$image_name= addslashes($_FILES['image']['name']);

			move_uploaded_file($_FILES["image"]["tmp_name"], $dir . $_FILES["image"]["name"]);

			$query = "INSERT INTO admin_accounts
			(firstname,lastname,username,password,picture,usertype)
			 VALUES ('$firstname','$lastname'
			 ,'$username','$password','$picture','$usertype')";

			mysqli_query($conn,$query);
			echo "<script>alert('تم الحفظ')</script>";
			echo '<script>windows: location="mang_accounts.php"</script>';

		}
	}
	
}
?>



		<?php include('admin_header.php');?>
		<br>

	


	<div class="container">
<div class="mb-6 g-3 row justify-content-center">
<div class="col-lg-8">
<strong style="text-align:center">LOGIN FORM</strong>
      <div class="container">
	  <form action="" method="post" enctype="multipart/form-data">

            <div class="form-group">
               <label for="Title" class="col-sm-2 control-label">الاسم الاول</label>
               <div class="col-sm-10">
                  <input type="text" class="form-control" name="firstname"
				   placeholder="الاسم الاول" value="<?php echo '';?>"
				   required>
               </div>
            </div>


            <div class="form-group col-lg-12 col-sm-8">
               <label for="Author" class="col-sm-2 control-label">الاسم الاخير</label>
               <div class="col-sm-10">
                  <input type="text" class="form-control" name="lastname"
				   placeholder="الاسم الاخير" value="<?php echo '';?>"
				   required>
               </div>
            </div>

            <div class="form-group col-lg-12 col-sm-8">
               <label for="Publisher" class="col-sm-2 control-label">اسم المستخدم</label>
               <div class="col-sm-10">
                  <input type="text" class="form-control"
				   name="username" placeholder="اسم المستخدم" 
				  value="<?php echo '';?>" 
				   required>
               </div>
            </div>

			<div class="form-group col-lg-12 col-sm-8">
               <label for="Publisher" class="col-sm-2 control-label">كلمه المرور</label>
               <div class="col-sm-10">
                  <input type="password" class="form-control" name="password" placeholder="كلمة المرور" 
				  value="<?php echo '';?>" 
				   required>
               </div>
            </div>
          
			<div class="form-group col-lg-12 col-sm-8">
               <label for="Publisher" class="col-sm-2 control-label">الصوره</label>
               <div class="col-sm-10">
                  <input type="file" class="form-control" name="image" id="image" placeholder="كلمة المرور" 
				  value="<?php echo '';?>" 
				   required>
               </div>
            </div>
			
            <br>
            <div class="form-group">
               <div class="col-sm-offset-2 col-sm-10">
                  <button  name="save" class="btn btn-info col-lg-12" data-toggle="modal">
                إضافه معلم
                  </button>
               </div>
             </div>

         </form>
      </div>
</div>
   </div>
</div>


</body>
</html>