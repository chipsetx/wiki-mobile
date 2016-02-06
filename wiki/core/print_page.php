<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<?php
require('bdd.php');
require('get.php');
$line_relation=get_line('../'.$id_page_id_categorie_nom_page,$id_page);
$nom_page=get_champ_line($line_relation,3);
echo '<div id="titre">'.$nom_page.'</div>';
$file_id_page=read('../bdd/pages/'.$id_page.'.txt');
echo $file_id_page;
?>
<style type="text/css">
footer { text-align: center; background: #100; color: #dedcb9; padding: 0.5em 0; position: fixed; bottom: 0; left: 0; width: 100%; height:47px;}
</style>
<footer>
<a href="../index.php">
<img src="../bdd/images/icones/acceuil.png" style="float:left" width="47px" height="47px" /></a>
<a href="edit_page.php?id_page=<?php echo $id_page; ?>">
<img src="../bdd/images/icones/edit.png" style="margin-left:4px;float:left" width="47px" height="47px" /></a>
<img src="../bdd/images/icones/delete.png" style="float:left;" width="47px" height="47px" />
<a href="#titre"><img src="../bdd/images/icones/fleche_haut.jpeg" style="float:right;" width="47px" height="47px" /></a>

</footer>