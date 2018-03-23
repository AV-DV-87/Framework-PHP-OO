<?php

//app/Config/parameters.php

//se tableau contient les infos de connexion de BDD et il est multidimensionnel car il pourrait comprendre des paramètres
// de sécurité par exemple
$parameters = array(
    'connect' => array(
        'host' => 'localhost',
        'dbname' => 'boutique',
        'login' => 'root',
        'password' => ''
    )
);


//------test
//echo '<pre>';
//print_r($parameters);
//echo '</pre>';