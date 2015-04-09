<?php

$pdo=new PDO("mysql:host=localhost;dbname=northwind;","root","");

$datas=array();

$query="SELECT * FROM employees WHERE FirstName LIKE :q";

$stmt=$pdo->prepare($query);

$stmt->execute(array("q"=>"%".$_GET['q']."%"));

$data=$stmt->fetchAll(PDO::FETCH_ASSOC);

/*
$stmt1=$pdo->prepare($query1);

$stmt1->execute(array("q"=>$_GET['q']."%"));

$data['customers']=$stmt1->fetchAll(PDO::FETCH_ASSOC);*/
header('Content-Type" => application/json');
echo json_encode($data);

?>