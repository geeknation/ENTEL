<?php
/**
 * Created by PhpStorm.
 * User: IMukunya
 * Date: 4/8/2015
 * Time: 11:09 AM
 */
$pdo=new PDO("mysql:host=localhost;dbname=northwind;","root","");

$datas=array();
$query="SELECT * FROM customers WHERE ContactName LIKE :q";
$stmt=$pdo->prepare($query);
$stmt->execute(array("q"=>"%".$_GET['q']."%"));
$data=$stmt->fetchAll(PDO::FETCH_ASSOC);

$query2="SELECT * FROM employees WHERE FirstName LIKE :q";;
$stmt2=$pdo->prepare($query2);
$stmt2->execute(array("q"=>"%".$_GET['q']."%"));
$data2=$stmt2->fetchAll(PDO::FETCH_ASSOC);

header('Content-Type" => application/json');
echo json_encode(array(
    "error"  => null,
    "data"   => array(
        "customers" => $data,
        "employees" =>$data2
    )
));