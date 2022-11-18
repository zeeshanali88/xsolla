<?php
session_start();
error_reporting(~E_WARNING);
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Game Library</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css">
</head>

<body class="d-flex flex-column h-100">

	<header>
		<!-- Fixed navbar -->
		<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
			<div class="container-fluid">
				<a class="navbar-brand" href="/">Game Library</a>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarCollapse">
					<ul class="navbar-nav me-auto mb-2 mb-md-0">
						<li class="nav-item">
							<a class="nav-link" aria-current="page" href="/add.php">Add Game</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>
	</header>

	<main class="flex-shrink-0 mt-5">

		<div class="container mt-5">

			<?php
			if (!empty($_SESSION['msg'])) {
			?>
				<div class="alert alert-success">
					<?= $_SESSION['msg'] ?>
				</div>
			<?php
				unset($_SESSION['msg']);
			}
			?>

			<?php
			if (!empty($_SESSION['err'])) {
			?>
				<div class="alert alert-danger">
					<?= $_SESSION['err'] ?>
				</div>
			<?php
				unset($_SESSION['err']);
			}
			?>