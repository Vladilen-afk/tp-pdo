<?php include "header.php";
include "bdd.php";
$num=$_GET['num'];

    $req=$monPdo->prepare("delete from nationalite where num = :num");
    $req->bindParam(':num', $num);
    $nb=$req->execute();

echo "<div class='container mt-5'>";
echo '<div class="row">
    <div class="col mt-3">';

if($nb == 1){
    echo'<div class="alert alert-dark" role="alert">
  La nationalite a bien ete suprimée
</div>';
}else{
    echo'<div class="alert alert-danger" role="alert">
  La nationalite n\'a pas ete suprimée
</div>';

} 

?>
   </div>
</div>
<a href="listeNation.php" class='btn btn-primary'>Revenir a la liste des nationalité </a>

</div>

<?php include "footer.php";?>
