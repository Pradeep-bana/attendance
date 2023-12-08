<?php 
//This includes the session file. This file contains code that starts/resumes a session. 
//By having it in the header file, it will be included on every page, allowing session capability to be used on every page across the website.
include_once 'include/session.php'?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <link rel="stylesheet" href="css/site.css" />
    
    <title>Attendance - <?php echo $title ?></title>
  </head>
  <body>
    <nav>
    <img id="pradeep" src="uploads/pradeep.jpg">
         <a class="link" href="index.php">Home</a>
          <a class="link" href="viewrecords.php">View Attendees</a>
        </div>
          <?php 
              if(!isset($_SESSION['userid'])){
          ?>
            <a class="link" href="login.php">Login</a>
          <?php } else { ?>
            <a class="link" href="#"><span>Hello <?php echo $_SESSION['username'] ?>!</a>
            <a class="link" href="logout.php">Logout</a>
          <?php } ?>
    </nav>
    <div class="container">