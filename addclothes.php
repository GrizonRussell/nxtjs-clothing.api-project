<?php
include "connection.php";
include "headers.php";
$json = isset($_POST["json"]) ? $_POST["json"]:"0";
$data = json_decode($json,true);
$sql = "insert into clothes(clothing_name, clothing_brand, clothing_year, clothing_type)
        values(:name, :brand, :year, :type)";
$stmt = $conn->prepare($sql);
$stmt->bindParam(":name", $data["name"]);
$stmt->bindParam(":brand", $data["brand"]);
$stmt->bindParam(":year", $data["year"]);
$stmt->bindParam(":type", $data["type"]);
$stmt->execute();
echo $stmt->rowCount()>0 ? 1 :0;