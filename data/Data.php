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
        $resp=self::queryDB($sql);
        return $resp;
    }
    //function to delete records
    function deleteRecord($sql){
        $resp=0;
        return $resp;
    }
    //function to read records
    function readRecords($sql){

        $resp=self::queryDB($sql);
        $data='';
        $stmt=$this::$conn->prepare($sql);
        $stmt->execute();
        $data=$stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt=$this::$conn->prepare($sql);
        $stmt->execute();
        $data=$stmt->fetchAll(PDO::FETCH_ASSOC);

        return $data;
    }
    //function to update records
    function updateRecords($sql){
        $resp=self::queryDB($sql);
        return $resp;
    }
    //function to do the actual query
    function queryDB($sql){




    }
    function userErrorResponse($message){
        $data='';
        $error="true";
        $resp['message']=$message;
        $resp['data']=$data;
        $resp['error']=$error;
        echo json_encode($resp);
    }
    function is_ajax() {
      return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
    }

}
