<?php
include_once 'includes/header.php';

include_once 'lib/database.php';

if (!empty($_GET['id'])) {
	$id = $_GET['id'];
} else {
	header('location: /index.php');
}

if (!empty($_POST['edit'])) {
	$title = $_POST['title'];
	$platform = $_POST['platform'];
	$rating = $_POST['rating'];
	$review = $_POST['review'];
	$last_played = $_POST['last_played'];
	$sql = "UPDATE games SET title=:title, platform=:platform, rating=:rating, review=:review, last_played=:last_played WHERE id=:id";
	$stmt = $db->prepare($sql);
	$stmt->bindParam(':title', $title);
	$stmt->bindParam(':platform', $platform);
	$stmt->bindParam(':rating', $rating);
	$stmt->bindParam(':review', $review);
	$stmt->bindParam(':last_played', $last_played);
	$stmt->bindParam(':id', $id);
	$stmt->execute();
	if ($stmt->rowCount() > 0) {
		$_SESSION['msg'] = 'Game updated successfully.';
		// header('location: /index.php');
        echo "<script>window.location.href='index.php';</script>";
        exit;
	} else {
		$_SESSION['err'] = 'Sorry, an error occurred while updating game.';
		header('location: /update.php?id=' . $id);
	}
}

$sql = "SELECT * FROM games WHERE id=:id";
$stmt = $db->prepare($sql);
$stmt->bindParam(':id', $id);
$stmt->execute();
$row = $stmt->fetch();
// print_r($row);
?>

<form class="form" method="POST" action="/update.php?id=<?= $id ?>">

	<div class="mb-3">
		<label for="title" class="form-label">Title</label>
		<input type="text" class="form-control" id="title" name="title" required value="<?= $row['title'] ?>" placeholder="Enter title">
	</div>

	<div class="mb-3">
		<label for="platform" class="form-label">Platform</label>
		<input type="text" class="form-control" id="platform" name="platform" required value="<?= $row['platform'] ?>" placeholder="Enter platform">
	</div>

	<div class="mb-3">
		<label for="rating" class="form-label">Rating</label>
		<input type="number" min="0" max="5" step="1" class="form-control" id="rating" name="rating" required value="<?= $row['rating'] ?>" placeholder="Enter rating">
	</div>

	<div class="mb-3">
		<label for="review" class="form-label">Review</label>
		<textarea class="form-control" id="review" name="review" rows="3" required><?= $row['review'] ?></textarea>
	</div>

	<div class="mb-3">
		<label for="last_played" class="form-label">Last Played</label>
		<input type="datetime-local" class="form-control" id="last_played" name="last_played" required value="<?= $row['last_played'] ?>" placeholder="Enter last played">
	</div>

	<div class="mb-3">
		<input type="submit" class="btn btn-primary" id="edit" name="edit" value="Update">
	</div>

</form>

<?php
include_once 'includes/footer.php';
