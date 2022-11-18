<?php
$catSlug=$params['catSlug'];
$query="SELECT 
    categories.name,
    categories.slug as catSlug, 
    advertisements.slug as adSlug,
    advertisements.title,
    advertisements.content 
FROM advertisements
LEFT JOIN 
    categories ON categories.id=advertisements.category_id
WHERE categories.slug='$catSlug'";
$result=mysqli_query($connect,$query) or die(mysqli_error($connect));

for($data=[];$row=mysqli_fetch_assoc($result);$data[]=$row);

$content='';

foreach($data as $page){
    $content.='<div>
    <a href="'.$catSlug.'/'.$page['adSlug'].'">'.$page['title'].'</a>
    </div>';
}
$title=$data[0]['name'];
$page=[
    'title'=>"Все объявления категории $title",
    'content'=>$content.'
    <form method="POST" action="">
    <input name="title" placeholder="Название">
    <input name="content" placeholder="Информация">
    <input type="submit" name="ok">
    </form>'
];

return $page;

?>

