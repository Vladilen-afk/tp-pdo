<?php
include "header.php";
include "bdd.php";

$libelle = "";
$continentSel = "Tous";

$texteReq = "SELECT n.num, n.libelle AS 'libNation', c.libelle AS 'libContinent' FROM nationalite n, continent c WHERE n.numContinent = c.num";
if (!empty($_GET)) {
    $libelle = $_GET['libelle'];
    $continentSel = $_GET['continent'];
    if ($libelle != "") {
        $texteReq .= " AND n.libelle LIKE '%" . $libelle . "%'";
    }
    if ($continentSel != "" && $continentSel != "Tous") {
        $texteReq .= " AND c.num = " . $continentSel;
    }
}
$texteReq .= " ORDER BY n.libelle";

$req = $monPdo->prepare($texteReq);
$req->setFetchMode(PDO::FETCH_OBJ);
$req->execute();
$lesNationalites = $req->fetchAll();

$reqContinent = $monPdo->prepare("SELECT * FROM continent");
$reqContinent->setFetchMode(PDO::FETCH_OBJ);
$reqContinent->execute();
$lesContinents = $reqContinent->fetchAll();

if (!empty($_SESSION['message'])) {
    $mesMessage = $_SESSION['message'];
    foreach ($mesMessage as $key => $message) {
        echo '<div class="container pt-5">
                <div class="alert alert-' . $key . ' alert-dismissible fade show" role="alert">' . $message . '
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
              </div>';
    }
    $_SESSION['message'] = [];
}
?>

<div class="container mt-5">
    <div class="row pt-3">
        <div class="col-9"><h2>Liste des nationalités</h2></div>
        <div class="col-3"><a href="formNationalite.php?action=Ajouter" class='btn btn-success'><i class="fas fa-plus-circle"></i> Créer une nationalité</a></div>
    </div> 

    <form action="" method="get" class="border-primary rounded p-3 mt-3 mb-3">
        <div class="row">
            <div class="col">
                <input type="text" class='form-control' id='libelle' placeholder='Saisir le libellé' name='libelle' value="<?php echo $libelle; ?>">
            </div>
            <div class="col">
                <select name="continent" class='form-control'>
                    <?php
                    $selection = $continentSel == "Tous" ? "selected" : "";
                    echo "<option value='Tous' $selection >Tous les continents</option>";
                    foreach ($lesContinents as $Continent) {
                        $selection = $Continent->num == $continentSel ? "selected" : "";
                        echo "<option value='$Continent->num' $selection >$Continent->libelle</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="col">
                <button type="submit" class="btn btn-primary">Rechercher</button>
            </div>
        </div>
    </form>

    <table class="table table-hover table-striped table-dark">
        <thead>
            <tr>
                <th scope="col" class="col-md-2">Numéro</th>
                <th scope="col" class="col-md-8">Libellé</th>
                <th scope="col" class="col-md-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($lesNationalites as $Nationalite): ?>
                <tr>
                    <td class='col-md-2'><?php echo $Nationalite->num; ?></td>
                    <td class='col-md-8'><?php echo $Nationalite->libNation; ?></td>
                    <td class='col-md-2'>
                        <a href='formNationalite.php?action=Modifier&num=<?php echo $Nationalite->num; ?>' class='btn btn-primary'><i class='fas fa-pen'></i></a>
                        <a href='supprimerNationalite.php?num=<?php echo $Nationalite->num; ?>' class='btn btn-danger' onclick="return confirm('Voulez-vous vraiment supprimer cette nationalité ?');"><i class='far fa-trash-alt'></i></a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php include "footer.php"; ?>