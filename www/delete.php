<?php

include_once 'includes/header.php';

include_once 'lib/database.php';

if (!empty($_GET['id'])) {
	$id = $_GET['id'];
} else {
	@header('location: /index.php');
}

$sql = "DELETE FROM games WHERE id=:id";
$stmt = $db->prepare($sql);
$stmt->bindParam(':id', $id);
$stmt->execute();

$_SESSION['msg'] = 'Game deleted successfully.';

// @header('location: /index.php');
echo "<script>window.location.href='index.php';</script>";
exit;
