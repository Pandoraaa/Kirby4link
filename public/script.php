<?php

require '../vendor/autoload.php';

$client = new GuzzleHttp\Client();

$login = $client->request('POST', 'https://chat.wildcodeschool.fr/api/v1/login', [
    "form_params" => [
        "user" =>  "cindy.liwenge@gmail.com",
        "password" => "Cin0nym*27!"
    ]
]);

$auth = json_decode($login->getBody());

$send = $client->request('POST', 'https://chat.wildcodeschool.fr/api/v1/chat.postMessage', [
    "headers" => [
        "X-Auth-Token"=> $auth->data->authToken,
        "X-User-Id"=> $auth->data->userId
    ],
    "form_params" => [
        "channel" => "#paris",
        "alias" => "Party Bot",
        "emoji" => ":beers:",
        "text" => "Heyyyyy c'est l'anniversaire de @Caroline! 
        Qui est chaud pour boire au Bistrot des Artistes à 18h30 ce soir? Réagissez avec une choppe :beer:
        https://media.giphy.com/media/3o7btZjaYxqkGyOYA8/giphy.gif "
    ]
]);
var_dump($send);die();