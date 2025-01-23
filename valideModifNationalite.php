<?php include "header.php";
include "bdd.php";
$num=$_POST['num'];
$libelle=$_POST['libelle'];



$req=$monPdo->prepare("update nationalite set libelle = :libelle where num = :num");
$req->bindParam(':num', $num);
$req->bindParam(':libelle', $libelle);

$nb=$req->execute();


echo "<div class='container mt-5'>";
echo '<div class="row">
    <div class="col mt-3">';

if($nb == 1){
    echo'<div class="alert alert-dark" role="alert">
  La nationalite a bien ete modifié
</div>';
}else{
    echo'<div class="alert alert-danger" role="alert">
  La nationalite n\'a pas ete modifié
</div>';

} 

?>
   </div>
</div>
<a href="listeNation.php" class='btn btn-primary'>Revenir a la liste des nationalité </a>

</div>

<?php include "footer.php";?>
