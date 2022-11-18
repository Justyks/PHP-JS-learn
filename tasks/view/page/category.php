<?php
    $countrySlug=$params['catSlug'];

    $query="SELECT cities.slug, cities.title, countries.name FROM cities
    LEFT JOIN 
        countries ON countries.id=cities.category_id
    WHERE 
        countries.slug='$countrySlug'";
    $result=mysqli_query($connect,$query) 
    or die(mysqli_error($connect));
    for($data=[];$row=mysqli_fetch_assoc($result);$data[]=$row);
    $content='';
    foreach($data as $page){
        $content.='<div>
        <a href="'.$countrySlug.'/'.$page['slug'].'">'.$page['title'].'</a>
        </div>';
    }

    $page=[
        'title'=>'Список всех городов '.$data[0]['name'],
        'content'=>$content
    ];
    return $page;
?>