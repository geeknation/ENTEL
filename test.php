<html>
<head>

</head>
<body>
<?php
 include "data/Data.php";

 $agent=new Data();

 $data=$agent->readRecords("SELECT * FROM orders");

 echo json_encode($data);
?>
</body>
</html>
