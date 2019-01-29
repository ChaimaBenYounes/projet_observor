<?php
/**
 * Created by PhpStorm.
 * User: wap58
 * Date: 16/01/19
 * Time: 14:22
 */

class InscriptionObserver  implements SplObserver
{
    public function update(SplSubject $obj)
    {
       echo('</br> <h2>*****___ici l\'update___***** </h2></br> nom => '. $obj->getNom().' </br> prenom => '.$obj->getPrenom().' </br> Email =>'.$obj->getEmail());

    }

}