<?php

require_once 'ControleurInterface.php';

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ControleurAffichageVoiture
 *
 * @author eleve
 */
class ControleurAffichageVoiture implements ControleurInterface{
    
    public function dispatch($vue, $modele, $tabParametres) {
        try {
            //on va chercher les infos dans le modèle
            $result = $modele->getVoiture()->getLesVoiture();
            //on les affiche à la vue
            $vue->getVoiture()->afficheLesVoiture($result);
        }
        catch(ModeleExceptions $ex){
            $vue->getGeneral()->afficheException($ex->getMessageErreur());
        }       
    }
}

?>
