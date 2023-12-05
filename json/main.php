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
<link href="main.css" rel="stylesheet">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="main.css" rel="stylesheet">
    <title>User Information</title>
    
<body>

<?php
// Read JSON data from the file
$jsonFile = 'data.json';
$jsonData = file_get_contents($jsonFile);

// Decode JSON data
$userData = json_decode($jsonData, true);

// Check if decoding was successful
if ($userData === null) {
    echo "Error decoding JSON data";
} else {
    // Display table
    echo '<table>';
    echo '<tr><th>Username</th><th>Email</th><th>Hometown</th></tr>';
    
    foreach ($userData as $user) {
        echo '<tr>';
        echo '<td>' . htmlspecialchars($user['username']) . '</td>';
        echo '<td>' . htmlspecialchars($user['email']) . '</td>';
        echo '<td>' . htmlspecialchars($user['hometown']) . '</td>';
        echo '</tr>';
    }
    
    echo '</table>';
}
?>

</body>
</html>