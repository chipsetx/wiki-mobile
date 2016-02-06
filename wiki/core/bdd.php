<?php
   $id_page_id_categorie_nom_page="bdd/id_page_id_categorie_nom_page.txt";
        $id_categorie_nom="bdd/categories.txt";
// ######## R/W ###########
function write($file,$text,$add){
$mode[1]='w';
$mode[2]='a+';
if($add==1){
$fp = fopen($file,w);
fwrite($fp, $text);
}else{
$fp = fopen($file,'a');
fwrite($fp, "\n".$text);
}
fclose($fp);
}
//------------------
function read($file){
$fp = fopen($file,'r');
$file_in_var=fgets($fp,4096);
return $file_in_var;
}
//######### sgbd ######
function get_nb_last_line($file){
	$nb_lignes=0;
     $file= fopen($file,'r');
     if ($file) {
        while (!feof($file)) {
            fgets($file,4096);
            $nb_lignes++;
        }
       fclose($file);
     }
   return($nb_lignes);
}
//------------------
function get_line($file,$nb_line){
        $nb_ligne_boucle=0;
        $content=fopen($file,'r');
while (($ligne= fgets($content, 4096)) != false) {
    $nb_ligne_boucle++;
       if($nb_ligne_boucle==$nb_line){
           return $ligne;
          }
   }
}
// -----------------
function get_champ_line($line,$nb_champ){
        $champs=explode(" ", $line);
       // echo $champs[$nb_champ-1];
        return $champs[$nb_champ-1];
}
 
function del_line_id($file,$id_to_del){
        $last_line=get_nb_last_line($file);
        $nb_champ=1;
        $nb_ligne_boucle=0;
        // array lines
        $array[$last_line];
while (($ligne= fgets($file, 4096)) != false) {
    $nb_ligne_boucle++;
     $array[$nb_ligne_boucle]=$ligne;
          }
         $champ=get_champ_line($array[$nb_ligne_boucle],$nb_champ);
        if($champ==$id_to_del){
         $array[$nb_ligne_boucle]=' ';
         }
        for($i;$i<=$nb_ligne_boucle;$i++){
           if($array[$i]==' '){
              $array[$i]=$array[$i+1];
            }
         }
}