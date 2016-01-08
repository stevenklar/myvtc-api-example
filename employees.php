<?php

require_once 'vendor/autoload.php';

// YOUR MyVTC API TOKEN!
$apiToken = '8ad2bb1ea455055c4b9f4902d8321d81';

// API REQUEST
$client = new GuzzleHttp\Client([
    'base_uri' => 'http://api.myvtc.net',
    'headers' => ['Token' => $apiToken]
]);
$request = $client->get('/members');

$members = json_decode($request->getBody());

$companyKilometers = 0;
$companyMoney = 0;
$companyTours = 0;

foreach ($members as $member) {
    $companyKilometers += $member->km;
    $companyMoney += $member->money;
    $companyTours += $member->tours;
}
?>

<h1>Company statistics</h1>

<ul>
    <li>All driven tours: <?= $companyTours ?> times</li>
    <li>All driven distance: <?= $companyKilometers ?>km</li>
    <li>All received money: <?= $companyMoney ?>,- Euro</li>
</ul>

