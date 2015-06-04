<?php
if (isset($_GET) and isset($_GET['get'])) {
	if ($_GET['get'] == "all-visits") {
		fetchAllVisits();
	}
}

if(isset($_POST['action']) and $_POST['action']=='new-user'){

	addNewVisitor($_POST['etlProfile'] , $_POST['etlBrowserProfile']);

}

function addNewVisitor($profile,$ua) {
	$pdo = new PDO("mysql:host=localhost;dbname=entelytics;", "root", "");
	$query = "INSERT INTO visitors(profile,ua) VALUES(?,?)";

	$stmt = $pdo -> prepare($query);

	$res = $stmt -> execute(array($profile."",$ua));

	if ($res==1) {
		echo "done";
	} else {
		echo "failed";
	}

}

function fetchAllVisits() {
	$pdo = new PDO("mysql:host=localhost;dbname=entelytics;", "root", "");
	$stmt = $pdo -> prepare("SELECT * FROM visitors");
	$stmt -> execute();
	echo $stmt -> rowCount();
}

function updateAllVisits() {
	$pdo = new PDO("mysql:host=localhost;dbname=entelytics;", "root", "");
	$count=getCurrentVisitCount();
	$newCount=$count+1;
	$stmtupdate=$pdo->prepare("UPDATE visit_count SET count=? WHERE id=?");
	$stmtupdate->execute(array($newCount,1));
	$result=$stmtupdate->rowCount();
	
	if($result==1){
		echo "updated";
		
	}else{
		echo "notupdated";
	}
	
}
function getCurrentVisitCount(){
	$pdo = new PDO("mysql:host=localhost;dbname=entelytics;", "root", "");
	$stmt = $pdo -> prepare("SELECT * FROM visit_count");
	$stmt -> execute();
	$count = $stmt->fetch();
	$c=(int)$count[0];
	return $c;
}
?>