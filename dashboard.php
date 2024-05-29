<?php
require_once 'config.php';

// authenticate code from Google OAuth Flow
try {
    if (isset($_GET['code'])) {
        $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
        $client->setAccessToken($token['access_token']);

        // get profile info
        $google_oauth = new Google_Service_Oauth2($client);
        $google_account_info = $google_oauth->userinfo->get();

        //Save the user data into session
        $_SESSION['user_id'] = $google_account_info['id'];
    } else {
        if (!isset($_SESSION['user_id'])) {
            header("Location: index.php");
            exit();
        }
    }
} catch (Exception $e) {
    $error_message = $e->getMessage();
    logError($error_message);
    header("Location: error.php");
    exit();
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    <link rel="stylesheet" href="CSS/style.css">
    <style>
        body {
            display: block;
            height: 100vh;
            text-align: center;
            padding-top: 5vh;
        }
    </style>
</head>

<body>
    <h1>Welcome to the Dashboard!</h1>
    <?php
    if (isset($google_account_info['id'])) {
        //XSS Prevention
        $first_name = htmlspecialchars($google_account_info['givenName']);
        $last_name = htmlspecialchars($google_account_info['familyName']);
        $email = htmlspecialchars($google_account_info['email']);
    ?>
        <img src="<?= $google_account_info['picture'] ?>" alt="" width="90px" height="90px">
        <ul>
            <li>First Name: <?= $first_name ?></li>
            <li>Last Name: <?= $last_name ?></li>
            <li>Email Address: <?= $email ?></li>
        </ul>
    <?php
    } else {
        $id = $_SESSION['user_id'];

        $sql = "SELECT * FROM users WHERE id=?;";
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
            $error_message = "dashboard.php/line 62/mysqli_stmt_prepare(\$stmt, \$sql) FAILED\n";
            logError($error_message);
        } else {
            mysqli_stmt_bind_param($stmt, "i", $id);
            mysqli_stmt_execute($stmt);

            $result = mysqli_stmt_get_result($stmt);
            $data = mysqli_fetch_assoc($result);

            //XSS Prevention
            $first_name = htmlspecialchars($data['first_name']);
            $last_name = htmlspecialchars($data['last_name']);
            $email = htmlspecialchars($data['email']);
        }
    ?>
        <ul>
            <li>First Name: <?= $first_name ?></li>
            <li>Last Name: <?= $last_name ?></li>
            <li>Email Address: <?= $email ?></li>
        </ul>
    <?php
    }
    ?>
    <br><br><br>
    <a href="logout.php">Logout</a>
</body>

</html>