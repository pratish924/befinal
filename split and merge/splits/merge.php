
<font face="Courier new" size="2.5">
<h3>PHP Merge Script by Arash Hemmat & Codex-M (www.php-developer.org) </h3>
<b>Purpose:</b> To merge splitted parts which are now placed in your FTP server.<br />
<b>Instructions:</b> Place this script in your your FTP server (Apache) containing the same path/directory as the split parts.
<br />
Enter details below as accurate as possible. After that press the submit button.<br />
<form action="<?php echo $_SERVER['PHP_SELF'];  ?>" method="POST">
<br />
<b>Enter the filename:</b>(exact file name including extension, example: <i>file.wav</i>) <input type="text" name="filename" size="50">
<br /><br />
<b>Enter the number of splitted parts: </b>(the number of split parts according the file splitting results)<input type="text" name="parts" size="10">
<br /><br />
<input type="submit" value="Submit" name="submit"/>
</form>
</font>
<?php
if (isset($_POST['submit']))
{

//form is submitted receive the post data
if(isset($_POST['filename'])&&isset($_POST['parts']) ){
$merged_file_name = trim($_POST['filename']);
$parts_num =trim($_POST['parts']);
function merge_file($merged_file_name,$parts_num)
{
$content='';
//put splited files content into content
for($i=0;$i<$parts_num;$i++)
{
$file_size = filesize('example.jpg.part'.$i); //whole filename with part 
$handle    = fopen('example.jpg.part'.$i, 'rb') or die("error opening file");
$content  .= fread($handle, $file_size) or die("error reading file");
}
//write content to merged file
$handle=fopen($merged_file_name, 'wb') or die("error creating/opening merged file");
fwrite($handle, $content) or die("error writing to merged file");
return 'OK';
}//end of function merge_file
//Set the merged file name
//call merge_file() function to merge the splited files
merge_file($merged_file_name,$parts_num) or die('Error merging files');
echo '<br>Files merged succesfully.';
}else{echo "error";}
}
?>