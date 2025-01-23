<?php include "header.php";
include "bdd.php";
$libelle=$_POST['libelle'];
$req=$monPdo->prepare("insert into nationalite(libelle) values(:libelle)");
$req->bindParam(':libelle', $libelle);
$nb=$req->execute();


echo "<div class='container mt-5'>";
echo '<div class="row">
    <div class="col mt-3">';

if($nb == 1){
    echo'<div class="alert alert-dark" role="alert">
  La nationalite a bien ete ajoutee
</div>';
}else{
    echo'<div class="alert alert-danger" role="alert">
  La nationalite n\'a pas ete ajoutee
</div>';

} 

?>
   </div>
</div>
<a href="listeNation.php" class='btn btn-primary'>Revenir a la liste des nationalité </a>

</div>

<?php include "footer.php";?>
