<?php
require_once './conn/conn.php';
 include_once "header.php";  
   session_start();
?>

<head>
    <meta charset="utf-8"/>
    <title>صقحه تسجيل الدخول</title>
   

    <div class="col-12">
<form action="" method="post">
			<table>
				<tr>
					<td>
                        <button class="w-30 btn btn-lg btn-primary" name="search_student"type="submit">ابحث الان</button>
                        
               
<!--						<input type="submit"  value="Search Student">-->
					</td>
				</tr>
			
			</table>
		</form>
	</div>

	<div id="right_side"><br><br>
		<div id="demo">
		<!-- #Code for search student---Start-->
			<?php
				if(isset($_POST['search_student']))
				{
					?>
					<center>
					<form action="" method="post">&nbsp;&nbsp;
                        <b>ادخل الرقم المدرسي</b>&nbsp;&nbsp;
                        <input type="text" name="roll_no">
                          <button class="w-20 btn btn-lg btn-primary" name="search_by_roll_no_for_search"type="submit">ابحث الان</button>
				
					</form>
                        <br><br>
					<h4><b><u>نتيجه الطالب</u></b></h4><br><br>
					</center>
					<?php
				}
            
				if(isset($_POST['search_by_roll_no_for_search']))
				{
				$query = "select * from  info_student where id_school= '$_POST[roll_no]'";
					$query_run = mysqli_query($conn,$query);
					while ($row = mysqli_fetch_array($query_run)) 
					{
						?>
						<table class="table table-responsive table-lg table-md table-sm  table-hover   table-bordered">
                            
                            <thead>
		 <tr>
		      <th>#</th>
               <th>رقم المدرسي</th>
			   <th>الاسم الاول</th>
			   <th>الاسم الاخير</th>
			   <th>الماده الاولى</th>
               <th>الماده الثانية</th>
			   <th>الماده الثالثة</th>
               <th>الماده الرابعة</th>
			   <th>النسبة</th>
			   <th>النتيجة</th>
            
            </tr>
			</thead>
                            <?php
                 $id = $row['id'];
                $id_school = $row['id_school'];
				$firstname = $row['firstname']; 
				$lastname = $row['lastname'];
                $phone = $row['phone'];
				$first_mark = $row['first_mark']; 
				$second_mark = $row['second_mark']; 
				$third_mark= $row['third_mark']; 
				$fourth_mark = $row['fourth_mark'];
				$final_mark  = ($first_mark + $second_mark
				 + $third_mark + $fourth_mark) / 4;
        
				if(($final_mark >=90) &&($final_mark <=100)){
					$remarks = "ممتاز";	
				}
                elseif(($final_mark >=70) &&($final_mark <=80)){
					$remarks = "جيد جدا";
                }
                 elseif (($final_mark >=60) &&($final_mark <=70)){
					$remarks = "جيد";	
				}
                    elseif(($final_mark >=50) &&($final_mark <=60)){
					$remarks = "مقبول";	
                    }else {
					$remarks = "راسب";
				}        
                     ?>
                            <tr>
						      <td><?php echo $row ['id'];?></td>
                            <td><?php echo "$id_school";?></td>
							<td><?php echo "$firstname";?></td>
							<td><?php echo "$lastname";?></td>
							<td ><?php echo "$first_mark";?></td>
							<td><?php echo "$second_mark";?></td>
							<td><?php echo "$third_mark";?></td>
							<td><?php echo "$fourth_mark";?></td>
							<td style="background-color: #6fca5f;"><?php echo "$final_mark";?></td>
							<td style="background-color: #ccc;"><?php echo "$remarks";?></td>
                      					
                                
                                	<td>
						
                             <a class="btn btn-outline-success btn-lg" 
							 href="print_pdf.php?id=<?php echo $row['id'];?>"role="button">PDF and  print</a>
                                
							</td>
								
						</table>
						<?php
					}
				}
			?>
                  <a href="index.php">
                     <button class="w-20 btn btn-lg btn-primary" name="search_by_roll_no_for_search"type="submit">خروج</button></a>
</body>
</html>
