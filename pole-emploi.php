<?php
/**
 * Created by PhpStorm.
 * User: Etudiant
 * Date: 23/03/2018
 * Time: 11:07
 */


<?php

$users = array(
    0 = array(
        'prenom' => 'Arnaud',
        'nom' => 'vallette',
        'email' => 'arnaud.valette@gmail.com',
        'token' => 'qsgqhjdqruiqqzklj'
    ),
    1 = array(
        'prenom' => 'Yakine',
        'nom' => 'Hamida',
        'email' => 'yakine.hamida@gmail.com',
        'token' => 'dsfsdfdsfdsfdf'
    ),
),
);

foreach($users as $key => $value){

    $html = '<p>Bonjour, etes-vous dispo ?</p>'
	$html .= '<a href="http://www.monsite.com/traitement.php?r=1&token=' . $value['token'] . '">Oui</a>';
	$html .= '<a href="http://www.monsite.com/traitement.php?r=0&token=' . $value['token'] . '">Non</a>';

	mail();



}