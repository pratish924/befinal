<?php
  include 'phpfsplit.php';


if(isset($_FILES['image'])){
    $errors= array();
    $file_name = $_FILES['image']['name']; 
    $file_size =$_FILES['image']['size'];
	
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


    $file_tmp =$_FILES['image']['tmp_name'];
    $file_type=$_FILES['image']['type'];
    
      
      if($file_size > 2097152){
         $errors[]='File size must be excately 2 MB';
      }
      
	  
$tmp_size = formatSizeUnits($file_size);

if(empty($errors)==true){
		  $parts = fsplit($file_name,$tmp_size); //filename with extenstion and size should be given
         //move_uploaded_file($file_tmp,"splits/".$file_name);
         echo "<br> Success";
      }else{
         print_r($errors);
      } 
	  
}
   

?>


<html>
   <body>
      
      <form action="" method="POST" enctype="multipart/form-data">
         <input type="file" name="image" />
         <input type="submit"/>
      </form>
      
   </body>
</html>
