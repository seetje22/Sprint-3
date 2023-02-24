<form method="POST" action="login.php">
    <input type="text" name="username" placeholder="Gebruikersnaam"><br>
    <input type="password" name="password" placeholder="Wachtwoord"><br>
    <input type="submit" value="Inloggen">
</form>

<?php
session_start();
if(isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $conn = mysqli_connect("localhost", "root", "", "webshop");
    $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $query);
    if(mysqli_num_rows($result) == 1) {
        $_SESSION['username'] = $username;
        header("Location: index.php");
    }
    else {
        echo "Foutieve login.";
    }
}
?>

<?php
session_start();
if(!isset($_SESSION['username'])) {
    header("Location: login.php");
}

<?php
session_start();
session_destroy();
header("Location: login.php");
?>
<?php
session_start();
if(!isset($_SESSION['username'])) {
  header("Location: login.php");
}
?>




