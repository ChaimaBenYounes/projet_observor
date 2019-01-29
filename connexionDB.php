<?php
function connexion(){
    try
    {
        $bdd = new PDO('mysql:host=localhost;dbname=bd_observor;charset=utf8', 'root', 'troiswa');
    }
    catch (Exception $e)
    {
        die('Erreur : ' . $e->getMessage());
    }
    return $bdd ;
}
function insert($nom, $prenom, $email){


    $bdd = connexion();
    $bdd->exec('INSERT INTO `inscription` (`nom`, `prenom`, `email`) VALUES ("'.$nom.'","'.$prenom.'"," '.$email.'")');

}
function updateForm($id,$nom, $prenom, $email){

    $bdd = connexion();
    $bdd->exec('UPDATE `inscription` SET `nom` = "'.$nom.'", `prenom` = "'.$prenom.'", `email` = "'.$email.'" WHERE `inscription`.`id` = "'.$id.'"');
    echo "le mail a été envoyé, le nom est désormais =>".$nom;
}
function affiche(){
    $bdd = connexion();
    $req = $bdd->query('SELECT * FROM inscription');

    echo "</br>************************************</br>";
    foreach  ($req as $row) {
        $x = $row['id']."=>".$row['nom']." | ".$row['prenom']." | ".$row['email'];
        print "<a href=\"modification.phtml?id=".$row['id']."&nom=".$row['nom']."&prenom=".$row['prenom']."&email=".$row['email']."\">".$x."</a><br>";

    }
}
