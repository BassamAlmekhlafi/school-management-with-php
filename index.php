<?php
require_once './conn/conn.php';
 include_once "header.php";   

?>

<style>

    
    .img1  img  {
    width: 30%;
    height: 300px;
        border-style: outset;border: 2px solid gray;
border-radius: 5px;padding: 10px 30px;color: black;
    }
   .img1  img:hover{width:30%;}
    
    img{
    width: 16%; 
    margin-right: 30px;
/*  box-shadow: 0px 5px 10px 0px rgba(0, 0, 0, 0.5);*/
    border-radius:20px;
    }
    
    img:hover{
    width: 18%; 
    transition: 1s;
    transition-timing-function: ease-out;
    will-change: transform;
          transform: translateY(-5px);
  box-shadow: 0px 10px 20px 2px rgba(0, 0, 0, 0.25);
    }
  
    h1{text-align: center}
    
</style>
<br>
<h1>أداره نـــــظــــــــام الطــــــــلاب</h1>
	<center>
    <div class="img1">
     <img src="logo/school.png"></div>
         
         <div class="container">
        <br>
  
	<a href="login.php?usertype=ADMIN">
      <img src="logo/admin.png"></a>
      
            
        <a href="login.php?usertype=te">
        <img src="logo/teacher.png"></a> 
             
            
          <a href="st_login.php">
        <img src="logo/student.png"></a>

  
        </div>
		</center>  

</body>

</html>