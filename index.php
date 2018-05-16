<?php

require_once ("config.php");

$con = new Sql();


$result = $con->SELECT("SELECT * FROM tb_user");
echo json_encode($result);


?>