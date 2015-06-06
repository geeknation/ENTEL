<?php
$pdo=new PDO("mysql:host=localhost;dbname=northwind;","root","");

$stmt=$pdo->prepare("SELECT * FROM customers");

$stmt->execute();

$data=$stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($data);

?>

