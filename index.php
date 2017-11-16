<?php


$url = 'https://api.thingspeak.com/channels/364485/bulk_update.json';
$writeApiKey = 'W1KLU77RUP7DYIYW';

$data = [
    'write_api_key' => $writeApiKey,
    'updates' => [
        [
            'created_at' => '2017-11-16 10:26:21 -0500',
            'field1' => 200
        ]
    ],
];

$json = json_encode($data);

var_dump($data);
var_dump($json);


$curl = curl_init($url);
curl_setopt($curl, CURLOPT_HEADER, false);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_HTTPHEADER,
        array("Content-type: application/json"));
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $json);

$json_response = curl_exec($curl);

$status = curl_getinfo($curl, CURLINFO_HTTP_CODE);

if ( $status != 201 ) {
    die("Error: call to URL $url failed with status $status, response $json_response, curl_error " . curl_error($curl) . ", curl_errno " . curl_errno($curl));
}


curl_close($curl);

$response = json_decode($json_response, true);

// update last temperature
function updateLastInfos () {
    // envoyer une requete pour obtenir les derniere
    // temperature sur thingspeak


    // chercher dans la base de données les temperature
    // dont leurs date de prises son supérieur a la 
    // derniere de thingspeak

    // envoyer les modification a thingspeak
}

