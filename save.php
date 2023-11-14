
<?php



$data = file_get_contents('data.json');
$json = @json_decode($data, true);

if (is_array($json) === false) $json = [];

if (isset($_GET['name']) && isset($_GET['record'])) {

    $name = $_GET['name'];
    $record = $_GET['record'];

    $json[] = ['name' => $name, 'record' => $record];
}

// Sort the array by record in descending order
usort($json, function ($a, $b) {
    return $b['record'] - $a['record'];
});


$data = json_encode($json);

file_put_contents('data.json', $data);

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

header('Content-Type: application/json');

echo($data);
