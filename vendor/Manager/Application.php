<?php

namespace Manager;

final class Application
{

    protected $controller; //scan l'url et met le controller à instancier
    protected $action;//scan l'url et met l'action à lancer
    protected $argument = '';//scan l'url et met l'argument si il y en a un



    public function __construct() //scan de l'url
    {

        $tab = explode('/', $_SERVER['REQUEST_URI']);

        //echo '<pre>';
        //print_r($tab);
        //echo '</pre>';

        if(isset($tab[3]) && !empty($tab[3]) && file_exists(__DIR__ . '/../src/Controller/'.$tab[3].
                'Controller.php')) //si il y a un controller dans l'url et que le fichier controller correspondant existe
        {
            $this->controller= 'Controller\\' . $tab[4] . 'Controller';
        }
        else
        {
            $this -> controller = 'Controller\ProduitController';
        }

        if(isset($tab[4]) && !empty($tab[4]))
        {
            $this->action=$tab[4];
        }
        else
        {
            $this -> controller = 'Controller\ProduitController';
            $this -> action = 'afficheAll';
        }

        if(isset($tab[5]) && !empty($tab[5]))
        {
            $this -> argument = $tab[5];
        }
    }

    public function run() //lance l'appli
    {
        if(!is_null($this->controller))
        {
            $a = new $this->controller;
            if(!is_null($this->action)&& method_exists($a, $this->action))
            {
                $action = $this->action;
                $a -> $action($this->argument);

            }
        }
        else
        {
            //page 404 à créer
            require __DIR__ . '/../../src/View/404.html';
        }

    }
}