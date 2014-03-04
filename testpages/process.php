<?php

include "../EntelAuth.php";

$auth=new EntelAuth("EntelUI.php","EntelMain.php");

$username=$_POST['username'];
$password=$_POST['password'];

$auth->login($username, $password,FALSE);


?>