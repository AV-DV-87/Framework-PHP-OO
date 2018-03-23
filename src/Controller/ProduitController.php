<?php

namespace Controller;

class ProduitController extends Controller
{
    //ces actions sont des actions en FRONT le BACK OFFICE fait l'office d'un namespace séparé et de controller séparé

    //Fiche produit
    public function afficheAll()
    {
        //1 Récupère tous les produits
        $produits = $this->getModel()->getAllProduit();

        //2 récupère toutes les catégories
        $categories = $this->getModel()->getAllCategorie();

        //3 Renvoyer la homepage de la boutique (boutique.php)

        //solution sans render pour test
        //require __DIR__ . '/../View/produit/boutique.php';

        $params = array(
            'produits'=>$produits,
            'categories'=>$categories
        );

        return $this -> render('layout.html', 'boutique.html', $params);
    }

    //Affiche un produit (fiche_produit)
    public function affiche($id)
    {
        //1 recup les infos du produit dont l'id est $id
        $produit = $this->getModel()->getProduitById($id);

        //2 Renvoie la vue

        $params = array(
            'produit'=>$produit
        );

        return $this ->render('layout.html', 'fiche_produit.html', $params);
    }

    //Afficher les produits d'une catégorie (boutique/categorie)
    public function boutique($cat)
    {
        //1 Recup toutes les produits de la catego
        //2 Recup de toutes les catego
        //3 Renvoie la vue
        $produit = $this->getModel()->getAllProduitByCategorie($cat);
        $categories = $this->getModel()->getAllCategorie();

        $params = array(
            'produits'=>$produit,
            'categorie'=>$categories
        );

        return $this ->render('layout.html', 'boutique.html', $params);

    }

    //afficher les produits gràce à une recherche
    public function recherche($term)
    {

    }
}



























































































