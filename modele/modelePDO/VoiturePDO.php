<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of VoiturePDO
 *
 * @author eleve
 */
class VoiturePDO {
    public function getLesVoiture(){
        $maConnexion = new ConnexionBD();
        
        $select = $maConnexion->getConnexion()->query("SELECT * FROM Voiture");

        //mode de récupération par défaut
        $select->setFetchMode(PDO::FETCH_OBJ);
        $i=0;
        //traite les résultats en boucle
        $enregistrement = $select->fetch();
        
        $tabElem = NULL;
        while( $enregistrement )
        { 
            $tabElem[$i]["Immatriculation"] = $enregistrement->Immatriculation;
            $tabElem[$i]["Marque"] = $enregistrement->Marque;
            $tabElem[$i]["Modele"] = $enregistrement->Modele;
            $tabElem[$i]["Annee"] = $enregistrement->Annee;
            $enregistrement = $select->fetch();
            $i++;
        }
        
        if ($tabElem == NULL){
            throw new ModeleExceptions (0);
        }
        else{     
            return $tabElem;
        }
    }
    
    public function setUneVoiture($Immatriculation, $Marque, $Modele, $Annee){
        $maConnexion = new ConnexionBD();

        //applique la méthode query sur l’objet $connection
        $req2 = "INSERT INTO Voiture (Immatriculation, Marque, Modele, Annee) VALUES
            ('".$Immatriculation."', '".$Marque."', '".$Modele."', '".$Annee."');";
        
        $res = $maConnexion->getConnexion()->exec($req2);

        if (!$res){
            throw new ModeleExceptions (1);
        }
    }
    
    public function suppressionVoiture($Immatriculation)
    {
        $maConnexion = new ConnexionBD();
        
        $req3 = "Delete From Voiture Where Immatriculation = '".$Immatriculation."'";
        
        $res = $maConnexion->getConnexion()->exec($req3);
        
        
    }
    
    public function getImmat()
    {
        $maConnexion = new ConnexionBD();

        $select = $maConnexion->getConnexion()->query("SELECT Immatriculation FROM Voiture");
        
        $select->setFetchMode(PDO::FETCH_OBJ);
        $i=0;
        //traite les résultats en boucle
        $enregistrement = $select->fetch();
        
        $tabElem = NULL;
        while( $enregistrement )
        { 
            $tabElem[$i]= $enregistrement->Immatriculation;
            $enregistrement = $select->fetch();
            $i++;
        }
        
        if ($tabElem == NULL){
            throw new ModeleExceptions (0);
        }
        else{     
            return $tabElem;
        }
    }
}

?>
