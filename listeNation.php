<?php 
include "header.php";
include "bdd.php";

$req = $monPdo->prepare("SELECT * FROM nationalite");
$req->setFetchMode(PDO::FETCH_OBJ);
$req->execute();
$lesNationalites = $req->fetchAll();

if(!empty($_SESSION['message'])) {
    $mesMessage = $_SESSION['message'];
    foreach($mesMessage as $key => $message) {
        echo '<div class="container pt-5">
                <div class="alert alert-'.key.' alert-dismissible fade show" role="alert">' . $message . '
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
    <table class="table table-hover table-striped table-dark">
        <thead>
            <tr>
                <th scope="col" class="col-md-2">Numéro</th>
                <th scope="col" class="col-md-8">Libellé</th>
                <th scope="col" class="col-md-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($lesNationalites as $Nationalite): ?>
                <tr>
                    <td class='col-md-2'><?php echo $Nationalite->num; ?></td>
                    <td class='col-md-8'><?php echo $Nationalite->libelle; ?></td>
                    <td class='col-md-2'>
                        <a href='formNationalite.php?action=Modifier&num=<?php echo $Nationalite->num; ?>' class='btn btn-primary'><i class='fas fa-pen'></i></a>
                        <a href='#modalSuppression' data-toggle='modal' data-message='Voulez-vous supprimer cette nationalité ?' data-suppression='supprimerNationalite.php?num=<?php echo $Nationalite->num; ?>' class='btn btn-danger'><i class='far fa-trash-alt'></i></a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php include "footer.php"; ?>