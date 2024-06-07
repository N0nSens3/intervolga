<form enctype="multipart/form-data" action="" method="POST">
    <textarea name="comment" rows="10" cols="45" placeholder="Your comment" required></textarea>
    </br>
    <input type="submit" value="Send">
</form>

<?php
require_once("config.php");
$pdo = new PDO('mysql:host='. DB_HOST . ';dbname='. DB_NAME, DB_USER, DB_PASSWORD);

if(isset($_POST['comment']) != NULL) {
    $comment = htmlspecialchars($_POST['comment']);
    $sql = "INSERT INTO `comments` (comm, date) VALUES (:comm, NOW());";
    $stm = $pdo->prepare($sql);
    $stm->bindParam(':comm', $comment, PDO::PARAM_STR);
    $stm->execute();
}

$sql = "SELECT `comm`, `date` FROM `comments` ORDER BY `date` DESC LIMIT 5;";
$stm = $pdo->prepare($sql);
$stm->execute();
$result = $stm->fetchAll();
foreach($result as $item) {
    echo $item[0]." ";
    echo $item[1]." </br>";
}

#TODO Divide php and HTML