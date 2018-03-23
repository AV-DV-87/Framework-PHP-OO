<?php

namespace Manager;
use PDO;
use Config;

class PDOManager
{
    //COEUR SINGLETON
    private static $instance = NULL;

    private function __construct(){}
    private function __clone(){}

    public static function getInstance()
    {
        if(!self::$instance){
            self::$instance = new self;
        }
        return self::$instance;
    }
    //fin de COEUR du SINGLETON

    public function getPdo()
    {
        require_once __DIR__ . '/../../app/Config.php';
        $config = new Config;
        $connect = $config->getParametersConnect();
        //on instancie un objet de la classe config qui va transmettre les infos de connexion via la fonction
        //get_ParametersConfig
        return new PDO('mysql:host='.$connect['host'].';dbname='.$connect['dbname'],
            $connect['login'], $connect['password'],

            array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, //on ajoute un mode d'erreur
                PDO::MYSQL_ATTR_INIT_COMMAND=>'SET NAMES utf8',
                PDO::ATTR_DEFAULT_FETCH_MODE=> PDO::FETCH_ASSOC //mode par défaut du fetch
            ));

    }


}