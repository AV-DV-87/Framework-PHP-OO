<?php

namespace Controller;

use Model;

class Controller
{
    protected $model; //contient le nom du model à instancier (ProduitModel = ProduitController)

    public function __construct()
    {
        $class= 'Model\\' . str_replace(array('Controller\\', 'Controller'),'',get_called_class()). 'Model';
        //Il par du nom de Controller pour enlever controller et se placer sur le bon Model dans Model\ProduitModel

        $this->model = new $class; //instanciation et stockage dans this -> model
    }
    public function getModel()
    {
        return $this->model;
    }
    public function render($layout, $view, $params)
    {

        $dirView = __DIR__ . '/../../src/View/';

        $dirFile = str_replace(array('Controller\\', 'Controller'),'',get_called_class()) . '/';
        //on obtient Produit si la class produit est instanciée

        //cheminement jusqu'au layout correspondant
        $path_view = $dirView . strtolower($dirFile) . $view;

        $path_layout = $dirView . $layout;

        extract($params);
        //exctract permet la correspondance entre les indices du array params
        // et le noms des variables utilisées dans les vues.

        ob_start(); //enclenche la temporisation de sortie mais le code qui suit en attente en mémoire tampon / temporise

        require $path_view;
        $content = ob_get_clean(); //je stocke ce qui a été retenu dans la variable $content

        ob_start();
        require $path_layout;

        return ob_end_flush(); // retourne tout ce qui a été retenu et éteint la temporisation


    }
}