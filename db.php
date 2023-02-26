<?php
try {
	$conn =new PDO("mysql:host=localhost;dbname=DemoPDO","root","");
 } catch (Exception $e) {
 	die ($e->getMessage());
 } 
?>