<?php
/**
 * Created by PhpStorm.
 * User: IMukunya
 * Date: 3/16/2015
 * Time: 10:23 AM
 */
include "EntelDB.php";

class Data extends EntelDB{
    public static $conn='';
    function __construct(){
        parent::__construct("northwind","root","");
        self::$conn=EntelDB::$conn;
    }
    //function to create records.
    function createRecords($sql){
        $resp='';
        return $resp;
    }
    //function to delete records
    function deleteRecord($sql){
        $resp=0;
        return $resp;
    }
    //function to read records
    function readRecords($sql){
        $data='';
        return $data;
    }
    //function to update records
    function updateRecords($sql){
        $resp=0;
        return $resp;
    }
    //function to do the actual query
    function queryDB(){

    }

}
