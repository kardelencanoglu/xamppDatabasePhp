<?php
require "DataBase.php";
$db = new DataBase();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // JSON verisini alıyoruz
    $json_data = file_get_contents("php://input");

    // JSON verisini çözüp diziye dönüştürüyoruz
    $data = json_decode($json_data, true);

    // name, age, breed, gender ve species değerlerini alıyoruz
    $name = isset($data['name']) ? $data['name'] : '';
    $age = isset($data['age']) ? $data['age'] : '';
    $breed = isset($data['breed']) ? $data['breed'] : '';
    $gender = isset($data['gender']) ? $data['gender'] : '';
    $species = isset($data['species']) ? $data['species'] : '';

}

    if ($db->dbConnect()) {
        if ($db->createPet("pets", $name, $breed, $age, $species, $gender)) {
            echo "Pet Save Success";
        } else echo "Pet Save Failed";
    } else echo "Error: Database connection";
?>

