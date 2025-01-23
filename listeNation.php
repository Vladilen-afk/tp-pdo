<?php include "header.php";
include "bdd.php";
$req=$monPdo->prepare("select * from nationalite");
$req->setFetchMode(PDO::FETCH_OBJ);
$req->execute();
$lesNationalites=$req->fetchAll();
?>

<div class="container mt-5">
    <div class="row pt-3">
        <div class="col-9"><h2>Listes des nationalités</h2></div>
        <div class="col-3"><a href="formajoutnationalite.php" class='btn btn-success'><i class="fas fa-plus-circle"></i> Créer une nationalité </a> </div>
        
    </div> 
<table class="table table-hover table-striped table-dark">
  <thead>
    <tr>
      <th scope="col" class="col-md-2">Numero</th>
      <th scope="col" class="col-md-8">Libelle</th>
      <th scope="col" class="col-md-2">Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php
    foreach($lesNationalites as $Nationalite){
        echo "<tr>";
        echo "<td class='col-md-2'>$Nationalite->num</td>";
        echo "<td class='col-md-8'>$Nationalite->libelle</td>";
        echo "<td class='col-md-2'>
          <a href='formModifNationalite.php?num=$Nationalite->num' class='btn btn-primary'><i class='fas fa-pen'></i></a>
          <a href='' class='btn btn-danger'><i class='far fa-trash-alt'></i></a>
        </td>";
            
        echo "</tr>";
    }
    ?>

    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Monney</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Larry</td>
      <td>La Malice</td>
      <td>@twitter</td>
    </tr>
  </tbody>
</table>
</div>
<?php include "footer.php";?>
