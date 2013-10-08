<?php

require_once 'ControleurInterface.php';
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ControleurSuppresionVoiture
 *
 * @author eleve
 */
class ControleurSuppresionVoiture implements ControleurInterface {
    
    public function dispatch($vue, $modele, $tabParametres) {
        try {
            $ok = $modele->getVoiture()->suppressionVoiture($_GET['ListeVoiture']);
            echo"Votre voiture a bien ete supprimee de la base de donnees";
        }
        catch(ModeleExceptions $ex){
            $vue->getVoiture()->afficheInsertVoitureNonOK();
        }
}
}
?>
