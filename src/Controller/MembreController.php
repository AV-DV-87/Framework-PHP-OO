<?php

namespace Controller;

class MembreController extends Controller
{
    //Récupère tous les membres
    public function afficheAllM()
    {
        //1 Récupère tous les produits
        $membres = $this->getModel()->getAllMember();

        //3 Renvoyer la page de listing des membres

        //solution sans render pour test
        //require __DIR__ . '/../View/produit/boutique.php';

        $params = array(
            'membres'=>$membres
        );

        return $this -> render('layout.html', 'gestion_membre.html', $params);
    }

    //Affiche un membre
    public function afficheM($id)
    {
        //1 recup les infos du produit dont l'id est $id
        $membre = $this->getModel()->getMembreById($id);

        //2 Renvoie la vue

        $params = array(
            'membre'=>$membre
        );

        return $this ->render('layout.html', 'fiche_membre.html', $params);
    }
}