<?php
require_once 'db.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//https://parking-web.000webhostapp.com/src/php/rest_api.php/client/get
//https://parking-web.000webhostapp.com/src/php/rest_api.php/client/update
//https://parking-web.000webhostapp.com/src/php/rest_api.php/parking/get
//https://parking-web.000webhostapp.com/src/php/rest_api.php/parking/update
//https://parking-web.000webhostapp.com/src/php/rest_api.php/partner/get
//https://parking-web.000webhostapp.com/src/php/rest_api.php/partner/update
//https://parking-web.000webhostapp.com/src/php/rest_api.php/premium/get
//https://parking-web.000webhostapp.com/src/php/rest_api.php/premium/update
//https://parking-web.000webhostapp.com/src/php/rest_api.php/reservation/get
//https://parking-web.000webhostapp.com/src/php/rest_api.php/reservation/update
//https://parking-web.000webhostapp.com/src/php/rest_api.php/review/get
//https://parking-web.000webhostapp.com/src/php/rest_api.php/review/update

$request_uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$table_map = [
    'client' => 'client',
    'parking' => 'parking',
    'partner' => 'partner',
    'premium' => 'premium',
    'reservation' => 'reservation',
    'review' => 'review',
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
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die("Database connection failed: " . $e->getMessage());
    }

    if (strpos($request_uri, 'get') !== false) {
        $url_parts = explode('/', $request_uri);
        $id_or_all = end($url_parts); // Get the last part of the URL as the ID or 'all'
    
        if ($id_or_all === 'all') {
            $query = $pdo->query("SELECT * FROM $table_name");
            $data = $query->fetchAll(PDO::FETCH_ASSOC);
    
            if (!empty($data)) {
                header('Content-Type: application/json');
                echo json_encode($data);
            } else {
                echo json_encode(array('message' => 'No data found in the ' . $table_name . ' table.'));
            }
        } else {
            $id = intval($id_or_all); // Convert the ID to an integer
    
            if ($id) {
                $query = $pdo->prepare("SELECT * FROM $table_name WHERE id = :id");
                $query->bindParam(':id', $id, PDO::PARAM_INT);
                $query->execute();
                $data = $query->fetch(PDO::FETCH_ASSOC);
    
                if ($data) {
                    header('Content-Type: application/json');
                    echo json_encode($data);
                } else {
                    echo json_encode(array('message' => 'No data found with ID ' . $id . ' in the ' . $table_name . ' table.'));
                }
            } else {
                echo json_encode(array('message' => 'Invalid URL. No matching ID or "all" found.'));
            }
        }
    } elseif (strpos($request_uri, 'update') !== false) {
        $input = json_decode(file_get_contents('php://input'), true);
        $url_parts = explode('/', $request_uri);
        $id = end($url_parts); // Get the last part of the URL as the ID
        
        // Check if the record with the provided ID already exists
        $checkQuery = $pdo->prepare("SELECT id FROM $table_name WHERE id = :id");
        $checkQuery->bindParam(':id', $id, PDO::PARAM_INT);
        $checkQuery->execute();
        $recordExists = $checkQuery->fetch(PDO::FETCH_ASSOC);
        
        if ($recordExists) {
            // The record with the provided ID exists, so update it
            $sql = "UPDATE $table_name SET ";
            $params = [];
            foreach ($input as $key => $value) {
                if ($key !== 'id') { // Exclude the 'id' from the update
                    $params[] = "$key = :$key";
                }
            }
            $sql .= implode(', ', $params);
            $sql .= " WHERE id = :id"; // Update the record with the provided ID
            $stmt = $pdo->prepare($sql);
            foreach ($input as $key => $value) {
                $stmt->bindValue(":$key", $value);
            }
            $stmt->bindValue(":id", $id, PDO::PARAM_INT);
            if ($stmt->execute()) {
                echo json_encode(array('message' => 'Data updated successfully.'));
            } else {
                echo json_encode(array('message' => 'Error updating data.'));
            }
        } else {
            // The record with the provided ID does not exist, so return an error message
            echo json_encode(array('message' => 'Error updating data. Record with ID ' . $id . ' does not exist.'));
        }
    } elseif (strpos($request_uri, 'add') !== false) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $input = json_decode(file_get_contents('php://input'), true);

            $keys = implode(', ', array_keys($input));
            $values = ':' . implode(', :', array_keys($input));
            $insertQuery = $pdo->prepare("INSERT INTO $table_name ($keys) VALUES ($values)");
            if ($insertQuery->execute($input)) {
                echo json_encode(array('message' => 'New data added successfully.'));
            } else {
                echo json_encode(array('message' => 'Error adding new data.'));
            }
        } else {
            http_response_code(405);
            echo json_encode(array('message' => 'Invalid HTTP method'));
        }
    } else {
        echo json_encode(array('message' => 'Invalid URL. No matching action found.'));
    }
} else {
    echo json_encode(array('message' => 'Invalid URL. No matching table found.'));
}
?>