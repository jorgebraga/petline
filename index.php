<?php 

require_once("vendor/autoload.php");

$app = new \Slim\Slim();

$app->config('debug', true);

$app->get('/', function() {
    
	$sql = new petline\DB\Sql();

	$result = $sql -> select("SELECT * FROM cliente");

	echo json_encode($result);

});

$app->run();

 ?>