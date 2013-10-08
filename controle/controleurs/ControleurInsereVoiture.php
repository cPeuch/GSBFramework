<?php
require_once 'ControleurInterface.php';
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ControleurInsereVoiture
 *
 * @author eleve
 */
class ControleurInsereVoiture implements ControleurInterface {
    
    public function dispatch($vue, $modele, $tabParametres) {
        try {
            $ok = $modele->getVoiture()->setUneVoiture($tabParametres["Immatriculation"], $tabParametres["Marque"], $tabParametres["Modele"], $tabParametres["Annee"]);
            echo"Votre voiture est bien inseree dans la base de donnees";
        }
        catch(ModeleExceptions $ex){
            $vue->getVoiture()->afficheInsertVoitureNonOK();
        }
    }
}

?>
