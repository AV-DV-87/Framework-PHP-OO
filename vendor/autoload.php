<?php
//vendor/autoload.php

class Autoload
{
    public static function inclusion_automatique($className)
    {
        //ATTENTION au
        // $a = new Controller\ProduitController
        // nécessite un require (__DIR__ . '/../src/Controller/ProduitController.php')
        // $b = new Manager\PDOManager

        //EXPLODE pour faire des array à partir des url reçu
        $tab = explode('\\', $className);

        //RECONSTITUTION DES URL
        //si je suis entré dans le dossier manager
        if($tab[0]=='Manager' || ($tab[0]=='Model' && $tab[1] == 'Model') ||($tab[0]=='Controller' && $tab[1] == 'Controller')){
            $path = __DIR__ . '/' . implode('/', $tab) . '.php';
        }
        //sinon je suis dans le dossier src
        else{

            $path = __DIR__ . '/../src/' .implode('/', $tab) . '.php';
        }
        //----------------------------------------------
        //echo'<pre>Autoload : '. $className. '<br>';
        //echo '===> Require('.$path.')<pre>';
        //----------------------------------------------

        require $path;


    }


}

//--------------------------------------------
spl_autoload_register(array('Autoload', 'inclusion_automatique'));
//--------------------------------------------
/*********************************************
 *
 * spl_autoload_register en POO attend un argument qui soit un array,
 * avec les valeurs suivantes :
 *      1. nom de la class
 *      2. nom de la méthode à executer
 *
 *     Résultat de spl_AR Autoload :: inclusion_automatique($class_name)
 *
 *********************************************/