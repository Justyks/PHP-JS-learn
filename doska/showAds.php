<?php
$catSlug=$params['catSlug'];
$adSlug=$params['adSlug'];
$query="SELECT 
    categories.name,
    categories.slug as catSlug, 
    advertisements.slug as adSlug,
    advertisements.title,
    advertisements.content 
FROM advertisements
LEFT JOIN 
    categories ON categories.id=advertisements.category_id
WHERE categories.slug='$catSlug' and advertisements.slug='$adSlug'";
$result=mysqli_query($connect,$query) or die(mysqli_error($connect));
$page=mysqli_fetch_assoc($result);
$page=[
    'title'=>$page['title'],
    'content'=>"<div>$page[content]</div>"
];

return $page;

?>