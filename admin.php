<?php
    session_start();

    //if user not logged in then redirect to home page
    if (!isset($_SESSION['loggedin'])) {
        header('Location: index.html');
        exit;
    }

    //Database Credentials:

    $DATABASE_HOST = 'localhost';
    $DATABASE_USER = 'root';
    $DATABASE_PASS = 'abc123';
    $DATABASE_NAME = 'users';

    //Default Admin Login Credentials, remove before launch!!!!
    //username: admin
    //password: test

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

            <form action="upload.php" method="post" enctype="multipart/form-data">
                <input type="file" id="uploadFile" name="uploadFile">
                <input type="submit">> 
            </form>
        </body>

    </html>
