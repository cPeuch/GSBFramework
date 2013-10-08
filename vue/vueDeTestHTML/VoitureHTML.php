<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of VoitureHTML
 *
 * @author eleve
 */
class VoitureHTML {
    private $general;
    
    function __construct(){
        $this->general = new GeneralHTML();
    }
    
    public function afficheLesVoiture ($tabElements){
        $this->general->getDebutPage("Affichage des voitures");
        
        $nb = count ($tabElements);
        
        for($i=0;$i<$nb;$i++){
            echo($tabElements[$i]["Immatriculation"]." ".$tabElements[$i]["Marque"]." ".$tabElements[$i]["Modele"]." ".$tabElements[$i]["Annee"]."<BR/>");
        }
        $this->general->getRetourAccueil();
        $this->general->getFinPage();
    }

    public function afficheFormInsertionVoiture(){
        $this->general->getDebutPage("Insertion d'une voiture");
        //attention : dans le formulaire, l'action envoyée est 
        //de la forme do.php?action=inserePersonne&nomP=MyTaylorIsRich&Prenom=Very&sexeP="M"
        //pour envoyer le paramètre inserePersonne, il faut le placer dans un input caché
?>
    <form action="do.php?insereVoiture " method="GET">
                    Immatriculation 
                    <input type="text" name="Immatriculation" size="20" ><BR/><BR/>
                    Marque
                    <input type="text" name="Marque" size="20" ><BR/><BR/>
                    Modele
                    <input type="text" name="Modele" size="20" ><BR/><BR/>
                    Annee
                    <input type="text" name="Annee" size="20" ><BR/><BR/>
                    <input type="hidden" name="action" value="insereVoiture">
                    <input type="submit" value="Envoyer" >
                    <input type="reset" value="Annuler" >
                </form>
<?php
        $this->general->getFinPage();
    }  
    public function afficheFormSuppressionVoiture($tab){
        $this->general->getDebutPage("Suppression d'une voiture");
        
?>
    <form action="do.php?suppresionVoiture" method ="GET" name="Immat">
            Liste des voitures
            <Select name ="ListeVoiture" size="1">
        <?php
               
            foreach ($tab as $immat) {
                echo "<option>".$immat."</option>";
            }
  
        ?> 
            </Select>
            <br/><br/>
            <input type="hidden" name="action" value="suppresionVoiture">
            <input type="submit" value="Envoyer" >
            <input type="reset" value="Annuler" >
    </form>
<?php
    $this->general->getFinPage();
    }
}
?>
