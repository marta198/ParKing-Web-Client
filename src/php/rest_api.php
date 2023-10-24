<?php
require_once 'db.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//https://parking-web.000webhostapp.com/src/php/rest_api.php/client_data
//https://parking-web.000webhostapp.com/src/php/rest_api.php/parking_list
//https://parking-web.000webhostapp.com/src/php/rest_api.php/reservation_list
//https://parking-web.000webhostapp.com/src/php/rest_api.php/review_list
//https://parking-web.000webhostapp.com/src/php/rest_api.php/favorites_list

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $request_uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

    $table_map = [
        'client_data' => 'client_data',
        'parking_list' => 'parking_list',
        'reservation_list' => 'reservation_list',
        'review_list' => 'review_list',
        'favorites_list' => 'favorites_list'
    ];
    
    $table_name = null;
    foreach ($table_map as $keyword => $table) {
        if (strpos($request_uri, $keyword) !== false) {
            $table_name = $table;
            break;
        }
    }

    if ($table_name) {
        try {
            $db = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Database connection failed: " . $e->getMessage());
        }

        $query = $db->query("SELECT * FROM $table_name");
        $data = $query->fetchAll(PDO::FETCH_ASSOC);

        if (!empty($data)) {
            header('Content-Type: application/json');
            echo json_encode($data);
        } else {
            echo json_encode(array('message' => 'No data found in the ' . $table_name . ' table.'));
        }
    } else {
        echo json_encode(array('message' => 'Invalid URL. No matching table found.'));
    }
} else {
    http_response_code(405);
    echo json_encode(array('message' => 'Invalid HTTP method'));
}
?>
