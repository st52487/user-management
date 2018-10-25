<?php
include "config.php";

$message = "";
if (isset($_POST['newsletter'])) {
    if (!empty($_POST['email'])) {
        if ((preg_match('/^(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){255,})(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){65,}@)(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22))(?:\\.(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22)))*@(?:(?:(?!.*[^.]{64,})(?:(?:(?:xn--)?[a-z0-9]+(?:-+[a-z0-9]+)*\\.){1,126}){1,}(?:(?:[a-z][a-z0-9]*)|(?:(?:xn--)[a-z0-9]+))(?:-+[a-z0-9]+)*)|(?:\\[(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){7})|(?:(?!(?:.*[a-f0-9][:\\]]){7,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?)))|(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){5}:)|(?:(?!(?:.*[a-f0-9]:){5,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3}:)?)))?(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))(?:\\.(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))){3}))\\]))$/iD', $_POST['email']))) {
            try{
                $conn = new PDO("mysql:host=$servername;dbname=$dbname",
                    $username, $password);

                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $stmt = $conn->prepare("INSERT INTO newsletter (email) VALUES (:email)");

                $stmt->bindParam('email', $_POST["email"]);
                $stmt->execute();

                $message = "Your are subscribed!";
            }catch (PDOException $e){
                echo "Error: " . $e->getMessage();
            }
        } else {
            $message = "Bad formated email adress";
        }
    } else {
        $message = "Email adress is needed!";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Web1</title>
</head>
<body>
<header>
    <div id="header-web-title">Web 1</div>
    <img id="header-logo" src="images/logo-fire.png">
    <nav id="nav">
        <a href="<?= BASE_URL ?>">Home</a>
        <a href="<?= BASE_URL . "?pages=blog" ?>">Blog</a>
        <a href="<?= BASE_URL . "?pages=contact" ?>">Contact me</a>
    </nav>
</header>
<section id="hero">
    <div>
        <h1>This is web 1</h1>
        <a href="#">
            Try me!
        </a>
    </div>
</section>
<main>
    <?php
    if (!empty($message)) {
        echo $message;
        $message = "";
    }

    $file = "./pages/" . $_GET["pages"] . ".php";
    if (file_exists($file)) {
        include $file;
    } else {
        include "default.php";
    }
    ?>
</main>

<footer>
    <?php
    include "footer.php";
    ?>
</footer>
</body>
</html>
