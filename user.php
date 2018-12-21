<?php
include_once('controllerIndex.php');
?>


<?= isset($errorsArray['title']) ? $errorsArray['title'] : ''; ?><br>
<?= isset($errorsArray['date']) ? $errorsArray['date'] : ''; ?><br>

<?= isset($errorsArray['time']) ? $errorsArray['time'] : ''; ?><br>

<?= isset($errorsArray['image']) ? $errorsArray['image'] : ''; ?><br>

<?= isset($errorsArray['description']) ? $errorsArray['description'] : ''; ?>