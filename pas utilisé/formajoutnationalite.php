<?php include "header.php";
?>

<div class="container mt-5">
<h2 class='pt-3 texte-center'>Ajouter une nationalite</h2>
    <form action="valideAjoutNationalite.php"method="post" class="col-md-6 offset-md-3 " >
            <div class="classformgroup">
                <label for="libelle">Libelle</label>
                <input type="text"class='form-control' id='libelle' placeholder='saisir le libelle' name='libelle'>
            </div>
            <div class="row mt-3">
                <div class="col"><a href="listeNation.php" class='btn btn-warning btn-block'>Revenir a la liste</a> <a></div>
                <div class="col"><button type='submit' class='btn btn-success btn-block'>Ajouter</a></div>
            </div>
    </form>
</div>
<?php include "footer.php";?>
