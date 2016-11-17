<?php
/**
 * Created by PhpStorm.
 * User: jorisbulters
 * Date: 08-06-15
 * Time: 14:28
 */


//database gebeuren included??
require_once 'config/config.php';
require_once 'library/database.php';
?>


<header>

    <div id="logo1">
        <img src="img/walllogo.png">
    </div>

<?php
//sessie starten bij inloggen
session_start();
//$_SESSION['test']= 'hallo test';
$action = (empty($_GET['action'])) ? '' : $_GET['action'];
$request_username = (empty($_POST['username'])) ? '' : $_POST['username'];
$request_password = (empty($_POST['password'])) ? '' : $_POST['password'];


switch ($action) {
    //in geval uitloggen. sessie stoppen en loginform weer laten zien
    case 'logout':
        unset($_SESSION);
        session_destroy();
        //header("location:index.php")
        include 'views/loginform.php';
        break;
    //inloggen
    case 'login':
        if ($request_username != '' && $request_password != '') {
            $result = $mysqli->query("SELECT * FROM users
									WHERE username = '".$request_username."' AND password = '".$request_password."'");
            $user_match_count = $result->num_rows;

            if ($user_match_count == 1) {
                $user_row = $result->fetch_assoc();
                $_SESSION['username'] = $user_row['username'];
            } else {
                echo '<h3>Inloggen mislukt</h3>';
            }
        }
        //als username overeenkomt dat show de account
        if (isset($_SESSION['username'])) {
            include 'views/account.php';
        } else {
            include 'views/loginform.php';
        }
        break;
    case 'register':
        include 'views/registerform.php';
        break;
    //registreren
    case 'doregister':
        $query="INSERT INTO users (firstname, username, password) VALUES ('".$_POST['firstname']."','".$_POST['username']."','".$_POST['password']."')";
        $result = $mysqli->query($query);
        include 'views/loginform.php';
        break;
    case 'upload':
        include 'views/upload.php';
        break;
    default:
        if (isset($_SESSION['username'])) {
            include 'views/account.php';
        } else {
            include 'views/loginform.php';
        }
}
?>

</header>
