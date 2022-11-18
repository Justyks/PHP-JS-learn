<?php
$title=$_POST['title'];
$slug=strtolower(str_replace(" ","_",$title));
$content=$_POST['content'];

$query="SELECT * FROM categories WHERE slug='$catSlug'";
$result=mysqli_query($connect,$query) or die(mysqli_error($connect));

$category=mysqli_fetch_assoc($result);
$categoryId=$category['id'];

$query="INSERT INTO advertisements SET slug='$slug', title='$title', content='$content',category_id='$categoryId'";
$result=mysqli_query($connect,$query) or die(mysqli_error($connect)); 
?>