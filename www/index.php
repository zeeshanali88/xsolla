<?php
include_once 'includes/header.php';

include_once 'lib/database.php';

$sql = "SELECT * FROM games";
$stmt = $db->prepare($sql);
$data = $stmt->execute();
?>

<div class="clear-fix">
	<a class="btn btn-primary right" href="/add.php">Add Game</a>
</div>
<?php if ($stmt->rowCount() > 0) { ?>

	<table class="table table-striped">
		<tr>
			<th>ID</th>
			<th>Title</th>
			<th>Platform</th>
			<th>Rating</th>
			<th>Review</th>
			<th>Last Played</th>
			<th>Actions</th>
		</tr>
		<?php foreach ($stmt->fetchAll() as $row) { ?>
			<tr>
				<td><?= $row['id'] ?></td>
				<td><?= $row['title'] ?></td>
				<td><?= $row['platform'] ?></td>
				<td><?= $row['rating'] ?></td>
				<td><?= $row['review'] ?></td>
				<td><?= $row['last_played'] ?></td>
				<td><a class="btn btn-secondary" href="update.php?id=<?= $row['id'] ?>">Edit</a> | <a class="btn btn-danger" href="delete.php?id=<?= $row['id'] ?>">Delete</a></td>
			</tr>
		<?php } ?>
	</table>

<?php
}
include_once 'includes/footer.php';
