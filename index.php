<?php
/**
 * Created by PhpStorm.
 * User: wap58
 * Date: 16/01/19
 * Time: 14:18
 */
include 'connexionDB.php';
include 'Subject.php';
include 'InscriptionObserver.php';

//var_dump($_POST);

if(empty($_POST)){
    affiche();
} else if($_POST['button'] == "Envoyer"){
    insert($_POST['nom'], $_POST['prenom'],$_POST['email']);
    affiche();
}
else {

updateForm($_POST['id'],$_POST['nom'],$_POST['prenom'],$_POST['email']);

$observer = new Subject();
$inscriptionObs = new InscriptionObserver();

$observer->setNom($_POST['nom']);
$observer->setPrenom($_POST['prenom']);
$observer->setEmail($_POST['email']);

$observer->attach($inscriptionObs);
$observer->notify();


$observer->detach($inscriptionObs);
$observer->notify();

    //affiche();
}

