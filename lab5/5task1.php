<!doctype html>
<html lang="en">
  <head>
  
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    

    <title>Lab 4</title>
  </head>
  <body>
  <div class="container" id="mainDiv">
  </form>
<br />
<form method="post" enctype="multipart/form-data">
<input type="file" class="btn btn-primary" name="filename" size="10" /><br /><br />
<input type="submit" class="btn btn-primary" value="Загрузить" />

</form>
<br />
    <form method='post'>
<?php
error_reporting(E_ERROR | E_PARSE);

if ($_FILES && $_FILES["filename"]["error"]== UPLOAD_ERR_OK)
{
    $path = "upload/" . $_FILES["filename"]["name"];
    move_uploaded_file($_FILES["filename"]["tmp_name"], $path);
    
}
foreach (scandir('C:\xampp\htdocs\php\upload') as $file){
	if (!($file == '.' || $file == '..')) {
  echo "<button type='Submit' class='btn btn-success' name={$file}>{$file} </button> 
  <button type='Submit' class=\"btn btn-danger\" name=del_{$file}>	
  &#10006; </button><br/><br/>";
  }
}

foreach ($_POST as $key=>$fileDownload){
  if (isset($_POST[$key])){
    $key=str_ireplace("_",".",$key);
    $path='C:\xampp\htdocs\php\upload\\'.$key;
    if(strpos($key,"del.")===false){
    $file_extension = strtolower(substr(strrchr($key,"."),1));
 
    switch( $file_extension )
{
          case "pdf": $ctype="application/pdf"; break;
          case "exe": $ctype="application/octet-stream"; break;
          case "zip": $ctype="application/zip"; break;
          case "doc": $ctype="application/msword"; break;
          case "xls": $ctype="application/vnd.ms-excel"; break;
          case "ppt": $ctype="application/vnd.ms-powerpoint"; break;
          case "mp3": $ctype="audio/mp3"; break;
          case "gif": $ctype="image/gif"; break;
          case "png": $ctype="image/png"; break;  
          case "jpeg":
          case "jpg": $ctype="image/jpg"; break;
          default: $ctype="application/force-download";
}
 
    header("Pragma: public"); 
    header("Expires: 0");
    header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
    header("Content-Type: $ctype");
    header('Content-Disposition: attachment; filename="'.$key.'"');
    header("Content-Transfer-Encoding: binary");
  }else{
   $path= str_replace("del.","",$path);
   unlink($path);
   header('Location: http://localhost/php/5task1.php');   
  }
  } 
}
?>

  </div>


    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


</body>
</html>