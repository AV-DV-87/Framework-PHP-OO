<?php
//app/Config.php


/**
 * Class Config
 */
class Config
{
    protected $parameters; //va contenir les infos du fichier parameters.php

    public function __construct()
    {
        require __DIR__ . '/Config/parameters.php';
        $this -> parameters = $parameters;
        //au moment où j'instancie cette classe, je récu^père parameters.php et je stocke les params dans la propriété

    }

    public function getParametersConnect()
    {
        return $this -> parameters['connect'];
        //retourne les infos de connexion utiles pour la connexion à la BDD
    }
}

//-----TEST------
//$config = new Config();
//echo '<pre>';
//print_r($config -> getParametersConnect());
//echo '</pre>';