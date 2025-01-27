<?php include "header.php";
include "bdd.php";
$action=$_GET['action'];
$num=$_POST['num'];
$libelle=$_POST['libelle'];


if($action == "Modifier"){
    $req=$monPdo->prepare("update nationalite set libelle = :libelle where num = :num");
    $req->bindParam(':num', $num);
    $req->bindParam(':libelle', $libelle);
}else{
    $req=$monPdo->prepare("insert into nationalite(libelle) values(:libelle)");
    $req->bindParam(':libelle', $libelle);
}
    $nb=$req->execute();

$message=$action=="Modifier"? "modifier":"ajoutee";

echo "<div class='container mt-5'>";
echo '<div class="row">
    <div class="col mt-3">';

if($nb == 1){
    echo'<div class="alert alert-dark" role="alert">
  La nationalite a bien ete '.$message.'
</div>';
}else{
    echo'<div class="alert alert-danger" role="alert">
  La nationalite n\'a pas ete '.$message.'
</div>';

} 

?>
   </div>
</div>
<a href="listeNation.php" class='btn btn-primary'>Revenir a la liste des nationalité </a>

</div>

<?php include "footer.php";?>
