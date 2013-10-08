<?php

require_once 'ControleurInterface.php';

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ControleurAfficheSuppressionVoiture
 *
 * @author eleve
 */
class ControleurAfficheSuppressionVoiture implements ControleurInterface{
    //put your code her
     
      public function dispatch($vue, $modele, $tabParametres) {
         $tab = $modele->getVoiture()->getImmat();
         $vue->getVoiture()->afficheFormSuppressionVoiture($tab);
         
}
}
?>
