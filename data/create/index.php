<?php
/**
 * Created by PhpStorm.
 * User: IMukunya
 * Date: 3/16/2015
 * Time: 10:22 AM
 */
include "../Data.php";
$DBdata=new Data();
if(!isset($_GET['query'])){
    echo "error : please include a query your request";
}else{
    $query=$_GET['query'];
    $data=$DBdata->createRecords($query);
    echo $data;
}
