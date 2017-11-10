<?php

require_once '../../vendor/autoload.php';


define("DSN", "mysql:host=localhost;dbname=link");
define("USER", "root");
define("PASS", "9f8a7fc4b89ec2ecc8ab458a7f30f0c00471be5b8555eeb9");

$db = new \PDO(DSN,USER,PASS);

$req = $db->query("SELECT pseudo FROM user WHERE MONTH(date) = MONTH(NOW()) AND DAY(date) = DAY(NOW())");
$results = $req->fetchAll(\PDO::FETCH_CLASS) ;

if (!empty($req)){

    $client = new \GuzzleHttp\Client();

    $login = $client->request('POST', 'https://chat.wildcodeschool.fr/api/v1/login', [
        "form_params" => [
            "user" => "cindy.liwenge@gmail.com",
            "password" => "Cin0nym*27!"
        ]
    ]);

    $auth = json_decode($login->getBody());

    foreach ($results as $result){
        $client->request('POST', 'https://chat.wildcodeschool.fr/api/v1/chat.postMessage', [
            "headers" => [
                "X-Auth-Token" => $auth->data->authToken,
                "X-User-Id" => $auth->data->userId
            ],
            "form_params" => [
                "channel" => "#paris",
                "alias" => "Party Bot",
                "emoji" => ":beers:",
                "text" => "Heyyyyy c'est l'anniversaire de " . $result->pseudo . " 
Qui est chaud pour boire au Bistrot des Artistes à 18h30 ce soir? Réagissez avec une choppe :beer:
https://media.giphy.com/media/3o7btZjaYxqkGyOYA8/giphy.gif "
            ]
        ]);
    }
}