<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<strong><h1>wiki</h1></strong>
<?php
// afficher categories et ses pages
// boutons add page et categorie
require('core/bdd.php');
// champs
$champ0=0;
$champ1=1;
$champ2=2;
$champ3=3;
// numero dernieres lignes fini
$last_line_categories=get_nb_last_line($id_categorie_nom);
$last_line_relations=get_nb_last_line($id_page_id_categorie_nom_page);
// tableaux fini
$tab_categories[$last_line_categories][2]=0;
$tab_relations[$last_line_relations][3]=0;
// tab categories fini
for($i=1;$i<=$last_line_categories;$i++){
$categorie_line=get_line($id_categorie_nom,$i);
$tab_categories[$i][$champ1]=get_champ_line($categorie_line,$champ1);
$tab_categories[$i][$champ2]=get_champ_line($categorie_line,$champ2);
}
 
// tab avec lignes relations fini
for($j=1;$j<=$last_line_relations;$j++){
$relation=get_line($id_page_id_categorie_nom_page,$j);
$tab_relations[$j][$champ1]=get_champ_line($relation,$champ1);
$tab_relations[$j][$champ2]=get_champ_line($relation,$champ2);
$tab_relations[$j][$champ3]=get_champ_line($relation,$champ3);
}
// affichage des categories et ses pages

for($i=1;$i<=$last_line_categories;$i++){
	echo '<div style="margin-bottom:4px;margin-top:4px;font-size:150%;background-color:grey;color:white;"><strong>'.$tab_categories[$i][$champ2].'</strong></div>';
	//echo '<h2>'.$tab_categories[$i][$champ2].'</h2>';
for($j=1;$j<=$last_line_relations;$j++){
	if($tab_categories[$i][$champ1]==$tab_relations[$j][$champ2]){
	echo '<div style="background-color:D8D8D8;font-size:120%;margin-top:4px;"><a href="core/print_page.php?id_page='.$tab_relations[$j][$champ1].'">'.$tab_relations[$j][$champ3].'</a></div>';
	}
}
}

  //echo '<ul>';

?>
	<br/>
	<br/>
	<br/>
	<br/>
	<br/>
	<br/>
	
<style type="text/css">
footer { text-align: center; background: #100; color: #dedcb9; padding: 0.5em 0; position: fixed; bottom: 0; left: 0; width: 100%; height:47px;}
</style>
<footer>
<a href="core/edit_page.php">
<img src="bdd/images/icones/add-article.jpeg" style="float:left" width="47px" height="47px" /></a>
<div style="float:left;width:5px; color:black;">ggg</div>
<a href="core/categories.php">
<img src="bdd/images/icones/categories.png" style="float:left" width="47px" height="47px" /></a>
</footer>