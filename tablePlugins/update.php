<?php
$formData=$_POST['formData'];

print_r($formData);

function updateData($keys,$values){
	
	//merge array into key value pair
	
	$arrayData=array_combine($keys, $values);
	print_r($arrayData);
	
	
}






?>