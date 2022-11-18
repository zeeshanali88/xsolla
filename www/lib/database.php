<?php

try {
	$db = new PDO('mysql:host=mysql;dbname=dbase', 'dbuser', 'dbpass');
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
	
	echo $e->getMessage();
}
