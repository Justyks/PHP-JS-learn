<?php
$citySlug=$params['pageSlug'];
$countrySlug=$params['catSlug'];
$query="SELECT cities.content, cities.title FROM cities
LEFT JOIN countries ON countries.id=cities.category_id
 WHERE cities.slug='$citySlug' and countries.slug='$countrySlug'";
$result=mysqli_query($connect,$query) or die(mysqli_error($connect));
$page=mysqli_fetch_assoc($result);
return $page;
?>