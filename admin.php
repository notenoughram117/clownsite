<?php
    session_start();

    //if user not logged in then redirect to home page
    if (!isset($_SESSION['logged in'])) {
        header('Location: index.html');
        exit;
    }

    $DATABASE_HOST = 'localhost';
    $DATABASE_USER = 'admin';
    $DATABASE_PASS = 'notobviouspass';
    $DATABASE_NAME = 'users';

    $con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
    if ( mysqli_connect_errno() ) {
	    // If there is an error with the connection, stop the script and display the error.
	    exit('Failed to connect to MySQL: ' . mysqli_connect_error());
    }

    $stmt = $con->prepare('SELECT password, email FROM user WHERE id = ?');

    $stmt->bind_param('i', $_SESSION['id']);
    $stmt->execute();
    $stmt->bind_result($password, $email);
    $stmt->fetch();
    $stmt->close();
    ?>

    <!DOCTYPE html>
    <html>
        <head>
            <meta charset="utf-8">
            <link rel="stylesheet" href="stylesheet.css">
            <link href='https://fonts.googleapis.com/css?family=Open Sans' rel='stylesheet'>
            <title>GTFO of here - SANAE Gang</title>
        </head>

        <body>
            <h1> Test </h1>
            <a href="./logout.php">Logout </a>

            <form>
                <input type="file" id="uploadFile" name="filename">
                <input type="submit">> 
            </form>
        </body>

    </html>
