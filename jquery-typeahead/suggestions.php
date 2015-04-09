<?php
$pdo=new PDO("mysql:host=localhost;dbname=northwind;","root","");

$key=$_GET['sug'];

$query="SELECT ProductName,UnitPrice FROM products WHERE ProductName LIKE :sug";

$stmt=$pdo->prepare($query);

$stmt->execute(array("sug"=>$_GET['sug']."%"));

$data=$stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($data);

?>