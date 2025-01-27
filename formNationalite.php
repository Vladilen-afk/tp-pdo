<?php include "header.php";
include "bdd.php";
$action=$_GET['action'];
if($action == "Modifier"){
    $num=$_GET['num'];
    $req=$monPdo->prepare("select * from nationalite where num= :num");
    $req->setFetchMode(PDO::FETCH_OBJ);
    $req->bindParam(':num', $num);
    $req->execute();
    $laNationalite=$req->fetch();
}
?>

<div class="container mt-5">
<h2 class='pt-3 texte-center'><?php echo $action?> une nationalite</h2>
    <form action="valideFormNationalite.php?action=<?php echo $action?>"method="post" class="col-md-6 offset-md-3 " >
            <div class="classformgroup">
                <label for="libelle">Libelle</label>
                <input type="text"class='form-control' id='libelle' placeholder='saisir le libelle' name='libelle' value="<?php if($action == "Modifier"){echo $laNationalite -> libelle;}?>">
            </div>
            <input type="hidden" id="num" name="num" value="<?php if($action == "Modifier"){ echo $laNationalite->num;}?>">
            <div class="row mt-3">
                <div class="col"><a href="listeNation.php" class='btn btn-warning btn-block'>Revenir a la liste</a> <a></div>
                <div class="col"><button type='submit' class='btn btn-success btn-block'><?php echo $action ?></a></div>
            </div>
    </form>
</div>
<?php include "footer.php";?>
