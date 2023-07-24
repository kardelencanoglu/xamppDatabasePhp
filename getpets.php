<?php
require "DataBase.php";
$db = new DataBase();

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if ($db->dbConnect()) {
        $pets = $db->getPets("pets"); // Burada getPets() fonksiyonunuzda gerekli sorguları yaparak verileri almalısınız.
        if ($pets) {
            $response['status'] = 'success';
            $response['data'] = $pets;
        } else {
            $response['status'] = 'error';
            $response['message'] = 'No pets found';
        }
    } else {
        $response['status'] = 'error';
        $response['message'] = 'Database connection error';
    }

    header('Content-Type: application/json');
    echo json_encode($response);
}
?>