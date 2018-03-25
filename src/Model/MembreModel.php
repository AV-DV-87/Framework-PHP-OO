<?php

namespace Model;

use PDO; //pour les requêtes spécifiques à membres

class MembreModel extends Model
{
    //tout le code de Model.php est ici

    public function getAllMember() //renomme les fonctions de model pour être plus clair
    {
        return $this ->findAll();
    }
    public function getMemberById($id)
    {
        return $this -> find($id);
    }
    public function updateMember($id, $infos)
    {
        return $this->update($id, $infos);
    }
    public function deleteMember($id)
    {
        return $this ->delete($id);
    }
    public function registerMember($infos)
    {
        return $this->register($infos);
    }
    //fin des function héritées


}