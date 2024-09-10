<!DOCTYPE html>
<?php
	require './conn/conn.php';
?>
<html dir="rtl">
	<head>
		<style>	
		.table {
			width: 100%;
			margin-bottom: 20px;
		}	
		
		.table-striped tbody > tr:nth-child(odd) > td,
		.table-striped tbody > tr:nth-child(odd) > th {
			background-color: #f9f9f9;
		}
		
		@media print{
			#print {
				display:none;
			}
		}
		@media print {
			#PrintButton {
				display: none;
			}
		}
		
		@page {
			size: auto;   /* auto is the initial value */
			margin: 0;  /* this affects the margin in the printer settings */
		}
	</style>
	</head>
<body>
	
	<br /> <br /> <br /> <br />
	<b style="color:blue;">نتيجه الطالب</b>
	<?php
		$date = date("Y-m-d", strtotime("+6 HOURS"));
		echo $date;
	?>
	<br /><br />
	<table   border="1" class="table table-striped">
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
		<tbody>
			<?php
				require './conn/conn.php';
				
            $id = $_GET['id'];
	$query = $conn->query ("SELECT * FROM  info_student WHERE id = '$id'");
			
				while($row = $query->fetch_array()){
					
			?>
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
				
			
      <td style="text-align:center;"><?php echo $row ['id'];?></td>
        <td style="text-align:center;"><?php echo  $row ['id_school'];?></td>
        <td style="text-align:center;"><?php echo $row  ['firstname'];?></td>
        <td style="text-align:center;"><?php echo $row  ['lastname'];?></td>
        <td style="text-align:center;" ><?php echo $row ['first_mark'];?></td>
        <td style="text-align:center;" ><?php echo $row ['second_mark'];?></td>
        <td style="text-align:center;" ><?php echo $row ['third_mark'];?></td>
        <td style="text-align:center;"><?php echo  $row ['fourth_mark'];?></td>
      <td style="text-align:center;"><?php echo "$final_mark";?></td>
       <td style="text-align:center;"><?php echo "$remarks";?></td>
			</tr>
			
			<?php
				}
			?>
		</tbody>
	</table>
    

</body>
<script type="text/javascript">
	function PrintPage() {
		window.print();
	}
	document.loaded = function(){
		
	}
	window.addEventListener('DOMContentLoaded', (event) => {
   		PrintPage()
		setTimeout(function(){ window.close() },750)
	});
</script>
</html>


