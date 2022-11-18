<?php

$query="SELECT * FROM categories";
$result=mysqli_query($connect,$query);
for($data=[];$row=mysqli_fetch_assoc($result);$data[]=$row);

$content='';

foreach($data as $page){
    $content.='<div>
    <a href="page/'.$page['slug'].'">'.$page['name'].'</a>
    </div>';
}

$page=[
    'title'=>'Все категории',
    'content'=>$content
];

return $page;
?>