<?php
try
{
$pdo = new PDO('mysql:host=us-cdbr-east-03.cleardb.com;port=3306;dbname=heroku_8070bd2057ad505', 'b8aa88ad6a27d3', '8e2ec6ec');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $ex)
{
	echo $ex->getMessage();
}
?>
