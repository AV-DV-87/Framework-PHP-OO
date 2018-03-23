<?php

namespace Model;

use PDO;

class ProduitModel extends Model //HERITAGE
{
    //tout le code de Model.php est ici

    public function getAllProduit() //renomme les fonctions de model pour être plus clair
    {
        return $this ->findAll();
    }
    public function getProduitById($id)
    {
        return $this -> find($id);
    }
    public function updateProduit($id, $infos)
    {
        return $this->update($id, $infos);
    }
    public function deleteProduit($id)
    {
        return $this ->delete($id);
    }
    public function registerProduit($infos)
    {
        return $this->register($infos);
    }
    //fin des function héritées

    //FUNCTION PROPRE A PRODUIT
    public function getAllCategorie()
    {
        $requete = "SELECT DISTINCT categorie FROM produit";
        $resultat = $this -> getDb() -> query($requete);
        $donnees = $resultat ->fetchAll();

        if(!$donnees){

        }
        else{
            return $donnees;
        }
    }

    public function getAllProduitByCategorie($cat)
    {
        $requete = "SELECT * FROM produit WHERE categorie = :cat";
        $resultat = $this -> getDb()->prepare($requete);
        $resultat -> bindValue(':cat', $cat, PDO::PARAM_STR);
        $resultat -> execute();

        $resultat->setFetchMode(PDO::FETCH_CLASS, 'Entity\Produit');
        $donnees = $resultat->fetchAll();

        if(!$donnees){
            return FALSE;
        }
        else{
            return $donnees;
        }

    }

}











































