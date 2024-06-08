<?php
require_once("config.php");
require_once("blocks\\header.php");

$pdo = new PDO('mysql:host='. DB_HOST . ';dbname='. DB_NAME, DB_USER, DB_PASSWORD);

if(isset($_POST['comment']) != NULL) {
    $comment = htmlspecialchars($_POST['comment']);
    $sql = "INSERT INTO `comments` (comment) VALUES (:comm);";
    $stm = $pdo->prepare($sql);
    $stm->bindParam(':comm', $comment, PDO::PARAM_STR);
    $stm->execute();
}

$sql = "SELECT `comment` FROM `comments` ORDER BY `id` DESC LIMIT 5;";
$stm = $pdo->prepare($sql);
$stm->execute();
$result = $stm->fetchAll();

?>

<form enctype="multipart/form-data" action="" method="POST">
    <textarea name="comment" rows="10" cols="45" placeholder="Your comment" required></textarea>
    </br>
    <input type="submit" value="Send">
</form>

<table>
    <? foreach($result as $item) :?>
        <tr><?=nl2br($item[0]) ?></tr></br>
    <? endforeach ?>
</table>

<?
require_once("blocks\\footer.php");