<?php

$id_page=$_GET['id_page'];
$save=$_GET['save'];
$text=$_GET['text'];
$nom_page=$_GET['nom_page'];
$categorie=$_GET['categorie'];

if(!empty($id_page)){
$get_page_exist=1;
}else{
$get_page_exist=0;
}

if(!empty($save)){
$get_save_exist=1;
}else{
$get_save_exist=0;
}

?>