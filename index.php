<?php
require __DIR__ . '/vendor/autoload.php';


# ref : https://www.nidup.io/blog/manipulate-google-sheets-in-php-with-api


$client = new \Google_Client();


$client->setApplicationName('Google Sheets API');
$client->setScopes([\Google_Service_Sheets::SPREADSHEETS]);
$client->setAccessType('offline');
// credentials.json is the key file we downloaded while setting up our Google Sheets API
$path = 'data/credentials.json';
$client->setAuthConfig($path);

// configure the Sheets Service
$service = new \Google_Service_Sheets($client);

$spreadsheetId = '1o6Ey-qWBxcy-L67kB37ut9sYVKImgbdC1saePMNPvfg';

// $spreadsheet = $service->spreadsheets->get($spreadsheetId);
// var_dump($spreadsheet);

// $range = 'Sheet1!B1:B21'; // the column containing the movie title
// $response = $service->spreadsheets_values->get($spreadsheetId, $range);
// $values = $response->getValues();

// we define here the expected range, columns from A to F and lines from 1 to 10
$range = 'Sheet1!A1:F10';
$response = $service->spreadsheets_values->get($spreadsheetId, $range);
$values = $response->getValues();
// var_dump($values);

echo $values[1][0];

// print_r($values);