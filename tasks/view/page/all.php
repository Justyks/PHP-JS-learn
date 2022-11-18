<?php
$query="SELECT cities.slug as citySlug, cities.title, countries.slug as countrySlug FROM cities
LEFT JOIN
    countries ON countries.id=cities.category_id";
$result=mysqli_query($connect,$query) or die(mysqli_error($connect));

for($data=[]; $row=mysqli_fetch_assoc($result); $data[]=$row);

$content='';

foreach($data as $page){
    $content.='
    <div>
        <a href="'.$page['countrySlug'].'/'.$page['citySlug'] . '">' . $page['title'] . '</a>
    </div>
';

}

$page=[
    'title'=>'Список всех страниц',
    'content'=>$content
];
return $page;

?>