<?php

//vendor/Model/Model.php

namespace Model;

use PDO, Manager\PDOManager;

class Model
{

    private $db; //contiendra notre objet PDO

    public function __construct()
    {
        //instanciation sans heritage dans ce cas

        $this->db = PDOManager::getInstance()->getPdo();
        //lorsque j'instancie un objet Model (ou un enfant de cette classe),
        //la fonction construct() se lance, créer un objet PDO et le stock d
        //dans la propriété $db
    }

    //RECUPERATION DE LA CONNEXION BDD PDO
    public function getDb()
    {
        return $this->db;
        //cette fn retourne l'objet pdo stocké dans $db
    }


    /**
     * @return string
     * RECUPERATION NOM DE LA TABLE et formatage
     * à partir de la class active donc valable pour MEMBRE PRODUIT COMMANDE
     */
    public function getTableName()
    {
        //get_called_class() est une fonction qui me retourne le nom de la classe dans
        //laquelle nous sommes/
        // Model/ProduitModel -> str_replace va donner
        //''Produit'' strtolower va donner
        // produit
        //nom de table BDD = nom d'entite pareil pour propriété et nom de colonne

        $table = strtolower(str_replace(array('Model\\', 'Model'), '', get_called_class()));

        return $table;
        //pour le test sur entité produit
        //return 'produit';
    }

    //---------------------------------------------------------------------------------------------
    //                REQUETES GENERIQUES
    //---------------------------------------------------------------------------------------------


    /**
     * Fonction de SELECT ALL générique
     * @return bool
     */
    public function findAll()
    {
        $requete = "SELECT * FROM " . $this->getTableName();
        //$requete = "SELECT * FROM produit (par exemple);

        //query à partir de l'objet PDO recupéré par getDB
        $resultat = $this->getDb()->query($requete);


        $resultat->setFetchMode(PDO::FETCH_CLASS, 'Entity\\' . $this->getTableName());

        /*SetFetchMode permet d'instancier un objet (dans notre cas un objet entity produit)
        en prenant les résultats de notre requête en affectant les valeurs dans les propriétés
        de mes objets. Pour que cela fonctionne parfaitement sans accroc, il faut absolument que
        les champs les tables correspondent aux noms des propriétés dans les objets
        $objet = new Entity\Porduit;
        $objet -> titre = 'mon super produit'
        $objet -> id_produit = 12

        ect... */
        $donnees = $resultat->fetchAll();


        if (!$donnees) {
            return FALSE; //cas de faute de données
        } else {
            return $donnees;
        }

    } //End of findAll()


    /**
     * FONCTION SELECT de un resultat par son ID
     * @param $id
     * @return bool
     */
    public function find($id)
    {

        $requete = "SELECT * FROM " . $this->getTableName() .
            " WHERE id_" . $this->getTableName() . "=:id";

        $resultat = $this->getDb()->prepare($requete);
        $resultat->bindValue(':id', $id, PDO::PARAM_INT);
        $resultat->execute();

        $resultat->setFetchMode(PDO::FETCH_CLASS, 'Entity\\' . $this->getTableName());

        $donnees = $resultat->fetch();

        if (!$donnees) {
            return FALSE;
        } else {
            return $donnees;
        }

    } //End of find($id)

    // Méthode générique pour supprimer un enregistrement
    public function delete($id)
    {
        $requete = "DELETE FROM " . $this->getTableName() . ' WHERE id_' . $this->getTableName() . ' = :id';

        $resultat = $this->getDb()->prepare($requete);
        $resultat->bindValue(':id', $id, PDO::PARAM_INT);

        return $resultat->execute();
    }

    //Méthode générique pour modifier un enregistrement avec la requete UPDATE
    public function update($id, $infos)
    {
        $newValues = '';
        $first = FALSE;
        foreach ($infos as $key => $value) {
            if ($first == FALSE) {
                $newValues .= " $key = :$key ";
                $first = TRUE;
            } else {
                $newValues .= ", $key = :$key ";
            }
        }

        $requete = "UPDATE " . $this->getTableName() . " set " . $newValues . " WHERE id_" . $this->getTableName() . "=:id";

        //echo $requete;
        $resultat = $this->getDb()->prepare($requete);
        $infos['id'] = $id;
        // la ligne ci-dessous est pour ajouter notre id passé en parametre dans l'array de la méthode execute();
        return $resultat->execute($infos);
    }

    //Méthode générique pour ajouter un enregistrement
    public function register($infos)
    {
        $requete = 'INSERT INTO ' . $this->getTableName() . ' (' . implode(', ', array_keys($infos)) . ') VALUES (' . ":" . implode(", :", array_keys($infos)) . ')';

        //echo $requete;

        $resultat = $this->getDb()->prepare($requete);

        if ($resultat->execute($infos)) {
            return $this->getDb()->lastInsertId();
        } else {
            return false;
        }
    }


}













































