<?php
include "../../EntelData.php";
 $url=$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
 $username="";
 $host="";
 $password="";

 //$url is subject to your own custom implementation.
 if($url=="projectpal.co.ke/uriswitch/"){

 	//when online
	$username="";
 	$databasename="";
 	$password="";
 		
 }
 
 if($url=="localhost/phpjqueryprac/uriswitch/"){

 	//on localhost
	$username="";
 	$databasename="";
 	$password="";
 	
 }

/*choose either one or two depending on if you use the native or custom API*/

//1
 $conn=new EntelDB($databasename,$username,$password);

 //2
 $conn=new PDO("mysql:host=localhost;dbname=" . $databasename . ";charset=utf8", $username, $password);

?>