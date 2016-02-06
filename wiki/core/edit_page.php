<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<style type="text/css">
select, input, button { display: block; margin-bottom: 1em; max-width: 80%; font-size: 150%; }
</style>
<h1>page</h1>
<?php 
require('get.php');
require('bdd.php');
if($get_save_exist==1){
if($get_page_exist==0){
$nb_last_line_relations=get_nb_last_line('../'.$id_page_id_categorie_nom_page);
$nb_new_relation=$nb_last_line_relations+1;
$line_new_relation=$nb_new_relation.' '.$categorie.' '.$nom_page;
write('../'.$id_page_id_categorie_nom_page,$line_new_relation,0);
echo $line_new_relation;
//echo $nb_last_line_relations;
write('../bdd/pages/'.$nb_new_relation.'.txt',$text,1);
}else{
	write('../bdd/pages/'.$id_page,$text,1);
	}
//echo $text;
/*
si ligne dans relations exist rien

si ligne n'existe pas
voir derniere ligne e ajouter
*/
}
echo $nom_page;
echo $categorie;
?>
<form method="post" action="">
   <p>
            <label for="nom">nom:</label>
            <?php 
            if($get_page_exist==1){
                $rep_id_page_id_categorie_nom_page='../'.$id_page_id_categorie_nom_page;
           
                     $page_line=get_line($rep_id_page_id_categorie_nom_page,$id_page);
               
              
                
                $nom_page=get_champ_line($page_line,3);
       echo '<input name="nom" id="nom_page" value="'.$nom_page.'" type="text">';
           }
       elseif($get_page_exist==0){
       echo '<input name="nom" id="nom_page" type="text">';
       }
       ?>
      <label for="pays">categorie :</label><br />
       <select name="pays" id="categorie">
       <?php  
       $rep_id_categorie_nom='../'.$id_categorie_nom;
       $champ1=1;
$champ2=2;
       $last_line_categories=get_nb_last_line($rep_id_categorie_nom);
       $tab_categories[$last_line_categories][2]=0;
// categories -> tab
for($i=1;$i<=$last_line_categories;$i++){
$categorie_line=get_line($rep_id_categorie_nom,$i);
$tab_categories[$i][$champ1]=get_champ_line($categorie_line,$champ1);
$tab_categories[$i][$champ2]=get_champ_line($categorie_line,$champ2);
}
// print options categories
if($get_page_exist==1){
$line_relation=get_line('../'.$id_page_id_categorie_nom_page,$id_page);
$id_categorie=get_champ_line($line_relation,2);
}
  for($i=1;$i<=$last_line_categories;$i++){
      if($id_categorie==$i){
        echo   '<option value="'.$tab_categories[$i][$champ1].'" selected>'.$tab_categories[$i][$champ2].'</option>';
      }else{
        echo   '<option value="'.$tab_categories[$i][$champ1].'">'.$tab_categories[$i][$champ2].'</option>';
          }
   }
       ?>

   </select>
   </p>
<div id="page-wrapper" style="border:solid;overflow:scroll;word-wrap: break-word;">
   <div id="editor" style="height:200px;width:100%;word-wrap: break-word;"contenteditable="true">
      Click here<h1> to edit the text.</h1>
      <?php 
      if($get_page_exist==1){
       $page=read('../bdd/pages/'.$id_page.'.txt');
        echo $page;
          }
          ?>
    </div>
</div>
<br/>
<br/>
<br/>
<br/> 
</form>
<style type="text/css">
footer { text-align: center; background: #100; color: #dedcb9; padding: 0.5em 0; position: fixed; bottom: 0; left: 0; width: 100%; height:47px;}
</style>
<footer>
	<a href="../index.php">
<img src="../bdd/images/icones/acceuil.png" style="margin-right:2px;float:left" width="47px" height="47px" /></a>
</a>

<img onclick="add_img()" width="45px" height="45px" src="../bdd/images/icones/images.jpeg">
<img onclick="add_video()" width="45px" height="45px" src="../bdd/images/icones/videos.png">
<img onclick="change_couleur_txt()" width="45px" height="45px" src="../bdd/images/icones/couleur_txt.jpeg">
<img onclick="change_taille_txt()" width="45px" height="45px" src="../bdd/images/icones/taille_txt.png">
<img onclick="add_link()" width="45px" height="45px" src="../bdd/images/icones/liens.jpeg">
<img onclick="save_page();" width="45px" height="45px" src="../bdd/images/icones/save.jpeg">
</footer>
<script>
function save_page(){
	var text=document.getElementById("editor");
	var nom_page=document.getElementById("nom_page");
	var categorie=document.getElementById("categorie");
	
	alert(categorie.value);
	window.location.replace("../core/edit_page.php?nom_page="+nom_page.value+"&categorie="+categorie.value+"&id_page=<?php 
	if($get_page_exist==0 && $get_save_exist==1){
		echo $nb_new_relation;
    }else{
     echo $id_page;   
        }
 ?>&save=1&text=" + text.innerHTML);
	}
add_link()
change_taille_txt()
change_couleur_txt()
add_video()
add_img()
</script>

