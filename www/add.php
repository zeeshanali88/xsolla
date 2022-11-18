<?php
include_once 'includes/header.php';

include_once 'lib/database.php';

if (!empty($_POST['add'])) {
	$title = $_POST['title'];
	$platform = $_POST['platform'];
	$rating = $_POST['rating'];
	$review = $_POST['review'];
	$last_played = $_POST['last_played'];
	$sql = "INSERT INTO games SET title=:title, platform=:platform, rating=:rating, review=:review, last_played=:last_played";
	$stmt = $db->prepare($sql);
	$stmt->bindParam(':title', $title);
	$stmt->bindParam(':platform', $platform);
	$stmt->bindParam(':rating', $rating);
	$stmt->bindParam(':review', $review);
	$stmt->bindParam(':last_played', $last_played);
	$stmt->execute();
	if ($db->lastInsertId() > 0) {
		$_SESSION['msg'] = 'Game added successfully.';
        echo "<script>window.location.href='index.php';</script>";
        exit;
        
       
	} else {
		$_SESSION['err'] = 'Sorry, an error occurred while adding game.';
		header('location: /add.php');
       
	}
}

?>

<form class="form" method="POST" action="/add.php">

	<div class="mb-3">
		<label for="title" class="form-label">Title</label>
		<input type="text" class="form-control" id="title" name="title" required placeholder="Enter title">
	</div>

	<div class="mb-3">
		<label for="platform" class="form-label">Platform</label>
		<input type="text" class="form-control" id="platform" name="platform" required placeholder="Enter platform">
	</div>

	<div class="mb-3">
		<label for="rating" class="form-label">Rating</label>
		<input type="number" min="0" max="5" step="1" class="form-control" id="rating" name="rating" required placeholder="Enter rating">
	</div>

	<div class="mb-3">
		<label for="review" class="form-label">Review</label>
		<textarea class="form-control" id="review" name="review" rows="3" required></textarea>
	</div>

	<div class="mb-3">
		<label for="last_played" class="form-label">Last Played</label>
		<input type="datetime-local" class="form-control" id="last_played" name="last_played" required value="<?= date('Y-m-d\TH:i'); ?>" placeholder="Enter last played">
	</div>

	<div class="mb-3">
		<input type="submit" class="btn btn-primary" id="add" name="add" value="Add">
	</div>

</form>

<?php
include_once 'includes/footer.php';
