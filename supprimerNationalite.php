<?php include "header.php";
include "bdd.php";
$num=$_GET['num'];

    $req=$monPdo->prepare("delete from nationalite where num = :num");
    $req->bindParam(':num', $num);
    $nb=$req->execute();

if($nb == 1){
  $_SESSION['message'] = ["success" => "La nationalite a bien ete suprimée"];

}else{
  $_SESSION['message'] = ["danger" => "La nationalite n'a pas ete suprimée"];

} 
header('location: listeNation.php');
exit();

?>