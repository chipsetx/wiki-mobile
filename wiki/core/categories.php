<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<h1>categories</h1>

<?php
require('bdd.php');
$champ1=1;
$champ2=2;
$rep_id_categorie_nom='../'.$id_categorie_nom;
$last_line_categories=get_nb_last_line($rep_id_categorie_nom);
$tab_categories[$last_line_categories][2]=0;
for($i=1;$i<=$last_line_categories;$i++){
$categorie_line=get_line($rep_id_categorie_nom,$i);
$tab_categories[$i][$champ1]=get_champ_line($categorie_line,$champ1);
$tab_categories[$i][$champ2]=get_champ_line($categorie_line,$champ2);
}
$j=1;
for($i=1;$i<=$last_line_categories;$i++){
	  if($j==1){
	echo '<div style="color:green;background-color:D8D8D8;float:left;width:72%;height:45px;">';
	$j++;
	}else{
		echo '<div style="color:green;float:left;width:72%;height:45px;">';
		$j=1;
	}
	
	echo '<strong>'.$tab_categories[$i][$champ2].'</strong><br />';
	echo '</div>';
	
	echo '<div style="float:left;width:28%;height:45px;">';
	 echo '<img onclick="edit_categorie();" width="45px" height="45px" src="../bdd/images/icones/edit.png">';
     echo '<img onclick="delete_categorie();" width="45px" height="45px" src="../bdd/images/icones/delete.png">';
    echo '</div>';
  
}

?>
	<script>
function delete_categorie() {
    var x;
    if (confirm("Voulez vous vraiment supprimer!") == true) {
        x = "You pressed OK!";
    } else {
        x = "You pressed Cancel!";
    }
    document.getElementById("demo").innerHTML = x;
}
function edit_categorie(){
	var categorie = prompt("edit categorie","categorie");
}
function myFunction() {
    var person = prompt("new categorie", "Harry Potter");
    
    if (person != null) {
        window.location.replace("http://www.google.fr");
    }
}
</script>
<style type="text/css">
footer { text-align: center; background: #100; color: #dedcb9; padding: 0.5em 0; position: fixed; bottom: 0; left: 0; width: 100%; height:47px;}
</style>
<footer>
	<a href="../index.php">
<img src="../bdd/images/icones/acceuil.png" style="margin-right:2px;float:left" width="47px" height="47px" /></a>
</a>
<img onclick="myFunction();" src="../bdd/images/icones/add.png" style="float:left" width="47px" height="47px" />

</footer>