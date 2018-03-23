<?php

session_start();

require __DIR__ . '/../vendor/autoload.php';

$a = new Manager\Application;
$a-> run();

////TEST 1 : LES ENTITES
//
//$produit = new \Entity\Produit();
//$produit -> setTitre('Mon super produit');
//echo $produit -> getTitre();
//
//$membre = new \Entity\Membre();
//$membre -> setPseudo('Mon super membre');
//echo $membre -> getPseudo();
//
//$commande = new \Entity\Commande();
//$commande -> setEtat('Commande faite');
//echo $commande -> getEtat();


//TEST 2 PDO MANAGGER
//$pdom = Manager\PDOManager::getInstance();
//
//$pdo = $pdom->getPdo();
//$resultat = $pdo->query("SELECT * FROM produit");
//$produits = $resultat->fetchAll();
//
//echo '<pre>';
//print_r($produits);
//echo '</pre>';


//TEST 3 : test du model.php et de ses requêtes
//attention test avec la fonction getTableName a été forcée a retourné le nom de table produit

//$model = new \Model\Model();
//
//$produits = $model -> findAll();
//$produit = $model -> find(8);
//
//echo '<pre>';
//print_r($produits);
//print_r($produit);
//echo '</pre>';

//TEST 4 : ProduitModel

//$pm = new Model\ProduitModel();
//
//echo '<pre>';
//print_r($pm->getAllProduit());
//print_r($pm->getProduitById(10));
//print_r($pm->getAllCategorie());
//print_r($pm->getAllProduitByCategorie('t-shirt'));
//echo '</pre>';

//TEST 5 ProduitController

//$pc = new \Controller\ProduitController();
////$pc->boutique('maillot');
//$pc->affiche(10);
////$pc->afficheAll();

//TEST 6 : infos GET en procédural envoyer vers le controller

//index.php?controller=produit&action=afficheall

//index.php?controller=produit&action=boutique&arg=maillot

//index.php?controller=produit&action=affiche&arg=10

//$controller = 'Controller\\'.$_GET['controller'].'Controller';
//$action = $_GET['action'];
//
//if(isset($_GET['arg'])){
//    $arg = $_GET['arg'];
//}
//else{
//    $arg = '';
//}
//
//$a = new $controller;
//$a -> $action($arg);

//$pc = new Controller\ProduitController();
//$pc->boutique('Maillot');















































