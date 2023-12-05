<?php
    session_start();
    if (!isset($_SESSION["user"])) {
        header("location: login.php");exit();
    }
    if(isset($_GET["logout"])){
        unset($_SESSION["user"]);
        header("location: login.php");exit();
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
    <title>user information</title>
    <style>
        table {
  width: 100%;
  border-collapse: collapse;
  margin: 20px 0;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  background-color: black;
}

th, td {
  padding: 15px;
  border-bottom: 1px solid #ddd;
  text-align: left;
}

th {
  background-color: #3498db;
  color: #fff;
}

tr:hover {
  background-color: #3498db;
}
@media (max-width: 600px) {
  table {
      box-shadow: none;
  }

  th, td {
      padding: 10px;
  }

  th {
      background-color: #3498db;
      color: #fff;
  }
}
    </style>
</head>
<body>
    <header>
    <a href="#" style="font-size: 30px;" class="logo">A&M</a>
    <ul class="navlist">
        <li><a href="#" class="active">Home</a></li>
        <li><a href="">About</a></li>
        <li><a href="">Contact</a></li>
        <li><a href="login.php">Log out</a></li>
    </ul>
    </header>
    <section class="darkCity">
        <img src="img/sky.png" alt="">
        <img src="img/stars.png" alt="">
        <img src="img/moon.png" alt="moon" id="moon">
        <img src="img/city-left1.png" alt="cityLeft" id="cityLeft">
        <img src="img/city-right1.png" alt="cityRight" id="cityRight">
        <img src="img/purple-light.png" id="purple">
        <h2 id="text"><span>Бидний вебд</span><br>Тавтай морилно уу!</h2>
    </section>
    <div class="underGround">
    <head>
    
</head>
<body>
    </div>
    <script src="main.js"></script>
</body>
</html>

<?php
$jsonFile = 'data.json';
$jsonData = file_get_contents($jsonFile);
$userData = json_decode($jsonData, true);

if ($userData === null) {
    echo "Error decoding JSON data";
} else {
    echo '<table>';
    echo '<tr><th>Username</th><th>Email</th><th>Hometown</th><th>Birthday</th>></tr>';

    foreach ($userData as $user) {
        echo '<tr>';
        echo '<td>' . htmlspecialchars($user['username']) . '</td>';
        echo '<td>' . (isset($user['email']) ? htmlspecialchars($user['email']) : '') . '</td>';
        echo '<td>' . (isset($user['hometown']) ? htmlspecialchars($user['hometown']) : '') . '</td>';
        echo '<td>' . (isset($user['bday']) ? htmlspecialchars($user['bday']) : '') . '</td>';
        echo '</tr>';
    }

    echo '</table>';
}
?>
