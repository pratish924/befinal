<html>
<head>
<style>
a:link{
  color:blue;
}
a:visited{
  color:purple;
}
a:hover{
  color:orange;
}
a:focus{
  color:green;
}
a:active{
  color:red;
}
</style>
</head>

<?php

include 'phpfsplit.php';

if(isset($_FILES['file'])){
    $errors= array();
    $file_name = $_FILES['file']['name']; 
    $file_size =$_FILES['file']['size'];
	
	 function formatSizeUnits($file_size) // size conversion
    {
        if ($file_size >= 1073741824)
        {
            $file_size = number_format($file_size / 1073741824, 2);
        }
        elseif ($file_size >= 1048576)
        {
            $file_size = number_format($file_size / 1048576, 2);
        }
        elseif ($file_size >= 1024)
        {
            $file_size = number_format($file_size / 1024, 2);
        }
        elseif ($file_size > 1)
        {
            $file_size = $file_size;
        }
        elseif ($file_size == 1)
        {
            $file_size = $file_size;
        }
        else
        {
            $file_size = '0 bytes';
        }

        return ceil($file_size);
}


    $file_tmp =$_FILES['file']['tmp_name'];
    $file_type=$_FILES['file']['type'];
    
      
      if($file_size > 2097152){
         $errors[]='File size must be excately 2 MB';
      }
      

$tmp_size = formatSizeUnits($file_size);

if(empty($errors)==true){
		  $parts = @fsplit($file_name,$tmp_size); //filename with extenstion and size should be given
         //move_uploaded_file($file_tmp,"splits/".$file_name);
         echo "<br> Success<br>";
		 
      }else{
         print_r($errors);
      } 
	  
 
}
   



?>


   <body>
   
      <br>
      <form action="" method="POST" enctype="multipart/form-data">
         <input type="file" name="file" />
         <input type="submit"/>
		 
      </form>
	  

      
   </body>
</html>


